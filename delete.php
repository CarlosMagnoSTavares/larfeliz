<?php
//EXCLUIR mostra botão permitindo exclusão
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