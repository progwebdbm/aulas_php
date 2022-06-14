<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Área do quadrado</title>
</head>
<body>
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
		<label for="lado">Lado do quadrado</label> 
		<input type="text" name="lado" id="lado"> <button type="submit">Calcular</button>
	</form>
	<?php
		if(isset($_GET)){
			$lado = isset($_GET['lado']) ? $_GET['lado'] : false;
			if(isset($lado) && $lado>0){
				$area = $lado * $lado;
			}
			else{
				echo "Informe um valor maior do que zero";
			}
			if(isset($area)){
				echo "A área do quadrado é: "; echo $area; echo " cm2";
			}
		}
	?>
	
</body>
</html>