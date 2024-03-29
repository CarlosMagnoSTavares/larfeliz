<?php 
$telaAcessada = "filiacao";
$titulo = "Filiação";

include_once('include/header.php'); 
require_once('controll/Crud.class.php');



//Default da pagina
	$disable = "";// Default tudo habilitado
	$btnColor = "orange"; // Default tudo laranja
	$formPost ="insertFiliacao.php";
	$telaRedirect="filiacao.php";

	// Default todos os campos sem valor
	$table= "filiacao";
	$id = "";
	$nome = "";
	$fk_id_pessoal = "";
	$nivel_parentesco = "";
	$nome_parente = "";
	$endereco = "";
	$telefone = "";
	$atividade_profissional = "";
	$dinamica_familiar_obs = "";
	$option="";

	$limpar = "Limpar";
	$salvar = "inserir";

$acao = isset($_GET['acao'])? $_GET['acao']:null;

$tela = "filiacao"; // Tela para liberar o acesso 
require_once('loghelper.php');//Permite o acesso ou não 

// lista os otions com as crianças e fotos 
require_once('optionKids.php'); 

//EDITAR carrega dados no form
if ($acao == 'editar' || $acao == 'excluir'|| $acao == 'ver' ) 
{
	if (isset($_GET['id']) && is_numeric($_GET['id']) ) 
	{
		// LISTA USUARIO DO ID INFORMADO ↓
			$view = 'vw_filiacao';
			$where = " id = ".htmlspecialchars($_GET['id']);
			$orderBy ="";
			$limit = "1";

			$crud = new Crud;
			$list = $crud->select($view,$where,$orderBy,$limit);
			$option = "";
			foreach ($list as $key => $value) 
				{
					$caminhoFoto = !empty(trim($value['caminho_foto']))? 
					"documentos/".htmlspecialchars($value['caminho_foto']):"include/sem-foto.gif";
					$nome = ($value['nome']);
					$id = ($value['id']);
					$fk_id_pessoal = ($value['fk_id_pessoal']);
					$nivel_parentesco = ($value['nivel_parentesco']);
					$nome_parente = ($value['nome_parente']);
					$endereco = ($value['endereco']);
					$telefone = ($value['telefone']);
					$atividade_profissional = ($value['atividade_profissional']);
					$dinamica_familiar_obs = ($value['dinamica_familiar_obs']);
					$limpar = "Limpar";
					$salvar = "editar";
					$option .= '<option data-icon="'.htmlspecialchars($caminhoFoto).'" value="'.htmlspecialchars($fk_id_pessoal).'" selected>'.htmlspecialchars($nome).'</option>';
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
				<lbl>Nome da criança</lbl>
				<select <?php echo  $disable; ?> name="fk_id_pessoal" >
					<?php echo $option; ?>
				</select>
				<label>Nome da criança</label>
			</div>
			<div class="col s12 m12" >
				*Parentesco:<input placeholder="Ex: Pai,Mãe,Primo..." type="text" <?php echo ' value="'.htmlspecialchars($nivel_parentesco).'" '.htmlspecialchars($disable); ?> 
				name="nivel_parentesco" required="true" >
			</div>
			<div class="col s12 m12" >
				*Nome do parente:<input type="text" <?php echo ' value="'.htmlspecialchars($nome_parente).'" '.htmlspecialchars($disable); ?> 
				name="nome_parente" required="true" >
			</div>
			<div class="col s12 m6" >
				Endereço:<input type="text" <?php echo ' value="'.htmlspecialchars($endereco).'" '.htmlspecialchars($disable); ?> 
				name="endereco">
			</div>
			<div class="col s12 m6" >
				Telefone:<input type="text" <?php echo ' value="'.htmlspecialchars($telefone).'" '.htmlspecialchars($disable); ?> 
				name="telefone">
			</div>
			<div class="col s12 m6" >
				Atividade profissional:<input type="text" <?php echo ' value="'.htmlspecialchars($atividade_profissional).'" '.htmlspecialchars($disable); ?> 
				name="atividade_profissional">
			</div>
			<div class="col s12 m6" >
				Dinamica familiar obs:<textarea class="materialize-textarea" type="text" <?php echo ' value="'.htmlspecialchars($dinamica_familiar_obs).'" '.htmlspecialchars($disable); ?> 
				name="dinamica_familiar_obs"> <?php echo $dinamica_familiar_obs ?> </textarea>
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



