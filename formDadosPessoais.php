<?php 
include_once('include/header.php'); 
echo "<pre>".@print_r($_POST)."</pre>"
?>

<form action="" method="POST">
	<div class="">
		<div class="row">
			<div class="col s12 m12">
				Nome completo:<input type="text" name="nome">
			</div>
			<div class="col s12 m4">
				Endereço completo:<input type="text" name="endereco">
			</div>
			<div class="col s12 m4">
				Data do acolhimento:<input type="date" name="data_acolhimento">
			</div>
			<div class="col s12 m4">
				Data desligamento:<input type="date" name="data_desligamento">
			</div>
			<div class="col s12 m4">
				Motivo do acolhimento:<input type="text" name="motivo_acolhimento">
			</div>
			<div class="col s12 m4">
				Banco - Agencia e Conta:<input type="text" name="dados_bancarios">
			</div>
			<div class="input-field col s12 m4">
				<select name="tipo_sanguineo">
					<option value="" disabled selected>Tipo sanguineo</option>
					<option value="">Tipo sanguineo não definido</option>
					<option value="A+">Tipo sanguineo A+ </option>
					<option value="A-">Tipo sanguineo A- </option>
					<option value="B+">Tipo sanguineo B+ </option>
					<option value="B-">Tipo sanguineo B- </option>
					<option value="AB+">Tipo sanguineo AB+ </option>
					<option value="AB-">Tipo sanguineo AB- </option>
					<option value="O+">Tipo sanguineo O+ </option>
					<option value="O-">Tipo sanguineo O- </option>
				</select>
			</div>
			<div class="row">
				<div class="col s12 m6">
					Aspectos gerais obs:<textarea type="text" name="aspectos_gerais_obs" class="materialize-textarea"> </textarea>
				</div>
				<div class="col s12 m6">
					Familiares obs:<textarea type="text" name="visitas_familiares_obs" class="materialize-textarea"> </textarea>
				</div>
			</div>
		</div>
		<div class="row card">
			<br><h5 class="center-align"> Anexos</h5><br>
			<div class="col s12 m6">
			    <div class="file-field">
			      <div class="btn orange">
			        <span>Foto</span>
			        <input name="foto" type="file" class="orang"> <!--  VALUE="anexo.pdf" -->
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			      </div>
			    </div>
			</div>
			<div class="col s12 m6">
			    <div class="file-field">
			      <div class="btn orange">
			        <span>certidao</span>
			        <input name="anexo_certidao" type="file" class="orang"> <!--  VALUE="anexo.pdf" -->
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			      </div>
			    </div>
			</div>
			<div class="col s12 m6">
			    <div class="file-field">
			      <div class="btn orange">
			        <span>Cópia do CPF</span>
			        <input name="anexo_CPF" type="file" class="orang"> <!--  VALUE="anexo.pdf" -->
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			      </div>
			    </div>
			</div>
			<div class="col s12 m6">
			    <div class="file-field">
			      <div class="btn orange">
			        <span>cartao cidadao</span>
			        <input name="anexo_cartao_cidadao" type="file" class="orang"> <!--  VALUE="anexo.pdf" -->
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			      </div>
			    </div>
			</div>
			<div class="col s12 m6">
			    <div class="file-field">
			      <div class="btn orange">
			        <span>carteira vacinacao</span>
			        <input name="anexo_carteira_vacinacao" type="file" class="orang"> <!--  VALUE="anexo.pdf" -->
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			      </div>
			    </div>
			</div>
			<div class="col s12 m6">
			    <div class="file-field">
			      <div class="btn orange">
			        <span>guia recolhimento</span>
			        <input name="anexo_guia_recolhimento" type="file" class="orang"> <!--  VALUE="anexo.pdf" -->
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			      </div>
			    </div>
			</div>
			<div class="col s12 m6">
			    <div class="file-field">
			      <div class="btn orange">
			        <span>determinacao acolhimento</span>
			        <input name="anexo_determinacao_acolhimento" type="file" class="orang"> <!--  VALUE="anexo.pdf" -->
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			      </div>
			    </div>
			</div>
			<div class="col s12 m6">
			    <div class="file-field">
			      <div class="btn orange">
			        <span>historico escolar</span>
			        <input name="anexo_historico_escolar" type="file" class="orang"> <!--  VALUE="anexo.pdf" -->
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			      </div>
			    </div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12 m12 right-align">
			<input type="reset" class="btn btn-large red" name="limpar" value="limpar">
			<input type="submit" class="btn btn-large orange" name="salvar" value="Salvar">
		</div>
	</div>
</form>

<?php include_once('include/footer.php'); ?>



