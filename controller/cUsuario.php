<?php

require_once('../config.php');

$acao = $_GET['acao'];

/*$usuario = Usuario::create(array(
	'nome' => 'Anna Clara', 
	'email' => 'annaclara.oliveira@gmail.com'));

$usuario->save();*/

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

if ($acao == 'cadastrar') {

	$dados = json_decode(file_get_contents('php://input'), true);

	$usuario = Usuario::create(array(
			'nome' => $dados['nome'], 
			'email' => $dados['email']
		));

	$usuario->save();

	echo "cadastrado";
}

if ($acao == 'excluir') {

	$dados = json_decode(file_get_contents('php://input'), true);

	$usuario = Usuario::find($dados['id_usuario']);

	$usuario->delete();

	echo "excluido";
}

?>