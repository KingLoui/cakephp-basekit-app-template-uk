<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Mailer\Email;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;

class BookingsTable extends Table
{

    public function afterSave(Event $event, EntityInterface $entity, $options) {
        if($entity->isNew()) {
            $users = TableRegistry::get('Users');
            $accounts = TableRegistry::get('Accounts');
            $user = $users->get($entity->user_id);
            $account = $accounts->get($entity->account_id);
            
            $email = new Email('default');
            $email->template('accountdetails')
                ->emailFormat('html')
                ->viewVars(['username' => $account['username'], 'password' => $account['password']])
                ->from(['noreply@vuni-kassel.de' => 'IT-Servicezentrum'])
                ->to($user['email'])
                ->subject('Zugang zur Videotutorial-Plattform lynda.com')
                ->send();
        }
    }

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('bookings');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Accounts', [
            'foreignKey' => 'account_id',
            'joinType' => 'INNER'
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
            ->dateTime('expirationdate')
            ->requirePresence('expirationdate', 'create')
            ->notEmpty('expirationdate');

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
        $rules->add($rules->existsIn(['account_id'], 'Accounts'));

        return $rules;
    }
}
