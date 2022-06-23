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
		$nome = $_POST['nome'];
		$cpf = $_POST['cpf'];
		$email = $_POST['email'];
		$perfil = $_POST['perfil'];
		$senha = $_POST['senha'];
		try{
			require('header_adm.php');	
			$insert = 'insert into usuarios (nome,cpf,email,perfil,senha) values ("'.$nome.'","'.$cpf.'","'.$email.'","'.$perfil.'",md5("'.$senha.'"))';
		
			$cadastrar = $conexao -> prepare($insert);
			$cadastrar -> execute();
		
		
			echo "<main><p>Cadastro efetuado com sucesso!</p></main>";	
		}
		catch(Exception $e){
			echo 'Erro: ',  $e->getMessage(), "\n";
		}
	?>
</body>
</html>