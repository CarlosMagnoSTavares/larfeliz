<?php 

//Separa visualização de DESLIGADOS e de ATIVOS
if ($telaAcessada != "histAcolhidos") 
{
	if (isset($_GET['situacao'])) 
	{
		$situacao = $_GET['situacao'] == 'desligado'? 'desligado':'ativo';
	}
	else
	{
		$situacao = 'ativo';
	}

}
else
{
	$situacao = 'desligado';
}

$whereDP = " situacao = '".htmlspecialchars($situacao."'";




$chave = isset($optionList) && !empty($optionList)? $optionList : NULL; 

if (empty($chave)) 
{
	$tableDP = 'vw_dados_pessoais';
	$orderBy ="nome";
} 
else 
{
	$tableDP = 'vw_list_filiacao';
	$orderBy ="nome_parente, nome_crianca";
}



 	$crud = new Crud;
	$list = $crud->select($tableDP,$whereDP,$orderBy,NULL);

	foreach ($list as $key => $value) 
	{
		$caminhoFoto = !empty(trim($value['caminho_foto']))? 
		"documentos/".htmlspecialchars($value['caminho_foto']):"include/sem-foto.gif";
		$nome = ($value['nome']);
		$id = ($value['id']);
		$option .= '<option data-icon="'.htmlspecialchars($caminhoFoto).'" value="'.htmlspecialchars($id).'">'.htmlspecialchars($nome).'</option>';
		
	}

?>

