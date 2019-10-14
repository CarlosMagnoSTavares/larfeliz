<?php
@session_start();
if (isset($_SESSION["usuario"]))
{
    require_once('index.php');
} 
else 
{
    $titulo = "Realizar login";
    include_once('include/headerOff.php'); 

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
    <br><br><br><br>

    <?php
    include_once('include/footer.php');


    if ($_POST) 
    {
                require_once('controll/Crud.class.php');
                $email = addslashes(strtoupper($_POST['email']));
                $senha = addslashes(strtoupper($_POST['senha']));

                $view = 'admin';
                $where = " email = '".$email."' and senha = '".$senha."'";
                $orderBy =null;
                $limit = "1";

                $crud = new Crud;
                $list = $crud->select($view,$where,$orderBy,$limit);
                $option = "";

                foreach ($list as $key => $value) 
                    {
                        @session_start();
                        $_SESSION["usuario"] = ($value['nome']);
                        $_SESSION['tipo_acesso']= ($value['tipo_acesso']);
                        
                        $id = ($value['id']);
                        $email = ($value['email']);
                        $senha = ($value['senha']);

                        echo'  <meta http-equiv="refresh" content="0">
';

                    }  
     
    } 

}


?>


<!-- 
Educadores(1,2,4,5) dados_pessoais, saude, educacao, atividade 
Equipe (Todos) 
-->