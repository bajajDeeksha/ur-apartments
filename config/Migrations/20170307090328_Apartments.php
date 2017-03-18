<?php
use Migrations\AbstractMigration;

class Apartments extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $table = $this->table('apartments');
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('area_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('address', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('floor', 'integer', [
            'default' => 1,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('size', 'float', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('model_plan', 'string', [
            'default' => null,
            'limit' => 25,
            'null' => true,
        ]);
        $table->addColumn('rent', 'integer', [
            'default' => 1,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('service_fee', 'integer', [
            'default' => 1,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('facilities', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('traffic', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('remarks', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('image1', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('image2', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('image3', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('image4', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->create();
    }

    public function down()
    {
        $table = $this->table('apartments');
        $table->drop();
    }
}
