<?php 
$telaAcessada = "admin";
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

<form action="controll/<?php echo htmlspecialchars($formPost); ?>" method="POST" enctype="multipart/form-data" >
<input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
	<div class="" >
		<div class="row" >
			
			<div class="col s12 m12" >
				*Nome:<input type="text" <?php echo ' value="'.htmlspecialchars($nome).'" '.htmlspecialchars($disable); ?> 
				name="nome" required="true" >
			</div>
			<div class="col s12 m12" >
				*email:<input type="text" <?php echo ' value="'.htmlspecialchars($email).'" '.htmlspecialchars($disable); ?> 
				name="email" required="true" >
			</div>
			<div class="col s12 m12" >
				*senha:<input type="text" <?php echo ' value="'.htmlspecialchars($senha).'" '.htmlspecialchars($disable); ?> 
				name="senha" required="true" >
			</div>

			<div class="col s12 m12" >
				<lbl>Tipo acesso</lbl>
				<select  name="tipo_acesso" <?php echo ' value="'.htmlspecialchars($tipo_acesso).'" '.htmlspecialchars($disable); ?> required="true"  >
					<option <?php echo ' value="'.htmlspecialchars($tipo_acesso).'" '; ?>  selected="true"><?php echo htmlspecialchars($tipo_acesso); ?> </option>
					<option value="EDUCADOR">EDUCADOR</option>
					<option value="EQUIPE">EQUIPE</option>
					<option value="ADMIN">ADMIN</option>
				</select>
			</div>
			
		</div>
	</div>
	<label>Obs: educadores tem acesso somente a: <b> Dados pessoais, Saúde, Educacao e Atividade </b></label>

	<div class="row" >
		<div class="col s12 m12 right-align" >
			<input type="reset" class="btn btn-large red" <?php echo ' value="'.htmlspecialchars($limpar).'" '.htmlspecialchars($disable); ?> name="limpar"  >
			<input type="submit" class="btn btn-large orange" <?php echo ' value="'.htmlspecialchars($salvar).'" '.htmlspecialchars($disable); ?> name="salvar"  >
		</div>
	</div>

</form>

<?php include_once('include/footer.php'); ?>



