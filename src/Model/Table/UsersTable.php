<?php
namespace NifaUsers\Model\Table;

use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Log\Log;

/**
 * Users Model
 *
 * @property \NifaUsers\Model\Table\NifaUsersTable|\Cake\ORM\Association\BelongsTo $NifaUsers
 *
 * @method \NifaUsers\Model\Entity\User get($primaryKey, $options = [])
 * @method \NifaUsers\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \NifaUsers\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \NifaUsers\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \NifaUsers\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \NifaUsers\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \NifaUsers\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        /*$validator
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->allowEmpty('name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');*/

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }



    public function createUser($email, $okta_user_id, $name, $role_id = 2, $active = true)
    {
        $user = $this->newEntity();
        $user->email = $email;
        $user->okta_user_id = $okta_user_id;
        $user->name = $name;
        $user->role_id = $role_id;
        $user->active = $active;
        $user->nifaaero_id = 0;
        Log::write('debug', $user);
        return $this->save($user);
    }
}
