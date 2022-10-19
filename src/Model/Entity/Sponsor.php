<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sponsor Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $slug
 * @property string|null $email
 * @property string|null $logo
 * @property string|null $address
 * @property string $zip
 * @property string $city
 * @property string|null $country_id
 * @property string|null $phone
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Product[] $products
 * @property \App\Model\Entity\Category[] $categories
 */
class Sponsor extends Entity
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
        'user_id' => true,
        'name' => true,
        'slug' => true,
        'email' => true,
        'logo' => true,
        'address' => true,
        'zip' => true,
        'city' => true,
        'country_id' => true,
        'phone' => true,
        'modified' => true,
        'created' => true,
        'user' => true,
        'products' => true,
        'categories' => true,
    ];
}
