<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Assignment Entity
 *
 * @property int $id
 * @property int $department_id
 * @property int $patient_id
 * @property \Cake\I18n\FrozenDate $assignment_date
 * @property string $reason
 * @property int $level_id
 * @property int $chamber_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $user_id
 *
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Patient $patient
 * @property \App\Model\Entity\Level $level
 * @property \App\Model\Entity\Chamber $chamber
 * @property \App\Model\Entity\User $user
 */
class Assignment extends Entity
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
        'department_id' => true,
        'patient_id' => true,
        'assignment_date' => true,
        'reason' => true,
        'level_id' => true,
        'chamber_id' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'department' => true,
        'patient' => true,
        'level' => true,
        'chamber' => true,
        'user' => true
    ];
}
