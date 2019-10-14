<?php 
$telaAcessada = "filiacao";
$titulo = "Filiação";

include_once('include/header.php'); 
require_once('controll/Crud.class.php');

//Config de cada pagina
$table = 'vw_filiacao';
$formPost ="formFiliacao.php";

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
		          <th><a href="?orderColumn=update_at">Foto Criança</a></th>
		          <th><a href="?orderColumn=nome">Nome Criança</a></th>
		          <th><a href="?orderColumn=nivel_parentesco">Parentesco</a></th>
		          <th><a href="?orderColumn=nome_parente">Nome do Parente</a></th>

		          <!-- Padrão nao alterar -->
		          <th><a href="?orderColumn=nome_parente">Ver</a></th>
		          <th><a href="?orderColumn=nome_parente">Editar</a></th>
		          <th><a href="?orderColumn=nome_parente">Excluir</a></th>
		          <!-- Padrão nao alterar fim -->
		      </tr>
		    </thead>
			<tbody>
				<?php
				$crud = new Crud;
				$list = $crud->select($table,$where,$orderBy,$limit);

				foreach ($list as $key => $value)
				{ 
					$nome = !empty($value['nome'])? ($value['nome']):"";
					$nome_parente = !empty($value['nome_parente'])? ($value['nome_parente']):"";
					$caminhoFoto = !empty(trim($value['caminho_foto']))? "documentos/".$value['caminho_foto']:"include/sem-foto.gif";
					$nivel_parentesco = !empty($value['nivel_parentesco'])? ($value['nivel_parentesco']) : " Desconhecido ";
					$idFiliacao = $value['id'];

					echo'
					<tr>
						<td><img src="'.$caminhoFoto.'"  data-caption="'.$nome.'" class="circle materialboxed" width="35px" height="35px"></td>
						<td class="">'.$nome.'</td>
						<td class="">'.$nivel_parentesco.'</td>
						<td class="">'.$nome_parente.'</td>

						<!-- Padrão nao alterar -->
							<td><a href="'.$formPost.'?acao=ver&id='.$idFiliacao.'" class="btn btn-small green">Ver</a></td>
							<td><a href="'.$formPost.'?acao=editar&id='.$idFiliacao.'" class="btn btn-small orange">Editar</a></td>
							<td><a href="'.$formPost.'?acao=excluir&id='.$idFiliacao.'" class="btn btn-small red">Excluir</a></td>
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



