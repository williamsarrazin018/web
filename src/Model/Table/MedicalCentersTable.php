<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MedicalCenters Model
 *
 * @property \App\Model\Table\AdressesTable|\Cake\ORM\Association\BelongsTo $Adresses
 * @property |\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\DoctorsTable|\Cake\ORM\Association\HasMany $Doctors
 *
 * @method \App\Model\Entity\MedicalCenter get($primaryKey, $options = [])
 * @method \App\Model\Entity\MedicalCenter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MedicalCenter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MedicalCenter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MedicalCenter|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MedicalCenter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MedicalCenter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MedicalCenter findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MedicalCentersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('medical_centers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Adresses', [
            'foreignKey' => 'adress_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Doctors', [
            'foreignKey' => 'medical_center_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('director')
            ->maxLength('director', 255)
            ->requirePresence('director', 'create')
            ->notEmpty('director');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 255)
            ->requirePresence('phone', 'create')
            ->notEmpty('phone');

        $validator
            ->scalar('details')
            ->maxLength('details', 255)
            ->requirePresence('details', 'create')
            ->notEmpty('details');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['adress_id'], 'Adresses'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
