<?php
if (!class_exists('Login')):
    header('Location: ../menu.php');
endif;
?>
<form method="post" action="" >
    <div class="col-md-3 col-lg-3 form-group ">
        <div class="formulario">
            <fieldset>
                <legend>Cadastrar categoria</legend>
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
            </fieldset>
        </div> <!--div class="formulario"-->
    </div> <!--div class="col-md-3 col-lg-3 form-group "-->
</form>
<?php
//recebendo os dados do form
/*$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($data['enviarCat'])):
    unset($data['enviarCat']);

    //cria novo objeto categoria
    $cadastra = new AdminCat();
    //executa a inserção
    echo '<pre>';
    var_dump($cadastra);
    $cadastra->ExeCreate($post);
endif;*/
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