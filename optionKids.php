<?php 
//LISTAR CRIANCAS (DADOS_PESOAIS)
	$tableDP = 'dados_pessoais';
	$orderBy ="nome";
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