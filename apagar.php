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
	<title>Conta</title>
</head>
<body>
<?php
		require('conexao.php');
		$id = $_POST['id'];
		
		try{
		$query = $conexao->query('select id,nome,cpf,email,perfil,senha from usuarios where email = "'.$email.'" and senha = md5("'.$senha.'")');

		$listar = $query->fetch(PDO::FETCH_ASSOC);
		if($listar['perfil']=="admin"){
			require('header_adm.php');
		}
		if($listar['perfil']=="user"){
			require('header_user.php');
		}
		$delete = 'delete from usuarios where id="'.$id.'"';

		$apagar= $conexao->prepare($delete);
		$apagar->execute();

		echo "Conta excluída com sucesso!";

		}
		catch(Exception  $e){
			echo 'Erro: ',  $e->getMessage(), "\n";
		}
	
	?>
</body>
</html>