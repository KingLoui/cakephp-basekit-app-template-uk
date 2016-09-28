<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class PagesController extends AppController
{

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $allowedPages = array('home');
        if(isset($this->request->params['pass'][0]) &&
            in_array($this->request->params['pass'][0], $allowedPages))
        {
            $this->Auth->allow('display');
        }

        // set view vars for dashboard
        $freeAccounts = TableRegistry::get('Accounts')->find('FreeAccounts')->count() > 0 ? true : false;
        $reservations = TableRegistry::get('Reservations');
        $isWaiting = $reservations->find('all')
                    ->where(['Reservations.user_id =' => $this->Auth->user('id')])
                    ->count() > 0 ? true : false;

        $allreservations = $reservations->find('all');
        $numReservation = $allreservations->count();
        $reservationPlace = 0;
        foreach ($allreservations as $row) {
            $reservationPlace++;
            if($row['user_id'] == $this->Auth->user('id'))
                break;
        }
        $booking = TableRegistry::get('Bookings')->find('all')->where(['Bookings.user_id =' => $this->Auth->user('id'), 'Bookings.expirationdate >' => Time::now()]);
        $hasAccount = $booking->count() > 0 ? true : false;
        if($hasAccount) {
            $book = $booking->first();
            $account = TableRegistry::get('Accounts')->get($booking->first()['account_id']);
        }
        else {
            $book = false;
            $account = false;
        }

        $this->set(compact("freeAccounts", "isWaiting", "numReservation", "reservationPlace", "hasAccount", "account", "book"));

    }

    public function isAuthorized($user)
    {
        // All registered users can add articles
        if ($this->request->action === 'display') {
            return true;
        }
        return parent::isAuthorized($user);
    }
    
    public function display()
    {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }
}
