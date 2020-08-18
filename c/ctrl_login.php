<?php
ini_set( "display_errors", 1 );
error_reporting( E_ALL | E_STRICT );

//atribui um valor para o id da sessão, para o nome da sessão e inicia a mesma.
//session_id("08");
//session_name("ceset");
session_start();

//verifica se ctrl_login recebeu $_GET["ac"] e se esta variável tem o valor "sair".
//se for verdadeiro, desconecta o usuário logado e volta para a tela de escolha dos sistemas.
if(isset($_GET["ac"]) && $_GET["ac"] == "sair")
{
	unset($_SESSION["login"]);
	unset($_SESSION["senha"]);
	unset($_SESSION["numCaso"]);
	unset($_SESSION["loginAlvo"]);
	header("Location: ../index.php");
}

//verifica se as variáveis $_POST["login"] e $_POST["senha"] existem e não estão vazias.
if(isset($_POST["login"]) && isset($_POST["senha"]) && !empty($_POST["login"]) && !empty($_POST["senha"]) ) 
{
	//conecta-se ao banco de dados.
	$conn = conectar();

    $login = $_POST["login"];
	$senha = $_POST["senha"];
    

	//valida usuario no banco de dados
	$status = validarlogin($login, $senha, $conn);
	
	//se a validação tiver êxito, vai para a página principal do sistema.
	if($status == true) 
	{
		header("Location: ctrl_sistema.php");
     
	}
}

//verifica se existe uma sessao ativa. Se nao existir vai para a tela de login.
if(!isset($_SESSION["login"]))
{
	require_once("tmpl_login.php");
}