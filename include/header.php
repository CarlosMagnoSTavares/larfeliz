<?php 
@session_start();
$educador = @$_SESSION["usuario"];
$tipo_acesso = @$_SESSION['tipo_acesso'];

if (empty($educador)) {
  header('location:login.php');
  die();
}//Se nao tiver logado nem carrega nada

$titulo = isset($titulo)? "<b>".$titulo."</b>": " <br>BEM-VINDO<br><b>".$educador."</b><br> Você está acessando como: ".$tipo_acesso;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta name="theme-color" content="#ff9800">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <link rel="icon" href="css/logo.png" type="image/x-icon">
  <title>Lar Feliz</title>
  <!-- CSS  -->
  <link href="css/icon.css" rel="stylesheet"> <!--  Força busca de icon online -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="orange" role="navigation">
    <div class="nav-wrapper container">
        <a href="index.php">
          <img id="logo-container" src="css/logo.png" class="brand-logo" width="100px" height="100px" ></img>
        </a>
      <ul class="right hide-on-med-and-down">
        <li><a onClick="history.go(-1)" class="btn-small green">Voltar</a></li>
        <li><a href="logoff.php" class="btn-small red">Sair</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="dadosPessoais.php" class="btn-small orange">Dados Pessoais</a></li>
        <li><a href="filiacao.php" class="btn-small orange">Filiação</a></li>
        <li><a href="educacao.php" class="btn-small orange">Educação</a></li>
        <li><a href="saude.php" class="btn-small orange">Saúde</a></li>
        <li><a href="atividades.php" class="btn-small orange">Atividades</a></li>
        <li><a href="ocorrencias.php" class="btn-small orange">Ocorrencias</a></li>
        <li><a href="registroTecnico.php" class="btn-small orange">Registro Tecnico</a></li>
        <li><a href="histAcolhidos.php" class="btn-small orange">Hist. Acolhidos</a></li>

        <li><a href="admin.php" class="btn-small orange">Admin</a></li>
        <li><a onClick="history.go(-1)" class="btn-small green">Voltar</a></li>
        <li><a href="logoff.php" class="btn-small red">Sair</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row center">
        <h5 class="header col s12 light"><?php echo $titulo; ?></h5>
      </div>
      <br><br>
    </div>
  </div>
  <div class="container">
<!-- AQUI TERMINA O HEADER -->



<?php 
$start = isset($_GET['start']) ? isset($_GET['start']) : NULL;

if (!empty($start)) {?>

 <script type="text/javascript">
  window.onload = function() {
   M.toast({html: '<a class="green-text"><b> Sucesso! </b></a>', classes: 'rounded'})
  }
 </script>

<?php } 


// GESTÃO DO NIVEL DE ACESSO
$telaAcessada = isset($telaAcessada)? $telaAcessada : "ERROR";

if ($tipo_acesso == "EDUCADOR" ) {
  if ( $telaAcessada <> 'dados_pessoais' && $telaAcessada  <> "saude" && $telaAcessada  <> "educacao" && $telaAcessada  <> "atividade" && $telaAcessada  <> "index" ) 
  {
  echo '
  <br><br><br>
  <h5 align="center" class="center-align" >ACESSO NÃO AUTORIZADO</h5>';
  echo '<p align="center" class="center-align" >Por favor, solicite ao admin que libere seu acesso a esta tela, obrigado.</p>
  <br><br><br><br><br><br><br><br><br><br><br><br>';
  include_once('include/footer.php'); 
  die();
  }
} 


if ($tipo_acesso <> 'ADMIN' && $telaAcessada == "admin") 
{
  echo '
  <br><br><br>
  <h5 align="center" class="center-align" >ACESSO NÃO AUTORIZADO</h5>';
  echo '<p align="center" class="center-align" >Acesso restrito a administradores.</p>
  <br><br><br><br><br><br><br><br><br><br><br><br>';
  include_once('include/footer.php'); 
  die();
}



 // Educadores(1,2,4,5) dados_pessoais, saude, educacao, atividade 

 //Equipe (Todos)

?>
