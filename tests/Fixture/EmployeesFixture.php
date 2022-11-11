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
                'telefone' => 'Lorem ipsum d',
                'email' => 'Lorem ipsum dolor sit amet',
                'dataDeNascimento' => 'Lorem ip',
                'establishment_id' => 1,
            ],
        ];
        parent::init();
    }
}
