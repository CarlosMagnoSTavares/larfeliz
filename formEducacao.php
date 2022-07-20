<?php 
$telaAcessada = "educacao";
$titulo = "Educação";

include_once('include/header.php'); 
require_once('controll/Crud.class.php');

//Default da pagina
	$table = "educacao";
	$view = 'vw_educacao';
	$disable = "";// Default tudo habilitado
	$btnColor = "orange"; // Default tudo laranja
	$formPost ="insertEducacao.php";
	$telaRedirect="educacao.php";

	// Default todos os campos sem valor
	$id = "";
	$nome = "";
	$fk_id_pessoal = "";
	$option="";
	$anexo_rel_prim_semestre="";
	$anexo_rel_segun_semestre="";
	

	$ano = "";
	$tipo_escolaridade = "";
	$escola = "";
	$nome_pessoa_contato = "";
	$numero_tel = "";
	$numero_cel = "";

	$limpar = "Limpar";
	$salvar = "inserir";

$acao = isset($_GET['acao'])? $_GET['acao']:null;

$tela = "educacao"; // Tela para liberar o acesso 
require_once('loghelper.php');//Permite o acesso ou não 

// lista os otions com as crianças e fotos 
require_once('optionKids.php'); 

//EDITAR carrega dados no form
if ($acao == 'editar' || $acao == 'excluir'|| $acao == 'ver' ) 
{
	if (isset($_GET['id']) && is_numeric($_GET['id']) ) 
	{
		// LISTA USUARIO DO ID INFORMADO ↓
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
					$ano = ($value['ano']);
					$tipo_escolaridade = ($value['tipo_escolaridade']);
					$escola = ($value['escola']);
					$nome_pessoa_contato = ($value['nome_pessoa_contato']);
					$numero_tel = ($value['numero_tel']);
					$numero_cel = ($value['numero_cel']);
					$anexo_rel_prim_semestre = ($value['anexo_rel_prim_semestre']);
					$anexo_rel_segun_semestre = ($value['anexo_rel_segun_semestre']);

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
				*Ano do curso:
				<input type="text" <?php echo ' value="'.htmlspecialchars($ano).'" '.htmlspecialchars($disable); ?> 
				name="ano" required="true" >
			</div>
			<div class="col s12 m12" >
				*Tipo escolaridade
				<input type="text" <?php echo ' value="'.htmlspecialchars($tipo_escolaridade).'" '.htmlspecialchars($disable); ?> 
				name="tipo_escolaridade" required="true" >
			</div>
			<div class="col s12 m6" >
				Escola:
				<input type="text" <?php echo ' value="'.htmlspecialchars($escola).'" '.htmlspecialchars($disable); ?> 
				name="escola">
			</div>
			<div class="col s12 m6" >
				Nome do contato:
				<input type="text" <?php echo ' value="'.htmlspecialchars($nome_pessoa_contato).'" '.htmlspecialchars($disable); ?> 
				name="nome_pessoa_contato">
			</div>
			<div class="col s12 m6" >
				Tel:
				<input type="text" <?php echo ' value="'.htmlspecialchars($numero_tel).'" '.htmlspecialchars($disable); ?> 
				name="numero_tel">
			</div>
			<div class="col s12 m6" >
				Cel:
				<textarea class="materialize-textarea" type="text" <?php echo ' value="'.htmlspecialchars($numero_cel).'" '.htmlspecialchars($disable); ?> 
				name="numero_cel"> <?php echo $numero_cel ?> </textarea>
			</div>
			<div class="col s12 m6" >
			    <div class="file-field" >
			      <div class="btn <?php echo $btnColor; ?>" >
			        <span>Anexo relatório prim. semestre</span>
			        <input <?php echo  $disable; echo 'value="'.htmlspecialchars($anexo_rel_prim_semestre).'"'; ?> name="anexo_rel_prim_semestre" type="file" class="<?php echo $btnColor; ?>" accept="image/*"> <!--  VALUE="anexo_rel_prim_semestre.pdf" -->
			      </div>
			      <div class="file-path-wrapper" >
			        <input class="file-path validate" type="text" value="<?php echo $anexo_rel_prim_semestre; ?>" >
			      </div>
			    </div>
			 <a target="_blank" <?php echo 'href="documentos/'.htmlspecialchars($anexo_rel_prim_semestre).'"';?>>  Download: <?php echo $anexo_rel_prim_semestre; ?> </a>   
			</div>

			<div class="col s12 m6" >
			    <div class="file-field" >
			      <div class="btn <?php echo $btnColor; ?>" >
			        <span>Anexo relatório segun. semestre</span>
			        <input <?php echo  $disable; echo 'value="'.htmlspecialchars($anexo_rel_segun_semestre).'"'; ?> name="anexo_rel_segun_semestre" type="file" class="<?php echo $btnColor; ?>" accept="image/*"> <!--  VALUE="anexo_rel_segun_semestre.pdf" -->
			      </div>
			      <div class="file-path-wrapper" >
			        <input class="file-path validate" type="text" value="<?php echo $anexo_rel_segun_semestre; ?>" >
			      </div>
			    </div>
			 <a target="_blank" <?php echo 'href="documentos/'.htmlspecialchars($anexo_rel_segun_semestre).'"';?>>  Download: <?php echo $anexo_rel_segun_semestre; ?> </a>   
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



