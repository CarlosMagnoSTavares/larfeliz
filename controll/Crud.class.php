<?php

require_once('Conn.class.php');


class Crud extends Conn
{
	function saveFile($tipo,$anexo)
	{
		date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
		$ext = strtolower(substr($anexo['name'],-4)); //Pegando extensão do arquivo
		$new_name = (($tipo."_".date("Y.m.d-H.i.s")).$ext); //Definindo um novo nome para o arquivo
		$dir = '../documentos/'; //Diretório para uploads

		if (($ext <> '.php') && ($ext <> '.html') && ($ext <> '.js')&&($ext <> '.css')) 
		{
			$result = move_uploaded_file($anexo['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
			$result = $result ? $new_name:NULL;
			
			return $result;
		} 
		else 
		{
			return NULL;
		}
	}

	function select($table=NULL,$where=NULL,$orderBy=NULL,$limit=NULL) 
	{
		$where = !empty($where)? " WHERE ". $where : NULL;
		$orderBy = !empty($orderBy)? " order by ". $orderBy : NULL;
		$limit = !empty($limit)? " limit ". $limit : NULL;
		$con = Conn::conectar();
		$querySelect = ('SELECT * FROM '.addslashes($table).$where.$orderBy.$limit.' ;');
			 //Conn::log($querySelect);//GERA LOG DA AÇÂO
		$querySelect = mysqli_query($con,$querySelect);
		mysqli_close($con);
 		return $querySelect;
	}

	function pagination($table,$limit)
	{
		$con = Conn::conectar();
		$queryPagination = ("SELECT CEILING(SUM(1)/$limit) AS PAG FROM $table");
			// Conn::log($queryPagination);//GERA LOG DA AÇÂO
		$queryPagination = mysqli_query($con,$queryPagination);
		mysqli_close($con);
		return $queryPagination;
	}

	function insert($table=NULL,$columns=NULL,$values=NULL)
	{

		$table = addslashes($table);
		$columns = "`".implode("`,`", $columns)."`";
		$values = "'".implode("','", $values)."'";
		$con = Conn::conectar();
		$queryInsert = ("INSERT INTO $table ($columns) VALUES ($values) ;");
			// Conn::log($queryInsert);//GERA LOG DA AÇÂO
		$resultInsert = mysqli_query($con,$queryInsert);
		mysqli_close($con);

		if ($resultInsert) {
			return 'Success';
		} else {
			return 'Fail'; //$queryInsert;
		}
	}

	function update($table=NULL,$setValues=NULL,$where=NULL)
	{

		$table = addslashes($table);
		$where = !empty($where)? " WHERE ". $where : NULL;

		$con = Conn::conectar();
		$queryUpdate = ('UPDATE '.$table.' SET '.$setValues.$where.';');
			//Conn::log($queryUpdate);//GERA LOG DA AÇÂO
		$texto =  $queryUpdate;
		$queryUpdate = mysqli_query($con,$queryUpdate);
		mysqli_close($con);
		
		if ($queryUpdate) {
			return 'Success';
		} else {
			return 'Fail';
		}
	}

	function delete($table=NULL, $where=NULL)
	{
		$table = addslashes($table);
		$where = !empty($where)? " WHERE ". $where : NULL;

		$con = Conn::conectar();
		$queryDel = ("DELETE FROM $table $where;");
			// Conn::log($queryDelete);//GERA LOG DA AÇÂO
		$queryDelete = mysqli_query($con,$queryDel);
		mysqli_close($con);
		
		if ($queryDelete) {
			return 'Success';
		} else {
			// return $queryDel;
			return 'Fail';
		}
	}
}	



?>