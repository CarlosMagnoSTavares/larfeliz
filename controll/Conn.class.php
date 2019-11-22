<?php

if (isset($_GET['conn'])) {
	echo "<br><pre>";
	var_dump(Conn::conectar());
}

class Conn
{
	public function conectar()
	{
		// ACEITE
			// $servidor = "localhost";
			// $usuario = "root";
			// $senha = "";
			// $dbname = "lar_feliz";

		// preProd
			$servidor = "localhost";
			$usuario = "larf_feliz";
			$senha = "sisTEMAlar";
			$dbname = "voar_feliz";

		// // PRODUCAO 2
		// 	$servidor = "localhost";
		// 	$usuario = "larf_admin_sistema";
		// 	$senha = "larfesd45w";
		// 	$dbname = "larf_feliz";

		$con = mysqli_connect($servidor, $usuario, $senha, $dbname);

		if ($con->connect_errno) 
		{
			return ("Connect failed: %s\n". $con->connect_error);
			exit();	
		} 
		 else 
		{
			return  $con;
		}
	}

	function var_error_log( $object=null )
	{
	    ob_start();                    // start buffer capture
	    var_dump( $object );           // dump the values
	    $contents = ob_get_contents(); // put the buffer into a variable
	    ob_end_clean();                // end capture
	    error_log( $contents );        // log contents of the result of var_dump( $object )
	}

	
	public function log($msg=NULL)
	{
		//Deleta arquivo se passar de 10k linhas
		$linhas = count( file( 'log.log' ) );
			if ($linhas >= 10000) 
			{
				$myFile = "log.log";
				$myFileLink = fopen($myFile, 'w') or die("can't open file");
				fclose($myFileLink);
				$myFile = "log.log";
				unlink($myFile) or die("Couldn't delete file");
			}

		//Grava o log
		date_default_timezone_set('America/Sao_Paulo');
		$dataLocal = date('d/m/Y H:i:s', time());
		$msg = isset($msg) && !empty($msg)? "[".$dataLocal."] ".$msg."\n" : "";

		if (!empty($msg))
		{
			// Abre ou cria o arquivo bloco1.txt
			// "a" representa que o arquivo é aberto para ser escrito
			$fp = fopen("log.log", "a");
			// Escreve a mensagem passada através da variável $msg
			$escreve = fwrite($fp, $msg);
			// Fecha o arquivo
			fclose($fp);
		}
	}
}

?>