<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'auto_increment' => true,
			],
			'username' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '128',
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'token' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp',
		]);
		$this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
