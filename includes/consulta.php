<div class="table-responsive">
    <div class="panel panel-primary">
        <div class="panel-heading"><h2><i class="fa fa-search" aria-hidden="true"></i> Consulta de atendimentos </h2></div>
        <div class="panel-body">
            <table class="table table-hover table-bordered table-condensed">
                <thead>
                    <tr class="bg-primary">
                        <td><b>Número</b></td> 
                        <td><b>Data</b></td>
                        <td><b>Hora</b></td>
                        <td><b>Usuário</b></td>
                        <td><b>Contato</b></td>
                        <td><b>Ocorrência</b></td>
                        <td><b>Categoria</b></td>
                        <td><b>Técnico</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //Mecanismo de paginação
                    $Atual = filter_input(INPUT_GET, 'atual', FILTER_VALIDATE_INT);
                    $Pager = new Pager('menu.php?acao=consulta&atual=', 'Primeira', 'Última');
                    $Pager->ExePager($Atual, 4);

                    $read = new Read;
                    $read->ExeRead('atendimento', 'LIMIT :limit OFFSET :offset', "limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");

                    if (!$read->getRowCount()):
                        $Pager->ReturnPage();
                        echo 'Não existem resultados!<hr>';
                    endif;

                    $Pager->ExePaginator('atendimento');
                    
                    //Cria objeto de consulta
                    $readConsulta = new Read();
                    //Executa a consulta
                    $readConsulta->ExeRead("atendimento a", "INNER JOIN categoria c on a.categoria_idCat = c.idCat INNER JOIN ws_users u on a.ws_users_user_id = u.user_id");
                    //foreach para exibir o resultado na tela
                    foreach ($readConsulta->getResult() as $consulta):

                        echo "<tr>";
                        echo utf8_decode("<td align=\"center\"> {$consulta['idAtendimento']}</td>");
                        echo utf8_decode("<td> {$consulta['data']}</td>");
                        echo utf8_decode("<td> {$consulta['hora']}</td>");
                        echo utf8_decode("<td> {$consulta['usuario']}</td>");
                        echo utf8_decode("<td> {$consulta['contato']}</td>");
                        echo utf8_decode("<td> {$consulta['ocorrencia']}</td>");
                        echo utf8_decode("<td> {$consulta['categoria']} </td>");
                        echo "<td> {$consulta['user_name']}</td>";
                        echo "<td align=\"center\"> <a href=\"menu.php?acao=editar-atendimento&id=" . $consulta['idAtendimento'] . "\" class=\"btn btn-success\"  > <i class=\"fa fa-pencil\" aria-hidden=\"true\"></i> Editar </a></td>";
                        echo "<td align=\"center\"> <a href=\"menu.php?acao=excluir-atendimento&id=" . $consulta['idAtendimento'] . "\" onClick=\"return confirm('Deseja realmente excluir o atendimento?')\" class=\"btn btn-danger\"> <i class=\"fa fa-close\" aria-hidden=\"true\"></i> Excluir </a></td>";
                        echo "</tr>";

                    endforeach;
                    ?>                                                              
                </tbody>
            </table>
            <!--a class="btn btn-primary pull-right"><b><i class="fa fa-download" aria-hidden="true"></i> Download relatório em CSV</b></a-->
        </div> <!--div class="panel-body"-->
    </div> <!--div class="panel panel-primary"-->
</div> <!--div class="table-responsive"-->
    <div align="center">
        <?php
        echo $Pager->getPaginator();
        ?>
    </div><!--div align="center"-->
