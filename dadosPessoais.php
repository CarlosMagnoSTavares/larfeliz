<?php include_once('include/header.php'); ?>
<!-- 
  <div class="row">
    <div class="input-field col s9 m9">
      <input placeholder="Buscar por nome" value="" type="text">
    </div>
    <div class="col s12 m3">
    	<input type="submit" name="Filtrar" class="btn" value="Buscar">
    </div>
  </div>
 -->
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
		require_once('controll/Crud.class.php');

		$table = 'dados_pessoais';
		$where = " id_pessoal > 0";
		$orderBy =" nome asc ";
		$max = "2";
		$pag = (isset($_GET['startPag']) && !empty($_GET['startPag']) && is_numeric($_GET['startPag']))? $_GET['startPag']: "0";
		$limit = "$pag,$max";

		$crud = new Crud;
		$list = $crud->select($table,$where,$orderBy,$limit);

		foreach ($list as $key => $value)
		{ 
			$nome = utf8_encode($value['nome']);
			$caminhoFoto = $value['caminho_foto'];
			$dataAcolhimento = $value['data_acolhimento'];

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

$table = 'dados_pessoais';
$limit = 1;
$mark = NULL;
$paginas = $crud->pagination($table,$limit);

foreach ($paginas as $key => $value) {
	$countPag = $value['PAG'];
}
?>
  <ul class="pagination center-align">
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>

	<?php 
	for ($i=1; $i <= $countPag ; $i++) 
	{ 
		
		if (isset($_GET['startPag']) && !empty($_GET['startPag']) && is_numeric($_GET['startPag'])) 
		{
		  $mark = $_GET['startPag']==$i? "active orange":"waves-effect";	
		}
		echo '<li class="'.$mark.'"><a href="?startPag='.$i.'">'.$i.'</a></li>';
	}
	?>

    <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
  </ul>

 
<?php include_once('include/footer.php'); ?>



