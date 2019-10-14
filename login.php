<?php
$titulo = "Relizar login";
include_once('include/header.php'); 
?>

<form action="#" method="POST" >
        <div class="row center center-align" align="center" >
            <div class="col s12 m12" >
                E-MAIL<input type="email" name="email" required="true" >
            </div>
            <br>
            <div class="col s12 m12" >
                SENHA<input type="password" name="senha" required="true" >
            </div>
        </div>


    <div class="row" >
        <div class="col s12 m12 center-align" >
            <input type="submit" class="btn btn-large green"  name="salvar" value="ENTRAR"  >
        </div>
    </div>
</form>


<?php
include_once('include/footer.php');
?>