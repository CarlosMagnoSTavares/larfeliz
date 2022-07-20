<?php 
$telaAcessada = "atividades";
$titulo = "Atividades complementares";
include_once('include/header.php'); 
require_once('controll/Crud.class.php');

//Config de cada pagina
$table = 'vw_atividade';
$formPost ="formAtividade.php";

require_once('pagina.php');
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

		          <th><a href="?orderColumn=frequencia">Tipo e frequencia</a></th>
		          <th><a href="?orderColumn=dia">Dia</a></th>
		          <th><a href="?orderColumn=horario">Horario</a></th>
		          <th><a href="?orderColumn=local">Local</a></th>

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
					$id = $value['id'];
					$caminhoFoto = !empty(trim($value['caminho_foto']))? "documentos/".htmlspecialchars($value['caminho_foto']):"include/sem-foto.gif";
					$nome = !empty($value['nome'])? ($value['nome']):"";

					$frequencia = !empty($value['frequencia'])? ($value['frequencia']) : " Desconhecido ";
					$dia = !empty($value['dia'])? ($value['dia']):"";
					$horario = !empty($value['horario'])? ($value['horario']):"";
					$local = !empty($value['local'])? ($value['local']):"";
					$situacao = $value['situacao'];

					echo'
					<tr>
						<td><img src="'.htmlspecialchars($caminhoFoto).'"  data-caption="'.htmlspecialchars($nome).'" class="circle materialboxed" width="35px" height="35px"></td>
						<td class="">'.htmlspecialchars($nome).'</td>

						<td class="">'.htmlspecialchars($frequencia).'</td>
						<td class="">'.htmlspecialchars($dia).'</td>
						<td class="">'.htmlspecialchars($horario).'</td>
						<td class="">'.htmlspecialchars($local).'</td>

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
