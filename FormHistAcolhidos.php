<?php 
$telaAcessada = "histAcolhidos";
$titulo = "Histórico de acolhidos";

include_once('include/header.php'); 
require_once('controll/Crud.class.php');

//Default da pagina
	$disable = "";// Default tudo habilitado
	$btnColor = "orange"; // Default tudo laranja
	$formPost ="insertAcolhidos.php";
	$telaRedirect="histAcolhidos.php";
	$table = 'hist_acolhidos';

	// Default todos os campos sem valor
	$id= "";
	$nome= "";
	$data_acolhimento= "";
	$origem= "";
	$data_nascimento= "";
	$nome_pai= "";
	$nome_mae= "";
	$data_desligamento= "";
	$destino= "";
	$info_diversas= "";

	$limpar = "Limpar";
	$salvar = "inserir";

$acao = isset($_GET['acao'])? $_GET['acao']:null;

$tela = "hist_acolhidos"; // Tela para liberar o acesso 
require_once('loghelper.php');//Permite o acesso ou não 


//EDITAR carrega dados no form
if ($acao == 'editar' || $acao == 'excluir'|| $acao == 'ver' ) 
{
	if (isset($_GET['id']) && is_numeric($_GET['id']) ) 
	{
		// LISTA USUARIO DO ID INFORMADO ↓
			$view = 'hist_acolhidos';
			$where = " id = ".$_GET['id'];
			$orderBy ="";
			$limit = "1";

			$crud = new Crud;
			$list = $crud->select($view,$where,$orderBy,$limit);
			$option = "";
			foreach ($list as $key => $value) 
				{
					$id= ($value['id']);
					$nome= ($value['nome']);
					$data_acolhimento= ($value['data_acolhimento']);
					$origem= ($value['origem']);
					$data_nascimento= ($value['data_nascimento']);
					$nome_pai= ($value['nome_pai']);
					$nome_mae= ($value['nome_mae']);
					$data_desligamento= ($value['data_desligamento']);
					$destino= ($value['destino']);
					$info_diversas= ($value['info_diversas']);
					
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
				Nome:<input type="text" <?php echo ' value="'.$nome.'" '.$disable; ?> name="nome" >
			</div>
			<div class="col s12 m4" >
				data_acolhimento:<input type="date" <?php echo ' value="'.$data_acolhimento.'" '.$disable; ?> name="data_acolhimento" >
			</div>
			<div class="col s12 m4" >
				data_desligamento:<input type="date" <?php echo ' value="'.$data_desligamento.'" '.$disable; ?> name="data_desligamento" >
			</div>
			<div class="col s12 m4" >
				data_nascimento:<input type="date" <?php echo ' value="'.$data_nascimento.'" '.$disable; ?> name="data_nascimento" >
			</div>
			<div class="col s12 m12" >
				origem:<input type="text" <?php echo ' value="'.$origem.'" '.$disable; ?> name="origem" >
			</div>
			<div class="col s12 m12" >
				nome_pai:<input type="text" <?php echo ' value="'.$nome_pai.'" '.$disable; ?> name="nome_pai" >
			</div>
			<div class="col s12 m12" >
				nome_mae:<input type="text" <?php echo ' value="'.$nome_mae.'" '.$disable; ?> name="nome_mae" >
			</div>
			<div class="col s12 m12" >
				destino:<input type="text" <?php echo ' value="'.$destino.'" '.$disable; ?> name="destino" >
			</div>
			<div class="col s12 m12" >
				info_diversas:<input type="text" <?php echo ' value="'.$info_diversas.'" '.$disable; ?> name="info_diversas" >
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



