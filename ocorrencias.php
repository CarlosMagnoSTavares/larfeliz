<?php 
$telaAcessada = "ocorrencia";
$titulo = "Ocorrências";
include_once('include/header.php'); 
require_once('controll/Crud.class.php');


//Config de cada pagina
$table = 'vw_ocorrencia';
$formPost ="formOcorrencia.php";

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
		          <th><a href="?orderColumn=nome">Nome</a></th>

		          <th><a href="?orderColumn=tipo">Tipo</a></th>
		          <th><a href="?orderColumn=data">Data</a></th>
		          <th><a href="?orderColumn=fato">Fato</a></th>

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
					$id = $value['id'];

					$tipo = !empty($value['tipo'])? ($value['tipo']) : " Desconhecido ";
					$data = !empty($value['data'])? ($value['data']):"";
					$fato = !empty($value['fato'])? ($value['fato']):"";
					$situacao = $value['situacao'];

					echo'
					<tr>
						<td><img src="'.htmlspecialchars($caminhoFoto).'"  data-caption="'.htmlspecialchars($nome).'" class="circle materialboxed" width="35px" height="35px"></td>
						<td class="">'.htmlspecialchars($nome).'</td>
						<td class="">'.htmlspecialchars($tipo).'</td>
						<td class="">'.htmlspecialchars($data).'</td>
						<td class="">'.htmlspecialchars($fato).'</td>

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
