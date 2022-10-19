<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'email' => 'Lorem ipsum dolor sit amet',
                'name' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'id' => 1,
                'modified' => '2022-09-30 15:49:19',
                'created' => '2022-09-30 15:49:19',
            ],
        ];
        parent::init();
    }
}
