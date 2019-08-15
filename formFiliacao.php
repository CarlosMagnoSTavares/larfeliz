<?php 
include_once('include/header.php'); 
require_once('controll/Crud.class.php');



//Default da pagina
	$disable = "";// Default tudo habilitado
	$btnColor = "orange"; // Default tudo laranja
	$formPost ="insertFiliacao.php";
	$telaRedirect="filiacao.php";

	// Default todos os campos sem valor
	$id = "";
	$nome = "";
	$fk_id_pessoal = "";
	$nivel_parentesco = "";
	$nome_parente = "";
	$Endereco = "";
	$telefone = "";
	$atividade_profissional = "";
	$dinamica_familiar_obs = "";
	$option="";

	$limpar = "Limpar";
	$salvar = "inserir";

$acao = isset($_GET['acao'])? $_GET['acao']:null;


//LISTAR CRIANCAS (DADOS_PESOAIS)
	$table = 'dados_pessoais';
	$orderBy ="nome";
	$crud = new Crud;
	$list = $crud->select($table,NULL,$orderBy,NULL);

	foreach ($list as $key => $value) 
	{
		$caminhoFoto = !empty(trim($value['caminho_foto']))? 
		"documentos/".$value['caminho_foto']:"include/sem-foto.gif";
		$nome = ($value['nome']);
		$id = ($value['id']);
		$option .= '<option data-icon="'.$caminhoFoto.'" value="'.$id.'">'.$nome.'</option>';
		
	}

//EDITAR
if ($acao == 'editar' || $acao == 'excluir'|| $acao == 'ver' ) 
{
	if (isset($_GET['id']) && is_numeric($_GET['id']) ) 
	{
		// LISTA USUARIO DO ID INFORMADO ↓
			$table = 'vw_filiacao';
			$where = " id = ".$_GET['id'];
			$orderBy ="";
			$limit = "1";

			$crud = new Crud;
			$list = $crud->select($table,$where,$orderBy,$limit);
			$option = "";
			foreach ($list as $key => $value) 
				{
					$caminhoFoto = !empty(trim($value['caminho_foto']))? 
					"documentos/".$value['caminho_foto']:"include/sem-foto.gif";
					$nome = ($value['nome']);
					$id = ($value['id']);
					$fk_id_pessoal = ($value['fk_id_pessoal']);
					$nivel_parentesco = ($value['nivel_parentesco']);
					$nome_parente = ($value['nome_parente']);
					$Endereco = ($value['Endereco']);
					$telefone = ($value['telefone']);
					$atividade_profissional = ($value['atividade_profissional']);
					$dinamica_familiar_obs = ($value['dinamica_familiar_obs']);
					$limpar = "Limpar";
					$salvar = "editar";
					$option .= '<option data-icon="'.$caminhoFoto.'" value="'.$fk_id_pessoal.'" selected>'.$nome.'</option>';
				}
	} 	
} 

//EXCLUIR
if (isset($acao)) 
{
	$disable = ($acao=='excluir' || $acao=='ver')? 'disabled="true"':NULL; //Desabilita os botões 
	$btnColor = ($acao=='excluir' || $acao=='ver')? 'grey':"orange"; // Muda cor dos botoes para desabilitado
	if ($acao=='excluir') {
		echo '
		<form method="POST" action="controll/delete.php">
			<div class="row" >
				<div class="col s12 m12 center-align" >
					<input type="hidden" name="id" value="'.$id.'">
					<input type="hidden" name="telaRedirect" value="'.$telaRedirect.'">
					<input type="hidden" name="table" value="'.$table.'">
					<p>Você deseja excluir os dados abaixo?</p>
					<input type="button" class="btn btn-small green" value="VOLTAR"  onClick="history.go(-1)">
					<input type="submit" class="btn btn-small red" value="DELETAR REGISTRO"  >
				</div>
			</div>
		</form>
		';
	}
}
?>

<form action="controll/<?php echo $formPost; ?>" method="POST" enctype="multipart/form-data" >
<input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="" >
		<div class="row" >
			<div class="col s12 m12" >
				<select <?php echo  $disable; ?> name="fk_id_pessoal" >
					<?php echo $option; ?>
				</select>
				<label>Nome da criança</label>
			</div>
			<div class="col s12 m12" >
				*Parentesco:<input placeholder="Ex: Pai,Mãe,Primo..." type="text" <?php echo ' value="'.$nivel_parentesco.'" '.$disable; ?> 
				name="nivel_parentesco" required="true" >
			</div>
			<div class="col s12 m12" >
				*Nome do parente:<input type="text" <?php echo ' value="'.$nome_parente.'" '.$disable; ?> 
				name="nome_parente" required="true" >
			</div>
			<div class="col s12 m6" >
				Endereço:<input type="text" <?php echo ' value="'.$Endereco.'" '.$disable; ?> 
				name="Endereco">
			</div>
			<div class="col s12 m6" >
				Telefone:<input type="text" <?php echo ' value="'.$telefone.'" '.$disable; ?> 
				name="telefone">
			</div>
			<div class="col s12 m6" >
				Atividade profissional:<input type="text" <?php echo ' value="'.$atividade_profissional.'" '.$disable; ?> 
				name="atividade_profissional">
			</div>
			<div class="col s12 m6" >
				Dinamica familiar obs:<textarea class="materialize-textarea" type="text" <?php echo ' value="'.$dinamica_familiar_obs.'" '.$disable; ?> 
				name="dinamica_familiar_obs"> <?php echo $dinamica_familiar_obs ?> </textarea>
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



