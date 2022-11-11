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
                'cnpj' => 1,
                'telefone' => 'Lorem ipsum do',
                'email' => 'Lorem ipsum dolor sit amet',
                'endereco' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
