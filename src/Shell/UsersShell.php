<?php
namespace NifaUsers\Shell;

use Cake\Console\Shell;



class UsersShell extends Shell
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('NifaUsers.Users');

    }

    public function createFirstUser($email, $roleId) {

        $user = ['email' => $email, 'role_id' => $roleId, 'active' => true, 'okta_user_id' => null];

        $user = $this->Users->newEntity($user);
        if($user = $this->Users->save($user)) {
            $this->out(sprintf("The user %s was created.", $user->email));
        } else {
            $this->out("Failed to create user");
        }
    }

    public function addSuperuser($email) {
        $user = ['email' => $email, 'role_id' => 1, 'active' => true];

        $user = $this->Users->newEntity($user);
        if($user = $this->Users->save($user)) {
            $this->out(sprintf("The user %s was created.", $user->email));
        } else {
            $this->out("Failed to create user");
        }
    }




}
