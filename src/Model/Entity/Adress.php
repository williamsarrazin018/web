<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Adress Entity
 *
 * @property int $id
 * @property string $adress
 * @property string $city
 * @property string $zip_code
 * @property string $province
 * @property string $country
 * @property string $details
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $user_id
 *
 * @property \App\Model\Entity\MedicalCenter[] $medical_centers
 * @property \App\Model\Entity\Patient[] $patients
 */
class Adress extends Entity
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
        'adress' => true,
        'city' => true,
        'zip_code' => true,
        'province' => true,
        'country' => true,
        'details' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'medical_centers' => true,
        'patients' => true
    ];
}
