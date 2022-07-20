<?php 

$paginas = $crud->pagination($table,$max);

foreach ($paginas as $key => $value) 
{
	$countPag = $value['PAG'];
}
?>
<div class="row center">
	<div class="col s12 m12 center-align">
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
			echo '<li class="'.htmlspecialchars($mark).'"><a href="?startPag='.htmlspecialchars($i).'">'.htmlspecialchars($i).'</a></li>';
		}
		?>

	    <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
	  </ul>
	</div>

</div>