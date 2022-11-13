<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EstablishmentsFixture
 */
class EstablishmentsFixture extends TestFixture
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
                'razaoSocial' => 'Lorem ipsum dolor sit amet',
                'cnpj' => 'Lorem ipsum dolo',
                'telefone' => 'Lorem ipsum do',
                'email' => 'Lorem ipsum dolor sit amet',
                'logradouro' => 'Lorem ipsum dolor sit amet',
                'numero' => 'Lorem ipsum dolor sit amet',
                'complemento' => 'Lorem ipsum dolor sit amet',
                'referencia' => 'Lorem ipsum dolor sit amet',
                'bairro' => 'Lorem ipsum dolor sit amet',
                'cidade' => 'Lorem ipsum dolor sit amet',
                'estado' => 'Lo',
                'cep' => 'Lorem ip',
                'ativo' => 'L',
                'created' => '2022-11-12 18:44:30',
                'modified' => '2022-11-12 18:44:30',
            ],
        ];
        parent::init();
    }
}
