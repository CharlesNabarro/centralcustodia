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
			<section id="sec_historico">
				<div class="painel4" id="historico">
					<div class="subtitulos"><p>Histórico do Dispositivo</p></div>
					<div class="form">
						<form class="frmHistorico" action="ctrl_sistema.php" method="POST">
							<p name="serial">Número de Série: <?php echo $_SESSION["serial"]; ?></p>
							<input type="hidden" name="serial" value= "<?php echo $_SESSION["serial"]; ?>"/>
							<div class="content-formHistorico">
								<div class="par-formHistorico">
									<label for="origem">Origem do Dispositivo: </label>
									<input type="text" name="origem" placeholder="Digite o local de origem do dispositivo." />
									<label for="dtOrigem">Data da Origem: </label>
									<input type="date" name="dtOrigem" />
									<label for="expedidor">Nome do Expedidor: </label>
									<input type="text" name="expedidor" placeholder="Digite o nome completo do expedidor." />
									<label for="idExpedidor">Identificação do Expedidor: </label>
									<input type="text" name="idExpedidor"/ placeholder="CPF, RG, CNH, Login CAIXA, ...">
								</div>
								<div class="par-formHistorico">
									<label for="destino">Destino do Dispositivo: </label>
									<input type="text" name="destino"/ placeholder="Digite o local de destino do dispositivo.">
									<label for="dtDestino">Data do Destino: </label>
									<input type="date" name="dtDestino" />
									<label for="recebedor">Nome do Recebedor: </label>
									<input type="text" name="recebedor"/ placeholder="Digite o nome completo do recebedor.">
									<label for="idRecebedor">Identificação do Recebedor: </label>
									<input type="text" name="idRecebedor"/ placeholder="CPF, RG, CNH, Login CAIXA, ...">
									<p><button type="submit" name="gravarHistorico">Registrar</button></p> 
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

