<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class BookingsController extends AppController
{
    public function add(){
        
        $freeAccounts = TableRegistry::get('Accounts')->find('FreeAccounts');
        $userAccounts = $this->Bookings->find('all')
            ->where(['Bookings.user_id =' => $this->Auth->user('id'),
                    'Bookings.expirationdate >' => Time::now()
                ]);

        // check if there are free accounts and user does not already have an account
        if($freeAccounts->count() > 0 && $userAccounts->count() == 0)
        {
            $booking = $this->Bookings->newEntity();
            $booking->user_id = $this->Auth->user('id');
            $booking->account_id = $freeAccounts->first()['id'];
            $booking->expirationdate = Time::now()->addMonth(1);
            $this->Bookings->save($booking);
        }
        return $this->redirect(['controller' => 'pages', 'action' => 'display','dashboard']);
    }
    public function delete()
    {
        $bookings = $this->Bookings->find('all')
            ->where(['Bookings.user_id =' => $this->Auth->user('id'), 'Bookings.expirationdate >' => Time::now()]);
        if($bookings->count() > 0) {
            $booking = $bookings->first();
            $booking['expirationdate'] = Time::now();
            if ($this->Bookings->save($booking)) {
                $this->Flash->success(__('Ihr Account wurde erfolgreich zurückgegeben.'));
            } else {
                $this->Flash->error(__('The booking could not be deleted. Please, try again.'));
            }
        }
        return $this->redirect(['controller' => 'pages', 'action' => 'display','dashboard']);
    } 
    
    public function isAuthorized($user)
    {
        // All registered users can add articles
        if ($this->request->action === 'add' 
            || $this->request->action === 'delete') {
            return true;
        }
        return parent::isAuthorized($user);
    }
}
