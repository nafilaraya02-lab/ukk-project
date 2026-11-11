<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RegistrasiFixture
 */
class RegistrasiFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'registrasi';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'username' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'id_user' => 1,
            ],
        ];
        parent::init();
    }
}
