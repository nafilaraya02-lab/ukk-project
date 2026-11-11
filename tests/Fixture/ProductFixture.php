<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductFixture
 */
class ProductFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'product';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_product' => 1,
                'nama_product' => 'Lorem ipsum dolor sit amet',
                'harga' => 1.5,
                'stock' => 1,
            ],
        ];
        parent::init();
    }
}
