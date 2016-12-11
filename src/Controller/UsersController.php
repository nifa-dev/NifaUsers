<?php
namespace NifaUsers\Controller;

use App\Controller\AppController;
//use App\Model\Table\MyUsersTable;
use Cake\Event\Event;


class UsersController extends AppController
{


    public function index() {

        $this->paginate = [
            //'contain' => ['MainLinks']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }


    public function edit($id) {

        $user = $this->Users->get($id);


        $roles = $this->Users->Roles->find('list')->order(['Roles.name' => 'ASC'])->where(['system_role' => true]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);


    }
}

?>