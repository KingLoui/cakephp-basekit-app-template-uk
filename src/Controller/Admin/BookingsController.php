<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\Time;

class BookingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function expired()
    {
        $this->paginate = [
            'contain' => ['Users', 'Accounts'],
        ];
        $query = $this->Bookings->find('all')
            ->where(['Bookings.expirationdate <' => Time::now()]);
        
        $bookings = $this->paginate($query);

        $this->set(compact('bookings'));
        $this->set('_serialize', ['bookings']);
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Accounts']
        ];
        $bookings = $this->paginate($this->Bookings);

        $this->set(compact('bookings'));
        $this->set('_serialize', ['bookings']);
    }

    /**
     * View method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $booking = $this->Bookings->get($id, [
            'contain' => ['Users', 'Accounts']
        ]);

        $this->set('booking', $booking);
        $this->set('_serialize', ['booking']);
    }
    /**
     * Delete method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $booking = $this->Bookings->get($id);
        if ($this->Bookings->delete($booking)) {
            $this->Flash->success(__('The booking has been deleted.'));
        } else {
            $this->Flash->error(__('The booking could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
