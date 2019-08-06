<?php 

require_once('Crud.class.php');

// LISTA USUARIOS ↓
	$table = 'dados_pessoais';
	$where = " id_pessoal > 0";
	$orderBy =" id_pessoal desc ";
	$limit = "999";

	$crud = new Crud;
	$list = $crud->select($table,$where,$orderBy,$limit);

	foreach ($list as $key => $value) 
		{
			echo '<form method="POST" action="updateUser.php">'.
					 ' <input hidden readonly="true"  type="text" name="id" value="'.$value['nome'].'">'.
					 ' nome: <input type="text" name="nome" value="'.$value['nome'].'">'.
					 ' sobrenome: <input type="text" name="sobrenome" value="'.$value['nome'].'">'.
					 '<input type="submit" name="Atualiza" value="Atualiza">'.
					 '<a href="deleteUser.php?id='.$value['nome'].'">Deleta</a>'.
					 "<br>".
				  '</form>';
		}
?>
<br>
<a href="insertUser.php">Inserir novo usuario</a>

