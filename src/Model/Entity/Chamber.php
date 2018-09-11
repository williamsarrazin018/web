<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chamber Entity
 *
 * @property int $id
 * @property int $number
 * @property int $level_id
 * @property int $department_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $user_id
 *
 * @property \App\Model\Entity\Level $level
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Assignment[] $assignments
 */
class Chamber extends Entity
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
        'number' => true,
        'level_id' => true,
        'department_id' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'level' => true,
        'department' => true,
        'assignments' => true
    ];
}
