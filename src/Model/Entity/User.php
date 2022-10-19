<?php


namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher; 
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property string $email
 * @property string $name
 * @property string $password
 * @property int $id
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Sponsor[] $sponsors
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
     * @var array<string, bool>
     */
    protected $_accessible = [
        'email' => true,
        'name' => true,
        'password' => true,
        'modified' => true,
        'created' => true,
        'sponsors' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];

    
    protected function _setPassword(string $password) : ?string         
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
    
}
