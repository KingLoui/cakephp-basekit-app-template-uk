<?php

namespace App\Shell;

use Cake\Console\Shell;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Mailer\Email;

class DatabaseShell extends Shell
{
    public function main()
    {
        $this->out('This shell provides some functions for background scheduling and db cleanup');
    }

    public function cron()
    {
    		$this->userDataCleanup();
    		$this->findExpiredBookings();
    }
    
    public function userDataCleanup()
    {
    		$this->out('Searching for users without bookings or reservations who aren\'t admins');
            $users = TableRegistry::get('Users');

            $data = $users->find('all')
                ->where(['Users.role <>' => 'admin'])
                ->notMatching('Bookings')
                ->notMatching('Reservations');
            foreach ($data as $usr) {
                $this->out("Deleting:".$usr['uniaccount']);
                $users->delete($users->get($usr['id']));
            }

    		$this->out('done!');
    }

    public function findExpiredBookings()
    {
		$this->out('Searching for expired bookings');
		$bookings = TableRegistry::get('Bookings');
		$users = TableRegistry::get('Users');
		$expired = $bookings->find('all')
			->where(['Bookings.expirationdate <' => Time::now()])
			->contain(['Accounts','Users']);
        
        $this->out("found ".$expired->count()." expired bookings");
        if($expired->count() > 0) {
	        $admins = $users->find('all')
	    		->where(['Users.role =' => 'admin']);
	    		
    		$emails = array();
    		foreach ($admins as $admin)
    			array_push($emails, $admin['email']);

    		$this->out('Sending email to:');
	        $this->out($emails);
	        $email = new Email('default');
	        $email->template('expiredbookings')
	        	->viewVars(['bookings' => $expired->all()])
	        	->emailFormat('html')
	        	->from(['noreply@vt.uni-kassel.de' => 'Lynda.com Accountverwaltung'])
	            ->to($emails)
	            ->subject('Abgelaufene Lynda.com Accounts')
	            ->send();
        } 
        $this->out("done!");
    }
}