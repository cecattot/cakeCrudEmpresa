<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateEstablishments extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('establishments');
        $table->addColumn('razaoSocial', 'string', [
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('cnpj', 'string', [
            'limit' => 18,
            'null' => false,
        ]);
        $table->addColumn('telefone', 'string', [
            'limit' => 16,
            'null' => false,
        ]);
        $table->addColumn('email', 'string', [
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('endereco', 'string', [
            'limit' => 255,
            'null' => false,
        ]);
        $table->create();
    }
}
