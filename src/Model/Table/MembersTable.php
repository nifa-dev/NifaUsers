<?php
namespace NifaUsers\Model\Table;

use App\Model\Entity\ContestsEvent;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

class MembersTable extends Table {

    public function initialize(array $config) {

        $this->table('v_user_info');
        $this->displayField('user_email');
        $this->primaryKey('ID');
    }

    public static function defaultConnectionName() {
        return 'nifa-wp';
    }




}