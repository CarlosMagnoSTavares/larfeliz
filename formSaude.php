<?php 
$telaAcessada = "saude";
$titulo = "Saúde";

include_once('include/header.php'); 
require_once('controll/Crud.class.php');

//Default da pagina
	$table = "saude";
	$disable = "";// Default tudo habilitado
	$btnColor = "orange"; // Default tudo laranja
	$formPost ="insertSaude.php";
	$telaRedirect="saude.php";

	// Default todos os campos sem valor
	$id = "";
	$nome = "";
	$fk_id_pessoal = "";
	$option="";
	$anexo="";
	
	$tipo_consulta = "";
	$data_da_consulta = "";
	$data_do_retorno = "";
	$medicamentos = "";
	$exames = "";
	$observacoes_medicas = "";

	$limpar = "Limpar";
	$salvar = "inserir";

$acao = isset($_GET['acao'])? $_GET['acao']:null;


// lista os otions com as crianças e fotos 
require_once('optionKids.php'); 

//EDITAR carrega dados no form
if ($acao == 'editar' || $acao == 'excluir'|| $acao == 'ver' ) 
{
	if (isset($_GET['id']) && is_numeric($_GET['id']) ) 
	{
		// LISTA USUARIO DO ID INFORMADO ↓
			$view = 'vw_saude';
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
					$tipo_consulta = ($value['tipo_consulta']);
					$data_da_consulta = ($value['data_da_consulta']);
					$data_do_retorno = ($value['data_do_retorno']);
					$medicamentos = ($value['medicamentos']);
					$exames = ($value['exames']);
					$observacoes_medicas = ($value['observacoes_medicas']);
					$anexo = ($value['anexo']);

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
				*Tipo da consulta:
				<input type="text" <?php echo ' value="'.htmlspecialchars($tipo_consulta).'" '.htmlspecialchars($disable); ?> 
				name="tipo_consulta" required="true" >
			</div>
			<div class="col s12 m12" >
				*Data da consulta
				<input type="date" <?php echo ' value="'.htmlspecialchars($data_da_consulta).'" '.htmlspecialchars($disable); ?> 
				name="data_da_consulta" required="true" >
			</div>
			<div class="col s12 m6" >
				Data do retorno:
				<input type="date" <?php echo ' value="'.htmlspecialchars($data_do_retorno).'" '.htmlspecialchars($disable); ?> 
				name="data_do_retorno">
			</div>
			<div class="col s12 m6" >
				medicamentos:
				<input type="text" <?php echo ' value="'.htmlspecialchars($medicamentos).'" '.htmlspecialchars($disable); ?> 
				name="medicamentos">
			</div>
			<div class="col s12 m6" >
				Exames:
				<input type="text" <?php echo ' value="'.htmlspecialchars($exames).'" '.htmlspecialchars($disable); ?> 
				name="exames">
			</div>
			<div class="col s12 m6" >
				Obs Médicas:
				<textarea class="materialize-textarea" type="text" <?php echo ' value="'.htmlspecialchars($observacoes_medicas).'" '.htmlspecialchars($disable); ?> 
				name="observacoes_medicas"> <?php echo $observacoes_medicas ?> </textarea>
			</div>
			<div class="col s12 m6" >
			    <div class="file-field" >
			      <div class="btn <?php echo $btnColor; ?>" >
			        <span>anexo</span>
			        <input <?php echo  $disable; echo 'value="'.htmlspecialchars($anexo).'"'; ?> name="anexo" type="file" class="<?php echo $btnColor; ?>" accept="image/*"> <!--  VALUE="anexo.pdf" -->
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



