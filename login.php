<?php
	session_start();
	require('conexao.php');
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	try{
		$query = $conexao->query('select id,nome,cpf,email,perfil,senha from usuarios where email = "'.$email.'" and senha = md5("'.$senha.'")');

		$listar = $query->fetch(PDO::FETCH_ASSOC);
		
		if(!isset($listar['email']) || !isset($listar['senha'])){
			echo '<script>
				alert("Usuário ou senha não existe!")
				window.location.replace("index.php")
			</script>';
			session_destroy();
			header_remove();
		}
		else{
			$_SESSION['email'] = $email;
			$_SESSION['senha'] = $senha;
			header('Location: painel.php');
		}
	}
	catch (Exception $e) {
		echo 'Erro: ',  $e->getMessage(), "\n";
	}


?>