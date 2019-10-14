<?php

$data = $tela."__".$acao;

  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';

?>