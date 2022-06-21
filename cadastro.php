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
	
	?>
	<main>
	<form action="cadastrar.php" method="post" name="cadastro">
		<label for="nome">Nome</label><br>
		<input type="text" name="nome" id="nome" placeholder="Nome Completo" required><br>
		<label for="cpf">CPF</label><br>
		<input type="text" name="cpf" id="cpf" placeholder="Somente números" required><br>
		<label for="email">E-Mail</label><br>
		<input type="email" name="email" id="email" placeholder="nome@site.com.br" required><br>
		<label for="perfil">Perfil</label><br>
		<select name="perfil" id="perfil">
			<option value="" selected disabled>Selecione um perfil</option>
			<option value="admin">Administrador</option>
			<option value="user">Usuário comum</option>
		</select><br>
		<label for="senha">Senha</label><br>
		<input type="password" name="senha" id="senha" required><br>
		<label for="confirma">Confirmar Senha</label><br>
		<input type="password" name="confirma" id="confirma"><br>
		<button type="submit">Cadastrar</button> <button type="reset">Limpar</button>
	</form>
	</main>
</body>
</html>