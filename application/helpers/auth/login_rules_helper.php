<?php
function getLoginRules(){
	return array(
		array(
			'field' => 'email',
			'label' => 'Correo',
			'rules' => 'required|trim',
			'errors' => array(
				'required' => 'El %s es requerido.',
			),
		),
		array(
			'field' => 'pass',
			'label' => 'Contraseña',
			'rules' => 'required',
			'errors' => array(
				'required' => 'La %s es requerida.',
			),
		),
	);

}

?>
