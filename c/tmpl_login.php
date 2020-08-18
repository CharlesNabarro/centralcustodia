
<!DOCTYPE html>
<html>
<head>
	<title>Login - Central de Custódia</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="main">

		<div class="titulo">
			<p>Gerenciador da Central de Custódia</p>
			<p class="mensagem">Digite o seu login e senha para acessar.</p>
		</div>
		<div class="container">	
			<div class="tmpl-login">
				<form class="form-login" action="" method="POST">
					<fieldset >
						<label for="login">Login:</label>
						<input type="text" name="login" placeholder="C000000" id="inputLogin1" />
						<label for="senha">Senha:</label>
						<input type="password" name="senha" placeholder="5 Digitos Alfanuméricos" id="inputLogin2" />
						<p><button class="btnAcessar" type="submit">Acessar</button></p>					
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</body>
</html>