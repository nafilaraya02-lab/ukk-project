<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PenjualanFixture
 */
class PenjualanFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'penjualan';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_penjualan' => 1,
                'tanggal_penjualan' => '2026-11-11',
                'total_harga' => 1.5,
                'id_pelanggan' => 1,
            ],
        ];
        parent::init();
    }
}
