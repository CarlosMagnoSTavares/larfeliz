<?php 
$telaAcessada = "registro_tecnico";
$titulo = "Registro tecnico";

include_once('include/header.php'); 
require_once('controll/Crud.class.php');




//Default da pagina
	$table = "registro_tecnico";
	$view = 'vw_registro_tecnico';
	$disable = "";// Default tudo habilitado
	$btnColor = "orange"; // Default tudo laranja
	$formPost ="insertRegistroTecnico.php";
	$telaRedirect="registroTecnico.php";

	// Default todos os campos sem valor
	$id = "";
	$nome = "";
	$fk_id_pessoal = "";
	$fk_id_filiacao_visita = "";
	$option="";
	// $anexo_bo="";

	$visita_domiciliar = "";
	$data_audiencia = "";
	$informacoes_sobre_visita = "";
	$audiencia_declaracao_obs = "";
	$data_visita_familiar = "";

	$limpar = "Limpar";
	$salvar = "inserir";

$acao = isset($_GET['acao'])? $_GET['acao']:null;

$tela = "registroTecnico"; // Tela para liberar o acesso 
require_once('loghelper.php');//Permite o acesso ou não 

// lista os otions com as crianças e fotos 
$optionList = "filiacao";
require_once('optionKids.php'); 

//EDITAR carrega dados no form
if ($acao == 'editar' || $acao == 'excluir'|| $acao == 'ver' ) 
{
	if (isset($_GET['id']) && is_numeric($_GET['id']) ) 
	{
		// LISTA USUARIO DO ID INFORMADO ↓
			$where = " id = ".$_GET['id'];
			$orderBy ="";
			$limit = "1";

			$crud = new Crud;
			$list = $crud->select($view,$where,$orderBy,$limit);
			$option = "";
			foreach ($list as $key => $value) 
				{
					$id = ($value['id']);
					$caminhoFoto = !empty(trim($value['caminho_foto']))? 
					"documentos/".$value['caminho_foto']:"include/sem-foto.gif";
					$nome = ($value['nome']);
					$nome_parente = ($value['nome_parente']);
					$nivel_parentesco = ($value['nivel_parentesco']);
					$fk_id_pessoal = ($value['fk_id_pessoal']);
					$fk_id_filiacao_visita = ($value['fk_id_filiacao_visita']);
					$visita_domiciliar = ($value['visita_domiciliar']);

					$informacoes_sobre_visita = ($value['informacoes_sobre_visita']);
					$data_audiencia = ($value['data_audiencia']);
					$audiencia_declaracao_obs = ($value['audiencia_declaracao_obs']);
					$data_visita_familiar = ($value['data_visita_familiar']);
					

					$limpar = "Limpar";
					$salvar = "editar";
					$option .= '<option data-icon="'.$caminhoFoto.'" value="'.$fk_id_filiacao_visita.'" selected>'.$nome.'</option>';
					// $option_parente .= '<option data-icon="" value="'.$fk_id_filiacao_visita.'" selected>'.$nome_parente.'</option>';
				}
	} 	
} 

require_once('delete.php');
?>

<!-- 	
	// fk_id_pessoal

	// fk_id_filiacao_visita
	// visita_domiciliar
	// informacoes_sobre_visita
	// data_audiencia
	// data_visita_familiar 
	// audiencia_declaracao_obs
-->

<form action="controll/<?php echo $formPost; ?>" method="POST" enctype="multipart/form-data" >
<input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="" >
		<div class="row" >
			<div class="col s12 m12" >
				<lbl>Nome da filiação</lbl>
				<select <?php echo  $disable; ?> name="fk_id_filiacao_visita" required="true">
					<?php echo $option; ?>
				</select>
				<label>Nome da filiação</label>
			</div>

			<div class="col s12 m12" >
				*Visita domiciliar:
				<input type="text" <?php echo ' value="'.$visita_domiciliar.'" '.$disable; ?> 
				name="visita_domiciliar" required="true" >
			</div>

			<div class="col s12 m12" >
				*Informacoes sobre visita:
				<input type="text" <?php echo ' value="'.$informacoes_sobre_visita.'" '.$disable; ?> 
				name="informacoes_sobre_visita" required="true" >
			</div>


			<div class="col s6 m6" >
				*Data audiencia:
				<input type="date" <?php echo ' value="'.$data_audiencia.'" '.$disable; ?> 
				name="data_audiencia" >
			</div>

			<div class="col s6 m6" >
				*Data visita familiar:
				<input type="date" <?php echo ' value="'.$data_visita_familiar.'" '.$disable; ?> 
				name="data_visita_familiar" required="true" >
			</div>

			<div class="col s12 m12" >
				*Audiencia declaracao obs:
				<input type="text" <?php echo ' value="'.$audiencia_declaracao_obs.'" '.$disable; ?> 
				name="audiencia_declaracao_obs">
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



