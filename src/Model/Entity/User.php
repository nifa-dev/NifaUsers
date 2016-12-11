<?php
namespace NifaUsers\Model\Entity;

use Cake\ORM\Entity;



class User extends Entity
{

    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected $_virtual = ['groups'];

    protected function _getGroups() {
        //return $this->_properties['wp_groups'];
        return json_decode($this->_properties['wp_groups'], true);
    }

}
