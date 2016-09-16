<?php
if (!class_exists('Login')):
    header('Location: ../menu.php');
endif;
?>
<div class="col-md-9 col-lg-9">
    <div class="panel panel-primary">
    <div class="panel-heading"><strong>Registrar atendimentos</strong></div>
        <div class="panel-body">
            <form method="post" action="" >
                <div class=" form-group">
                    <div class="formulario">
                        <fieldset>                        
                            <?php
                            //verifica se existe um metodo post
                            if (isset($_POST['enviar'])):
                                //envia os dados do formulário para um array
                                
                                $dataFinal = $_POST['data'];
                                //$timestamp = mktime($dataFinal);
                                //echo Check::Data($dataFinal);
                                $post = ['at_data' => Check::Data($dataFinal), 'at_users' => $_POST['usuario'], 'at_contato' => $_POST['contato'], 'at_ocorrencia' => $_POST['ocorrencia'], 'categorias_ct_idcategoria' => (int) $_POST['idCat'], 'usuarios_us_idUser' => (int) $_POST['user_id'], 'setores_st_idsetor' => $_POST['setor']];
                                //cria novo objeto PDO de inserção
                                $aten = new Create;
                                //executa a inserção
                                $aten->ExeCreate('atendimentos', $post);

                                $alert = '<div class="alert alert-success" role="alert">Atendimento cadastrado com sucesso!!!</div>';
                                echo $alert;
                                echo '<pre>';
                                var_dump($post);
                                echo '</pre>';
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
                                <label for="exampleInputFile">Categoria:</label>
                                <select name="idCat">
                                    <option value="null">Selecione uma categoria: </option>
                                    
                                    <?php
                                    //faz a consulta no banco para inserir os valores no combobox
                                    $readCat = new Read();
                                    $readCat->ExeRead("categorias", 'ORDER BY ct_categoria ASC');
                                    foreach ($readCat->getResult() as $cat):
                                        echo utf8_decode("<option value=\"{$cat['ct_idcategoria']}\"> {$cat['ct_categoria']} </option>");
                                    endforeach;
                                    ?>
                                    
                                </select>  
                            </div> <!--div class="form-group"-->
                            <div class="form-group"> 
                                <label for="exampleInputFile">Setor:</label>
                                <select name="setor">
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
                        </fieldset>
                    </div> <!--div class="formulario"-->
                </div> <!--div class="col-md-5 col-lg-5 form-group "-->
            </form>
        </div><!--div class="panel-body"-->
    </div><!--div class="panel panel-danger"-->
</div>
