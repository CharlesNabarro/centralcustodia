<?php
//FUNÇÃO CONECTAR BANCO DE DADOS.........................................................................................................
	function conectar()
	{
		//Variáveis.
		$servidor = "localhost";
		$banco = "db_centralcustodia";
		$usuario = "usr_appCustodia";
		$senha = "Forense6";
        $connectionInfo["Database"] = $banco;
        $connectionInfo["UID"] = $usuario;
        $connectionInfo["PWD"] = $senha;
	 
	 	//Conecta ao banco.
		$conn = sqlsrv_connect($servidor, $connectionInfo) or die("Conexão Recusada! Contate o administrador.");
        
		//RETORNA A VARIÁVEL $CONN.
		return $conn;
       
	}

//FUNÇÃO PARA VALIDAR USUÁRIO............................................................................................................
	function validarlogin($login, $senha, $conn)
	{
		//Variáveis.
		$login = strtoupper($login);
		$senha = strtoupper($senha);
		$conn= $conn;
		$banco = "db_centralcustodia";
		$tb = "db_centralcustodia.tb_empr_ceset"; 

		//Pesquisa pelo login e senha no banco de dados.
		$sql = "SELECT LOGIN_E, NOME FROM ".$tb." WHERE LOGIN_E = '".$login."' AND SENHA = '".$senha."'";
		$params = array();
        $options = array("scrollable" => SQLSRV_CURSOR_STATIC);
        $result = sqlsrv_query($conn, $sql, $params, $options);
		$total = sqlsrv_num_rows($result);
		       
       
		//Se encontrar o login e a senha no banco de dados, atribui o login e a senha às variáveis de sessão $_SESSION.
		//Se não encontrar, emite mensagem de erro.
		if ($total == 1)
        {
			 echo $total;
            $row = array();
			$row = sqlsrv_fetch_array($result);
			$aux1 = $row["LOGIN_E"];
			$aux2 = $row["NOME"];

			$_SESSION["login"] = $aux1;
			$_SESSION["nome"] = $aux2;
            
			return true;
		}
		else
		{
			echo "<script>alert('Existe algo de errado! Verifique seu login e senha e tente novamente.');</script>";
		}
	}

//FUNÇÃO PARA INSERIR O CASO.............................................................................................................
	function inserirCaso($numCaso, $demandante, $dtRegistro, $resumo, $registrador, $conn)
	{
		//Variáveis
		$numCaso = $numCaso;
		$demandante = $demandante ;
		$dtRegistro = $dtRegistro ;
		$resumo = $resumo ;
		$registrador = $registrador;
		$conn = $conn;
		//$banco = "DB_CENTRALCUSTODIA";
		
		//Variável para inserir valores no banco de dados.
		$sql = "INSERT INTO db_centralcustodia.tb_caso (CODIGO, DEMANDANTE, DATAREG, RESUMO, REGISTRADOR) VALUES (?, ?, ?, ?, ?)";
        $params = array($numCaso, $demandante, $dtRegistro, $resumo, $registrador);
        
		//Executa a variável no banco de dados informado.
        $stmt = sqlsrv_query($conn, $sql, $params);
        if (!$stmt) 
        {  
            echo "<script>alert('Falha ao inserir registro. Acão não executada, tente novamente.');</script>";
            die(print_r(sqlsrv_errors(), true));  
        }
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);
	}

//FUNÇÃO PARA INSERIR O ALVO.............................................................................................................
		function inserirAlvo($loginAlvo, $nomeAlvo, $lotacao, $conn)
	{
		//VARIÁVEIS
		$loginAlvo = $loginAlvo;
		$nomeAlvo = $nomeAlvo ;
		$lotacao = $lotacao ;
		$conn = $conn;
				
           
		//VARIAVEL PARA INSERIR DADOS DO CASO NA TABELA.
     	$sql = "INSERT INTO db_centralcustodia.tb_alvo (LOGIN_A, USUARIO, UNIDADE) VALUES (?, ?, ?)";
		$params = array($loginAlvo, $nomeAlvo, $lotacao);

    //Executa a variável no banco de dados informado.
        $stmt = sqlsrv_query($conn, $sql, $params);
        if (!$stmt) 
        {  
            echo "<script>alert('Falha ao inserir registro. Acão não executada, tente novamente.');</script>";
            die(print_r(sqlsrv_errors(), true));  
        }
        sqlsrv_free_stmt($stmt);

	}


//FUNÇÃO PARA INSERIR O CASO E O ALVO....................................................................................................

	function inserirCasoAlvo($numCaso, $loginAlvo, $conn)
	{
		//VARIÁVEIS
		$loginAlvo = $loginAlvo;
		$numCaso = $numCaso;
		$conn = $conn;
		
		//VARIAVEL PARA INSERIR DADOS DO CASO NA TABELA.
		$sql = "INSERT INTO db_centralcustodia.tb_caso_alvo (caso_CODIGO, LOGIN_A) VALUES (?, ?)";
		$params = array($numCaso, $loginAlvo);
        //EXECUTA A QUERY NA TABELA DO BANCO DE DADOS.
		$stmt = sqlsrv_query($conn, $sql, $params);
         if (!$stmt) 
        {  
            echo "<script>alert('Falha ao inserir registro. Acão não executada, tente novamente.');</script>";
            die(print_r(sqlsrv_errors(), true));  
        }
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);
	}

//FUNÇÃO PARA SELECIONAR O TIPO DE DISPOSITIVO EM UM SELECT............................................................................
    
   function selectDispositivo()
	{
		$conn = conectar(); //ABRE O BANCO DE DADOS.
		$tb = "db_centralcustodia.tb_tipo_dispositivo"; 

		//Pesquisa pelo login e senha no banco de dados.
		$sql = "SELECT TIPO FROM ".$tb;
		$stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) 
        {
            die( print_r( sqlsrv_errors(), true) );
        }
    
        while( $linha = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
        {
          ?><option value = <?php echo $linha["TIPO"];?> ><?php echo $linha["TIPO"];?></option>
    <?php
        }
        sqlsrv_free_stmt( $stmt);  
    }
    
   
    

//FUNÇÃO PARA SELECIONAR O armario......................................................................................................

	function selectArmario()
	{
		$conn = conectar(); //ABRE O BANCO DE DADOS.
        $tb = "db_centralcustodia.tb_armario"; 

		//Pesquisa pelo login e senha no banco de dados.
		$sql = "SELECT NARMARIO FROM ".$tb;
		$stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }

       while( $linha = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
        {
          ?><option value = <?php echo $linha["NARMARIO"];?> ><?php echo $linha["NARMARIO"];?></option>
    <?php
        }
        sqlsrv_free_stmt( $stmt);  
    }
    
   

	//FUNÇÃO PARA INSERIR O DISPOSITIVO.
	function inserirDispositivo($tipoDispositivo, $serial, $marca, $modelo, $hash, $endLogico, $archive, $login_a, $n_Caso, $conn)
	{
		//VARIÁVEIS
		$tipo = $tipoDispositivo;
		$marca = $marca ;
		$modelo = $modelo ;
		$serial = $serial;
		$hash = $hash;
		$endLogico = $endLogico;
		$archive = $archive;
		$login_a = $login_a;
		$n_Caso = $n_Caso;
		$conn = $conn;
		
	    $sql = "INSERT INTO db_centralcustodia.tb_dispositivo (TIPO, NUMSERIE, MARCA, MODELO, HASHCOD, ENDLOGICO, ARQUIVO, LOGIN_A, caso_CODIGO) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$params = array($tipo, $serial, $marca, $modelo, $hash, $endLogico, $archive, $login_a, $n_Caso);
        //EXECUTA A QUERY NA TABELA DO BANCO DE DADOS.
		$stmt = sqlsrv_query($conn, $sql, $params);
         if (!$stmt) 
        {  
            echo "<script>alert('Falha ao inserir registro. Acão não executada, tente novamente.');</script>";
            die(print_r(sqlsrv_errors(), true));  
        }
        sqlsrv_free_stmt($stmt);
        
	}

	//FUNÇÃO PARA INSERIR O CASO E O DISPOSITIVO........................................................................................

	function inserirCasoDispositivo($n_Caso, $serial, $conn)
	{
		//VARIÁVEIS
		$serial= $serial;
		$n_Caso = $n_Caso;
		$conn = $conn;
		
		//VARIAVEL PARA INSERIR DADOS DO CASO NA TABELA.
		        
        $sql = "INSERT INTO db_centralcustodia.tb_caso_dispositivo (caso_CODIGO, NUMSERIE) VALUES (?, ?)";
		$params = array($n_Caso, $serial);
        //EXECUTA A QUERY NA TABELA DO BANCO DE DADOS.
		$stmt = sqlsrv_query($conn, $sql, $params);
         if (!$stmt) 
        {  
            echo "<script>alert('Falha ao inserir registro. Acão não executada, tente novamente.');</script>";
            die(print_r(sqlsrv_errors(), true));  
        }
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);
        
	}

	//FUNÇÃO PARA INSERIR O HISTÓRICO DE DISPOSITIVO NA TABELA.
	function historico($origem, $dtOrigem, $expedidor, $idExpedidor, $destino, $dtDestino, $recebedor, $idRecebedor, $serial, $conn)
	{
		//VARIÁVEIS	
		$origem = $origem;
		$dtOrigem = $dtOrigem;
		$expedidor = $expedidor;
		$idExpedidor = $idExpedidor;
		$destino = $destino;
		$dtDestino = $dtDestino;
		$recebedor = $recebedor;
		$idRecebedor = $idRecebedor;
		$serial = $serial;
		$conn = $conn;
		
        
        $sql = "INSERT INTO db_centralcustodia.tb_historico (ORIGEM, DATAORIG, EXPEDIDOR, IDEXPED, DESTINO, DATADEST, RECEBEDOR, IDRECEB, NUMSERIE) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$params = array($origem, $dtOrigem, $expedidor, $idExpedidor, $destino, $dtDestino, $recebedor, $idRecebedor, $serial);
        //EXECUTA A QUERY NA TABELA DO BANCO DE DADOS.
		$stmt = sqlsrv_query($conn, $sql, $params);
         if (!$stmt) 
        {  
            echo "<script>alert('Falha ao inserir registro. Acão não executada, tente novamente.');</script>";
            die(print_r(sqlsrv_errors(), true));  
        }
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);
    }

?>
