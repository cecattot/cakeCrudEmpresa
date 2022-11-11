<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstablishmentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstablishmentsTable Test Case
 */
class EstablishmentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EstablishmentsTable
     */
    protected $Establishments;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Establishments',
        'app.Employees',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Establishments') ? [] : ['className' => EstablishmentsTable::class];
        $this->Establishments = $this->getTableLocator()->get('Establishments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Establishments);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EstablishmentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
