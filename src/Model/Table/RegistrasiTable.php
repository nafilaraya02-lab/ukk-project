<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Registrasi Model
 *
 * @method \App\Model\Entity\Registrasi newEmptyEntity()
 * @method \App\Model\Entity\Registrasi newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Registrasi> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Registrasi get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Registrasi findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Registrasi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Registrasi> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Registrasi|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Registrasi saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Registrasi>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Registrasi>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Registrasi>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Registrasi> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Registrasi>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Registrasi>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Registrasi>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Registrasi> deleteManyOrFail(iterable $entities, array $options = [])
 */
class RegistrasiTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('registrasi');
        $this->setDisplayField('username');
        $this->setPrimaryKey('id_user');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('username')
            ->maxLength('username', 100)
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 100)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['username']), ['errorField' => 'username']);

        return $rules;
    }
}
