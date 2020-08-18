<?php
//Resgata uma sessão, se existir.
session_start();
ini_set( "display_errors", 1 );
error_reporting( E_ALL | E_STRICT );

//Inclui a página de funcoes.
include_once("funcoes.php");

//---------------------------------------------------------------------------------------------------------------------------------------

//Verifica se existe uma variável $_POST['numCaso'] recebida pelo metodo POST.
//Se não existir, chama a view de sistema_caso, se existir passa ao código abaixo.	
if(!isset($_POST['origem']))
	{
		if(!isset($_POST['serial']))
		{
			if(!isset($_POST['loginAlvo']))
			{
				if(!isset($_POST['numCaso']))
				{
					header("Location: tmpl_sistema_caso.php");
				}
			}
		}
	}
    
//----------------------------------------------------------------------------------------------------
//Recebe de tmpl_sistema_escolha, os valores de AC e direciona para a página de escolha do 
//cadastrador.

//Novo Histórico
if(isset($_GET["ac"]) && $_GET["ac"] == 0)
{
	header("Location: tmpl_sistema_caso.php");
}

//Novo dispositivo
if(isset($_GET["ac"]) && $_GET["ac"] == 1)
{
	unset($_SESSION["serial"]);
    header("Location: tmpl_sistema_dispositivo.php");
}

//Novo alvo
if(isset($_GET["ac"]) && $_GET["ac"] == 2)
{
	unset($_SESSION["loginAlvo"]);
    unset($_SESSION["serial"]);
	header("Location: tmpl_sistema_alvo.php");
	
}

//Novo caso
if(isset($_GET["ac"]) && $_GET["ac"] == 3)
{
	unset($_SESSION["numCaso"]);
    unset($_SESSION["loginAlvo"]);
    unset($_SESSION["serial"]);
	header("Location: tmpl_sistema_caso.php");
	
}

//sair do sistema 
if(isset($_GET["ac"]) && $_GET["ac"] == "sair")
{
	unset($_SESSION["numCaso"]);
    unset($_SESSION["loginAlvo"]);
    unset($_SESSION["serial"]);
    unset($_SESSION["nome"]);
    unset($_SESSION["senha"]);
    unset($_SESSION["login"]);
    header("Location: http:localhost/index.php");
	
}

//...............................................................................................

//RECEBE O POST DO FORMULÁRIO HISTORICO E PASSA OS DADOS PARA A FUNÇÃO INSERIR NO BANCO DE DADOS.
if(isset($_POST['origem']) && $_POST['origem'] != "")
{
    $origem = strtoupper($_POST['origem']);
    $dtOrigem = $_POST['dtOrigem'];
    $expedidor = strtoupper($_POST['expedidor']);
    $idExpedidor = strtoupper($_POST['idExpedidor']);
    $destino = strtoupper($_POST['destino']);
    $dtDestino = $_POST['dtDestino'];
    $recebedor = strtoupper($_POST['recebedor']);
    $idRecebedor = strtoupper($_POST['idRecebedor']);
    $serial = strtoupper($_POST['serial']);

//conecta-se ao banco de dados
    $conn = conectar();
    
//Insere os dados do caso na tabela tb_Historico.	
    historico($origem, $dtOrigem, $expedidor, $idExpedidor, $destino, $dtDestino, $recebedor, $idRecebedor, $serial, $conn);

//Chama a view tmpl_sistema_escolha.
    header("Location: tmpl_sistema_escolha.php");
    
}

//................................................................................................

//Verifica se existe uma variável $_POST['serial'] recebida pelo metodo POST e se ela contem algum valor.
if(isset($_POST['tipoDispositivo']) && $_POST['tipoDispositivo'] != "")
{
    $tipoDispositivo = strtoupper($_POST['tipoDispositivo']);
    $marca = strtoupper($_POST['marca']);
    $modelo = strtoupper($_POST['modelo']);
    $serial = strtoupper($_POST['serial']);
    $hash = strtoupper($_POST['hash']);
    $endLogico = strtoupper($_POST['endLogico']);
    $archive = strtoupper($_POST['archive']);
    $login_a = strtoupper($_POST['login_a']);
    $n_Caso = strtoupper($_POST['n_Caso']);
        
//conecta-se ao banco de dados
    $conn = conectar();

//Insere os dados do caso na tabela tb_Dispositivo.	
    inserirDispositivo($tipoDispositivo, $serial, $marca, $modelo, $hash, $endLogico, $archive, $login_a, $n_Caso, $conn);

//Insere os dados do caso na tabela tb_Caso_Dispositivo.	
    inserirCasoDispositivo($n_Caso, $serial, $conn);

//Atribui a variável $serial à variável de sessão $_SESSION["serial"]	
   $_SESSION["serial"] = $serial;
   
//Chama a view tmpl_sistema_historico.
    header("Location: tmpl_sistema_historico.php");
}

//---------------------------------------------------------------------------------------------------------------------------------------

//Verifica se existe uma variável $_POST['loginAlvo'] recebida pelo metodo POST e se ela contem algum valor.
if(isset($_POST["loginAlvo"]) && $_POST["loginAlvo"] != "")
{
    $loginAlvo = strtoupper($_POST["loginAlvo"]);
    $nomeAlvo = strtoupper($_POST["nomeAlvo"]);
    $lotacao = strtoupper($_POST["lotacao"]);
    $numCaso = $_SESSION["numCaso"];

//conecta-se ao banco de dados
    $conn = conectar();

//Insere os dados do caso na tabela tb_alvo.	
    inserirAlvo($loginAlvo, $nomeAlvo, $lotacao, $conn);

//Insere os dados do caso na tabela tb_caso_alvo.
    inserirCasoAlvo($numCaso, $loginAlvo, $conn);	

//Atribui a variável $loginAlvo à variável de sessão $_SESSION['loginAlvo']		
    $_SESSION["loginAlvo"] = $loginAlvo;

//Chama a view tmpl_sistmea_dispositivo
    header("Location: tmpl_sistema_dispositivo.php");

}

//---------------------------------------------------------------------------------------------------------------------------------------

//Verifica se existe uma variável $_POST['numCaso'] recebida pelo metodo POST e se ela contem algum valor.
if(isset($_POST["numCaso"]) && $_POST["numCaso"] != "")
{
    $numCaso = strtoupper($_POST["numCaso"]);
    $demandante = strtoupper($_POST["demandante"]);
    $dtRegistro = $_POST["dtRegistro"];
    $resumo = strtoupper($_POST["resumo"]);
    $registrador = strtoupper($_POST["registrador"]);
     
//conecta-se ao banco de dados
    $conn = conectar();

//Insere os dados do caso na tabela tb_caso.
    inserirCaso($numCaso, $demandante, $dtRegistro, $resumo, $registrador, $conn);

//Atribui a variável $numCaso à variável de sessão $_SESSION['numCaso']		
    $_SESSION["numCaso"] = $numCaso;

//Chama a view tmpl_sistema_alvo.
    header("Location: tmpl_sistema_alvo.php");
}

?>
