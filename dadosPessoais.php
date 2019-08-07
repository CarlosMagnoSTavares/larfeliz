<?php include_once('include/header.php'); ?>

 <table>
    <thead>
      <tr>
          <th>Name</th>
          <th>Item</th>
          <th>Price</th>
          <th>Editar</th>
          <th>Excluir</th>
      </tr>
    </thead>

    <tbody>
		<?php
		require_once('controll/Crud.class.php');

		$table = 'dados_pessoais';
		$where = " id_pessoal > 0";
		$orderBy =" id_pessoal desc ";
		$limit = "999";

		$crud = new Crud;
		$list = $crud->select($table,$where,$orderBy,$limit);

		foreach ($list as $key => $value)
		{ 
			echo'
				<tr>
					<td>#</td>
					<td>#</td>
					<td>#</td>
					<td><a href="#" class="btn btn-small orange">Editar</a></td>
					<td><a href="#" class="btn btn-small red">Excluir</a></td>
				</tr>
			';
		}
		?>
    </tbody>
 </table>

 
<?php include_once('include/footer.php'); ?>



