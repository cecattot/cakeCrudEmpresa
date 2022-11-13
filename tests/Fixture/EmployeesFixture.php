<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmployeesFixture
 */
class EmployeesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nome' => 'Lorem ipsum dolor sit amet',
                'telefone' => 'Lorem ipsum do',
                'email' => 'Lorem ipsum dolor sit amet',
                'dataDeNascimento' => 'Lorem ip',
                'ativo' => 'L',
                'created' => '2022-11-12 18:44:37',
                'modified' => '2022-11-12 18:44:37',
                'establishment_id' => 1,
            ],
        ];
        parent::init();
    }
}
