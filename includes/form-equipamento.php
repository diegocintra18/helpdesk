<!------------------ modal Diagnóstico ----------------------->
<div class="modal fade" id="modalTipo" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Adicionar tipo de equipamento
            </div>
            <div class="modal-body">
                <form method="post" action="" >
                    <div class="form-group">
                        <label for="exampleInputFile">Equipamento:</label>
                        <input 
                            type="text" 
                            name="tipo" 
                            class="form-control" 
                            required
                            title="Equipamento"
                            />  
                    </div> <!--div class="form-group"-->
                    <div class="">
                        <button type="submit" name="enviarTipo" id="enviarTipo" class="btn btn-primary">Salvar</button>
                        <button type="button"  class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
<!------------------ modal Diagnóstico ----------------------->    
    <?php
    if (isset($_POST['enviarTipo'])):
        //envia os dados do formulário para um array
        $postTipo = ['tp_tipo' => $_POST['tipo']];

        //cria novo objeto PDO de inserção
        $aten = new Create;
        //executa a inserção
        $aten->ExeCreate('tipo', $postTipo);

        $alert = '<script> alert("Tipo de equipamento cadastrado com sucesso!"); </script>';
        echo $alert;
    else:
        $alert = '<script> alert("Erro ao cadastrar um tipo de equipamento!"); </script>';
    endif;
    ?>
</div><!-- /.modal -->
<!------------------ modal Diagnóstico ----------------------->
<!------------------ Inserindo no banco ----------------------->
<?php
//verifica se existe um metodo post
if (isset($_POST['enviar'])):
    //envia os dados do formulário para um array 
    $post = ['eq_serial' => $_POST['numSerie'], 'eq_patrimonio' => $_POST['patrimonio'], 'eq_descricao' => $_POST['descricao'], 'eq_status' => $_POST['status'], 'eq_dataAquisicao' => Check::Data($_POST['data']), 'eq_garantia' => $_POST['garantia'], 'tipo_tp_idTipo' => (int) $_POST['idTipo']];
    //cria novo objeto PDO de inserção
    $aten = new Create;
    //executa a inserção
    $aten->ExeCreate('equipamentos', $post);
    // Printando mensagem de sucesso na tela
    $alert = '<div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    Sucesso ao cadastrar o atendimento!!!</div>';
    echo $alert;
else:
    $alert = '<div class="alert alert-danger" role="alert">Erro ao cadastrar atendimento!!!</div>';
endif;
?> 
<!------------------ Inserindo no banco ----------------------->

<!------------------ Formulário ----------------------->
<div class="col-md-9 col-lg-9">
    <div class="panel panel-primary">
        <div class="panel-heading"><strong>Cadastrar equipamentos</strong></div>
        <div class="panel-body">
            <form method="post" action="" >
                <div class="form-group ">
                    <div class="formulario">
                        <fieldset>
                            <div class="form-group">
                                <label for="exampleInputFile">Número de série:</label>
                                <input 
                                    type="text" 
                                    name="numSerie" 
                                    class="form-control" 
                                    value=""
                                    required
                                    title="Número de série"
                                    />  
                            </div> <!--div class="form-group"-->
                            <div class="form-group">
                                <label for="exampleInputFile">Patrimônio:</label>
                                <input 
                                    type="text" 
                                    name="patrimonio" 
                                    class="form-control" 
                                    value=""
                                    />  
                            </div><!--div class="form-group"-->
                            <div class="form-group">
                                <div class="form-inline"> 
                                    <a data-toggle="modal" data-target="#modalTipo" href="acao=bancada" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                    <label for="exampleInputFile">Tipo:</label>
                                    <select name="idTipo" class="form-control">
                                        <option value="null">Selecione o tipo do equipamento: </option>
                                        <?php
                                        //faz a consulta no banco para inserir os valores no combobox
                                        $readTipo = new Read();
                                        $readTipo->ExeRead("tipo", 'ORDER BY tp_tipo ASC');
                                        foreach ($readTipo->getResult() as $tipo):
                                            echo utf8_decode("<option value=\"{$tipo['tp_idTipo']}\"> {$tipo['tp_tipo']} </option>");
                                        endforeach;
                                        ?>
                                    </select>
                                </div> <!--div class="form-group"-->
                            </div>

                            <div class="form-group">
                                <div class="form-inline"> 
                                    <label for="exampleInputFile">Status:</label>
                                    <select name="status" class="form-control">
                                        <option value="null">Selecione o status do equipamento: </option>
                                        <option value="1">Bom</option>
                                        <option value="2">Ruim</option>
                                        <option value="3">Desativado</option>
                                    </select>
                                </div> <!--div class="form-group"-->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Data de aquisição:</label>
                                <input type="text" name="data" class="form-control" 
                                       value="<?php
                                       date_default_timezone_set('America/Sao_Paulo');
                                       echo $data = date('d/m/Y');
                                       ?>">  
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Tempo de garantia(anos):</label>
                                <input 
                                    type="text" 
                                    name="garantia" 
                                    class="form-control"
                                    />  
                            </div><!--div class="form-group"-->
                            <div class="form-group">
                                <label for="exampleInputFile">Descrição:</label>
                                <textarea 
                                    class="form-control" 
                                    name="descricao" 
                                    rows="3"> 
                                </textarea>  
                            </div> <!--div class="form-group"-->

                            <button type="submit" name="enviar" id="enviar" class="btn btn-primary btn-lg" />Enviar </button>
                        </fieldset>
                    </div> <!--div class="formulario"-->
                </div> <!--div class="col-md-5 col-lg-5 form-group "-->
            </form>
        </div><!--div class="panel-body"-->
    </div><!--div class="panel panel-danger"-->
</div>