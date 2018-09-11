<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MedicalCentersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MedicalCentersTable Test Case
 */
class MedicalCentersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MedicalCentersTable
     */
    public $MedicalCenters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.medical_centers',
        'app.adresses',
        'app.doctors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MedicalCenters') ? [] : ['className' => MedicalCentersTable::class];
        $this->MedicalCenters = TableRegistry::getTableLocator()->get('MedicalCenters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MedicalCenters);

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
