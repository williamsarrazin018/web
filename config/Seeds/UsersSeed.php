<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'id' => '2',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$hwsu4AnZ7oJcx7H2JKoS/OYwfwr6NEhhh.O/Ieg5DtVF920Mchzyu',
                'username' => 'Admin',
                'created' => '2018-09-07 14:50:32',
                'modified' => '2018-09-07 14:50:32',
                'type' => 'admin',
                'uuid' => '',
            ],
            [
                'id' => '6',
                'email' => 'sandrinesarrazin@msn.com',
                'password' => '$2y$10$ydy2d59MsviRTJ.nS1PvqOYJ8gMdvt1QS71oVhQIep.H32asy6MM.',
                'username' => 'Sandrine',
                'created' => '2018-09-08 18:21:19',
                'modified' => '2018-09-08 18:21:19',
                'type' => 'secretaire',
                'uuid' => '',
            ],
            [
                'id' => '7',
                'email' => 'Visiteur1@gmail.com',
                'password' => '$2y$10$wxBVPCTQdbnEnnujF24zu.p87.f337gU..SsG6YSAL66yhdFCyyn2',
                'username' => 'Visiteur1',
                'created' => '2018-09-08 18:26:52',
                'modified' => '2018-09-08 18:26:52',
                'type' => 'visiteur',
                'uuid' => '',
            ],
            [
                'id' => '11',
                'email' => 'TestUUID@gmail.com',
                'password' => '$2y$10$/MDSj14cz2dlBmoyEEtruO0KkjkiunKdvP0pkyy9PTtDtuvMg.pmu',
                'username' => 'testuuid',
                'created' => '2018-10-08 19:18:42',
                'modified' => '2018-10-08 19:18:42',
                'type' => 'visiteur',
                'uuid' => '5d4cd4bb-1be9-4ed5-bfb1-e611fa118457',
            ],
            [
                'id' => '12',
                'email' => 'testuuid2@gmail.com',
                'password' => '$2y$10$S2Vx1pXkrdxgQXD1lkF9L.M3k82p48.XmE8.thD9qmJqu7z3tnDAW',
                'username' => 'qwerty',
                'created' => '2018-10-08 19:48:42',
                'modified' => '2018-10-08 19:48:42',
                'type' => 'visiteur',
                'uuid' => '993cfa47-731a-43d8-99de-865eb685eca7',
            ],
            [
                'id' => '13',
                'email' => 'testuuidddd@gmail.com',
                'password' => '$2y$10$DWvYoNxqiqfTMWmWxqht9ObKf0uIB5NcY0UDjsa6IqYtVrplssm2.',
                'username' => 'qwerty2',
                'created' => '2018-10-08 19:51:39',
                'modified' => '2018-10-08 19:51:39',
                'type' => 'visiteur',
                'uuid' => '5fe17472-b7f7-464a-8d69-7e6e8249a100',
            ],
            [
                'id' => '14',
                'email' => 'testX@gmail.com',
                'password' => '$2y$10$iQETH9Ymq6jxTn.ACOyFUOokIptKPeUUcp4vko5phccX3sXA30/32',
                'username' => 'TestX',
                'created' => '2018-10-08 19:53:53',
                'modified' => '2018-10-08 19:53:53',
                'type' => 'visiteur',
                'uuid' => 'ef29c8ec-4f44-4309-812c-296823233f39',
            ],
            [
                'id' => '16',
                'email' => 'williamsarrazin@msn.com',
                'password' => '$2y$10$AhnmjDsMsFJlH6V5AZJhye68WhQfnLJFVZ42CsUhLEquxN0.N6NlO',
                'username' => 'Will',
                'created' => '2018-10-08 19:59:59',
                'modified' => '2018-10-08 20:00:41',
                'type' => 'secretaire',
                'uuid' => '5029a797-3997-48c5-bdf3-ae5388f13325',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
