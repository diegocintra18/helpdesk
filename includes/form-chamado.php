<?php
if (!class_exists('Login')):
    header('Location: ../menu.php');
endif;
?>
<!------------------ modal Diagnóstico ----------------------->
<div class="modal fade" id="modalCat" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Adicionar categoria
            </div>
            <div class="modal-body">
                <form method="post" action="" >
                    <div class="form-group">
                        <label for="exampleInputFile">Categoria:</label>
                        <input 
                            type="text" 
                            name="categoria" 
                            class="form-control" 
                            title="Categoria"
                            placeholder="Categoria"
                            />  
                    </div><!--div class="form-group"-->
                    <button type="submit" name="enviarCat" id="enviarCat" class="btn btn-primary btn-lg" />Enviar </button>
                    <button type="submit" name="limpar" id="limparDados" class="btn  btn-lg btn-default">Limpar</button>
                </form>
                <?php
                if (isset($_POST['enviarCat'])):
                    //envia os dados do formulário para um array
                    $post = ['ct_categoria' => $_POST['categoria']];

                    //cria novo objeto PDO de inserção
                    $aten = new Create;
                    //executa a inserção
                    $aten->ExeCreate('categorias', $post);

                    $alert = '<div class="alert alert-success" role="alert">Atendimento cadastrado com sucesso!!!</div>';
                    echo $alert;
                else:
                    $alert = '<div class="alert alert-danger" role="alert">Erro ao cadastrar atendimento!!!</div>';
                endif;
                ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!------------------ modal Diagnóstico ----------------------->
<!------------------ modal Setor ----------------------->
<div class="modal fade" id="modalCat" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Adicionar categoria
            </div>
            <div class="modal-body">
                <form method="post" action="" >
                    <div class="form-group">
                        <label for="exampleInputFile">Categoria:</label>
                        <input 
                            type="text" 
                            name="categoria" 
                            class="form-control" 
                            title="Categoria"
                            placeholder="Categoria"
                            />  
                    </div><!--div class="form-group"-->
                    <button type="submit" name="enviarCat" id="enviarCat" class="btn btn-primary btn-lg" />Enviar </button>
                    <button type="submit" name="limpar" id="limparDados" class="btn  btn-lg btn-default">Limpar</button>
                </form>
                <?php
                if (isset($_POST['enviarCat'])):
                    //envia os dados do formulário para um array
                    $post = ['ct_categoria' => $_POST['categoria']];

                    //cria novo objeto PDO de inserção
                    $aten = new Create;
                    //executa a inserção
                    $aten->ExeCreate('categorias', $post);

                    $alert = '<div class="alert alert-success" role="alert">Atendimento cadastrado com sucesso!!!</div>';
                    echo $alert;
                else:
                    $alert = '<div class="alert alert-danger" role="alert">Erro ao cadastrar atendimento!!!</div>';
                endif;
                ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!------------------ modal Setor ----------------------->

<div class="col-md-9 col-lg-9">
    <div class="panel panel-primary">
        <div class="panel-heading"><strong>Registrar atendimentos</strong></div>
        <div class="panel-body">
            <form method="post" action="" >
                <div class=" form-group">
                    <div class="formulario">
                        <fieldset>                        
                            <?php
                            if (isset($_POST['enviarAleatorio'])):
                                //envia os dados do formulário para um array
                                for ($i = 0; $i < 10000; $i++) {

                                    $dataAle = array('2016-09-12 08:10:55', '2016-09-12 09:30:55', '2016-09-12 10:45:55', '2016-09-12 13:30:55', '2016-09-12 15:54:55', '2016-09-12 17:30:55',
                                        '2016-09-13 08:22:55', '2016-09-13 09:30:55', '2016-09-13 11:45:55', '2016-09-13 17:30:55', '2016-09-13 15:11:55', '2016-09-13 17:22:55',
                                        '2016-09-14 08:33:55', '2016-09-14 09:22:55', '2016-09-14 12:45:55', '2016-09-13 14:30:55', '2016-09-14 15:09:55', '2016-09-14 17:08:55',
                                        '2016-09-15 08:44:55', '2016-09-15 09:15:55', '2016-09-15 13:45:55', '2016-09-15 07:59:55', '2016-09-15 15:07:55', '2016-09-15 17:06:55',
                                        '2016-09-16 08:02:55', '2016-09-16 09:29:55', '2016-09-16 14:45:55', '2016-09-16 08:47:55', '2016-09-16 15:06:55', '2016-09-16 17:02:55');
                                    shuffle($dataAle);
                                    current($dataAle);

                                    $nomeAle = array('Diego', 'Bolsomito', 'Tiririca', 'Maria', 'Camila', 'Juliana', 'João', 'Andreia', 'Bianca', 'Carreta Furacão');
                                    shuffle($nomeAle);

                                    $contatoAle = rand(11111111, 99999999);

                                    $ocorrenciaAle = array('Formatar o computador', 'Tirar dúvidas', 'Instalar impressora', 'Fazer back up', 'Reiniciar Switch', 'Sigs com runtime');
                                    shuffle($ocorrenciaAle);

                                    $categoriaAle = rand(1, 4);
                                    $setorAle = rand(1, 5);

                                    $post = ['at_data' => current($dataAle), 'at_users' => current($nomeAle), 'at_contato' => $contatoAle, 'at_ocorrencia' => current($ocorrenciaAle), 'categorias_ct_idcategoria' => (int) $categoriaAle, 'usuarios_us_idUser' => (int) $categoriaAle, 'setores_st_idsetor' => $setorAle];
                                    //cria novo objeto PDO de inserção
                                    $aten = new Create;
                                    //executa a inserção
                                    $aten->ExeCreate('atendimentos', $post);
                                    // Printando mensagem de sucesso na tela
                                }

                                $alert = '<div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    Sucesso ao gerar dados aleatórios!!!</div>';
                                echo $alert;
                            else:
                                $alert = '<div class="alert alert-danger" role="alert">Erro ao cadastrar atendimento!!!</div>';
                            endif;

                            //verifica se existe um metodo post
                            if (isset($_POST['enviar'])):
                                //envia os dados do formulário para um array 
                                $post = ['at_data' => Check::Data($_POST['data']), 'at_users' => $_POST['usuario'], 'at_contato' => $_POST['contato'], 'at_ocorrencia' => $_POST['ocorrencia'], 'categorias_ct_idcategoria' => (int) $_POST['idCat'], 'usuarios_us_idUser' => (int) $_POST['user_id'], 'setores_st_idsetor' => $_POST['setor']];
                                //cria novo objeto PDO de inserção
                                $aten = new Create;
                                //executa a inserção
                                $aten->ExeCreate('atendimentos', $post);
                                // Printando mensagem de sucesso na tela
                                $alert = '<div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    Sucesso ao cadastrar o atendimento!!!</div>';
                                echo $alert;

                            else:
                                $alert = '<div class="alert alert-danger" role="alert">Erro ao cadastrar atendimento!!!</div>';
                            endif;
                            ?>                            
                            <div class="form-group">
                                <label for="exampleInputFile">Data:</label>
                                <input 
                                    type="datetime" 
                                    name="data" 
                                    class="form-control" 
                                    value="<?php
                                    date_default_timezone_set('America/Sao_Paulo');
                                    echo $data = date('d/m/Y H:i');
                                    ?>"                                    
                                    />  
                            </div> <!--div class="form-group"-->
                            <div class="form-group">
                                <label for="exampleInputFile">Usuário:</label>
                                <input 
                                    type="text" 
                                    name="usuario" 
                                    class="form-control" 
                                    placeholder="Usuário" 
                                    />  
                            </div><!--div class="form-group"-->
                            <div class="form-group">
                                <label for="exampleInputFile">Contato:</label>
                                <input type="text" name="contato" class="form-control" placeholder="Contato">  
                            </div>
                            <div class="form-group">
                                <div class="form-inline"> 
                                    <a data-toggle="modal" data-target="#modalCat" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                    <label for="exampleInputFile">Categoria:</label>
                                    <select name="idCat" class="form-control">
                                        <option value="null">Selecione uma categoria: </option>
                                        <?php
                                        //faz a consulta no banco para inserir os valores no combobox
                                        $readCat = new Read();
                                        $readCat->ExeRead("categorias", 'ORDER BY ct_categoria ASC');
                                        foreach ($readCat->getResult() as $cat):
                                            echo "<option value=\"{$cat['ct_idcategoria']}\"> {$cat['ct_categoria']} </option>";
                                        endforeach;
                                        ?>
                                    </select>  
                                </div> <!--div class="form-group"-->
                            </div>
                            <div class="form-group">
                                <div class="form-inline">
                                    <a data-toggle="modal" data-target="#modalTipo" href="acao=bancada" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                    <label for="exampleInputFile">Setor:</label>
                                    <select name="setor" class="form-control">
                                        <option value="null">Selecione um setor: </option>
                                        <?php
                                        //faz a consulta no banco para inserir os valores no combobox
                                        $readSet = new Read();
                                        $readSet->ExeRead("setores", 'ORDER BY st_setor ASC');
                                        foreach ($readSet->getResult() as $set):
                                            echo utf8_decode("<option value=\"{$set['st_idsetor']}\"> {$set['st_setor']} </option>");
                                        endforeach;
                                        ?>
                                    </select>  
                                </div> <!--div class="form-group"-->
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ocorrência:</label>
                                <textarea 
                                    class="form-control" 
                                    name="ocorrencia" 
                                    rows="3"> 
                                </textarea>  
                            </div> <!--div class="form-group"-->
                            <div class="form-group">
                                <input type="hidden" name="user_id" class="form-control" value="<?php echo $_SESSION['userlogin']['us_idUser']; ?>">  
                            </div> <!--div class="form-group" style="display: none"-->

                            <button type="submit" name="enviar" id="enviar" class="btn btn-primary btn-lg" />Enviar </button>
                            <button type="submit" name="limpar" id="limparDados" class="btn  btn-lg btn-default">Limpar</button>
                            <button type="submit" name="enviarAleatorio" id="enviarAleatorio" class="btn btn-success btn-lg pull-right" />Gerar dados aleatórios </button>
                        </fieldset>
                    </div> <!--div class="formulario"-->
                </div> <!--div class="col-md-5 col-lg-5 form-group "-->
            </form>
        </div><!--div class="panel-body"-->
    </div><!--div class="panel panel-danger"-->
</div>
