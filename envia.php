<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem= $_POST['mensagem'];
$conteudo="Mensagem enviada por: \nNome: $nome \nE-Mail: $email \nTexto: \n$mensagem";
$destino = "curso.prograweb.m@domboscoitaquera.org.br";
$headers = 'From: '."$nome <$email>";

if(mail($destino, $assunto, $conteudo, $headers)){
	echo "Enviado com sucesso";
}
else{
	header('Location: contato.php');
}
?>