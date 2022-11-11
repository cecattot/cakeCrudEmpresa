<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateEmployees extends AbstractMigration
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
        $table = $this->table('employees');
        $table->addColumn('nome', 'string', [
            'limit' => 180,
            'null' => false,
        ]);
        $table->addColumn('telefone', 'string', [
            'limit' => 15,
            'null' => false,
        ]);
        $table->addColumn('email', 'string', [
            'limit' => 180,
            'null' => false,
        ]);
        $table->addColumn('dataDeNascimento', 'string', [
            'limit' => 10,
            'null' => false,
        ]);
        $table->addColumn('establishment_id', 'integer');
        $table->addForeignKey('establishment_id', 'Establishments', 'id');
        $table->create();
    }
}
