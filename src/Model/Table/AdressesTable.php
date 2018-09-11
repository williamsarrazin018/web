<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Adresses Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\MedicalCentersTable|\Cake\ORM\Association\HasMany $MedicalCenters
 * @property \App\Model\Table\PatientsTable|\Cake\ORM\Association\HasMany $Patients
 *
 * @method \App\Model\Entity\Adress get($primaryKey, $options = [])
 * @method \App\Model\Entity\Adress newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Adress[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Adress|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Adress|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Adress patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Adress[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Adress findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdressesTable extends Table
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

        $this->setTable('adresses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('MedicalCenters', [
            'foreignKey' => 'adress_id'
        ]);
        $this->hasMany('Patients', [
            'foreignKey' => 'adress_id'
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
            ->scalar('adress')
            ->maxLength('adress', 255)
            ->requirePresence('adress', 'create')
            ->notEmpty('adress');

        $validator
            ->scalar('city')
            ->maxLength('city', 255)
            ->requirePresence('city', 'create')
            ->notEmpty('city');

        $validator
            ->scalar('zip_code')
            ->maxLength('zip_code', 7)
            ->requirePresence('zip_code', 'create')
            ->notEmpty('zip_code');

        $validator
            ->scalar('province')
            ->maxLength('province', 255)
            ->requirePresence('province', 'create')
            ->notEmpty('province');

        $validator
            ->scalar('country')
            ->maxLength('country', 255)
            ->requirePresence('country', 'create')
            ->notEmpty('country');

        $validator
            ->scalar('details')
            ->maxLength('details', 255)
            ->allowEmpty('details');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
