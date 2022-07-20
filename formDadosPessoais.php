<?php 
$telaAcessada = "dados_pessoais";
$titulo = "Dados Pessoais";

include_once('include/header.php'); 

//Default da pagina
	$disable = "";// Default tudo habilitado
	$btnColor = "orange"; // Default tudo laranja
	$formPost ="insertDadosPessoais.php";
	$telaRedirect="dadosPessoais.php";


	// Default todos os campos sem valor
	$nome = "";
	$endereco = "";
	$data_acolhimento = "";
	$data_desligamento = "";
	$motivo_acolhimento = "";
	$dados_bancarios = "";
	$tipo_sanguineo = "";
	$aspectos_gerais_obs = "";
	$visitas_familiares_obs = "";
	$foto = "";
	$anexo_certidao = "";
	$anexo_cpf = "";
	$anexo_cartao_cidadao = "";
	$anexo_carteira_vacinacao = "";
	$anexo_guia_recolhimento = "";
	$anexo_determinacao_acolhimento = "";
	$anexo_historico_escolar = "";
	$data_nascimento = "";//NOVO
	$numero_processo = "";//NOVO
	$limpar = "Limpar";
	$salvar = "inserir";

$acao = isset($_GET['acao'])? $_GET['acao']:null;

$tela = "dadosPessoais"; // Tela para liberar o acesso 
require_once('loghelper.php');//Permite o acesso ou não 

//EDITAR
if ($acao == 'editar' || $acao == 'excluir'|| $acao == 'ver' ) 
{
	if (isset($_GET['id']) && is_numeric($_GET['id']) ) 
	{
		require_once('controll/Crud.class.php');

		// LISTA USUARIO DO ID INFORMADO ↓
			$table = 'dados_pessoais';
			$where = " id = ".htmlspecialchars($_GET['id']);
			$orderBy ="";
			$limit = "1";

			$crud = new Crud;
			$list = $crud->select($table,$where,$orderBy,$limit);

			foreach ($list as $key => $value) 
				{
					$id = ($value['id']);
					$nome = ($value['nome']);
					
					$data_nascimento = ($value['data_nascimento']);//NOVO
					$numero_processo = ($value['numero_processo']);//NOVO

					$endereco = ($value['endereco']);
					$data_acolhimento = ($value['data_acolhimento']);
					$data_desligamento = ($value['data_desligamento']);
					$motivo_acolhimento = ($value['motivo_acolhimento']);
					$dados_bancarios = ($value['dados_bancarios']);
					$tipo_sanguineo = ($value['tipo_sanguineo']);
					$aspectos_gerais_obs = ($value['aspectos_gerais_obs']);
					$visitas_familiares_obs = ($value['visitas_familiares_obs']);
					$foto = ($value['caminho_foto']);
					$anexo_certidao = ($value['anexo_certidao']);
					$anexo_cpf = ($value['anexo_cpf']);
					$anexo_cartao_cidadao = ($value['anexo_cartao_cidadao']);
					$anexo_carteira_vacinacao = ($value['anexo_carteira_vacinacao']);
					$anexo_guia_recolhimento = ($value['anexo_guia_recolhimento']);
					$anexo_determinacao_acolhimento = ($value['anexo_determinacao_acolhimento']);
					$anexo_historico_escolar = ($value['anexo_historico_escolar']);
					$limpar = "Limpar";
					$salvar = "editar";
				}
	} 	
} 

require_once('delete.php');
?>

<form action="controll/<?php echo $formPost; ?>" method="POST" enctype="multipart/form-data" >
	<div class="" >
		<div class="row" >
			<div class="col s12 m4" >
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				*Nome completo:<input type="text" <?php echo ' value="'.htmlspecialchars($nome).'" '.htmlspecialchars($disable); ?> name="nome" required="true" >
			</div>
			<div class="col s12 m4" >
				Cidade de origem:<input type="text" <?php echo ' value="'.htmlspecialchars($endereco).'" '.htmlspecialchars($disable); ?> name="endereco" >
			</div>

			<!-- Campos novos -->
			<div class="col s12 m4" >
				*Numero do processo:<input type="text" <?php echo ' value="'.htmlspecialchars($numero_processo).'" '.htmlspecialchars($disable); ?> name="numero_processo" required="true" >
			</div>
			<div class="col s12 m4" >
				*Data nascimento:<input type="date" <?php echo ' value="'.htmlspecialchars($data_nascimento).'" '.htmlspecialchars($disable); ?> name="data_nascimento" required="true" >
			</div>
			<!-- Campos novos -->

			<div class="col s12 m4" >
				*Data do acolhimento:<input type="date" <?php echo ' value="'.htmlspecialchars($data_acolhimento).'" '.htmlspecialchars($disable); ?> name="data_acolhimento" required="true" >
			</div>
			<div class="col s12 m4" >
				Data desligamento:<input type="date" <?php echo ' value="'.htmlspecialchars($data_desligamento).'" '.htmlspecialchars($disable); ?> name="data_desligamento" >
			</div>
			<div class="col s12 m4" >
				Motivo do acolhimento:<input type="text" <?php echo ' value="'.htmlspecialchars($motivo_acolhimento).'" '.htmlspecialchars($disable); ?> name="motivo_acolhimento" >
			</div>
			<div class="col s12 m4" >
				Banco - Agencia e Conta:<input type="text" <?php echo ' value="'.htmlspecialchars($dados_bancarios).'" '.htmlspecialchars($disable); ?> name="dados_bancarios" >
			</div>
			<div class="input-field col s12 m4" >
				<select <?php echo  $disable; ?> name="tipo_sanguineo" >
					<option <?php echo ' value="'.htmlspecialchars($tipo_sanguineo).'" '.htmlspecialchars($disable); ?> readonly="true" selected>Tipo sanguíneo <?php echo $tipo_sanguineo; ?></option>
					<hr>
					<option value="Desconhecido" >Tipo sanguíneo não informado</option>
					<option value="A+" >Tipo sanguíneo A+ </option>
					<option value="A-" >Tipo sanguíneo A- </option>
					<option value="B+" >Tipo sanguíneo B+ </option>
					<option value="B-" >Tipo sanguíneo B- </option>
					<option value="AB+" >Tipo sanguíneo AB+ </option>
					<option value="AB-" >Tipo sanguíneo AB- </option>
					<option value="O+" >Tipo sanguíneo O+ </option>
					<option value="O-" >Tipo sanguíneo O- </option>
				</select>
			</div>
			<div class="row" >
				<div class="col s12 m6" >
					Aspectos gerais obs:<textarea <?php echo  $disable; ?> type="text" name="aspectos_gerais_obs" class="materialize-textarea"><?php echo $aspectos_gerais_obs; ?></textarea>
				</div>
				<div class="col s12 m6" >
					Familiares obs:<textarea <?php echo  $disable; ?> type="text" name="visitas_familiares_obs" class="materialize-textarea"><?php echo $visitas_familiares_obs; ?></textarea>
				</div>
			</div>
		</div>


		<div class="row card">
			<br><h5 class="center-align" > Anexos</h5><br>
			<div class="col s12 m6" >
			    <div class="file-field" >
			      <div class="btn <?php echo $btnColor; ?>" >
			        <span>Foto</span>
			        <input <?php echo  $disable; echo 'value="'.htmlspecialchars($foto).'"'; ?> name="foto" type="file" class="<?php echo $btnColor; ?>" accept="image/*"> <!--  VALUE="anexo.pdf" -->
			      </div>
			      <div class="file-path-wrapper" >
			        <input class="file-path validate" type="text" value="<?php echo $foto; ?>" >
			      </div>
			    </div>
			 <a target="_blank" <?php echo 'href="documentos/'.htmlspecialchars($foto).'"';?>>  Download: <?php echo $foto; ?> </a>   
			</div>
			<div class="col s12 m6" >
			    <div class="file-field" >
			      <div class="btn <?php echo $btnColor; ?>" >
			        <span>Certidão</span>
			        <input <?php echo  $disable; echo 'value="'.htmlspecialchars($anexo_certidao).'"'; ?> name="anexo_certidao" type="file" class="<?php echo $btnColor; ?>" > <!--  VALUE="anexo.pdf" -->
			      </div>
			      <div class="file-path-wrapper" >
			        <input class="file-path validate" type="text" value="<?php echo $anexo_certidao; ?>" >
			      </div>
			    </div>
			 <a target="_blank" <?php echo 'href="documentos/'.htmlspecialchars($anexo_certidao).'"';?>>  Download: <?php echo $anexo_certidao; ?> </a>   
			</div>
			<div class="col s12 m6" >
			    <div class="file-field" >
			      <div class="btn <?php echo $btnColor; ?>" >
			        <span>Cópia do CPF</span>
			        <input <?php echo  $disable; echo 'value="'.htmlspecialchars($anexo_cpf).'"'; ?> name="anexo_cpf" type="file" class="<?php echo $btnColor; ?>" > <!--  VALUE="anexo.pdf" -->
			      </div>
			      <div class="file-path-wrapper" >
			        <input class="file-path validate" type="text" value="<?php echo $anexo_cpf; ?>" >
			      </div>
			    </div>
			 <a target="_blank" <?php echo 'href="documentos/'.htmlspecialchars($anexo_cpf).'"';?>>  Download: <?php echo $anexo_cpf; ?> </a>   
			</div>
			<div class="col s12 m6" >
			    <div class="file-field" >
			      <div class="btn <?php echo $btnColor; ?>" >
			        <span>Cartão cidadao</span>
			        <input <?php echo  $disable; echo 'value="'.htmlspecialchars($anexo_cartao_cidadao).'"'; ?> name="anexo_cartao_cidadao" type="file" class="<?php echo $btnColor; ?>" > <!--  VALUE="anexo.pdf" -->
			      </div>
			      <div class="file-path-wrapper" >
			        <input class="file-path validate" type="text" value="<?php echo $anexo_cartao_cidadao; ?>" >
			      </div>
			    </div>
			 <a target="_blank" <?php echo 'href="documentos/'.htmlspecialchars($anexo_cartao_cidadao).'"';?>>  Download: <?php echo $anexo_cartao_cidadao; ?> </a>   
			</div>
			<div class="col s12 m6" >
			    <div class="file-field" >
			      <div class="btn <?php echo $btnColor; ?>" >
			        <span>Carteira vacinação</span>
			        <input <?php echo  $disable; echo 'value="'.htmlspecialchars($anexo_carteira_vacinacao).'"'; ?> name="anexo_carteira_vacinacao" type="file" class="<?php echo $btnColor; ?>" > <!--  VALUE="anexo.pdf" -->
			      </div>
			      <div class="file-path-wrapper" >
			        <input class="file-path validate" type="text" value="<?php echo $anexo_carteira_vacinacao; ?>" >
			      </div>
			    </div>
			 <a target="_blank" <?php echo 'href="documentos/'.htmlspecialchars($anexo_carteira_vacinacao).'"';?>>  Download: <?php echo $anexo_carteira_vacinacao; ?> </a>   
			</div>
			<div class="col s12 m6" >
			    <div class="file-field" >
			      <div class="btn <?php echo $btnColor; ?>" >
			        <span>Guia acolhimento</span>
			        <input <?php echo  $disable; echo 'value="'.htmlspecialchars($anexo_guia_recolhimento).'"'; ?> name="anexo_guia_recolhimento" type="file" class="<?php echo $btnColor; ?>" > <!--  VALUE="anexo.pdf" -->
			      </div>
			      <div class="file-path-wrapper" >
			        <input class="file-path validate" type="text" value="<?php echo $anexo_guia_recolhimento; ?>" >
			      </div>
			    </div>
			 <a target="_blank" <?php echo 'href="documentos/'.htmlspecialchars($anexo_guia_recolhimento).'"';?>>  Download: <?php echo $anexo_guia_recolhimento; ?> </a>   
			</div>
			<div class="col s12 m6" >
			    <div class="file-field" >
			      <div class="btn <?php echo $btnColor; ?>" >
			        <span>Determinacao acolhimento</span>
			        <input <?php echo  $disable; echo 'value="'.htmlspecialchars($anexo_determinacao_acolhimento).'"'; ?> name="anexo_determinacao_acolhimento" type="file" class="<?php echo $btnColor; ?>" > <!--  VALUE="anexo.pdf" -->
			      </div>
			      <div class="file-path-wrapper" >
			        <input class="file-path validate" type="text" value="<?php echo $anexo_determinacao_acolhimento; ?>" >
			      </div>
			    </div>
			 <a target="_blank" <?php echo 'href="documentos/'.htmlspecialchars($anexo_determinacao_acolhimento).'"';?>>  Download: <?php echo $anexo_determinacao_acolhimento; ?> </a>   
			</div>
			<div class="col s12 m6" >
			    <div class="file-field" >
			      <div class="btn <?php echo $btnColor; ?>" >
			        <span>Historico escolar</span>
			        <input <?php echo  $disable; echo 'value="'.htmlspecialchars($anexo_historico_escolar).'"'; ?> name="anexo_historico_escolar" type="file" class="<?php echo $btnColor; ?>" > <!--  VALUE="anexo.pdf" -->
			      </div>
			      <div class="file-path-wrapper" >
			        <input class="file-path validate" type="text" value="<?php echo $anexo_historico_escolar; ?>" >
			      </div>
			    </div>
			 <a target="_blank" <?php echo 'href="documentos/'.htmlspecialchars($anexo_historico_escolar).'"';?>>  Download: <?php echo $anexo_historico_escolar; ?> </a>
			 <br><br>   
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



