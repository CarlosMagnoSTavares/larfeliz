<?php 
include_once('include/header.php'); 
require_once('controll/Crud.class.php');

//Config de cada pagina
$table = 'vw_saude';
$formPost ="formSaude.php";

//Não alterar "order e paginação" (TODAS AS TABELAS PRECISAM DE UMA COLUNA ID PRIMARY KEY)
$orderColumn = isset($_GET['orderColumn']) && !empty($_GET['orderColumn'])? trim($_GET['orderColumn']): "id desc";
$where = " id >= 0";
$orderBy = $orderColumn;
$max = 25;
$pag = (isset($_GET['startPag']) && !empty($_GET['startPag']) && is_numeric($_GET['startPag']))? ($_GET['startPag']*$max): "0";
$limit = "$pag,$max";
//Fim
?>

<div class="row">
	<div class="col s12 m12 center-align">
		<a class="btn green" href="<?php echo $formPost; ?>"> + Novo registro</a>
	</div>
</div>


<div class="row">
	<div class="col s12 m12">
		 <table class="striped responsive-table">
		    <thead>
		      <tr>
		          <th><a href="?orderColumn=nome">Foto</a></th>
		          <th><a href="?orderColumn=nome">Nome</a></th>
		          <th><a href="?orderColumn=tipo_consulta">Tipo da consulta</a></th>
		          <th><a href="?orderColumn=data_da_consulta">data consulta</a></th>
		          <th><a href="?orderColumn=data_do_retorno">data retorno</a></th>

		          <!-- Padrão nao alterar -->
		          <th><a href="?orderColumn=id">Ver</a></th>
		          <th><a href="?orderColumn=id">Editar</a></th>
		          <th><a href="?orderColumn=id">Excluir</a></th>
		          <!-- Padrão nao alterar fim -->
		      </tr>
		    </thead>
			<tbody>
				<?php
				$crud = new Crud;
				$list = $crud->select($table,$where,$orderBy,$limit);

				foreach ($list as $key => $value)
				{ 
					$caminhoFoto = !empty(trim($value['caminho_foto']))? "documentos/".$value['caminho_foto']:"include/sem-foto.gif";
					$nome = !empty($value['nome'])? ($value['nome']):"";
					$tipo_consulta = !empty($value['tipo_consulta'])? ($value['tipo_consulta']) : " Desconhecido ";
					$data_da_consulta = !empty($value['data_da_consulta'])? ($value['data_da_consulta']):"";
					$data_do_retorno = !empty($value['data_do_retorno'])? ($value['data_do_retorno']):"";
					$id = $value['id'];

					echo'
					<tr>
						<td><img src="'.$caminhoFoto.'"  data-caption="'.$nome.'" class="circle materialboxed" width="35px" height="35px"></td>
						<td class="">'.$nome.'</td>
						<td class="center-align">'.$tipo_consulta.'</td>
						<td class="">'.$data_da_consulta.'</td>
						<td class="">'.$data_do_retorno.'</td>

						<!-- Padrão nao alterar -->
							<td><a href="'.$formPost.'?acao=ver&id='.$id.'" class="btn btn-small green">Ver</a></td>
							<td><a href="'.$formPost.'?acao=editar&id='.$id.'" class="btn btn-small orange">Editar</a></td>
							<td><a href="'.$formPost.'?acao=excluir&id='.$id.'" class="btn btn-small red">Excluir</a></td>
						<!-- Padrão nao alterar fim-->
					</tr>
					';
				}
				?>
			</tbody>
		</table>
	</div>
</div>

<?php 
include_once('include/pagination.php'); 
include_once('include/footer.php'); 

?>
