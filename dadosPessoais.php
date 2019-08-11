<?php 
include_once('include/header.php'); 
require_once('controll/Crud.class.php');
?>

 <table class="striped responsive-table">
    <thead>
      <tr>
          <th>Foto</th>
          <th>Nome</th>
          <th>Data acolhimento</th>
          <th>Editar</th>
          <th>Excluir</th>
      </tr>
    </thead>

<tbody>
	<?php
	//Config de cada pagina
	$table = 'dados_pessoais';
	$where = " id_pessoal > 0";
	$orderBy =" id_pessoal asc ";
	$max = 7;

	//Não alterar
	$pag = (isset($_GET['startPag']) && !empty($_GET['startPag']) && is_numeric($_GET['startPag']))? 
			($_GET['startPag']*$max): "0";
	$limit = "$pag,$max";

	$crud = new Crud;
	$list = $crud->select($table,$where,$orderBy,$limit);

	foreach ($list as $key => $value)
	{ 
		$nome = utf8_encode($value['nome']);
		$caminhoFoto = $value['caminho_foto'];
		$dataAcolhimento = $value['data_acolhimento'];
		$idPessoal = $value['id_pessoal'];

		echo'
			<tr>
				<td><img src="'.$caminhoFoto.'" alt="Foto de '.$nome.'" data-caption="'.$nome.'" class="circle materialboxed" width="50px" height="50px"></td>
				<td>'.$nome.'</td>
				<td>'.$dataAcolhimento.'</td>
				<td><a href="#" class="btn btn-small orange">Editar</a></td>
				<td><a href="#" class="btn btn-small red">Excluir</a></td>
			</tr>
		';
	}
	?>
</tbody>
 </table>
 
<?php 
include_once('include/pagination.php'); 
include_once('include/footer.php'); 
?>



