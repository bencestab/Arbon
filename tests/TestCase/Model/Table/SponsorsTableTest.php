<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SponsorsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SponsorsTable Test Case
 */
class SponsorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SponsorsTable
     */
    protected $Sponsors;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Sponsors',
        'app.Users',
        'app.Products',
        'app.Categories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Sponsors') ? [] : ['className' => SponsorsTable::class];
        $this->Sponsors = $this->getTableLocator()->get('Sponsors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Sponsors);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SponsorsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SponsorsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
