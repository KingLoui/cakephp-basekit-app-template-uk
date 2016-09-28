<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ReservationsController extends AppController
{
    public function add(){
        $freeAccounts = TableRegistry::get('Accounts')->find('FreeAccounts');
        $userReservations = $this->Reservations->find('all')
            ->where(['Reservations.user_id =' => $this->Auth->user('id')]);

        if($freeAccounts->count() == 0 && $userReservations->count() == 0)
        {
            $reservation = $this->Reservations->newEntity();
            $reservation->user_id = $this->request->session()->read('Auth.User.id');
            $this->Reservations->save($reservation);
        }
        return $this->redirect(['controller' => 'pages', 'action' => 'display','dashboard']);
    }
    public function delete()
    {
        $reservation = $this->Reservations->find('all')
            ->where(['Reservations.user_id =' => $this->Auth->user('id')]);
        if($reservation->count() > 0) {
            if ($this->Reservations->delete($reservation->first())) {
                $this->Flash->success(__('Ihre Reservierung wurde gelöscht.'));
            } else {
                $this->Flash->error(__('The reservation could not be deleted. Please, try again.'));
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
