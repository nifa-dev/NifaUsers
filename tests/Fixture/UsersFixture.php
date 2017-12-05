<?php
/**
 * Created by PhpStorm.
 * User: jaredtesta
 * Date: 12/4/17
 * Time: 9:34 PM
 */

namespace NifaUsers\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class UsersFixture extends TestFixture
{
    public $fields = [
        'id' => ['type' => 'uuid'],
        'email' => ['type' => 'string', 'length' => 255, 'null' => false],
        'active' => ['type' => 'boolean'],
        'role_id' => ['type' => 'integer'],
        'created' => 'datetime',
        'modified' => 'datetime',
        'nifaaero_id' => 'integer',
        'okta_auth_id' => ['type' => 'string', 'length' => 225],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id']],
        ]
    ];

    public function init()
    {
        $this->records = [
            [
                'id' => 'c5d5fa43-5f11-4b7e-a6e1-7f7e83e220e4',
                'email' => 'jared.testa@gmail.com',
                'active' => true,
                'role_id' => 1,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'nifaaero_id' => 1,
                'okta_auth_id' => 'test-1'
            ],
            [
                'id' => '3ccb6262-45d4-4182-b1e7-690de4cc3399',
                'email' => 'jared.testa@nifa.aero',
                'active' => true,
                'role_id' => 1,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'nifaaero_id' => 2,
                'okta_auth_id' => 'test-2'
            ],
            [
                'id' => '9d232c0b-a1c1-4001-92c5-d1628a3d9f75',
                'email' => 'ehessgt@gmail.com',
                'active' => true,
                'role_id' => 1,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'nifaaero_id' => 3,
                'okta_auth_id' => 'test-3'
            ],
        ];
        parent::init();
    }
}