<form method="post" action="" >
    <div class="col-md-5 col-lg-5 form-group ">
        <div class="formulario">
            <fieldset>
                <legend>Cadastrar equipamentos</legend>
                <div class="form-group">
                    <label for="exampleInputFile">Número de série:</label>
                    <input 
                        type="text" 
                        name="data" 
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
                        name="hora" 
                        class="form-control" 
                        value=""
                        />  
                </div><!--div class="form-group"-->
                <div class="form-group"> 
                    <label for="exampleInputFile">Tipo:</label>
                    <select name="idCat">
                        <option value="null">Selecione uma categoria: </option>
                        <option value="1">CPU</option>
                        <option value="2">Estabilizador/No-break</option>
                        <option value="3">Impressora</option>
                        <option value="4">Monitor</option>
                        <option value="5">Notebook</option>
                        <option value="6">Projetor</option>
                        <option value="7">Relógio de ponto</option>
                    </select>  
                </div> <!--div class="form-group"-->
                <div class="form-group">
                    <label for="exampleInputFile">Data de aquisição:</label>
                    <input type="date" name="contato" class="form-control" >  
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Tempo de garantia(anos):</label>
                    <input 
                        type="text" 
                        name="usuario" 
                        class="form-control" 
                        
                        />  
                </div><!--div class="form-group"-->
                <div class="form-group">
                    <label for="exampleInputFile">Descrição:</label>
                    <textarea 
                        class="form-control" 
                        name="ocorrencia" 
                        rows="3"> 
                    </textarea>  
                </div> <!--div class="form-group"-->
                <div class="form-group" style="display: none">
                    <label for="exampleInputFile">Usuário:</label>
                </div> <!--div class="form-group" style="display: none"-->

                <button type="submit" name="enviar" id="enviar" class="btn btn-primary btn-lg" />Enviar </button>
                
            </fieldset>
        </div> <!--div class="formulario"-->
    </div> <!--div class="col-md-5 col-lg-5 form-group "-->
</form>
