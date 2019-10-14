<?php 
$titulo = "Histórico de acolhidos";
$telaAcessada = "histAcolhidos";
include_once('include/header.php'); 
require_once('controll/Crud.class.php');

//Config de cada pagina
$table = 'hist_acolhidos';
$formPost ="FormHistAcolhidos.php";

require_once('pagina.php');
?>


<div class="row">
	<div class="col s12 m12 center-align">
		<a class="btn green" href="<?php echo $formPost; ?>"> + Novo registro</a>
	</div>
</div>


<div class="row">
	<div class="col s12 m12">
		 <table class="striped responsive-table center-align">
		    <thead>
		      <tr>
					<th><a href="?orderColumn=nome">nome</a></th>
					<th><a href="?orderColumn=data_acolhimento">data acolhimento</a></th>
					<th><a href="?orderColumn=data_nascimento">data nascimento</a></th>
					<th><a href="?orderColumn=data_desligamento">data desligamento</a></th>


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
					$id = !empty($value['id'])? ($value['id']): "";
					$nome = !empty($value['nome'])? ($value['nome']): "";
					$data_acolhimento = !empty($value['data_acolhimento'])? ($value['data_acolhimento']): "";
					$origem = !empty($value['origem'])? ($value['origem']): "";
					$data_nascimento = !empty($value['data_nascimento'])? ($value['data_nascimento']): "";
					$nome_pai = !empty($value['nome_pai'])? ($value['nome_pai']): "";
					$nome_mae = !empty($value['nome_mae'])? ($value['nome_mae']): "";
					$data_desligamento = !empty($value['data_desligamento'])? ($value['data_desligamento']): "";
					$destino = !empty($value['destino'])? ($value['destino']): "";
					$info_diversas = !empty($value['info_diversas'])? ($value['info_diversas']): "";

					echo'
					<tr>
						<td class="">'.$nome.'</td>
						<td class="">'.$data_acolhimento.'</td>
						<td class="">'.$data_nascimento.'</td>
						<td class="">'.$data_desligamento.'</td>

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
