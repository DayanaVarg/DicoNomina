<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_nom extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'idNom' => array(
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'fechaCom' => array(
				'type' => 'DATE',
				'null' => FALSE,
			),
			'fechaFin' => array(
				'type' => 'DATE',
				'null' => FALSE,
			),
			'pago' => array(
				'type' => 'FLOAT'
			),
			'idEmp' => array(
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => TRUE,
			),
		));
		$this->dbforge->add_key('idNom', TRUE);
		$this->dbforge->create_table('nominas');

		// Ahora, agregamos la clave foránea utilizando el Query Builder Class
		$this->db->query('ALTER TABLE nominas ADD CONSTRAINT fk_nominas_empleados FOREIGN KEY (idEmp) REFERENCES empleados(idEmp) ON DELETE CASCADE ON UPDATE CASCADE');
	}

	public function down()
	{
		$this->dbforge->drop_table('nominas');
	}
}
