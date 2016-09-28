<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\I18n\Time;

class AccountsTable extends Table
{

    public function findFreeAccounts(Query $query, array $options)
    {
        $query->notMatching('Bookings');
        return $query;
    }

    public function afterSave(Event $event, EntityInterface $entity, $options) {
        if( $entity->isNew()
            || $entity->dirty('username')
            || $entity->dirty('password') )
        {
            $bookingstable = TableRegistry::get('Bookings');
            //delete old bookings if there is any
            if(isset($entity->id)) {
                $bookingstable->deleteAll(
                    ['Bookings.account_id =' => $entity->id]
                );
            }
            // find next user in queue
            $reservations = TableRegistry::get('Reservations');
            $query = $reservations->find('all', [
                'order' => ['Reservations.created' => 'DESC']
            ]);
            //let next user in queue get the account 
            if($query->count() > 0) {
                $next = $query->first();
                $booking = $bookingstable->newEntity();
                $booking->user_id = $next['user_id'];
                $booking->account_id = $entity['id'];
                $booking->expirationdate = Time::now()->addMonth(1);
                if($bookingstable->save($booking))
                    $reservations->delete($reservations->get($next['id']));
            }
        }
    }

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('accounts');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Bookings', [
            'foreignKey' => 'account_id'
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
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

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
        $rules->add($rules->isUnique(['username']));

        return $rules;
    }
}
