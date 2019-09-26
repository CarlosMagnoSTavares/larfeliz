<?php 
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
					$caminhoFoto = !empty(trim($value['caminho_foto']))? "documentos/".$value['caminho_foto']:"include/sem-foto.gif";
					$nome = !empty($value['nome'])? ($value['nome']):"";

					$frequencia = !empty($value['frequencia'])? ($value['frequencia']) : " Desconhecido ";
					$dia = !empty($value['dia'])? ($value['dia']):"";
					$horario = !empty($value['horario'])? ($value['horario']):"";
					$local = !empty($value['local'])? ($value['local']):"";

					echo'
					<tr>
						<td><img src="'.$caminhoFoto.'"  data-caption="'.$nome.'" class="circle materialboxed" width="35px" height="35px"></td>
						<td class="">'.$nome.'</td>

						<td class="">'.$frequencia.'</td>
						<td class="">'.$dia.'</td>
						<td class="">'.$horario.'</td>
						<td class="">'.$local.'</td>

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
