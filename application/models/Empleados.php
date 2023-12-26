<?php
class Empleados extends CI_Model{

	function __construct(){
		$this->load->database();
	}

	public function create($datos){
		if($this->input->server('REQUEST_METHOD')==='POST') {
			if (!$this->db->insert('empleados', $datos)) {
				return false;
			}
			return true;
		}else{
			show_404();
		}
	}

	//lista de todos los empleados
	public  function  getEmp(){
			$sql = $this->db->get_where('empleados', array('estado' => 1));
			return $sql->result();
	}

	//lista de todos los empleados inactivos
	public  function  getEmpInac(){
		$sql = $this->db->get_where('empleados', array('estado' => 0));
		return $sql->result();
	}

	//lista empleado especifico
	public function getEmpleado($id){
			$emp = $this->db->get_where('empleados', array('empleados.idEmp' => $id), 1);
			return $emp->row_array();

	}

	//Actualiza empleado
	public function update($idEmp,$datos){
		if($this->input->server('REQUEST_METHOD')==='POST') {
			$this->db->where('idEmp', $idEmp);
			$this->db->update('empleados', $datos);
		}else{
			show_404();
		}
	}
	//Inactivar Empleado
	public function inactivarEmp($idEmp){

			$this->db->set('estado', '0');
			$this->db->where('idEmp', $idEmp);
			$this->db->update('empleados');

	}

	//Activar Empleado
	public function activarEmp($idEmp){

		$this->db->set('estado', '1');
		$this->db->where('idEmp', $idEmp);
		$this->db->update('empleados');

	}

}
?>



