<?php
session_start();
require('./_app/Config.inc.php');
$login = new Login(1);
$logoff = filter_input(INPUT_GET, 'logoff', FILTER_VALIDATE_BOOLEAN);

//se nao existir usuario logado redireciona para a index
if (!$login->CheckLogin()):
    unset($_SESSION['userlogin']);
    header('Location: index.php?exe=restrito');
else:
    //passa o usuaro para a variavel
    $userlogin = $_SESSION['userlogin'];
endif;

//se existir logoff redireciona para a indez
if ($logoff):
    unset($_SESSION['userlogin']);
    header('Location: index.php?exe=logoff');
endif;
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			

    <div class="row conteudo">
        <div class="col-lg-12">
<?php
include('includes/header.php');
if (isset($_GET['acao'])) { // verificação do get para incluir uma página
    $acao = $_GET['acao'];
    if ($acao == "registro") {
        include("includes/form-chamado.php");
    } elseif ($acao == "home") {
        include("includes/home.php");
    } elseif ($acao == "estatisticas") {
        include("includes/graficos.php");
    } elseif ($acao == "categoria") {
        include("includes/form-categoria.php");
    } elseif ($acao == "consulta") {
        include("includes/consulta.php");
    } elseif ($acao == "con-usuario") {
        include("includes/consulta-usuario.php");
    } elseif ($acao == "cad-usuario") {
        include("includes/cad-usuarios.php");
    } elseif ($acao == 'editar-atendimento') {
        include("includes/editar-chamado.php");
    } elseif ($acao == 'editar-usuario') {
        include("includes/editar-usuarios.php");
    }elseif($acao == 'cadastrar-equipamento'){
        include("includes/form-equipamento.php");
    }elseif($acao == 'consultar-equipamento'){
        include("includes/cons-equipamento.php");
    }elseif($acao == 'historico-equipamento'){
        include("includes/historico-equipamento.php");
    }elseif($acao == 'bancada'){
        include("includes/bancada.php");
    } elseif ($acao == 'excluir-atendimento') {
        $id = $_GET['id'];
        $excluir = new Delete();
        $excluir->ExeDelete('atendimento', "WHERE idAtendimento = :idAtendimento", "idAtendimento={$id}");
        include("includes/consulta.php");
    } elseif ($acao == 'excluir-usuario') {
        $id = $_GET['id'];
        $excluir = new Delete();
        $excluir->ExeDelete('ws_users', "WHERE user_id = :user_id", "user_id={$id}");
        include("includes/consulta-usuario.php");
    } elseif ($acao == "welcome") {
        echo '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Bem-vindo</strong> ao sistema AiHelp! <strong>usuário fulano xyz</strong>.
                    </div>';
    }
}
?>

</div>
    </div><!--/.row-->		

<!-- ------------------- Fim do Conteúdo ---------------------------------->
            <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
            <script src="js/jquery-2.2.3.min.js"></script>
            <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
            <script src="js/bootstrap.js"></script>    
            <script>
                function openNav() {
                    document.getElementById("mySidenav").style.width = "250px";
                    document.getElementById("main").style.marginLeft = "250px";
                }
                function closeNav() {
                    document.getElementById("mySidenav").style.width = "0";
                    document.getElementById("main").style.marginLeft = "0";
                }
            </script>            
        </div> <!--div class="container-fluid " id="corpo"-->
    </div> <!--container fluid corpo -->


</body>
</html>