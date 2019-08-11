<?php

class Conn
{
	public function conectar()
	{
		$servidor = "localhost";
		$usuario = "root";
		$senha = "";
		$dbname = "lar_feliz";
		$con = mysqli_connect($servidor, $usuario, $senha, $dbname);

		if ($con->connect_errno) 
		{
		    return ("Connect failed: %s\n". $con->connect_error);
		    exit();
		} else 
		{
			return  $con;
		}

		

	}
}

?>