<?php 


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
	$list = $crud->select($tableDP,NULL,$orderBy,NULL);

	foreach ($list as $key => $value) 
	{
		$caminhoFoto = !empty(trim($value['caminho_foto']))? 
		"documentos/".$value['caminho_foto']:"include/sem-foto.gif";
		$nome = ($value['nome']);
		$id = ($value['id']);
		$option .= '<option data-icon="'.$caminhoFoto.'" value="'.$id.'">'.$nome.'</option>';
		
	}

?>

