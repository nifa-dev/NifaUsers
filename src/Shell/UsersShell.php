<?php
namespace NifaUsers\Shell;

use Cake\Console\Shell;



class UsersShell extends Shell
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');

    }

    public function createFirstUser($email, $roleId) {

        $user = ['email' => $email, 'role_id' => $roleId, 'active' => true];

        $user = $this->Users->newEntity($user);
        if($user = $this->Users->save($user)) {
            $this->out(sprintf("The user %s was created.", $user->email));
        } else {
            $this->out("Failed to create user");
        }
    }




}