<?php
if (!class_exists('Login')):
    header('Location: ../menu.php');
endif;
?>
<form method="post" action="" >
    <div class="col-md-5 col-lg-5 form-group ">
        <div class="formulario">
            <fieldset>
                <legend>Editar atendimentos</legend>

                <?php
                //capturando o id da post
                $id = $_GET['id'];
                
                //criando objeto da consulta
                $consulta = new Read;
                //executando a consulta para preencher os inputs
                $consulta->ExeRead('atendimento', "WHERE idAtendimento = " . $id);
                $cons = $consulta->getResult()[0];
                
                //se exister um post enviar ele irá atualizar
                if (isset($_POST['enviar'])):
                    //passando os dados para o array
                    $post = ['data' => $_POST['data'], 'hora' => $_POST['hora'], 'usuario' => $_POST['usuario'], 'contato' => $_POST['contato'], 'ocorrencia' => $_POST['ocorrencia'], 'categoria_idCat' => (int) $_POST['idCat'], 'ws_users_user_id' => (int) $_POST['user_id']];
                    //cria o objeto de atualização
                    $aten = new Update;
                    //executa a atualização
                    $aten->ExeUpdate('atendimento', $post, 'WHERE idAtendimento = :idAtendimento', "idAtendimento={$id}");
                    //mensagem de aviso
                    $alert = '<div class="alert alert-success" role="alert">Atendimento atualizado com sucesso!!!</div>';
                    echo $alert;
                else:
                    //se houver algum erro, emitira uma mensa
                    $alert = '<div class="alert alert-danger" role="alert">Erro ao atualizar atendimento!!!</div>';
                endif;
                ?>
                
                <div class="form-group">
                    <label for="exampleInputFile">Data:</label>
                    <input 
                        type="text" 
                        name="data" 
                        class="form-control" 
                        value="<?php date_default_timezone_set('America/Sao_Paulo');  echo $data = date('d/m/Y');?>"
                        />  
                </div><!--div class="form-group"-->
                <div class="form-group">
                    <label for="exampleInputFile">Hora:</label>
                    <input 
                        type="text" 
                        name="hora" 
                        class="form-control" 
                        value="<?php date_default_timezone_set('America/Sao_Paulo'); echo $hora = date('H:i');?>"
                        />  
                </div><!--div class="form-group"-->
                <div class="form-group">
                    <label for="exampleInputFile">Usuário:</label>
                    <input 
                        type="text" 
                        name="usuario" 
                        class="form-control" 
                        placeholder="Usuário" 
                        value="<?php echo $cons['usuario']; ?>"
                        />  
                </div><!--div class="form-group"-->
                <div class="form-group">
                    <label for="exampleInputFile">Contato:</label>
                    <input 
                        type="text" 
                        name="contato" 
                        class="form-control" 
                        placeholder="Contato" 
                        value="<?php echo $cons['contato']; ?>"
                        />  
                </div><!--div class="form-group"-->
                <div class="form-group">
                    <label for="exampleInputFile">Categoria:</label>
                    <select name="idCat">
                        <option value="null">Selecione uma categoria: </option>
                        <?php
                        $readCat = new Read();
                        $readCat->ExeRead("categoria", 'ORDER BY categoria ASC');
                        foreach ($readCat->getResult() as $cat):
                            echo utf8_decode("<option value=\"{$cat['idCat']}\"> {$cat['categoria']} </option>");
                        endforeach;
                        ?>
                    </select>  
                </div><!--div class="form-group"-->
                <div class="form-group">
                    <label for="exampleInputFile">Ocorrência:</label>
                    <textarea class="form-control" name="ocorrencia" rows="3"> <?php echo $cons['ocorrencia']; ?> </textarea>  
                </div><!--div class="form-group"-->
                
                <input type="hidden" name="user_id" class="form-control" value="<?php echo $_SESSION['userlogin']['user_id']; ?>">  
                <button type="submit" name="enviar" id="enviar" class="btn btn-primary btn-lg" />Enviar </button>
                <button type="submit" name="limpar" id="limparDados" class="btn  btn-lg btn-default">Limpar</button>
            </fieldset>
        </div> <!--div class="formulario"-->
    </div> <!--div class="col-md-5 col-lg-5 form-group "--> 
</form>

