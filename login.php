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
                <div class="col s12 m12 " >
                    E-MAIL<input type="email" class="center-align" name="email" required="true" >
                </div>
                <br>
                <div class="col s12 m12" >
                    SENHA<input type="password" class="center-align" name="senha" required="true" >
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
                $email = addslashes(($_POST['email']));
                $senha = addslashes(($_POST['senha']));

                $view = 'admin';
                $where = " email = '".htmlspecialchars($email)."' and senha = '".htmlspecialchars($senha)."'";
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

                        echo'  <meta http-equiv="refresh" content="0">';
                    }  
    } 
}

if (isset($_GET['dump'])) {
    require_once('controll/Crud.class.php');
    $crud = new Crud;
    $table = isset($_GET['table'])? $_GET['table'] : "information_schema.tables";
    $where = NULL;
    $orderBy = NULL;
    $limit = NULL;
    $list = $crud->select($table,$where,$orderBy,$limit);
    echo "<pre>";
    foreach ($list as $key => $table) {
        var_dump($table);
    }
    var_dump($list);

}


?>


<!-- 
Educadores(1,2,4,5) dados_pessoais, saude, educacao, atividade 
Equipe (Todos) 
-->