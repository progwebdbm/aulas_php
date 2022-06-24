<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contato</title>
</head>
<body>
	<form action="envia.php" method="post">
		<input type="text" name="nome" id="nome" placeholder="nome"><br>
		<input type="email" name="email" id="email" placeholder="E-Mail"><br>
		<input type="text" name="assunto" id="assunto" placeholder="Assunto"><br>
		<textarea name="mensagem" id="mensagem" cols="30" rows="10" placeholder="Mensagem"></textarea><br>
		<button type="submit">Enviar</button>
	</form>
</body>
</html>