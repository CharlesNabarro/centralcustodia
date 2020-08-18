<?php 
session_start(); 
include_once("funcoes.php");
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
			<section id="sec_dispositivo">
				<div class="painel3" id="dispositivo">
					<div class="subtitulos"><p>Identificação do Dispositivo</p></div>
					<div class="form">
						<form class="frmDispositivo" action="ctrl_sistema.php" method="POST">
							<p name="usuario_alvo">Usuário-Alvo: <?php echo $_SESSION["loginAlvo"]; ?></p>
							<input type="hidden" name="login_a" value="<?php echo $_SESSION["loginAlvo"]; ?>"/>
							<input type="hidden" name="n_Caso" value="<?php echo $_SESSION["numCaso"]; ?>"/>
							<div class="content-formDispositivo">
								<div class="par-formDispositivo">
									<label for="tipoDispositivo">Tipo de Dispositivo: </label>
									<select name="tipoDispositivo">
										<option value="">Dispositivo...</option>
										<?php echo selectDispositivo();?>
									</select>
									<label for="marca">Marca do Dispositivo: </label>
									<input type="text" name="marca" placeholder="Samsung, Sony, Lenovo, HP, ..." />
									<label for="modelo">Modelo do Dispositivo: </label>
									<input type="text" name="modelo" placeholder="Digite o modelo do dispositivo." />
									<label for="serial">Número de Série do Dispositivo: </label>
									<input type="text" name="serial"/ placeholder="Digite o número de série do dispositivo.">
								</div>
								<div class="par-formDispositivo">
									<label for="hash">Hash do Dispositivo: </label>
									<input type="text" name="hash"/ placeholder="Digite o código hash do dispositivo.">
									<label for="endLogic">Endereço Lógico do Dispositivo: </label>
									<input type="text" name="endLogico"/ placeholder="Digite o enderço lógico do dispositivo.">
									<label for="archive">Local de Armazenamento: </label>
									<select name="archive">
										<option value="">Armário...</option>
										<?php echo selectArmario(); ?>
									</select>
									<p><button type="submit" name="gravarDispositivo">Registrar</button></p>  
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

