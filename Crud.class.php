<?php

require_once('Conn.class.php');

class Crud extends Conn
{

	function select($table=NULL,$where=NULL,$orderBy=NULL,$limit=NULL) 
	{
		$where = !empty($where)? " WHERE ". $where : NULL;
		$orderBy = !empty($orderBy)? " order by ". $orderBy : NULL;
		$limit = !empty($limit)? " limit ". $limit : NULL;
		$con = Conn::conectar();
		$querySelect = 'SELECT * FROM '.addslashes($table).$where.$orderBy.$limit.' ;';
		$querySelect = mysqli_query(Conn::conectar(),$querySelect);
		mysqli_close($con);
 		return $querySelect;
	}

	function insert($table=NULL,$columns=NULL,$values=NULL)
	{

		$table = addslashes($table);
		$columns = "`".implode("`,`", $columns)."`";
		$values = "'".implode("','", $values)."'";
		$con = Conn::conectar();
		$queryInsert = "INSERT INTO $table ($columns) VALUES ($values) ;";
		$queryInsert = mysqli_query(Conn::conectar(),$queryInsert);
		mysqli_close($con);

		if ($queryInsert) {
			return 'Success';
		} else {
			return 'Fail';
		}
	}

	function update($table=NULL,$setValues=NULL,$where=NULL)
	{

		$table = addslashes($table);
		$where = !empty($where)? " WHERE ". $where : NULL;

		$con = Conn::conectar();
		$queryUpdate = "UPDATE $table SET $setValues  $where;";
		$texto =  $queryUpdate;
		$queryUpdate = mysqli_query(Conn::conectar(),$queryUpdate);
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
		$queryDelete = "DELETE FROM $table $where;";
		$queryDelete = mysqli_query(Conn::conectar(),$queryDelete);
		mysqli_close($con);
		
		if ($queryDelete) {
			return 'Success';
		} else {
			return 'Fail';
		}

	}

}	



?>