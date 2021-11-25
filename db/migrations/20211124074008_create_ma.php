<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateMa extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $this->table('lopa')
        ->addColumn('name', 'string')
        ->addColumn('adress', 'string')
        ->addColumn('leader', 'string')
        ->addColumn('loca', 'int')
        ->addColumn('create_at', 'datetime')
        ->addColumn('create_update', 'datetime')
        ->create();
    }
}
