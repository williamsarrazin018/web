<?php
use Migrations\AbstractSeed;

/**
 * Chambers seed.
 */
class ChambersSeed extends AbstractSeed
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
                'number' => '100',
                'level_id' => '1',
                'department_id' => '1',
                'created' => '2018-09-08 00:00:00',
                'modified' => '2018-09-08 00:00:00',
                'user_id' => '2',
            ],
        ];

        $table = $this->table('chambers');
        $table->insert($data)->save();
    }
}
