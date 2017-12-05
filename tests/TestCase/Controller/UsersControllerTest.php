<?php
/**
 * Created by PhpStorm.
 * User: jaredtesta
 * Date: 12/4/17
 * Time: 9:30 PM
 */

namespace NifaUsers\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

class UsersControllerTest extends IntegrationTestCase
{
    public $fixtures = ['plugin.NifaUsers.users'];

    public function testUnauthorized()
    {
        $this->get('/nifa-users/users');

        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    public function testIndex()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'testing',
                    'active_roles' => [1,2]
                    // other keys.
                ]
            ]
        ]);

        $this->get('/nifa-users/users');

        $this->assertResponseOk();
        // More asserts.
    }

    public function testIndexQueryData()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'testing',
                    'active_roles' => [1,2]
                    // other keys.
                ]
            ]
        ]);

        $this->get('nifa-users/users?page=1');

        $this->assertResponseOk();
        // More asserts.
    }


}