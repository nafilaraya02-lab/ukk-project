<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DetailpenjualanFixture
 */
class DetailpenjualanFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'detailpenjualan';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_detail' => 1,
                'id_penjualan' => 1,
                'id_produk' => 1,
                'jumlah_produk' => 1,
                'subtotal' => 1.5,
            ],
        ];
        parent::init();
    }
}
