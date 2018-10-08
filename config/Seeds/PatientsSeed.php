<?php
use Migrations\AbstractSeed;

/**
 * Patients seed.
 */
class PatientsSeed extends AbstractSeed
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
                'first_name' => 'Arthur',
                'last_name' => 'Tremble',
                'gender' => 'Male',
                'birth_date' => '2013-09-10',
                'email' => 'ASDF@hotmail.com',
                'created' => '2018-09-10 15:52:47',
                'modified' => '2018-09-25 22:02:09',
                'slug' => 'Arthur',
                'user_id' => '2',
            ],
            [
                'id' => '2',
                'adress_id' => '4',
                'first_name' => 'Arthur',
                'last_name' => 'Comeau',
                'gender' => 'Male',
                'birth_date' => '1970-05-24',
                'email' => 'art@comeau.com',
                'created' => '2018-09-24 16:05:35',
                'modified' => '2018-09-24 16:06:23',
                'slug' => 'Arthur',
                'user_id' => '2',
            ],
        ];

        $table = $this->table('patients');
        $table->insert($data)->save();
    }
}
