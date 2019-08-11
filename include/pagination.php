<?php 

$paginas = $crud->pagination($table,$max);

foreach ($paginas as $key => $value) 
{
	$countPag = $value['PAG'];
}
?>
  <ul class="pagination center-align">
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>

	<?php 
	$mark = NULL;
	for ($i=0; $i < $countPag ; $i++) 
	{ 
		
		if (isset($_GET['startPag']) && !empty($_GET['startPag']) && is_numeric($_GET['startPag'])) 
		{
		  $mark = $_GET['startPag']==$i? "active orange":"waves-effect";	
		}
		echo '<li class="'.$mark.'"><a href="?startPag='.$i.'">'.$i.'</a></li>';
	}
	?>

    <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
  </ul>