<?php
use Migrations\AbstractSeed;

/**
 * MedicalCenters seed.
 */
class MedicalCentersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'adress_id' => '3',
                'name' => 'CTest',
                'director' => 'Jean Tremblay',
                'phone' => '555 555-555',
                'details' => 'aaa',
                'created' => '2018-09-08 00:00:00',
                'modified' => '2018-09-08 00:00:00',
                'user_id' => '2',
            ],
        ];

        $table = $this->table('medical_centers');
        $table->insert($data)->save();
    }
}
