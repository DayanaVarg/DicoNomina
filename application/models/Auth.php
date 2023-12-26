<?php

class Auth extends  CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function  login($usuario,$password){
		if($this->input->server('REQUEST_METHOD')==='POST') {
			$data = $this->db->get_where('administradores', array('correo' => $usuario, 'clave' => $password), 1);
			if (!$data->result()) {
				return false;
			}
			return $data->row();
		}else{
			show_404();
		}
	}
}
?>
