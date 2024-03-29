<?php 
$telaAcessada = "registro_tecnico";
$titulo = "Registro Tecnico";
include_once('include/header.php'); 
require_once('controll/Crud.class.php');



//Config de cada pagina
$table = 'vw_registro_tecnico';
$formPost ="formRegistroTecnico.php";

require_once('pagina.php');// paginação
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
		          <th><a href="?orderColumn=nome">Nome Criança</a></th>
		          <!-- <th><a href="?orderColumn=nivel_parentesco">Parentesco</a></th>
		          <th><a href="?orderColumn=nome_parente">Filiação</a></th>

		          <th><a href="?orderColumn=visita_domiciliar">visita_domiciliar</a></th> -->
		          <th><a href="?orderColumn=data_audiencia">Data audiencia</a></th>
		          <!-- <th><a href="?orderColumn=audiencia_declaracao_obs">audiencia_declaracao_obs</a></th> -->
		          <th><a href="?orderColumn=data_visita_familiar">Data visita</a></th>

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
					$caminhoFoto = !empty(trim($value['caminho_foto']))? "documentos/".htmlspecialchars($value['caminho_foto']):"include/sem-foto.gif";
					$nome = !empty($value['nome'])? ($value['nome']):"";
					$nivel_parentesco = !empty($value['nivel_parentesco'])? ($value['nivel_parentesco']):"";
					$nome_parente = !empty($value['nome_parente'])? ($value['nome_parente']):"";
					$id = $value['id'];

					$visita_domiciliar = !empty($value['visita_domiciliar'])? ($value['visita_domiciliar']) : " Desconhecido ";
					$data_audiencia = !empty($value['data_audiencia'])? ($value['data_audiencia']):"";
					$audiencia_declaracao_obs = !empty($value['audiencia_declaracao_obs'])? ($value['audiencia_declaracao_obs']):"";
					$data_visita_familiar = !empty($value['data_visita_familiar'])? ($value['data_visita_familiar']):"";
					$situacao = $value['situacao'];

					echo'
					<tr>
						<td><img src="'.htmlspecialchars($caminhoFoto).'"  data_audiencia-caption="'.htmlspecialchars($nome).'" class="circle materialboxed" width="35px" height="35px"></td>
						<td class="">'.htmlspecialchars($nome).'</td>
						<!-- <td class="">'.htmlspecialchars($nivel_parentesco).'</td>-->
						<!-- <td class="">'.htmlspecialchars($nome_parente).'</td>-->
						<!-- <td class="">'.htmlspecialchars($visita_domiciliar).'</td>-->
						<td class="">'.htmlspecialchars($data_audiencia).'</td>
						<!-- <td class="">'.htmlspecialchars($audiencia_declaracao_obs).'</td> -->
						<td class="">'.htmlspecialchars($data_visita_familiar).'</td>

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
<!-- asdasd -->