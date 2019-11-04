<?php 
$titulo = "Admin";
$telaAcessada = "admin";
include_once('include/header.php'); 
require_once('controll/Crud.class.php');

//Config de cada pagina
$table = 'admin';
$formPost ="formAdmin.php";

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
		          <th><a href="?orderColumn=nome">Nome</a></th>
		          <th><a href="?orderColumn=email">E-mail</a></th>
		          <!-- <th><a href="?orderColumn=senha">Senha</a></th> -->
		          <!-- <th><a href="?orderColumn=tipo_acesso">Tipo acesso</a></th> -->
		          <th><a href="?orderColumn=update_at">Atualizado em</a></th>

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
					$id = !empty($value['id'])? ($value['id']):"";
					$nome = !empty($value['nome'])? ($value['nome']):"";
					$email = !empty($value['email'])? ($value['email']):"";
					// $senha = !empty($value['senha'])? ($value['senha']):"";
					// $tipo_acesso = !empty($value['tipo_acesso'])? ($value['tipo_acesso']):"";
					$update_at = !empty($value['update_at'])? ($value['update_at']):"";

					echo'
					<tr>
						
						<td class="">'.$nome.'</td>
						<td class="">'.$email.'</td>
						<td class="">'.date("d/m/Y H:i:s", strtotime($update_at)).'</td>


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
