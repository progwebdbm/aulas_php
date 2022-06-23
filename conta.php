<?php
	session_start();
	setcookie("ck_authorized","true",time()+3600,"/");
	if(!isset($_SESSION['email']) || !isset($_SESSION['senha'])){
		header('Location: index.php');
	}
	else{
		$email = $_SESSION['email'];
		$senha = $_SESSION['senha'];
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function(){
			$('#atualizar').click(function(){
				$('#conta').attr('action','atualizar.php')
			})
			$('#apagar').click(function(){
				if(confirm("Tem certeza que quer excluir a conta?")){
					$('#conta').attr('action','apagar.php')
				}
				else{
					return false;
				}
			})

		})

	</script>
</head>
<body>

	<?php
		require('conexao.php');
		try{
		$query = $conexao->query('select id,nome,cpf,email,perfil,senha from usuarios where email = "'.$email.'" and senha = md5("'.$senha.'")');

		$listar = $query->fetch(PDO::FETCH_ASSOC);
		if($listar['perfil']=="admin"){
			require('header_adm.php');
		}
		if($listar['perfil']=="user"){
			require('header_user.php');
		}	
		}
		catch(Exception  $e){
			echo 'Erro: ',  $e->getMessage(), "\n";
		}
	
	
	echo'<main>
	<form method="post" name="conta" id="conta">
		<input type="hidden" name="id" id="id" value="'.$listar['id'].'">
		<label for="nome">Nome</label><br>
		<input type="text" name="nome" id="nome" value="'.$listar['nome'].'" required><br>
		<label for="cpf">CPF</label><br>
		<input type="text" name="cpf" id="cpf" value="'.$listar['cpf'].'" required><br>
		<label for="email">E-Mail</label><br>
		<input type="email" name="email" id="email" value="'.$listar['email'].'" required><br>
		<label for="senha">Senha</label><br>
		<input type="password" name="senha" id="senha"><br>
		<label for="confirma">Confirmar Senha</label><br>
		<input type="password" name="confirma" id="confirma"><br>
		<button type="submit" id="atualizar">Atualizar</button> <button type="submit" id="apagar">Excluir Conta</button>
	</form>
	</main>';
	?>
	
</body>
</html>