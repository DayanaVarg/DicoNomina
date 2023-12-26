<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Nomina extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('session'));
		$this->load->model('Nominas');
	}
//Captura de datos
	//REGISTRAR NOMINA
	public  function createN(){
		if($this->input->server('REQUEST_METHOD')==='POST') {
			$fechaCom = $this->input->post('fechaCom');
			$fechaFin = $this->input->post('fechaFin');
			$pago = $this->input->post('pago');
			$idEmp = $this->input->post('idEmp');

			$datos = array(
				'fechaCom' => $fechaCom,
				'fechaFin' => $fechaFin,
				'pago' => $pago,
				'idEmp' => $idEmp,
			);

			$this->Nominas->createN($datos);
			$this->session->set_flashdata('msg', 'Se ha registrado correctamente');
			redirect('nomina/nomina/' . $idEmp);
		}else{
			show_404();
		}

	}

	//ACTUALIZAR NOMINA
	public function updateN(){
		if($this->input->server('REQUEST_METHOD')==='POST') {
			$idNom = $this->input->post('idNom');
			$fechaCom = $this->input->post('fechaCom');
			$fechaFin = $this->input->post('fechaFin');
			$pago = $this->input->post('pago');
			$idEmp = $this->input->post('idEmp');

			$datos = array(
				'idNom' => $idNom,
				'fechaCom' => $fechaCom,
				'fechaFin' => $fechaFin,
				'pago' => $pago,
				'idEmp' => $idEmp,

			);

			$this->Nominas->updateN($idNom, $datos);
			$this->session->set_flashdata('msg', 'Se ha actualizado correctamente');
			redirect('nomina/nomina/' . $idEmp);
		}else{
			show_404();
		}

	}

	//ELIMINAR NÓMINA
	public function dropNom($idNom,$idEmp){
			$this->Nominas->dropNom($idNom);
			$this->session->set_flashdata('msg', 'Se ha eliminado correctamente');
			redirect('nomina/nomina/' . $idEmp);

	}

//VISTAS
	public function nomina($idEmp){
		if($this->session->userdata('is_logged')) {
			$data = array(
				'navbar' => $this->load->view('layout/navbar', '', TRUE),
				'footer' => $this->load->view('layout/footer', '', TRUE),
				'nom' => $this->Nominas->getNominas($idEmp),
				'idEmp'=>$idEmp,
			);
			$this->load->view('admin/nominaEmp', $data);
		}else{
			redirect('login');
		}
	}

	public function registrarNom($idEmp){
		if($this->session->userdata('is_logged')) {
			$data = array(
				'navbar' => $this->load->view('layout/navbar', '', TRUE),
				'footer' => $this->load->view('layout/footer', '', TRUE),
				'idEmp'=>$idEmp,
			);
			$this->load->view('admin/registroNom', $data);
		}else{
			redirect('login');
		}
	}

	public function editarNom($idNom,$idEmp){
		if($this->session->userdata('is_logged')) {
			$data = array(
				'navbar' => $this->load->view('layout/navbar', '', TRUE),
				'footer' => $this->load->view('layout/footer', '', TRUE),
				'nom'=>$this->Nominas->getNomina($idNom),
				'emp'=>$idEmp,
			);
			$this->load->view('admin/editarNom', $data);
		}else{
			redirect('login');
		}
	}


}
