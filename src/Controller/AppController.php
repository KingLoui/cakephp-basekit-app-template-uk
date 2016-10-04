<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;
use Ldap\Auth\LdapAuthenticate;


class AppController extends Controller
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('KingLoui/BaseKit.BaseKit');

        // Configure::write('Users.auth', false);
        // $this->loadComponent('Auth', Configure::read('Auth'));

        $this->loadComponent('KingLoui/BaseKitUsers.BaseKitUsers');

    }

    public function beforeFilter(Event $event)
    {
        //debug($this->Auth);
    }
}
