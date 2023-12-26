<?php
class Admins extends CI_Model{

	function __construct(){
		$this->load->database();
	}

	public function create($datos){
		if($this->input->server('REQUEST_METHOD')==='POST') {
			if (!$this->db->insert('administradores', $datos)) {
				return false;
			}
			return true;
		}else{
			show_404();
		}
	}
}
?>
