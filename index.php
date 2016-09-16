<?php
session_start();
require('./_app/Config.inc.php');
?>
<!DOCTYPE html lang="pt-br">
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- CSS -->
        <link href="css/estilo.css" rel="stylesheet" type="text/css">
        <!-- Reset CSS -->
        <link rel="stylesheet" href="css/reset.css" />
        <title>Controle de chamados</title>
    </head>
    <body class="login-background">  
        <div class="container-fluid">
            <div class="row-fluid"  >
                <div class="col-lg-4  col-offset-4 centering text-center">
                    <div class="panel">                        
                        <div class="panel-body" >

                            <?php
                            //cria novo objeto de login e determina o nivel minimo para acesso
                            $login = new Login(1);

                            //se o login for criado a pagina é redirecionada para menu.php
                            if ($login->CheckLogin()):
                                header('Location: menu.php');
                            endif;

                            //pega os dados do login e armazena no array
                            $dataLogin = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                            if (!empty($dataLogin['AdminLogin'])):
                                //executa o login
                                $login->ExeLogin($dataLogin);
                            
                            
                                if (!$login->getResult()):
                                    WSErro($login->getError()[0], $login->getError()[1]);
                                else:
                                    //se o login for executado com sucesso a pagina é redirecionada
                                    header('Location: menu.php?acao=home');
                                endif;

                            endif;
                            //capturando o get
                            $get = filter_input(INPUT_GET, 'exe', FILTER_DEFAULT);
                            if (!empty($get)):
                                //caso o usuario tente acessar o site sem fazer login receberá uma mensagem de erro
                                if ($get == 'restrito'):
                                    WSErro('<b>Oppsss:</b> Acesso negado. Favor efetue login para acessar o painel!', WS_ALERT);
                                elseif ($get == 'logoff'):
                                    //se o usuario deslogar receberá uma mensagem de aviso
                                    WSErro('<b>Sucesso ao deslogar:</b> Sua sessão foi finalizada. Volte sempre!', WS_ACCEPT);
                                endif;
                            endif;
                            ?>

                            <div align="center"><h1> Sistema gerenciador de Help Desk </h1> <br></div>                            
                            <form name="AdminLoginForm" action="" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Endereço de e-mail</label>
                                    <input type="email" class="form-control" name="user" />
                                </div> <!--div class="form-group" -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Senha</label>
                                    <input type="password" class="form-control" name="pass" />
                                </div> <!--div class="form-group" -->
                                <input class="btn btn-large btn-primary" name="AdminLogin" type="submit" value="Logar" />
                            </form>
                        </div><!--panel-body -->
                    </div><!--panel panel-default -->
                </div><!--col-md-4-->
            </div><!-- row -->
        </div><!--container-fluid-->

        <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>
