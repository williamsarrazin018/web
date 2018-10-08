<?php
use Migrations\AbstractSeed;

/**
 * Assignments seed.
 */
class AssignmentsSeed extends AbstractSeed
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
                'department_id' => '1',
                'patient_id' => '1',
                'assignment_date' => '2018-09-10',
                'reason' => 'Medical emergency.',
                'level_id' => '1',
                'chamber_id' => '1',
                'created' => '2018-09-10 15:53:10',
                'modified' => '2018-09-24 16:09:20',
                'user_id' => '2',
            ],
            [
                'id' => '2',
                'department_id' => '2',
                'patient_id' => '2',
                'assignment_date' => '2018-09-24',
                'reason' => 'Intense cough.',
                'level_id' => '1',
                'chamber_id' => '1',
                'created' => '2018-09-24 16:10:17',
                'modified' => '2018-09-24 16:10:43',
                'user_id' => '2',
            ],
        ];

        $table = $this->table('assignments');
        $table->insert($data)->save();
    }
}
