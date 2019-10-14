<?php 

$titulo = "Admin";

include_once('include/header.php'); 
require_once('controll/Crud.class.php');

//Default da pagina
	$disable = "";// Default tudo habilitado
	$btnColor = "orange"; // Default tudo laranja
	$formPost ="insertAdmin.php";
	$telaRedirect="admin.php";
	$table = 'admin';

	// Default todos os campos sem valor
	$id = "";
	$nome = "";
	$email = "";
	$senha = "";
	$tipo_acesso = "";

	$limpar = "Limpar";
	$salvar = "inserir";

$acao = isset($_GET['acao'])? $_GET['acao']:null;

$tela = "admin"; // Tela para liberar o acesso 
require_once('loghelper.php');//Permite o acesso ou não 


//EDITAR carrega dados no form
if ($acao == 'editar' || $acao == 'excluir'|| $acao == 'ver' ) 
{
	if (isset($_GET['id']) && is_numeric($_GET['id']) ) 
	{
		// LISTA USUARIO DO ID INFORMADO ↓
			$view = 'admin';
			$where = " id = ".$_GET['id'];
			$orderBy ="";
			$limit = "1";

			$crud = new Crud;
			$list = $crud->select($view,$where,$orderBy,$limit);
			$option = "";
			foreach ($list as $key => $value) 
				{

					$id = ($value['id']);
					$nome = ($value['nome']);
					$email = ($value['email']);
					$senha = ($value['senha']);
					$tipo_acesso = ($value['tipo_acesso']);
					
					$limpar = "Limpar";
					$salvar = "editar";
				}
	} 	
} 

require_once('delete.php');

?>

<form action="controll/<?php echo $formPost; ?>" method="POST" enctype="multipart/form-data" >
<input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="" >
		<div class="row" >
			
			<div class="col s12 m12" >
				*Nome:<input type="text" <?php echo ' value="'.$nome.'" '.$disable; ?> 
				name="nome" required="true" >
			</div>
			<div class="col s12 m12" >
				*email:<input type="text" <?php echo ' value="'.$email.'" '.$disable; ?> 
				name="email" required="true" >
			</div>
			<div class="col s12 m12" >
				*senha:<input type="text" <?php echo ' value="'.$senha.'" '.$disable; ?> 
				name="senha" required="true" >
			</div>
			<div class="col s12 m12" >
				*tipo_acesso:<input type="text" <?php echo ' value="'.$tipo_acesso.'" '.$disable; ?> 
				name="tipo_acesso" required="true" >
			</div>
			
		</div>
	</div>


	<div class="row" >
		<div class="col s12 m12 right-align" >
			<input type="reset" class="btn btn-large red" <?php echo ' value="'.$limpar.'" '.$disable; ?> name="limpar"  >
			<input type="submit" class="btn btn-large orange" <?php echo ' value="'.$salvar.'" '.$disable; ?> name="salvar"  >
		</div>
	</div>
</form>

<?php include_once('include/footer.php'); ?>



