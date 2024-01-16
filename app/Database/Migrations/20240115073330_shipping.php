<?php

namespace App\Database\Migrations;

class Shipping extends \CodeIgniter\Database\Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => true,
            ],
            'phone' => [
                'type' => 'INT',
                'constraint' => '25',
                'null' => true,
            ],
            'address' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'pincode' => [
                'type' => 'INT',
                'constraint' => '25',
                'null' => true,
            ],
            'city' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null' => true,
            ],
            'state' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null' => true,
            ],
            'total_price' => [
                'type' => 'INT',
                'constraint' => '30'
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => '30'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('shippingAddress');
    }

    public function down()
    {
        $this->forge->dropTable('shippingAddress');
    }
}