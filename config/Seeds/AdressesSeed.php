<?php
use Migrations\AbstractSeed;

/**
 * Adresses seed.
 */
class AdressesSeed extends AbstractSeed
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
                'id' => '3',
                'adress' => '180 rang Point-du-Jour Nord',
                'city' => 'L\'Assomption',
                'zip_code' => 'J5W 1G6',
                'province' => 'Quebec',
                'country' => 'Canada',
                'details' => 'Aucuns',
                'created' => '2018-09-08 00:00:00',
                'modified' => '2018-09-10 17:49:35',
                'user_id' => '6',
            ],
            [
                'id' => '4',
                'adress' => '1600 boulevard du souvenir',
                'city' => 'Laval',
                'zip_code' => 'H7L 6A3',
                'province' => 'Quebec',
                'country' => 'Canada',
                'details' => '',
                'created' => '2018-09-24 16:01:03',
                'modified' => '2018-09-24 16:01:03',
                'user_id' => '2',
            ],
        ];

        $table = $this->table('adresses');
        $table->insert($data)->save();
    }
}
