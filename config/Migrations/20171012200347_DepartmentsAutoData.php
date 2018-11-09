<?php
use Migrations\AbstractMigration;

class CarData extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {

        // inserting multiple rows
        $rows = [
            [
              'id'    => 1,
              'name'  => 'Rhumatologie',
              'created' => '2018-10-08 13:32:57'
            ],
            [
              'id'    => 2,
              'name'  => 'Chirurgie',
              'created' => '2018-10-08 13:32:57'
            ],
            [
              'id'    => 3,
              'name'  => 'Cardiologie',
              'created' => '2018-10-08 13:32:57'
            ],
            [
              'id'    => 4,
              'name'  => 'Pédiatrie',
              'created' => '2018-10-08 13:32:57'
            ],
            [
              'id'    => 5,
              'name'  => 'Psychologie',
              'created' => '2018-10-08 13:32:57'
            ],
            [
              'id'    => 6,
              'name'  => 'Psychiatrie',
              'created' => '2018-10-08 13:32:57'
            ],
            [
              'id'    => 7,
              'name'  => 'Rhumatologie',
              'created' => '2018-10-08 13:32:57'
            ],
            [
              'id'    => 8,
              'name'  => 'Conciergerie',
              'created' => '2018-10-08 13:32:57'
            ],
            [
              'id'    => 8,
              'name'  => 'Attente',
              'created' => '2018-10-08 13:32:57'
            ],
            [
              'id'    => 9,
              'name'  => 'Soins Spéciaux',
              'created' => '2018-10-08 13:32:57'
            ],
            [
              'id'    => 10,
              'name'  => 'Gastrologie',
              'created' => '2018-10-08 13:32:57'
            ],
            [
              'id'    => 11,
              'name'  => 'Allergie',
              'created' => '2018-10-08 13:32:57'
            ],
            [
              'id'    => 12,
              'name'  => 'Urgence',
              'created' => '2018-10-08 13:32:57'
            ]
        ];

        // this is a handy shortcut
        $this->insert('DepartmentsAuto', $rows);
    }
}
