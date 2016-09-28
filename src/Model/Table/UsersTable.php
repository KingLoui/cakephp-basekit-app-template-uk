<?php
// src/Model/Table/UsersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Behavior\TimestampBehavior;

class UsersTable extends Table
{
	public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');

        $this->hasMany('Bookings', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Reservations', [
            'foreignKey' => 'user_id'
        ]);
    }
    
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'user']],
                'message' => 'Please enter a valid role'
            ]);
    }
}