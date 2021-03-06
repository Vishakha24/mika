<?php
use Migrations\AbstractMigration;

class AddIsSalonOwnerToUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('is_salon_owner', 'boolean', [
            'default' => 0,
            'null' => false,
        ]);
        $table->update();
    }
}
