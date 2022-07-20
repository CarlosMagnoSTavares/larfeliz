<?php

echo '
<td><a href="'.htmlspecialchars($formPost).'?situacao='.htmlspecialchars($situacao).'&acao=ver&id='.htmlspecialchars($id).'" class="btn btn-small green">Ver</a></td>
<td><a href="'.htmlspecialchars($formPost).'?situacao='.htmlspecialchars($situacao).'&acao=editar&id='.htmlspecialchars($id).'" class="btn btn-small orange">Editar</a></td>
<td><a href="'.htmlspecialchars($formPost).'?situacao='.htmlspecialchars($situacao).'&acao=excluir&id='.htmlspecialchars($id).'" class="btn btn-small red">Excluir</a></td>
';


?>