<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string $description
 * @property float|null $price_per_season
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Product[] $products
 * @property \App\Model\Entity\Sponsor[] $sponsors
 */
class Category extends Entity
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
        'type' => true,
        'name' => true,
        'description' => true,
        'price_per_season' => true,
        'modified' => true,
        'created' => true,
        'products' => true,
        'sponsors' => true,
    ];
}
