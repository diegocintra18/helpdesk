<form method="post" action="" >
    <div class="col-md-6 col-lg-6 form-group ">
        <div class="formulario">
            <fieldset>
                <legend>Adicionar à bancada</legend>
                <div class="form-group">
                    <label for="exampleInputFile">Problema apresentado:</label>
                    <textarea 
                        class="form-control" 
                        name="ocorrencia" 
                        rows="3"> 
                    </textarea>  
                </div> <!--div class="form-group"-->
                <div class="form-group">
                    <label for="exampleInputFile">Patrimônio:</label>
                    <input 
                        type="text" 
                        name="hora" 
                        class="form-control" 
                        value="10002135"
                        />  
                </div><!--div class="form-group"-->
                <div class="form-group"> 
                    <label for="exampleInputFile">Prioridade:</label>
                    <select name="idCat">
                        <option value="null">Selecione o nível de prioridade: </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>  
                </div> <!--div class="form-group"-->
                <div class="form-group">
                    <label for="exampleInputFile">Data de entrada:</label>
                    <input type="date" name="contato" class="form-control" >  
                </div>
                
                <button type="submit" name="enviar" id="enviar" class="btn btn-primary btn-lg" />Enviar </button>
                
            </fieldset>
        </div> <!--div class="formulario"-->
    </div> <!--div class="col-md-5 col-lg-5 form-group "-->
</form>


<form method="post" action="" >
    <div class="col-md-6 col-lg-6 form-group ">
        <div class="formulario">
            <fieldset>
                <legend>Dados do equipamento</legend>
                <div class="form-group">
                    <label for="exampleInputFile">Número de série:</label>
                    <input 
                        type="text" 
                        name="data" 
                        class="form-control" 
                        required
                        title="Número de série"
                        value="BRG139002016"
                        />  
                </div> <!--div class="form-group"-->
                <div class="form-group">
                    <label for="exampleInputFile">Patrimônio:</label>
                    <input 
                        type="text" 
                        name="hora" 
                        class="form-control" 
                        value="10002135"
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
                        value="3"
                        />  
                </div><!--div class="form-group"-->
                <div class="form-group">
                    <label for="exampleInputFile">Descrição:</label>
                    <textarea 
                        class="form-control" 
                        name="ocorrencia" 
                        rows="3"> 
                        CPU HP Compaq PRO 400, 4 gb, 500 hd, Serial do Windows: XXXX-XXXX-XXXX-XXXX-XXXX
                    </textarea>  
                </div> <!--div class="form-group"-->
                

                <button type="submit" name="enviar" id="enviar" class="btn btn-primary btn-lg" />Enviar </button>
                
            </fieldset>
        </div> <!--div class="formulario"-->
    </div> <!--div class="col-md-5 col-lg-5 form-group "-->
</form>
