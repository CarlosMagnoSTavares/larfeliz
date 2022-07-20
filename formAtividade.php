<?php 
$telaAcessada = "atividade";
$titulo = "Atividade";

include_once('include/header.php'); 
require_once('controll/Crud.class.php');

//Default da pagina
	$disable = "";// Default tudo habilitado
	$btnColor = "orange"; // Default tudo laranja
	$formPost ="insertAtividade.php";
	$telaRedirect="atividades.php";
	$table = 'atividade';

	// Default todos os campos sem valor
	$id = "";
	$nome = "";
	$fk_id_pessoal = "";
	$option="";


	$frequencia = "";
	$dia = "";
	$horario = "";
	$local = "";


	$limpar = "Limpar";
	$salvar = "inserir";

$acao = isset($_GET['acao'])? $_GET['acao']:null;

$tela = "atividade"; // Tela para liberar o acesso 
require_once('loghelper.php');//Permite o acesso ou não 

// lista os otions com as crianças e fotos 
require_once('optionKids.php'); 

//EDITAR carrega dados no form
if ($acao == 'editar' || $acao == 'excluir'|| $acao == 'ver' ) 
{
	if (isset($_GET['id']) && is_numeric($_GET['id']) ) 
	{
		// LISTA USUARIO DO ID INFORMADO ↓
			$view = 'vw_atividade';
			$where = " id = ".htmlspecialchars($_GET['id']);
			$orderBy ="";
			$limit = "1";

			$crud = new Crud;
			$list = $crud->select($view,$where,$orderBy,$limit);
			$option = "";
			foreach ($list as $key => $value) 
				{
					$caminhoFoto = !empty(trim($value['caminho_foto']))? 
					"documentos/".htmlspecialchars($value['caminho_foto']):"include/sem-foto.gif");
					$nome = ($value['nome']);
					$id = ($value['id']);
					$fk_id_pessoal = ($value['fk_id_pessoal']);

					$frequencia = ($value['frequencia']);
					$dia = ($value['dia']);
					$horario = ($value['horario']);
					$local = ($value['local']);
					
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
				*Tipo e frequencia:<input type="text" <?php echo ' value="'.htmlspecialchars($frequencia).'" '.htmlspecialchars($disable); ?> 
				name="frequencia" required="true" >
			</div>
			<div class="col s12 m12" >
				*Dia(s):<input type="text" <?php echo ' value="'.htmlspecialchars($dia).'" '.htmlspecialchars($disable); ?> 
				name="dia" required="true" >
			</div>
			<div class="col s12 m6" >
				Horario:<input type="text" <?php echo ' value="'.htmlspecialchars($horario).'" '.htmlspecialchars($disable); ?> 
				name="horario">
			</div>
			<div class="col s12 m6" >
				Local:<input type="text" <?php echo ' value="'.htmlspecialchars($local).'" '.htmlspecialchars($disable); ?> 
				name="local">
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



