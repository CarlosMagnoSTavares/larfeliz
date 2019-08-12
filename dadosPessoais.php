<?php 
include_once('include/header.php'); 
require_once('controll/Crud.class.php');

//Config de cada pagina
$table = 'dados_pessoais';

$orderColumn = isset($_GET['orderColumn']) && !empty($_GET['orderColumn'])? trim($_GET['orderColumn']): "id desc";
$where = " id > 0";
$orderBy = $orderColumn;
$max = 25;

//Não alterar
$pag = (isset($_GET['startPag']) && !empty($_GET['startPag']) && is_numeric($_GET['startPag']))? ($_GET['startPag']*$max): "0";
$limit = "$pag,$max";
//Fim
?>

<div class="row">
	<div class="col s12 m12 center-align">
		<a class="btn green" href="formDadosPessoais.php"> + Novo registro</a>
	</div>
</div>


<div class="row">
	<div class="col s12 m12">
		 <table class="striped responsive-table">
		    <thead>
		      <tr>
		          <th><a href="?orderColumn=update_at">Foto</a></th>
		          <th><a href="?orderColumn=nome">Nome</a></th>
		          <th class="center-align"><a href="?orderColumn=data_acolhimento">Data acolhimento</a></th>
		          <th><a href="#">Ver</a></th>
		          <th><a href="#">Editar</a></th>
		          <th><a href="#">Excluir</a></th>
		      </tr>
		    </thead>
			<tbody>
				<?php
				$crud = new Crud;
				$list = $crud->select($table,$where,$orderBy,$limit);

				foreach ($list as $key => $value)
				{ 
					$nome = ($value['nome']);
					$caminhoFoto = !empty(trim($value['caminho_foto']))? "documentos/".$value['caminho_foto']:"include/sem-foto.gif";
					$dataAcolhimento = !empty($value['data_acolhimento'])? $value['data_acolhimento'] : " --/--/--- ";
					$idPessoal = $value['id'];

					echo'
						<tr>
							<td><img src="'.$caminhoFoto.'"  data-caption="'.$nome.'" class="circle materialboxed" width="35px" height="35px"></td>
							<td class="">'.$nome.'</td>
							<td class="center-align">'.$dataAcolhimento.'</td>
							<td><a href="formDadosPessoais.php?acao=ver&id='.$idPessoal.'" class="btn btn-small green">Ver</a></td>
							<td><a href="formDadosPessoais.php?acao=editar&id='.$idPessoal.'" class="btn btn-small orange">Editar</a></td>
							<td><a href="formDadosPessoais.php?acao=excluir&id='.$idPessoal.'" class="btn btn-small red">Excluir</a></td>
						</tr>
					';
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<br><br><br>
<br><br><br>
<?php 
include_once('include/pagination.php'); 
include_once('include/footer.php'); 
?>



