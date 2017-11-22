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
        
        if(array_key_exists('wp_groups', $this->_properties)) {
            return json_decode($this->_properties['wp_groups'], true);
        } else {
            return null;
        }

    }

}
