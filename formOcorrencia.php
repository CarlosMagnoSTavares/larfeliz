<?php 
$telaAcessada = "ocorrencia";
$titulo = "Ocorrências";

include_once('include/header.php'); 
require_once('controll/Crud.class.php');

//Default da pagina
	$table = "ocorrencia";
	$view = 'vw_ocorrencia';
	$disable = "";// Default tudo habilitado
	$btnColor = "orange"; // Default tudo laranja
	$formPost ="insertOcorrencia.php";
	$telaRedirect="ocorrencias.php";

	// Default todos os campos sem valor
	$id = "";
	$nome = "";
	$fk_id_pessoal = "";
	$option="";
	$anexo_bo="";


	$tipo = "";
	$data = "";
	$fato = "";
	$descricao_obs = "";
	$exames = "";
	$observacoes_medicas = "";

	$limpar = "Limpar";
	$salvar = "inserir";

$acao = isset($_GET['acao'])? $_GET['acao']:null;

$tela = "ocorrencia"; // Tela para liberar o acesso 
require_once('loghelper.php');//Permite o acesso ou não 

// lista os otions com as crianças e fotos 
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
					$caminhoFoto = !empty(trim($value['caminho_foto']))? 
					"documentos/".$value['caminho_foto']:"include/sem-foto.gif";
					$nome = ($value['nome']);
					$id = ($value['id']);
					$fk_id_pessoal = ($value['fk_id_pessoal']);
					$tipo = ($value['tipo']);
					$data = ($value['data']);
					$fato = ($value['fato']);
					$descricao_obs = ($value['descricao_obs']);
					$anexo_bo = ($value['anexo_bo']);

					$limpar = "Limpar";
					$salvar = "editar";
					$option .= '<option data-icon="'.$caminhoFoto.'" value="'.$fk_id_pessoal.'" selected>'.$nome.'</option>';
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
				*Tipo:
				<input type="text" <?php echo ' value="'.$tipo.'" '.$disable; ?> 
				name="tipo" required="true" >
			</div>
			<div class="col s12 m12" >
				*Data da ocorrencia
				<input type="date" <?php echo ' value="'.$data.'" '.$disable; ?> 
				name="data" required="true" >
			</div>
			<div class="col s12 m6" >
				Fato:
				<input type="text" <?php echo ' value="'.$fato.'" '.$disable; ?> 
				name="fato">
			</div>
			<div class="col s12 m6" >
				Observações:
				<input type="text" <?php echo ' value="'.$descricao_obs.'" '.$disable; ?> 
				name="descricao_obs">
			</div>
			<div class="col s12 m6" >
			    <div class="file-field" >
			      <div class="btn <?php echo $btnColor; ?>" >
			        <span>Boletim de ocorrencia</span>
			        <input <?php echo  $disable; echo 'value="'.$anexo_bo.'"'; ?> name="anexo_bo" type="file" class="<?php echo $btnColor; ?>" accept="image/*"> <!--  VALUE="anexo_bo.pdf" -->
			      </div>
			      <div class="file-path-wrapper" >
			        <input class="file-path validate" type="text" value="<?php echo $anexo_bo; ?>" >
			      </div>
			    </div>
			 <a target="_blank" <?php echo 'href="documentos/'.$anexo_bo.'"';?>>  Download: <?php echo $anexo_bo; ?> </a>   
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



