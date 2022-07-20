<?php 
$telaAcessada = "dados_pessoais";
$titulo = "Dados Pessoais";

include_once('include/header.php'); 
require_once('controll/Crud.class.php');

$formPost ="formDadosPessoais.php";

//Config de cada pagina
$table = 'vw_dados_pessoais'; //Criado View para não exibir criancas desligadas na listagem

require_once('pagina.php');
?>

<div class="row">
	<div class="col s12 m12 center-align">
		<a class="btn green" href="<?php echo $formPost; ?>"> + Novo registro</a>
	</div>
</div>


<div class="row">
	<div class="col s12 m12">
		 <table class="striped responsive-table">
		    <thead>
		      <tr>
		          <th><a href="?orderColumn=update_at">Foto</a></th>
		          <th><a href="?orderColumn=nome">Nome</a></th>
		          <th class="center-align"><a href="?orderColumn=data_acolhimento">Data acolhimento</a></th>
		          <th><a href="#">Ver</a></th>
		          <th><a href="#">Editar</a></th>
		          <th><a href="#">Excluir</a></th>
		      </tr>
		    </thead>
			<tbody>
				<?php
				$crud = new Crud;
				$list = $crud->select($table,$where,$orderBy,$limit);
				
			// RELATORIO
			$row = "";
			$relatorio = $crud->select('vw_relatorio',NULL,NULL,NULL);
			foreach ($relatorio as $key => $value) 
			{
				$row .= ($value['NOME']).";".($value['DATA_NASCIMENTO']).";".($value['IDADE']).";".($value['NUMERO_PROCESSO']).";".($value['DATA_ACOLHIMENTO']).";".($value['CIDADE_ORIGEM']).";".($value['RELATORIO_GERADO']).";\n";
			}
			if ( $crud->csv(utf8_encode($row)) ) 
			{
				echo '<a class="btn" href="relatorio.csv" target="_blank">EXCEL
					  <i class="material-icons right">save</i></a>';
			}
			// FIM RELATORIO


				foreach ($list as $key => $value)
				{ 
					$nome = ($value['nome']);
					$caminhoFoto = !empty(trim($value['caminho_foto']))? "documentos/".htmlspecialchars($value['caminho_foto']):"include/sem-foto.gif";
					$dataAcolhimento = !empty($value['data_acolhimento'])? $value['data_acolhimento'] : " --/--/--- ";
					$id = $value['id'];
					$situacao = $value['situacao'];

					echo'
						<tr>
							<td><img src="'.htmlspecialchars($caminhoFoto).'"  data-caption="'.htmlspecialchars($nome).'" class="circle materialboxed" width="35px" height="35px"></td>
							<td class="">'.htmlspecialchars($nome).'</td>
							<td class="center-align">'.date("d/m/Y", strtotime($dataAcolhimento))).'</td>
							';
					include('botoes.php');
					echo'
						</tr>
					';
				}
				?>
			</tbody>
		</table>
	</div>
</div>

<?php 
include_once('include/pagination.php'); 
include_once('include/footer.php'); 
?>



