<?php 
$telaAcessada = "educacao";
$titulo = " Dados de Educação";

include_once('include/header.php'); 
require_once('controll/Crud.class.php');

//Config de cada pagina
$table = 'vw_educacao';
$formPost ="formEducacao.php";

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
		          <th><a href="?orderColumn=ano">Ano</a></th>
		          <th><a href="?orderColumn=tipo_escolaridade">Tipo escolaridade</a></th>
		          <th><a href="?orderColumn=escola">Escola</a></th>

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
					//Padrão para coletar Foto do usuário ↓
					$caminhoFoto = !empty(trim($value['caminho_foto']))? "documentos/".htmlspecialchars($value['caminho_foto']):"include/sem-foto.gif";
					$nome = !empty($value['nome'])? ($value['nome']):"";
					$id = $value['id'];


					$ano = !empty($value['ano'])? ($value['ano']) : " Desconhecido ";
					$tipo_escolaridade = !empty($value['tipo_escolaridade'])? ($value['tipo_escolaridade']):"";
					$escola = !empty($value['escola'])? ($value['escola']):"";
					$situacao = $value['situacao'];

					echo'
					<tr>
						<td><img src="'.htmlspecialchars($caminhoFoto).'"  data-caption="'.htmlspecialchars($nome).'" class="circle materialboxed" width="35px" height="35px"></td>
						<td class="">'.htmlspecialchars($nome).'</td>
						<td class="">'.htmlspecialchars($ano).'</td>
						<td class="">'.htmlspecialchars($tipo_escolaridade).'</td>
						<td class="">'.htmlspecialchars($escola).'</td>

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
