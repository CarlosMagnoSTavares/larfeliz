

<ul class="collapsible">
	<li>
		<div class="collapsible-header"><i class="material-icons">search</i>Filtrar</div>
			<div class="collapsible-body"> 

<?php
$labelResult = "";
if (isset($_GET['opcao']) && isset($_GET['VALUE']) && isset($_GET['column_name'])&& !empty($_GET['VALUE'])) {
	$valueFiltro = addslashes($_GET['VALUE']);
	if ($_GET['opcao'] == 1){ $descLabel = " maior que "; $opcao = $_GET['column_name']." > '".$valueFiltro."'"; }
	if ($_GET['opcao'] == 2){ $descLabel = " menor que "; $opcao = $_GET['column_name']." < '".$valueFiltro."'"; }
	if ($_GET['opcao'] == 3){ $descLabel = " maior ou igual a "; $opcao = $_GET['column_name']." >= '".$valueFiltro."'"; }
	if ($_GET['opcao'] == 4){ $descLabel = " menor ou igual a "; $opcao = $_GET['column_name']." <= '".$valueFiltro."'"; }
	if ($_GET['opcao'] == 5){ $descLabel = " diferente de "; $opcao = $_GET['column_name']." <> '".$valueFiltro."'"; }
	if ($_GET['opcao'] == 6){ $descLabel = " contendo no inicio "; $opcao = $_GET['column_name']." like '"."%".$valueFiltro."'"; }
	if ($_GET['opcao'] == 7){ $descLabel = " contendo no final "; $opcao = $_GET['column_name']." like '".$valueFiltro."%"."'"; }
	if ($_GET['opcao'] == 8){ $descLabel = " contendo "; $opcao = $_GET['column_name']." like '"."%".$valueFiltro."%"."'"; }
	if ($_GET['opcao'] == 9){ $descLabel = " não contendo "; $opcao = $_GET['column_name']." not like '"."%".$valueFiltro."%"."'"; }

	$labelColumn = (str_replace("_", " ", $_GET['column_name']));
	$labelResult= "Resultados para ".$titulo." contendo ".$labelColumn." ".$descLabel." ".$_GET['VALUE'];
}


// LISTA colunas do filtro ↓
	$tabelaDeFiltros = 'vw_filtros';
	$whereFiltro = " table_name = '".$table."'";
	$orderByFiltro =" label ";
	$limitFiltro = NULL;

	$crudFiltro = new Crud;
	$listFiltro = $crudFiltro->select($tabelaDeFiltros,$whereFiltro,$orderByFiltro,$limitFiltro);

	$option = "";
	foreach ($listFiltro as $key => $valueFiltros) 
		{
			$column_name = ($valueFiltros['column_name']);
			$label = (($valueFiltros['label']));
			$label = str_replace("_", " ", $label);
			$option .= '<option  value="'.$column_name.'">'.$label.'</option>';
		}


?>

<form action="" method="GET" >

		<div class="row" >

			<div class="col s12 m4" >
				<lbl>Campo</lbl>
				<select  name="column_name" >
					<?php echo $option; ?>
				</select>
			</div>

			<div class="col s12 m2" >
				<lbl>Opção</lbl>
				<select  name="opcao" >
					asd
					<option value="1">Maior que</option>
					<option value="2">Menor que</option>
					<option value="3">Maior igual</option>
					<option value="4">Menor igual</option>
					<option value="5">Diferente</option>
					<option value="6">No inicio </option>
					<option value="7">No final </option>
					<option value="8">Contenha</option>
					<option value="9">Não contenha</option>
				</select>
			</div>

			<div class="col s12 m3" >
				Valor:
				<input type="text" name="VALUE">
			</div>

			<br>
			<div class="col s12 m3 right-align" >
				<input type="submit" class="btn btn-smal green" name="salvar" value="FILTRAR" >
				<form method="GET">
				<input type="submit" class="btn btn-smal red" name="limpar" value="LIMPAR"  >
				</form>
			</div>

		</div>	

</form>

<?php


$where = (isset($opcao)&&!empty($opcao))? $opcao : " id >= 0 ";

$orderColumn = isset($_GET['orderColumn']) && !empty($_GET['orderColumn'])? trim($_GET['orderColumn']): "id desc";
$orderBy = $orderColumn;
$max = 25;
$pag = (isset($_GET['startPag']) && !empty($_GET['startPag']) && is_numeric($_GET['startPag']))? ($_GET['startPag']*$max): "0";
$limit = "$pag,$max";
//Fim



?>
</div>
</li>
</ul>

<div class="row" align="">
<label align="" class="center text-center"><?php echo "<h6><b>".$labelResult."</b></h6>"; ?></label>
</div>

<?php
//Separa visualização de DESLIGADOS e de ATIVOS
if ($telaAcessada != "histAcolhidos" && $telaAcessada != "admin") 
{
	if (isset($_GET['situacao'])) 
	{
		$situacao = $_GET['situacao'] == 'desligado'? 'desligado':'ativo';
	}
	else
	{
		$situacao = 'ativo';
	}
echo'
<div class="center-align" align="center">
	  <a class="btn" href="?situacao=ativo" >ATIVOS<i class="material-icons right">group</i></a>
	  <a class="btn" href="?situacao=desligado" >DESLIGADOS<i class="material-icons right">visibility_off</i></a>
</div>
<br>
';

}
else
{
	$situacao = 'desligado';
}

// $situacao = $telaAcessada == 'admin'? "ativo": $situacao;

//$where .= " and situacao = '".$situacao."' ";
?>