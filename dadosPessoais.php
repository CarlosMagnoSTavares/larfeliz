<?php 
include_once('include/header.php'); 
require_once('controll/Crud.class.php');

//Config de cada pagina
$table = 'dados_pessoais';
$where = " id_pessoal > 0";
$orderBy =" id_pessoal asc ";
$max = 25;

//Não alterar
$pag = (isset($_GET['startPag']) && !empty($_GET['startPag']) && is_numeric($_GET['startPag']))? ($_GET['startPag']*$max): "0";
$limit = "$pag,$max";
//Fim
?>
<div class="row">
	<div class="col s12 m12">
		 <table class="striped responsive-table">
		    <thead>
		      <tr>
		          <th>Foto</th>
		          <th>Nome</th>
		          <th class="center-align">Data acolhimento</th>
		          <th>Editar</th>
		          <th>Excluir</th>
		      </tr>
		    </thead>
			<tbody>
				<?php
				$crud = new Crud;
				$list = $crud->select($table,$where,$orderBy,$limit);

				foreach ($list as $key => $value)
				{ 
					$nome = utf8_encode($value['nome']);
					$caminhoFoto = !empty(trim($value['caminho_foto']))? $value['caminho_foto']:"include/sem-foto.gif";
					$dataAcolhimento = !empty($value['data_acolhimento'])? $value['data_acolhimento'] : " --/--/--- ";
					$idPessoal = $value['id_pessoal'];

					echo'
						<tr>
							<td><img src="'.$caminhoFoto.'" alt="Foto de '.$nome.'" data-caption="'.$nome.'" class="circle materialboxed" width="35px" height="35px"></td>
							<td class="">'.$nome.'</td>
							<td class="center-align">'.$dataAcolhimento.'</td>
							<td><a href="formDadosPessoais.php?acao=editar&id_pessoal='.$idPessoal.'" class="btn btn-small orange">Editar</a></td>
							<td><a href="formDadosPessoais.php?acao=excluir&id_pessoal='.$idPessoal.'" class="btn btn-small red">Excluir</a></td>
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



