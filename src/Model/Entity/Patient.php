<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Patient Entity
 *
 * @property int $id
 * @property int $adress_id
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property \Cake\I18n\FrozenDate $birth_date
 * @property string $email
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $slug
 * @property int $user_id
 *
 * @property \App\Model\Entity\Adress $adress
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Assignment[] $assignments
 */
class Patient extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'adress_id' => true,
        'first_name' => true,
        'last_name' => true,
        'gender' => true,
        'birth_date' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'slug' => true,
        'user_id' => true,
        'adress' => true,
        'user' => true,
        'assignments' => true,
        'files' => true
    ];
}
