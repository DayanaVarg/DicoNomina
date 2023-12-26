<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->model('Empleados');
	}

	public function  index(){
		if($this->session->userdata('is_logged')){
			$data = array(
				'navbar' => $this->load->view('layout/navbar', '', TRUE),
				'footer'=>$this->load->view('layout/footer', '', TRUE),
				'data' => $this->Empleados->getEmp(),
			);
			$this->load->view('admin/dashboard',$data);
		}else{
			redirect('login');
		}
	}

	//Empleado

	//Actualizar datos de usuario

	public  function actualizarUs(){
		if($this->session->userdata('is_logged')) {
			$data = array(
				'navbar' => $this->load->view('layout/navbar', '', TRUE),
				'footer' => $this->load->view('layout/footer', '', TRUE),
			);
			$this->load->view('admin/actualizarUs', $data);
		}else{
			redirect('login');
		}
	}



}

?>
