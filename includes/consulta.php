<div class="table-responsive">
    <div class="panel panel-primary">
        <div class="panel-heading"><h2> Consulta de atendimentos </h2></div>
        <div class="panel-body">
            <table class="table table-hover table-bordered table-condensed">
                <thead>
                    <tr class="bg-primary"> 
                        <td><b>Data</b></td>
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
                    //Cria objeto de consulta
                    $readConsulta = new Read();
                    //Executa a consulta
                    $readConsulta->ExeRead("atendimentos a", "INNER JOIN categorias c on a.categorias_ct_idcategoria = c.ct_idcategoria INNER JOIN usuarios u on a.usuarios_us_idUser = u.us_idUser ORDER BY at_data DESC LIMIT 300");
                    //foreach para exibir o resultado na tela
                    foreach ($readConsulta->getResult() as $consulta):
                        $data = $consulta['at_data'];
                        echo "<tr>";
                        echo ("<td>". date('d/m/Y H:i:s', strtotime($data)) . "</td>");
                        echo utf8_decode("<td> {$consulta['at_users']}</td>");
                        echo utf8_decode("<td> {$consulta['at_contato']}</td>");
                        echo utf8_decode("<td> {$consulta['at_ocorrencia']}</td>");
                        echo utf8_decode("<td> {$consulta['ct_categoria']} </td>");
                        echo "<td> {$consulta['us_nome']} {$consulta['us_sobrenome']}</td>";
                        echo "<td align=\"center\"> <a href=\"menu.php?acao=editar-atendimento&id=" . $consulta['at_idAtendimento'] . "\" class=\"btn btn-success\"  > <i class=\"fa fa-pencil\" aria-hidden=\"true\"></i> Editar </a></td>";
                        echo "<td align=\"center\"> <a href=\"menu.php?acao=excluir-atendimento&id=" . $consulta['at_idAtendimento'] . "\" onClick=\"return confirm('Deseja realmente excluir o atendimento?')\" class=\"btn btn-danger\"> <i class=\"fa fa-close\" aria-hidden=\"true\"></i> Excluir </a></td>";
                        echo "</tr>";

                    endforeach;
                    ?>                                                              
                </tbody>
            </table>
            <!--a class="btn btn-primary pull-right"><b><i class="fa fa-download" aria-hidden="true"></i> Download relatório em CSV</b></a-->
        </div> <!--div class="panel-body"-->
    </div> <!--div class="panel panel-primary"-->
</div> <!--div class="table-responsive"-->
 
