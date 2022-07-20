<?php 
$titulo = "Histórico de acolhidos";
$telaAcessada = "histAcolhidos";
include_once('include/header.php'); 
require_once('controll/Crud.class.php');

//Config de cada pagina
$table = 'vw_hist_acolhidos';//Criado View para listar crianças delisgadas
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
					<th><a href="?orderColumn=nome">Nome</a></th>
					<th><a href="?orderColumn=data_acolhimento">Data acolhimento</a></th>
					<th><a href="?orderColumn=data_nascimento">Data nascimento</a></th>
					<th><a href="?orderColumn=data_desligamento">Data desligamento</a></th>


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
				$where .= " and situacao='desligado' ";
				$list = $crud->select($table,$where,$orderBy,$limit);

				foreach ($list as $key => $value)
				{ 
					$id = !empty($value['id'])? ($value['id']): "";
					$nome = !empty($value['nome'])? ($value['nome']): "";
					$data_acolhimento = !empty($value['data_acolhimento'])? ($value['data_acolhimento']): "";
					//$origem = !empty($value['origem'])? ($value['origem']): "";
					$data_nascimento = !empty($value['data_nascimento'])? ($value['data_nascimento']): "";
					//$nome_pai = !empty($value['nome_pai'])? ($value['nome_pai']): "";
					//$nome_mae = !empty($value['nome_mae'])? ($value['nome_mae']): "";
					$data_desligamento = !empty($value['data_desligamento'])? ($value['data_desligamento']): "";
					$formPost = !empty($value['formPost'])? ($value['formPost']): "";
					//$destino = !empty($value['destino'])? ($value['destino']): "";
					//$info_diversas = !empty($value['info_diversas'])? ($value['info_diversas']): "";
					$situacao = $value['situacao'];

					echo'
					<tr>
						<td class="">'.htmlspecialchars($nome).'</td>
						<td class="center-align">'.date("d/m/Y", strtotime($data_acolhimento))).'</td>
						<td class="center-align">'.date("d/m/Y", strtotime($data_nascimento))).'</td>
						<td class="center-align">'.date("d/m/Y", strtotime($data_desligamento))).'</td>

						';
					include('botoes.php');
					echo'
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
