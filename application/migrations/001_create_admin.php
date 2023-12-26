<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_admin extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'idAdmin' => array(
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'tipoIde' => array(
				'type' => 'VARCHAR',
				'constraint' => '2',
			),
			'identificacion' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
			),
			'nombre' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
			),
			'apellido' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
			),
			'correo' => array(
				'type' => 'VARCHAR',
				'constraint' => '60',
			),
			'clave' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
			),
		));
		$this->dbforge->add_key('idAdmin', TRUE);
		$this->dbforge->create_table('administradores');
	}

	public function down()
	{
		$this->dbforge->drop_table('administradores');
	}
}
