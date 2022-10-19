<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property int $sponsor_id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Sponsor $sponsor
 * @property \App\Model\Entity\Category[] $categories
 */
class Product extends Entity
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
        'sponsor_id' => true,
        'name' => true,
        'description' => true,
        'image' => true,
        'modified' => true,
        'created' => true,
        'sponsor' => true,
        'categories' => true,
    ];
}
