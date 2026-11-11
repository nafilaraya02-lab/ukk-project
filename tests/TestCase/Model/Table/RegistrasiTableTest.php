<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RegistrasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RegistrasiTable Test Case
 */
class RegistrasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RegistrasiTable
     */
    protected $Registrasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Registrasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Registrasi') ? [] : ['className' => RegistrasiTable::class];
        $this->Registrasi = $this->getTableLocator()->get('Registrasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Registrasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\RegistrasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\RegistrasiTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
