<?php 
$titulo = isset($titulo)? "<b>".$titulo."</b>": "Bem-vindo educador <br><b> Nome do Educador </b>";
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
        <li><a href="#" class="btn-small red">Sair</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a onClick="history.go(-1)" class="btn-small green">Voltar</a></li>
        <li><a href="#" class="btn-small red">Sair</a></li>
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

<?php } ?>

<!-- start=update_Success -->
<!-- start=delete_Success -->
<!-- start=insert_Success -->