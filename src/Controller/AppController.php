<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
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

        $this->loadComponent('KingLoui/BaseKit.BaseKit');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'authenticate' => [
                'Ldap.Ldap' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ],
                    'port' => Configure::read('Ldap.port'),
                    'host' => Configure::read('Ldap.host'),
                    'domain' => Configure::read('Ldap.domain'),
                    'baseDN' => Configure::read('Ldap.baseDN'),
                    'bindDN' => Configure::read('Ldap.bindDN'),
                    'search' => Configure::read('Ldap.search'),
                    'errors' => Configure::read('Ldap.errors'),
                    'flash' => [
                        'key' => 'ldap',
                        'element' => 'Flash/error',
                    ]
                ]
            ],
            'loginAction' => [
                'prefix' => false,
                'controller' => 'users',
                'action' => 'login'
            ],
            'unauthorizedRedirect' => false,
            'loginRedirect' => [
                'prefix' => false,
                'plugin' => false,
                'controller' => 'pages',
                'action' => 'dashboard'
                
            ],
            'logoutRedirect' => [
                'controller' => 'pages',
                'action' => 'home',
                'prefix' => false
            ],
            'authError' => 'Sie besitzen nicht die nötigen Rechte um die angeforderte Seite zu sehen, bitte melden Sie sich an!',
        ]);
    }

    public function beforeFilter(Event $event)
    {
        $this->set('user', $this->Auth->user());

        // linke startseite auf admin dashboard bzw userdashboard
        if($this->Auth->user() 
            && $this->request->params['controller'] == 'Pages' 
            && $this->request->params['pass'][0] == 'home') 
        { 
            if($this->Auth->user('role') == 'admin'){
                $this->redirect('/admin');
            }
            else {
                $this->redirect('/dashboard');
            }
        }
    }

    public function isAuthorized($user)
    {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
        // Default deny
        return false;
    }
}
