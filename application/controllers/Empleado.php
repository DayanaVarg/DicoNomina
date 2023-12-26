<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Empleado extends CI_Controller{

	public function __construct(){
	 	parent::__construct();
		 $this->load->database();
		$this->load->library(array('session'));
		$this->load->model('Empleados');
	}

//CAPTURAS DE DATOS
	//INSERCION
	public function create(){
		if($this->input->server('REQUEST_METHOD')==='POST') {
			$tipoIde = $this->input->post('tipoIde');
			$identificacion = $this->input->post('ide');
			$nombre = $this->input->post('nombre');
			$apellido = $this->input->post('apellido');
			$correo = $this->input->post('correo');
			$cargo= $this->input->post('cargo');
			$area= $this->input->post('area');

			$datos = array(
				'tipoIde' => $tipoIde,
				'identificacion' => $identificacion,
				'nombre' => $nombre,
				'apellido' => $apellido,
				'correo' => $correo,
				'cargo' => $cargo,
				'area' => $area,
				'estado'=>1,
			);

			if(!$this->Empleados->create($datos)){
				$this->session->set_flashdata('error', 'Ha ocrrido un error al registrarlo, intenta de nuevo');
				redirect('dashboard');
			}
			$this->session->set_flashdata('msg', 'Se ha registrado con éxito');
			redirect('dashboard');
		}else{
			show_404();
		}
	}

	//UPDATE
	public function update(){
		if($this->input->server('REQUEST_METHOD')==='POST') {
			$idEmp = $this->input->post('idEmp');
			$tipoIde = $this->input->post('tipoIde');
			$identificacion = $this->input->post('ide');
			$nombre = $this->input->post('nombre');
			$apellido = $this->input->post('apellido');
			$correo = $this->input->post('correo');
			$cargo= $this->input->post('cargo');
			$area= $this->input->post('area');

			$datos = array(
				'idEmp' => $idEmp,
				'tipoIde'=>$tipoIde,
				'identificacion' => $identificacion,
				'nombre'=>$nombre,
				'apellido'=>$apellido,
				'correo'=>$correo,
				'cargo'=>$cargo,
				'area'=>$area,
			);

			$this->Empleados->update($idEmp, $datos);
			$this->session->set_flashdata('msg', 'Se ha actualizado correctamente');
			redirect('dashboard');

		}else{
			show_404();
		}


	}

	//Inactivar empleado
	public function inactivarEmp($idEmp){
			$this->Empleados->inactivarEmp($idEmp);
			$this->session->set_flashdata('msg', 'Se ha inactivado correctamente');
			redirect('dashboard');
	}

	//Activar empleado
	public function activarEmp($idEmp){
		$this->Empleados->activarEmp($idEmp);
		$this->session->set_flashdata('msg', 'Se ha activado correctamente');
		redirect('dashboard');
	}



//VISTAS
	public function nuevoEmp(){
		if($this->session->userdata('is_logged')) {
			$data = array(
				'navbar' => $this->load->view('layout/navbar', '', TRUE),
				'footer' => $this->load->view('layout/footer', '', TRUE),
			);
			$this->load->view('admin/registroEmp', $data);
		}else{
			redirect('login');
		}
	}

	public  function actualizarEmp($idEmp = 0){
		if($this->session->userdata('is_logged')) {
			$data = array(
				'navbar' => $this->load->view('layout/navbar', '', TRUE),
				'footer' => $this->load->view('layout/footer', '', TRUE),
				'emp'=>$this->Empleados->getEmpleado($idEmp),
			);

			$this->load->view('admin/actualizarEmp', $data);
		}else{
			redirect('login');
		}
	}

	//empelados inactivos
	public function empleadosInac(){
		if($this->session->userdata('is_logged')){
			$data = array(
				'navbar' => $this->load->view('layout/navbar', '', TRUE),
				'footer'=>$this->load->view('layout/footer', '', TRUE),
				'data' => $this->Empleados->getEmpInac(),
			);
			$this->load->view('admin/empleadosInac',$data);
		}else{
			redirect('login');
		}
	}


}
