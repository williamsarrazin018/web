<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PatientsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\PatientsController Test Case
 */
class PatientsControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/patients');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'User1',
                    'email' => 'user1@test.com',
                    'password' => 'password1',
                    'type' => 'admin'
                    
                ]
            ]
        ]);
        
        $this->get('/patients/view/1');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'User1',
                    'email' => 'user1@test.com',
                    'password' => 'password1',
                    'type' => 'admin'
                    
                ]
            ]
        ]);
        
        $this->get('/patients/add');
        $this->assertResponseOk();

    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {

        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'User1',
                    'email' => 'user1@test.com',
                    'password' => 'password1',
                    'type' => 'admin'
                    
                ]
            ]
        ]);
        $this->get('/patients/edit/1');
        $this->assertResponseOk();
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'User1',
                    'email' => 'user1@test.com',
                    'password' => 'password1',
                    'type' => 'admin'
                    
                ]
            ]
        ]);
        $this->get('/patients/delete/1');
        $this->assertResponseOk();
    }
    
    public function testDeleteUnauthorized()
    {
        // Pas de données de session définies.
        $this->get('/patients/delete/1');

        $this->assertRedirect($_SERVER['HTTP_REFERER']);
    }
}
