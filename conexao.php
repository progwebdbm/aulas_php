<?php

	require('config.php');
	$utf8 = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
	$conexao = new PDO("mysql:host=$local;dbname=$dbname;charset=utf8",$user,$password,$utf8);

?>