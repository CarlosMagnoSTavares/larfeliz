<?php 
include_once('include/header.php'); 

$dadosPessoaisColor = 'orange'; //disabled 
$filiacaoColor = 'orange';
$educacaoColor = 'orange';
$saudeColor = 'orange';
$atividadesColor = 'orange';
$ocorrenciasColor = 'orange';
$registroTecnicoColor = 'orange';
$adminColor = 'orange';

$colorCard1 = $dadosPessoaisColor.' darken-4';
$colorCard2 = $filiacaoColor.' darken-3';
$colorCard3 = $educacaoColor.' darken-2';
$colorCard4 = $saudeColor.' darken-1';
$colorCard5 = $atividadesColor.' darken-1';
$colorCard6 = $ocorrenciasColor.' darken-2';
$colorCard7 = $registroTecnicoColor.' darken-3';
$colorCard8 = $adminColor.' darken-4';

?>
    <!-- Primeira linha de blocos -->
    <div class="row">
        <div class="col s12 m3">
          <div class="card z-depth-5 <?php echo $colorCard1; ?>">
            <div class="card-content white-text">
              <span class="card-title center-align"><b>Dados Pessoais</b></span>
              <p class="center-align">Registrar criança.</p>
            </div>
            <div class="card-action center">
              <a href="dadosPessoais.php" class="z-depth-5 btn-small waves-effect waves-light <?php echo $dadosPessoaisColor; ?>">Entrar</a>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="card z-depth-5 <?php echo $colorCard2; ?>">
            <div class="card-content white-text">
              <span class="card-title center-align"><b>Filiação</b></span>
              <p class="center-align">Cadastro da família.</p>
            </div>
            <div class="card-action center">
              <a href="filiacao.php" class="z-depth-5 btn-small waves-effect waves-light <?php echo $filiacaoColor; ?>">Entrar</a>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="card z-depth-5 <?php echo $colorCard3; ?>">
            <div class="card-content white-text">
              <span class="card-title center-align"><b>Educação</b></span>
              <p class="center-align">Registrar dados escolares.</p>
            </div>
            <div class="card-action center">
              <a href="educacao.php" class="z-depth-5 btn-small waves-effect waves-light <?php echo $educacaoColor; ?>">Entrar</a>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="card z-depth-5 <?php echo $colorCard4; ?>">
            <div class="card-content white-text">
              <span class="card-title center-align"><b>Saúde</b></span>
              <p class="center-align">Dados médicos da criança.</p>
            </div>
            <div class="card-action center">
              <a href="saude.php" class="z-depth-5 btn-small waves-effect waves-light <?php echo $saudeColor; ?>">Entrar</a>
            </div>
          </div>
        </div>
    </div>
    <!-- Segunda linha de blocos -->
    <div class="row">
        <div class="col s12 m3">
          <div class="card z-depth-5 <?php echo $colorCard5; ?>">
            <div class="card-content white-text">
              <span class="card-title center-align"><b>Atividades</b></span>
              <p class="center-align">Registro de atividades extracurriculares.</p>
            </div>
            <div class="card-action center">
              <a href="atividades.php" class="z-depth-5 btn-small waves-effect waves-light <?php echo $atividadesColor; ?>">Entrar</a>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="card z-depth-5 <?php echo $colorCard6; ?>">
            <div class="card-content white-text">
              <span class="card-title center-align"><b>Ocorrências</b></span>
              <p class="center-align">Registro de ocorrências escolares ou policiais.</p>
            </div>
            <div class="card-action center">
              <a href="ocorrencias.php" class="z-depth-5 btn-small waves-effect waves-light <?php echo $ocorrenciasColor; ?>">Entrar</a>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="card z-depth-5 <?php echo $colorCard7; ?>">
            <div class="card-content white-text">
              <span class="card-title center-align"><b>Registro técnico</b></span>
              <p class="center-align">Dados de visitas domiciliares e audiências.</p>
            </div>
            <div class="card-action center">
              <a href="registroTecnico.php" class="z-depth-5 btn-small waves-effect waves-light <?php echo $registroTecnicoColor; ?>">Entrar</a>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="card z-depth-5 <?php echo $colorCard8; ?>">
            <div class="card-content white-text">
              <span class="card-title center-align"><b>Admin</b></span>
              <p class="center-align">Registrar funcinários e liberação de acessos.</p>
            </div>
            <div class="card-action center">
              <a href="admin.php" class="z-depth-5 btn-small waves-effect waves-light <?php echo $adminColor; ?>">Entrar</a>
            </div>
          </div>
        </div>
    </div>
<?php include_once('include/footer.php'); ?>

