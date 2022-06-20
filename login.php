<?php
	session_start();
	require('conexao.php');
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	try{
	$_SESSION['email'] = $email;
	$_SESSION['senha'] = $senha;
	header('Location: painel.php');
	}
	catch (Exception $e) {
		echo 'Erro: ',  $e->getMessage(), "\n";
			}


?>