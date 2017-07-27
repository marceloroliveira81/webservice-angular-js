<?php

require_once('../config.php');

/*$usuario = Usuario::create(array(
	'nome' => 'Anna Clara', 
	'email' => 'annaclara.oliveira@gmail.com'));

$usuario->save();*/

$acao = $_GET['acao'];

if ($acao == 'listar') {
	$usuarios = Usuario::all();

	$array_usuarios = [];

	foreach ($usuarios as $usuario) {
		$linha = [
			"id_usuario" => $usuario->id_usuario,
			"nome" => $usuario->nome,
			"email" => $usuario->email
		];

		array_push($array_usuarios, $linha);
	}

	echo json_encode($array_usuarios);	
}

?>