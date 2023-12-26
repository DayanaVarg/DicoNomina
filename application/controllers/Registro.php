<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('Admins');
		$this->load->library(array('session'));

	}

	public function index(){
        $this->load->view('admin/registro');

    }

	public function  create(){
		$tipoIde = $this->input->post('tipoIde');
		$identificacion = $this->input->post('identificacion');
		$nombre = $this->input->post('nombre');
		$apellido= $this->input->post('apellido');
		$correo = $this->input->post('correo');
		$clave = $this->input->post('clave');

		$datos=array(
			'tipoIde' => $tipoIde,
			'identificacion' => $identificacion,
			'nombre' => $nombre,
			'apellido' => $apellido,
			'correo' => $correo,
			'clave' => $clave,
		);
		if(!$this->Admins->create($datos)){
			$data['msg'] = 'Ocurrió un error al insertar los datos, vuelve a intentarlo';
			$this->load->view('admin/registro', $data);
		}
		$this->session->set_flashdata('mnsg', 'Registrado con éxito');
		redirect('login');
	}

    
}
