<div class="col-md-4 form-group">
    <article>
        <?php
        //pega o id do usuario passado pela url
        $id = $_GET['id'];

        //cria novo objeto de consulta
        $consulta = new Read;
        //executa a consulta
        $consulta->ExeRead('ws_users', "WHERE user_id = " . $id);
        $cons = $consulta->getResult()[0];
        
        //passando os dados do form para o array
        $ClienteData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if ($ClienteData && $ClienteData['SendPostForm']):
            unset($ClienteData['SendPostForm']);
            
            //cria novo objeto de usuario
            $cadastra = new AdminUser;
            //faz o update do usuario
            $cadastra->ExeUpdate($id,$ClienteData);

            if ($cadastra->getResult()):
                //mensagem de aviso de sucesso ao cadastrar
                $alert = '<div class="alert alert-success" role="alert">Usuário cadastrado com sucesso!!!</div>';
                echo $alert;
            else:
                //mensagem de erro ao cadastrar
                WSErro($cadastra->getError()[0], $cadastra->getError()[1]);
            endif;
        endif;
        ?>
        <fieldset>
            <legend><h1>Editar Usuário</h1></legend>
            <form action = "" method = "post" name = "UserCreateForm">
                <div class="form-group">
                    <label>
                        <span class="field">Nome:</span>
                    </label>
                    <input
                        class="form-control"
                        type = "text"
                        name = "user_name"
                        title = "Informe seu primeiro nome"
                        value ="<?php echo $cons['user_name']; ?>"
                        required
                        />
                </div><!--div class="form-group"-->
                <div class="form-group">
                    <label>
                        <span class="field">Sobrenome:</span>
                    </label>
                    <input
                        class="form-control"
                        type = "text"
                        name = "user_lastname"
                        title = "Informe seu sobrenome"
                        value = "<?php echo $cons['user_lastname']; ?>"
                        required
                        />
                </div><!--div class="form-group"-->
                <div class="form-group">
                    <label>
                        <span class="field">E-mail:</span>
                    </label>
                    <input
                        class="form-control"
                        type = "email"
                        name = "user_email"
                        title = "Informe seu e-mail"
                        value = "<?php echo $cons['user_email']; ?>"
                        required
                        />
                </div><!--div class="form-group"-->
                <div class="form-group">
                    <label>
                        <span class="field">Senha:</span>
                        <input
                            class="form-control"
                            type = "password"
                            name = "user_password"
                            title = "Informe sua senha [ de 6 a 12 caracteres! ]"
                            pattern = ".{6,12}"
                            required
                            />
                    </label>
                </div><!--div class="form-group"-->
                <div class="form-group">
                    <label>
                        <span class="field">Nível:</span>
                        <select name = "user_level" title = "Selecione o nível de usuário" required >
                            <option value = "">Selecione o Nível</option>
                            <option value = "1" <?php if (isset($ClienteData['user_level']) && $ClienteData['user_level'] == 1) echo 'selected="selected"'; ?>>User</option>
                            <option value="2" <?php if (isset($ClienteData['user_level']) && $ClienteData['user_level'] == 2) echo 'selected="selected"'; ?>>Editor</option>
                            <option value="3" <?php if (isset($ClienteData['user_level']) && $ClienteData['user_level'] == 3) echo 'selected="selected"'; ?>>Admin</option>
                        </select>
                    </label>
                </div><!--div class="form-group"-->
                <input type="submit" name="SendPostForm" value="Enviar" class="btn btn-primary btn-large" />
            </form>
        </fieldset>
    </article>
</div> <!--div class="col-md-4 form-group"-->


