<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Penjualan Model
 *
 * @method \App\Model\Entity\Penjualan newEmptyEntity()
 * @method \App\Model\Entity\Penjualan newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Penjualan> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Penjualan get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Penjualan findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Penjualan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Penjualan> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Penjualan|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Penjualan saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Penjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Penjualan>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Penjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Penjualan> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Penjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Penjualan>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Penjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Penjualan> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PenjualanTable extends Table
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

        $this->setTable('penjualan');
        $this->setDisplayField('id_penjualan');
        $this->setPrimaryKey('id_penjualan');

        $this->belongsTo('Pelanggan', ['foreignKey' => 'id_pelanggan']);
        $this->hasMany('Detailpenjualan', ['foreignKey' => 'id_penjualan']);
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
            ->date('tanggal_penjualan')
            ->requirePresence('tanggal_penjualan', 'create')
            ->notEmptyDate('tanggal_penjualan');

        $validator
            ->decimal('total_harga')
            ->requirePresence('total_harga', 'create')
            ->notEmptyString('total_harga');

        $validator
            ->integer('id_pelanggan')
            ->requirePresence('id_pelanggan', 'create')
            ->notEmptyString('id_pelanggan');

        $validator
            ->scalar('nama_product')
            ->maxLength('nama_product', 255)
            ->requirePresence('nama_product', 'create')
            ->notEmptyString('nama_product');

        return $validator;
    }
}
