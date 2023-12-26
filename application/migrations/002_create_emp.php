<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_emp extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'idEmp' => array(
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
			'cargo' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
			),
			'area' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
			),
			'estado' => array(
				'type' => 'INT',
				'constraint' => '1',
			),
		));
		$this->dbforge->add_key('idEmp', TRUE);
		$this->dbforge->create_table('empleados');
	}

	public function down()
	{
		$this->dbforge->drop_table('empleados');
	}
}
