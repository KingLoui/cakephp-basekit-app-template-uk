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
        $this->loadComponent('KingLoui/BaseKitUsers.BaseKitUsers');

    }

    public function beforeRender(Event $event)
    {
        //debug($this->Auth);
        $menu = $this->Menu->get('menu_main');
        $menu->addChild('Dashboard', ['uri' => '/pages/dashboard']);
        $menu->addChild('Testseite', ['uri' => '/pages/test']);

        $this->viewBuilder()->theme('UniTheme');
        $this->viewBuilder()->helpers([
            'Url', 
            'Gourmet/KnpMenu.Menu',
            'Html' => ['className' => 'BootstrapUI.Html'],
            'Form' => ['className' => 'BootstrapUI.Form'],
            'Flash' => ['className' => 'BootstrapUI.Flash'],
            'Paginator' => [
                'className' => 'BootstrapUI.Paginator',
                'labels' => [
                    'prev' => '<i class="fa fa-chevron-left"></i>',
                    'next' => '<i class="fa fa-chevron-right"></i>',
                ]
            ]
        ]);
    }
}
