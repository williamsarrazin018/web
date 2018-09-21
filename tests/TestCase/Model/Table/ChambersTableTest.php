<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChambersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChambersTable Test Case
 */
class ChambersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ChambersTable
     */
    public $Chambers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.chambers',
        'app.levels',
        'app.departments',
        'app.assignments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Chambers') ? [] : ['className' => ChambersTable::class];
        $this->Chambers = TableRegistry::getTableLocator()->get('Chambers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Chambers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}