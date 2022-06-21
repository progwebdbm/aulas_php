<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro</title>
</head>
<body>
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
</body>
</html>