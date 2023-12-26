<?php
class Nominas extends CI_Model{

	function __construct(){
		$this->load->database();
	}

	//Lista nominas del empleado
	public function getNominas($idEmp){
			$this->db->join('empleados', 'empleados.idEmp = nominas.idEmp');
			$sql = $this->db->get_where('nominas', array('nominas.idEmp' => $idEmp));
			return $sql->result();

	}


	//lista nomina especifica
	public function getNomina($idNom){
			$nom = $this->db->get_where('nominas', array('idNom' => $idNom));
			return $nom->row_array();
	}

	//creacion de una nueva nomina
	public function  createN($datos){
		if($this->input->server('REQUEST_METHOD')==='POST') {
			$this->db->insert('nominas', $datos);
		}else{
			show_404();
		}
	}

	//Actualiza nomina
	public function updateN($idNom,$datos){
		if($this->input->server('REQUEST_METHOD')==='POST') {
			$this->db->where('idNom', $idNom);
			$this->db->update('nominas', $datos);
		}else{
			show_404();
		}
	}

	//Eliminar Nómina
	public function dropNom($idNom){
			$this->db->delete('nominas', array('idNom' => $idNom));
	}
}
