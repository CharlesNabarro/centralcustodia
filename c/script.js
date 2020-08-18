function insertAlvo()
		{
            
                document.getElementById('sec_alvo').style.visibility = 'visible';
                document.getElementById('sec_alvo').style.display = 'block';
                document.getElementById('sec_caso').style.visibility = 'hidden';
                document.getElementById('sec_caso').style.display = 'none';
			
		}	

function insertDispositivo()
		{
			document.getElementById('sec_dispositivo').style.visibility = 'visible';
			document.getElementById('sec_dispositivo').style.display = 'block';
			document.getElementById('sec_alvo').style.visibility = 'hidden';
			document.getElementById('sec_alvo').style.display = 'none';
		}	
		
function insertHistorico()
		{
			document.getElementById('sec_historico').style.visibility = 'visible'
			document.getElementById('sec_historico').style.display = 'block';
			document.getElementById('sec_dispositivo').style.visibility = 'hidden';
			document.getElementById('sec_dispositivo').style.display = 'none';
		}

function insertCaso()
		{
			document.getElementById('sec_historico').style.visibility = 'hidden'
			document.getElementById('sec_historico').style.display = 'none';
			document.getElementById('sec_dispositivo').style.visibility = 'hidden';
			document.getElementById('sec_dispositivo').style.display = 'none';
			document.getElementById('sec_alvo').style.visibility = 'hidden';
			document.getElementById('sec_alvo').style.display = 'none';
			document.getElementById('sec_caso').style.visibility = 'visible';
			document.getElementById('sec_caso').style.display = 'block';
		
		}
		