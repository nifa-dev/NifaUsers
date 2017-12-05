<?php
namespace NifaUsers\Controller;

use App\Controller\AppController;
//use App\Model\Table\MyUsersTable;
use Cake\Event\Event;
use Firebase\JWT\JWT;
use Firebase\JWT\JWK;
use Cake\Log\Log;
use Cake\Core\Configure;

class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout']);
    }

    //add your new actions, override, etc here
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.

    }


    public function login()
    {
        
        //if code is present request, retrieve a token
        if($this->request->getQuery('code')) {
            $user = $this->Auth->identify();
            if ($user) {
                $user['active_roles'] = array($user->role_id);
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('Error gaining access..'));
            }
        }

        if($this->request->getQuery('id_token')) {
            $keys = json_decode(file_get_contents('https://'.Configure::read('Credentials.domain').'/oauth2/'.Configure::read('OktaConfig.authorizationServerId').'/v1/keys'));
            Log::write('debug', $keys);
            $keys = JWK::parseKeySet($keys);

            $idTokenDecoded = JWT::decode($this->request->getQuery('id_token'), $keys, ['RS256']);
            Log::write('debug', $idTokenDecoded);

        }

    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function index() {

        $this->paginate = [
            //'contain' => ['MainLinks']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }


    /*public function edit($id) {

        $user = $this->Users->get($id);


        $roles = $this->Users->Roles->find('list')->order(['Roles.name' => 'ASC'])->where(['system_role' => true]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);


    }*/
}

?>