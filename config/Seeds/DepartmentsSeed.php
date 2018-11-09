<?php
use Migrations\AbstractSeed;

/**
 * Departments seed.
 */
class DepartmentsSeed extends AbstractSeed
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
                'department' => 'Psychology',
                'created' => '2018-09-08 00:00:00',
                'modified' => '2018-09-24 15:50:31',
                'user_id' => '2',
            ],
            [
                'id' => '2',
                'department' => 'Rhumatology',
                'created' => '2018-09-24 15:51:03',
                'modified' => '2018-09-24 15:53:15',
                'user_id' => '2',
            ],
            [
                'id' => '3',
                'department' => 'Cardiology',
                'created' => '2018-09-24 15:52:39',
                'modified' => '2018-09-24 15:53:34',
                'user_id' => '2',
            ],
            [
                'id' => '4',
                'department' => 'ER',
                'created' => '2018-09-24 15:52:39',
                'modified' => '2018-09-24 15:53:34',
                'user_id' => '2',
            ],
            [
                'id' => '5',
                'department' => 'Psychiatry',
                'created' => '2018-09-24 15:52:39',
                'modified' => '2018-09-24 15:53:34',
                'user_id' => '2',
            ],
            [
                'id' => '6',
                'department' => 'Pediatry',
                'created' => '2018-09-24 15:52:39',
                'modified' => '2018-09-24 15:53:34',
                'user_id' => '2',
            ],
            [
                'id' => '7',
                'department' => 'Allergy',
                'created' => '2018-09-24 15:52:39',
                'modified' => '2018-09-24 15:53:34',
                'user_id' => '2',
            ],
            [
                'id' => '8',
                'department' => 'Surgery',
                'created' => '2018-09-24 15:52:39',
                'modified' => '2018-09-24 15:53:34',
                'user_id' => '2',
            ],
            [
                'id' => '9',
                'department' => 'Anaesthetics',
                'created' => '2018-09-24 15:52:39',
                'modified' => '2018-09-24 15:53:34',
                'user_id' => '2',
            ],
            [
                'id' => '10',
                'department' => 'Gastroenterology',
                'created' => '2018-09-24 15:52:39',
                'modified' => '2018-09-24 15:53:34',
                'user_id' => '2',
            ],
            [
                'id' => '11',
                'department' => 'Gynaecology',
                'created' => '2018-09-24 15:52:39',
                'modified' => '2018-09-24 15:53:34',
                'user_id' => '2',
            ],
        ];

        $table = $this->table('departments');
        $table->insert($data)->save();
    }
}
