<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PatientsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PatientsTable Test Case
 */
class PatientsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PatientsTable
     */
    public $Patients;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.patients',
        'app.adresses',
        'app.users',
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
        $config = TableRegistry::getTableLocator()->exists('Patients') ? [] : ['className' => PatientsTable::class];
        $this->Patients = TableRegistry::getTableLocator()->get('Patients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Patients);

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

    public function testFindByAdressID()
    {
        $query = $this->Patients->findByAdressId(1);
        
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        
        $result = $query->enableHydration(false)->toArray();
        
        $expected = [
            [
                'id' => 1,
                'adress_id' => 1,
                'first_name' => 'Patient 1',
                'last_name' => 'aaa',
                'gender' => 'male',
                'birth_date' => '2018-09-08',
                'email' => 'patient1@email.com',
                'created' => '2018-09-08 18:59:00',
                'modified' => '2018-09-08 18:59:00',
                'slug' => 'aaa',
                'user_id' => 1
            ]
           
        ];
        $this->assertEquals($expected, $result);
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

    public function testValidatorEmailUnique(){
        
        
        $data = [
                'id' => 3,
                'adress_id' => 1,
                'first_name' => 'Patient 3',
                'last_name' => 'aaa',
                'gender' => 'male',
                'birth_date' => '2018-09-08',
                'email' => 'patient1@email.com',
                'created' => '2018-09-08 18:59:00',
                'modified' => '2018-09-08 18:59:00',
                'slug' => 'aaa',
                'user_id' => 3
            ];
        $this->Patients->newEntity($data);
        $resultingError = $this->Patients->getValidator()->errors($data);
        //Il y a une erreur
        $this->assertNotEmpty($resultingError);
        
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
