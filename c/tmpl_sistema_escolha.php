<?php 
session_start(); 
?>

<!DOCTYPE html lang=pt-br>
<html>
<head>
    <meta charset="utf-8">
	<title>Sistema - Central de Custódia</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript" src="jquery-3.3.1.js"></script>
</head>
<body>
<div class="main">
	<div class="titulo">
			<p>Gerenciador da Central de Custódia</p>
			<p class="mensagem">Você este logado como <?php echo $_SESSION["nome"];?></p>
	</div>
    <div class="container">	
		<div class="tmpl-sistema">
			<section id="sec_dispositivo">
				<div class="painel3" id="escolha">
					<div class="subtitulos"><p>Escolha uma Opção</p></div>
                        <div class="form">
                            <div class="sairnovo">
                                    <p id="sair"><a href="index.php?ac=sair">Sair</a></p>
                                    <p id="novoHistorico"><a href="ctrl_sistema.php?ac=0">Inserir Histórico</a></p>
                                    <p id="novoDispositivo"><a href="ctrl_sistema.php?ac=1">Inserir Dispositivo</a></p>
                                    <p id="novoAlvo"><a href="ctrl_sistema.php?ac=2">Inserir Alvo</a></p>
                                    <p id="novoCaso"><a href="ctrl_sistema.php?ac=3">Inserir Caso</a></p>
                                    
                            </div>
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