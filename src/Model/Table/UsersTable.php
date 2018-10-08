<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Utility\Security;

/**
 * Users Model
 *
 * @property |\Cake\ORM\Association\HasMany $Adresses
 * @property |\Cake\ORM\Association\HasMany $Chambers
 * @property |\Cake\ORM\Association\HasMany $Doctors
 * @property |\Cake\ORM\Association\HasMany $Levels
 * @property |\Cake\ORM\Association\HasMany $MedicalCenters
 * @property \App\Model\Table\PatientsTable|\Cake\ORM\Association\HasMany $Patients
 * @property \App\Model\Table\AssignmentsTable|\Cake\ORM\Association\HasMany $Assignments
 * @property |\Cake\ORM\Association\HasMany $Departments
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Adresses', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Chambers', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Doctors', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Levels', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('MedicalCenters', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Patients', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Assignments', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Departments', [
            'foreignKey' => 'user_id'
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
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->scalar('username')
            ->maxLength('username', 255)
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->scalar('type')
            ->maxLength('type', 255)
            ->requirePresence('type', 'create')
            ->notEmpty('type');
        
        $validator
            ->scalar('uuid')
            ->maxLength('uuid', 255)
            ->requirePresence('uuid', 'create')
            ->notEmpty('uuid');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['username']));

        return $rules;
    }
    

    
}
