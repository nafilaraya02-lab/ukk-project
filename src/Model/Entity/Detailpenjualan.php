<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Detailpenjualan Entity
 *
 * @property int $id_detail
 * @property int $id_penjualan
 * @property int $id_product
 * @property int $jumlah_product
 * @property string $subtotal
 */
class Detailpenjualan extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'id_penjualan' => true,
        'id_product' => true,
        'jumlah_product' => true,
        'subtotal' => true,
    ];
}
