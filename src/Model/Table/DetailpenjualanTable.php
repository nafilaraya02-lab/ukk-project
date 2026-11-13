<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Detailpenjualan Model
 *
 * @method \App\Model\Entity\Detailpenjualan newEmptyEntity()
 * @method \App\Model\Entity\Detailpenjualan newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Detailpenjualan> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Detailpenjualan get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Detailpenjualan findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Detailpenjualan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Detailpenjualan> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Detailpenjualan|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Detailpenjualan saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Detailpenjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Detailpenjualan>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Detailpenjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Detailpenjualan> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Detailpenjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Detailpenjualan>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Detailpenjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Detailpenjualan> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DetailpenjualanTable extends Table
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

        $this->setTable('detailpenjualan');
        $this->setDisplayField('id_detail');
        $this->setPrimaryKey('id_detail');

        $this->belongsTo('Penjualan', ['foreignKey' => 'id_penjualan']);
        $this->belongsTo('Product', ['foreignKey' => 'id_product']);
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
            ->integer('id_penjualan')
            ->requirePresence('id_penjualan', 'create')
            ->notEmptyString('id_penjualan');

        $validator
            ->integer('id_product')
            ->requirePresence('id_product', 'create')
            ->notEmptyString('id_product');

        $validator
            ->integer('jumlah_product')
            ->requirePresence('jumlah_product', 'create')
            ->notEmptyString('jumlah_product');

        $validator
            ->decimal('subtotal')
            ->requirePresence('subtotal', 'create')
            ->notEmptyString('subtotal');

        return $validator;
    }
}
