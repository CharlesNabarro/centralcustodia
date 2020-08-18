<?php
//Seleciona o sistema.
//Verifica se recebeu $_GET["ac"] e se a variavel tem algum valor.
if(isset($_GET["ac"]) && $_GET["ac"] == "c")
{
	header("Location: c/index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="c/style.css">
	<title>CESET SISTEMAS INTEGRADOS</title>
</head>
<body>
	<div class="btn-principal">
		<p><a href="index.php?ac=c">Central de Custódia</a></p>
	</div>
</body>
</html>

