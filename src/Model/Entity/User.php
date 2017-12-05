<?php
namespace NifaUsers\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $okta_user_id
 *
 * @property \NifaUsers\Model\Entity\NifaUser $nifa_user
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'okta_user_id' => true,
        'okta_user' => true
    ];
<<<<<<< Updated upstream

    protected $_virtual = ['groups'];

    protected function _getGroups() {
        
        if(array_key_exists('wp_groups', $this->_properties)) {
            return json_decode($this->_properties['wp_groups'], true);
        } else {
            return null;
        }

    }

=======
>>>>>>> Stashed changes
}
