<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>

<!------------------ modal Bancada ----------------------->
<div class="modal fade" id="modalBancada" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Equipamentos encontrados</h3>
      </div>
      <div class="modal-body">
        <table class="table table-hover table-bordered table-condensed">
                <thead>
                    <tr class="">
                        <td><b>Patrimônio</b></td> 
                        <td><b>Tipo</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <td>10002135</td> 
                        <td>CPU</td>
                        <td align="center"><a href="menu.php?acao=historico-equipamento" class="btn btn-info btn-sm">Vizualizar histórico</a></td>
                        <td align="center"><a href="menu.php?acao=bancada" class="btn btn-success btn-sm">Adicionar à bancada</a></td>
                </tbody>
            </table>
      </div>
      <div class="modal-footer bg-primary">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!------------------ modal Bancada ----------------------->

<!------------------ modal Diagnóstico ----------------------->
<div class="modal fade" id="modalDiagnostico" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Adicionar diagnóstico</h3>
      </div>
      <div class="modal-body">
        <form method="post" action="" >
            <div class="form-group">
                <label for="exampleInputFile">Diagnóstico:</label>
                <input 
                    type="text" 
                    name="data" 
                    class="form-control" 
                    required
                    title="Número de série"
                    />  
            </div> <!--div class="form-group"-->
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Salvar mudanças</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!------------------ modal Diagnóstico ----------------------->

<!------------------ modal Finalizar ----------------------->
<div class="modal fade" id="modalFinalizar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Finalizar</h3>
      </div>
      <div class="modal-body">
        <form method="post" action="" >
            <div class="form-group">
                <label for="exampleInputFile">Procedimentos realizados:</label>
                <textarea 
                    class="form-control" 
                    name="ocorrencia" 
                    rows="3"> 
                </textarea>   
            </div> <!--div class="form-group"-->
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Salvar mudanças</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!------------------ modal Finalizar ----------------------->

<!------------------ form Consulta ----------------------->
<form method="post" action="" >
    <div class="col-md-3 col-lg-3 form-horizontal">
        <div class="formulario">
            <form
            <fieldset>
                <legend>Consultar equipamentos</legend>
                
                <div class="form-group"> <div class="input-group">
                    <div class="input-group-addon"><input type="checkbox"> Número de série</div>
                    <input 
                      type="text" 
                      name="hora" 
                      class="form-control" 
                      value=""
                      />
                    </div> 
                </div> <!--div class="form-group"-->
                <div class="form-group"> <div class="input-group">
                        <input type="checkbox"> Setor</div>
                    <select name="idCat">
                        <option value="null">Selecione um setor: </option>
                        <option value="1">Administração</option>
                        <option value="1">UPA</option>
                        <option value="1">UBS Guanabara</option>
                    </select> 
                     
                </div> <!--div class="form-group"-->
                <div class="form-group"> <div class="input-group">
                    <div class="input-group-addon"><input type="checkbox"> Patrimônio</div>
                    <input 
                      type="text" 
                      name="hora" 
                      class="form-control" 
                      value=""
                      />
                    </div> 
                </div> <!--div class="form-group"-->
                
                <a data-toggle="modal" data-target="#modalBancada" href="" class="btn btn-primary btn-lg">Pesquisar</a>
                
            </fieldset>
        </div> <!--div class="formulario"-->
    </div> <!--div class="col-md-5 col-lg-5 form-group "-->
</form>
<!------------------ form Consulta ----------------------->


<div class="row">
    
<div class="col-lg-12" style="padding-top: 20px">
<div class="table-responsive">
<table class="table table-hover table-bordered table-condensed">
    <legend> Bancada </legend>
    <thead>
        <tr class="bg-primary">
            <td><b>Data entrada</b></td>
            <td><b>Patrimônio</b></td> 
            <td><b>Setor</b></td>
            <td><b>Prioridade</b></td>
            <td><b>Tipo</b></td>
            <td><b>Sintoma</b></td>
            <td><b>Status</b></td>
            <td><b>Diagnóstico</b></td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>29/06/2016</td>
            <td>10002135</td> 
            <td>Administração</td>
            <td>2</td>
            <td>CPU</td>
            <td>Não liga</td>
            <td><span class="label label-danger">Pendente</span></td>
            <td align="center"><a data-toggle="modal" data-target="#modalDiagnostico" href="acao=bancada" class="btn btn-success btn-sm">Adicionar diagnóstico</a></td>
            <td align="center"><a data-toggle="modal" data-target="#modalFinalizar" href="acao=bancada" class="btn btn-success btn-sm">Finalizar manutenção</a></td>
        </tr>
        <tr>
            <td>29/06/2016</td>
            <td>10002135</td> 
            <td>Administração</td>
            <td>2</td>
            <td>CPU</td>
            <td>Não liga</td>
            <td><span class="label label-danger">Pendente</span></td>
            <td align="center">Fonte queimada</td>
            <td align="center"><a data-toggle="modal" data-target="#modalFinalizar" href="acao=bancada" class="btn btn-success btn-sm">Finalizar manutenção</a></td>
        </tr>
    </tbody>
</table>
<!--a class="btn btn-primary pull-right"><b><i class="fa fa-download" aria-hidden="true"></i> Download relatório em CSV</b></a-->

</div> <!--div class="table-responsive"-->
</div>
</div>
