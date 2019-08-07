<?php

require_once('config/Conn.class.php');

class Crud extends Conn
{

	function select($table=NULL,$where=NULL,$orderBy=NULL,$limit=NULL) 
	{
		$where = !empty($where)? " WHERE ". $where : NULL;
		$orderBy = !empty($orderBy)? " order by ". $orderBy : NULL;
		$limit = !empty($limit)? " limit ". $limit : NULL;
		$con = Conn::conectar();
		$querySelect = 'SELECT * FROM '.addslashes($table).$where.$orderBy.$limit.' ;';
		$querySelect = mysqli_query($con,$querySelect);
		mysqli_close($con);
 		return $querySelect;
	}

	function pagination($table,$limit)
	{
		$con = Conn::conectar();
		$queryPagination = "SELECT CEILING(SUM(1)/$limit) AS PAG FROM $table";
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
		$queryInsert = "INSERT INTO $table ($columns) VALUES ($values) ;";
		$queryInsert = mysqli_query($con,$queryInsert);
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
		$queryDelete = "DELETE FROM $table $where;";
		$queryDelete = mysqli_query($con,$queryDelete);
		mysqli_close($con);
		
		if ($queryDelete) {
			return 'Success';
		} else {
			return 'Fail';
		}

	}

}	



?>