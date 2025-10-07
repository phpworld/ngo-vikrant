<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateApplicationsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'application_type' => [
                'type' => 'ENUM',
                'constraint' => ['vivah_help', 'death_help', 'education_help'],
            ],
            'applicant_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'father_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'mother_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
            ],
            'address' => [
                'type' => 'TEXT',
            ],
            'aadhar_number' => [
                'type' => 'VARCHAR',
                'constraint' => '12',
            ],
            'income_certificate' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'bank_account' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'ifsc_code' => [
                'type' => 'VARCHAR',
                'constraint' => '11',
            ],
            'application_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'application_reason' => [
                'type' => 'TEXT',
            ],
            'documents' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'JSON field for storing document paths',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'approved', 'rejected', 'processing'],
                'default' => 'pending',
            ],
            'admin_remarks' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'approved_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
                'default' => 0,
            ],
            'approved_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'approved_date' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('approved_by', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('applications');
    }

    public function down()
    {
        $this->forge->dropTable('applications');
    }
}
