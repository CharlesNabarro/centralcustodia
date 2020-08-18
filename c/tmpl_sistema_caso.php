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
		<div  class="tmpl-sistema">
			<section id="sec_caso">	
				<div class="painel1" id="caso">
					<div class="subtitulos"><p>Identificação do Caso</p></div>
					<div class="form">
						<form class="frmCaso" action="ctrl_sistema.php" method="POST">
							<p name="registrador">Registrador: <?php echo $_SESSION["login"];?></p>
							<div class="content-formCaso">
								<div class="par-formCaso">
                                    <input type="hidden" name="registrador" value="<?php echo $_SESSION["login"];?>"
									<label for="numCaso" id="numCaso">Número do Caso: </label>
									<input type="text" name="numCaso" placeholder="WO0000003425167"/>
									<label for="resumo">Resumo do Caso: </label>
									<textarea name="resumo" placeholder="Escreva aqui um resumo do caso."></textarea>
								</div>
								<div class="par-formCaso">
									<label for="dtRegistro">Data de Registro: </label>
									<input type="date" name="dtRegistro" id="ipdata" />
									<label for="demandante">Demandante: </label>
									<input type="text" name="demandante" placeholder="CORED, CEFRA, REFRACB..." />
									<p><button type="submit" name="gravarCaso">Registrar</button></p>	
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

