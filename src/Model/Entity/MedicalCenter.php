<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MedicalCenter Entity
 *
 * @property int $id
 * @property int $adress_id
 * @property string $name
 * @property string $director
 * @property string $phone
 * @property string $details
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $user_id
 *
 * @property \App\Model\Entity\Adress $adress
 * @property \App\Model\Entity\Doctor[] $doctors
 */
class MedicalCenter extends Entity
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
        'name' => true,
        'director' => true,
        'phone' => true,
        'details' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'adress' => true,
        'doctors' => true
    ];
}
