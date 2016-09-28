<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user)
            {
                // User hat richtige Rolle?
                if(in_array('Student', $user['eduPersonAffiliation']) 
                    || in_array('Staff', $user['eduPersonAffiliation']))
                {
                    
                    //check if user is in database
                    $users = TableRegistry::get('Users');
                    $query = $users->find()->where(['uniaccount' => $user['uid'][0]]);

                    // create if not exists
                    if($query->count() == 0) {
                        // add user to database
                        $newuser = $this->Users->newEntity();
                        $newuser->uniaccount = $user['uid'][0];
                        $newuser->email = $user['userPreferredEmail'][0];
                        $newuser->realname = $user['fullName'][0];
                        $newuser->role = 'user';
                        $result = $this->Users->save($newuser);
                        $user_id = $result->id;
                    }else {
                        $row = $query->first();
                    }
                    // add data to session 
                    $user['role'] = isset($newuser->role) ? $newuser->role : $row['role'];
                    $user['id'] = isset($user_id) ? $user_id : $row['id'];

                    if(!in_array('Sekundäraccount', $user['workforceID']) || $user['role'] == 'admin')
                    {
                        $this->Auth->setUser($user);
                        if($user['role'] == 'admin')
                            return $this->redirect('/admin');
                        return $this->redirect($this->Auth->redirectUrl());
                    } else {
                        $this->Flash->error(__('Sie können sich nur mit ihrem Primäraccount anmelden.'));
                    }

                } else {
                    $this->Flash->error(__('Nur Studenten und Mitarbeiter haben die Möglichkeit sich einen Account auszuleihen.'));
                }
            } else 
                $this->Flash->error(__('Benutzername oder Passwort falsch, bitte versuchen Sie es erneut!'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function isAuthorized($user)
    {
        // All registered users can add articles
        if ($this->request->action === 'logout') {
            return true;
        }
        return parent::isAuthorized($user);
    }
}
