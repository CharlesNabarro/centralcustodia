<?php session_start(); 


?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema - Central de Custódia</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript" src="jquery-3.3.1.js"></script>
</head>
<body>
<div class="main">
	<div class="titulo">
			<p>Gerenciador da Central de Custódia</p>
			<p class="mensagem">Você está logado como <?php echo $_SESSION["nome"];?></p>
	</div>
	<div class="container">	
		<div class="tmpl-sistema">
			<section id="sec_alvo">
				<div class="painel2" id="alvo">
					<div class="subtitulos"><p>Identificação do Usuário-Alvo</p></div>
					<div class="form">
						<form class="frmAlvo" action="ctrl_sistema.php" method="POST">
							<p name="numeroCaso">Caso:<?php echo $_SESSION["numCaso"];?></p>
							<div class="content-formAlvo">
								<div class="par-formAlvo">
									<label for="loginAlvo">Login do Usuário Alvo: </label>
									<input type="text" name="loginAlvo" placeholder="Digite o login do usuário alvo." />
									<label for="lotacao">Unidade de lotação do Usuário: </label>
									<input type="text" name="lotacao"/ placeholder="UF0000">
								</div>
								<div class="par-formAlvo">
									<label for="nomeAlvo">Nome do Usuário Alvo: </label>
									<input type="text" name="nomeAlvo" placeholder="Digite o nome completo do usuário alvo." />
									<p><button type="submit" name="gravarAlvo">Registrar</button></p> 
								</div>
							</div>
						</form>
						<div class="sairnovo">
						<p id="sair"><a href="index.php?ac=sair">Sair do Sistema</a></p>
						</div>
					</div>	
				</div>    
			</section>
		</div>
        
    </div>
	<div class="container-rodape">
		<div class="rodape">
			
		</div>	
	</div>
</div>
</body>
</html>

