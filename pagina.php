<?php
//Não alterar "order e paginação" (TODAS AS TABELAS PRECISAM DE UMA COLUNA ID PRIMARY KEY)
$orderColumn = isset($_GET['orderColumn']) && !empty($_GET['orderColumn'])? trim($_GET['orderColumn']): "id desc";
$where = " id >= 0";
$orderBy = $orderColumn;
$max = 25;
$pag = (isset($_GET['startPag']) && !empty($_GET['startPag']) && is_numeric($_GET['startPag']))? ($_GET['startPag']*$max): "0";
$limit = "$pag,$max";
//Fim
?>