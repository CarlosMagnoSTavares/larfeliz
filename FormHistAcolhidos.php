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
	$anexo="";

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
			$where = " id = ".htmlspecialchars($_GET['id']);
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
					$anexo= ($value['anexo']);
					
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
				Nome:<input type="text" <?php echo ' value="'.htmlspecialchars($nome).'" '.htmlspecialchars($disable); ?> name="nome" >
			</div>
			<div class="col s12 m4" >
				data_acolhimento:<input type="date" <?php echo ' value="'.htmlspecialchars($data_acolhimento).'" '.htmlspecialchars($disable); ?> name="data_acolhimento" >
			</div>
			<div class="col s12 m4" >
				data_desligamento:<input type="date" <?php echo ' value="'.htmlspecialchars($data_desligamento).'" '.htmlspecialchars($disable); ?> name="data_desligamento" >
			</div>
			<div class="col s12 m4" >
				data_nascimento:<input type="date" <?php echo ' value="'.htmlspecialchars($data_nascimento).'" '.htmlspecialchars($disable); ?> name="data_nascimento" >
			</div>
			<div class="col s12 m12" >
				origem:<input type="text" <?php echo ' value="'.htmlspecialchars($origem).'" '.htmlspecialchars($disable); ?> name="origem" >
			</div>
			<div class="col s12 m12" >
				nome_pai:<input type="text" <?php echo ' value="'.htmlspecialchars($nome_pai).'" '.htmlspecialchars($disable); ?> name="nome_pai" >
			</div>
			<div class="col s12 m12" >
				nome_mae:<input type="text" <?php echo ' value="'.htmlspecialchars($nome_mae).'" '.htmlspecialchars($disable); ?> name="nome_mae" >
			</div>
			<div class="col s12 m12" >
				destino:<input type="text" <?php echo ' value="'.htmlspecialchars($destino).'" '.htmlspecialchars($disable); ?> name="destino" >
			</div>
			<div class="col s12 m12" >
				info_diversas:<input type="text" <?php echo ' value="'.htmlspecialchars($info_diversas).'" '.htmlspecialchars($disable); ?> name="info_diversas" >
			</div>
			<div class="col s12 m6" >
			    <div class="file-field" >
			      <div class="btn <?php echo $btnColor; ?>" >
			        <span>anexo</span>
			        <input <?php echo  $disable; echo 'value="'.htmlspecialchars($anexo).'"'; ?> name="anexo" type="file" class="<?php echo $btnColor; ?>"> 
			      </div>
			      <div class="file-path-wrapper" >
			        <input class="file-path validate" type="text" value="<?php echo $anexo; ?>" >
			      </div>
			    </div>
			 <a target="_blank" <?php echo 'href="documentos/'.htmlspecialchars($anexo).'"';?>>  Download: <?php echo $anexo; ?> </a>   
			</div>
			
			
			
			
		</div>
	</div>

	<div class="row" >
		<div class="col s12 m12 right-align" >
			<input type="reset" class="btn btn-large red" <?php echo ' value="'.htmlspecialchars($limpar).'" '.htmlspecialchars($disable); ?> name="limpar"  >
			<input type="submit" class="btn btn-large orange" <?php echo ' value="'.htmlspecialchars($salvar).'" '.htmlspecialchars($disable); ?> name="salvar"  >
		</div>
	</div>

</form>

<?php include_once('include/footer.php'); ?>



