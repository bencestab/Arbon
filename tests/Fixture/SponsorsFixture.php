<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SponsorsFixture
 */
class SponsorsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'slug' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'logo' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'zip' => 'Lorem ips',
                'city' => 'Lorem ipsum dolor sit amet',
                'country_id' => '',
                'phone' => 'Lorem ipsum dolor sit amet',
                'modified' => '2022-09-30 15:48:43',
                'created' => '2022-09-30 15:48:43',
            ],
        ];
        parent::init();
    }
}
