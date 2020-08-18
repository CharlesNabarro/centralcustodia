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
        <div class="tmpl-sistema">
			<section id="sec_alvo">
				<div class="painel2" id="alvo">
					<div class="subtitulos"><p>Identificação do Usuário-Alvo</p></div>
					<div class="form">
						<form class="frmAlvo" action="ctrl_sistema.php" method="POST">
							<p name="numeroCaso">Caso:<?php echo "teste";?></p>
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
						<p id="novoCaso"><a href="ctrl_sistema.php?ac=novoCaso">Inserir Outro Caso</a></p>
						</div>
					</div>	
				</div>    
			</section>
		</div>
        <div class="tmpl-sistema">
			<section id="sec_dispositivo">
				<div class="painel3" id="dispositivo">
					<div class="subtitulos"><p>Identificação do Dispositivo</p></div>
					<div class="form">
						<form class="frmDispositivo" action="ctrl_sistema.php" method="POST">
							<p name="usuario_alvo">Usuário-Alvo: <?php echo $_SESSION['loginAlvo']; ?></p>
							<input type="hidden" name="login_a" value="<?php echo $_SESSION['loginAlvo']; ?>"/>
							<input type="hidden" name="n_Caso" value="<?php echo $_SESSION['numCaso']; ?>"/>
							<div class="content-formDispositivo">
								<div class="par-formDispositivo">
									<label for="tipoDispositivo">Tipo de Dispositivo: </label>
									<select name="tipoDispositivo">
										<option value="">Dispositivo...</option>
										<?php selectDispositivo(); ?>
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
										<?php selectArmario(); ?>
									</select>
									<p><button type="submit" name="gravarDispositivo">Registrar</button></p>  
								</div>
							</div>
						</form>
						<div class="sairnovo">
						<p id="sair"><a href="index.php?ac=sair">Sair do Sistema</a></p>
						<p id="novoAlvo"><a href="ctrl_sistema.php?ac=novoAlvo">Inserir Outro Alvo</a></p>
						</div>
					</div>	
				</div>
			</section>
		</div>
        <div class="tmpl-sistema">
			<section id="sec_historico">
				<div class="painel4" id="historico">
					<div class="subtitulos"><p>Histórico do Dispositivo</p></div>
					<div class="form">
						<form class="frmHistorico" action="ctrl_sistema.php" method="POST">
							<p name="serial">Número de Série: <?php echo $_SESSION['serial']; ?></p>
							<input type="hidden" name="serial" value= "<?php echo $_SESSION['serial']; ?>"/>
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
							<p id="novoDispositivo"><a href="ctrl_sistema.php?ac=novoDispositivo">Inserir Outro Dispositivo</a></p>
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

