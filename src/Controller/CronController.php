<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\I18n\Time;
use Cake\Mailer\Email;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;

class CronController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }

    public function database()
    {
        print_r("Doing cron tasks");

        if($this->request->query('key') != "1312XoU7l")
            throw new UnauthorizedException(__('Not Allowed'));

        // Cleanup users
        $users = TableRegistry::get('Users');
        $data = $users->find('all')
            ->where(['Users.role <>' => 'admin'])
            ->notMatching('Bookings')
            ->notMatching('Reservations');
        foreach ($data as $usr) {
            $users->delete($users->get($usr['id']));
        }

        // Cleanup expired Bookings => send Mail
        $bookings = TableRegistry::get('Bookings');
        $users = TableRegistry::get('Users');
        $expired = $bookings->find('all')
            ->where(['Bookings.expirationdate <' => Time::now()])
            ->contain(['Accounts','Users']);
        
        if($expired->count() > 0) {
            $admins = $users->find('all')
                ->where(['Users.role =' => 'admin']);
                
            $emails = array();
            foreach ($admins as $admin)
                array_push($emails, $admin['email']);

            $email = new Email('default');
            $email->template('expiredbookings')
                ->viewVars(['bookings' => $expired->all()])
                ->emailFormat('html')
                ->from(['noreply@vt.uni-kassel.de' => 'Lynda.com Accountverwaltung'])
                ->to($emails)
                ->subject('Abgelaufene Lynda.com Accounts')
                ->send();

        } 
        $this->autoRender = false;
    }
}
