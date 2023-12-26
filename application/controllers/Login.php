<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->helper(array('getRutas','url'));
		$this->load->library(array('form_validation','session'));
		$this->load->helper(array('auth/login_rules'));
		$this->load->model('Auth');
	}


	public function index()
	{
		$data['registro'] = registro();
		$this->load->view('admin/login',$data);

	}

	public function validation(){
		$rules = getLoginRules();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() === FALSE){
			$data['registro'] = registro();
			$this->load->view('admin/login', $data);
		}else{
			$user = $this->input->post('email');
			$password = $this->input->post('pass');
			if(!$res = $this->Auth->login($user,$password)){
				$data['msg'] ='Datos de usuario inválidos';
				$data['registro'] = registro();
				$this->load->view('admin/login', $data);
			}else{
				$data = array(
					'idAdmin' => $res->idAdmin,
					'tipoI' => $res->tipoIde,
					'ide' => $res->identificacion,
					'nombre' => $res->nombre,
					'apellido' => $res->apellido,
					'correo' => $res->correo,
					'clave' => $res->clave,
					'is_logged' => TRUE,
				);
				$this->session->set_userdata($data);
				redirect(base_url('dashboard'));
			}
		}
	}

	public function logout(){
		$vars = array('idAdmin', 'tipoI','ide', 'nombre', 'apellido', 'correo','clave', 'is_logged'  );
		$this->session->unset_userdata($vars);
		$this->session->sess_destroy();

		redirect('login');
	}

}
