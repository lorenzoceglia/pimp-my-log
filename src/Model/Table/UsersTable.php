<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class UsersTable extends Table
{

    public $model = 'Users';
    public $contain = [];

    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
    }

    public function getAll($conditions = [], $order = null, $fields = [], $obj = false)
    {
        $options = [
            'conditions' => $conditions,
            'order' => (is_null($order) ? 'Users.surname ASC' : $order),
            'fields' => $fields
        ];
        $results = $this->find('all', $options);

        if (!$obj) $results = $results->toArray();
        return $results;
    }

    public function getById($user_id = null)
    {
        $results = [];
        if (!is_null($user_id)) {
            $conditions = ['Users.id' => $user_id];
            $results = $this->find('all', ['conditions' => $conditions, 'contain' => $this->contain]);
            if (!empty(array($results))) {
                $results = $results->first();
            }
        }
        return $results;
    }

    public function getByTelegramToken($telegram_token = null)
    {
        $results = [];
        if (!is_null($telegram_token)) {
            $conditions = ['Users.telegram_token' => $telegram_token];
            $results = $this->find('all', ['conditions' => $conditions, 'contain' => $this->contain]);
            if (!empty(array($results))) {
                $results = $results->first();
            }
        }
        return $results;
    }
}
