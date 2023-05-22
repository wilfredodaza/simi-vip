<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TypeLawDeductionTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE ],
            'name'                           => ['type' => 'VARCHAR', 'constraint' => 191],
            'code'                           => ['type' => 'VARCHAR', 'constraint' => 10],
            'percentage'                     => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'created_at'                     => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'                     => ['type' => 'TIMESTAMP', 'null' => true]
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('type_law_deductions');
    }

    public function down()
    {
        $this->forge->dropTable('type_law_deductions');
    }
}
