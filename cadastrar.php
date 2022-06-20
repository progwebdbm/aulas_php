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
		$senha = $_POST['senha'];

		$insert = 'insert into usuarios (nome,cpf,email,senha) values ("'.$nome.'","'.$cpf.'","'.$email.'", md5("'.$senha.'"))';
		
		$cadastrar = $conexao -> prepare($insert);
		$cadastrar -> execute();

		echo "Cadastro efetuado com sucesso!";	
	
	?>
</body>
</html>