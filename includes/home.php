<div class="col-lg-12">
    <div class="panel panel-danger">
        <div class="panel-heading"><strong>Chamados pendentes</strong></div>
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
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //Mecanismo de paginação
                    $Atual = filter_input(INPUT_GET, 'atual', FILTER_VALIDATE_INT);
                    $Pager = new Pager('menu.php?acao=consulta&atual=', 'Primeira', 'Última');
                    $Pager->ExePager($Atual, 4);

                    $read = new Read;
                    $read->ExeRead('atendimentos', 'LIMIT :limit OFFSET :offset', "limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");

                    if (!$read->getRowCount()):
                        $Pager->ReturnPage();
                        echo 'Não existem resultados!<hr>';
                    else:

                    endif;

                    $Pager->ExePaginator('atendimentos');

                    //cria um objeto de consulta
                    $readConsulta = new Read();
                    //executa a consulta
                    $readConsulta->ExeRead("atendimentos a", "INNER JOIN categorias c on a.categorias_ct_idcategoria = c.ct_idcategoria INNER JOIN usuarios u on a. usuarios_us_idUser  = u.us_idUser");
                    //foreach para exibição na tela
                    foreach ($readConsulta->getResult() as $consulta):

                        echo "<tr>";
                        echo utf8_decode("<td> {$consulta['at_data']}</td>");
                        echo utf8_decode("<td> {$consulta['at_users']}</td>");
                        echo utf8_decode("<td> {$consulta['at_contato']}</td>");
                        echo utf8_decode("<td> {$consulta['at_ocorrencia']}</td>");
                        echo utf8_decode("<td> {$consulta['ct_categoria']} </td>");
                        echo "<td> {$consulta['us_nome']}</td>";
                        echo "</tr>";

                    endforeach;
                    ?>                                                              
                </tbody>
            </table>
        </div><!--div class="panel-body"-->
    </div><!--div class="panel panel-danger"-->
</div><!--div class="col-lg-12"-->

<div class="col-lg-3">
    <div class="panel panel-primary">
        <div class="panel-heading">Total de atendimentos</div>
        <div class="panel-body">
            Atendimentos Fulano:
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                    60%
                </div><!--div class="progress-bar"-->
            </div><!--div class="progress"-->
            Atendimentos Beltrano:
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                    20%
                </div><!--div class="progress-bar"-->
            </div><!--div class="progress"-->
            Atendimentos x:
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                    10%
                </div><!--div class="progress-bar"-->
            </div><!--div class="progress"-->
            Atendimentos z:
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                    10%
                </div><!--div class="progress-bar"-->
            </div><!--div class="progress"-->
        </div><!--div class="panel-body"-->
    </div><!--div class="panel panel-primary"-->
</div><!--div class="col-lg-3"-->

<div class="col-lg-3">
    <div class="panel panel-primary ">
        <div class="panel-heading">Total de atendimentos por categoria</div>
        <div class="panel-body">
            Impressora:
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                    60%
                </div><!--div class="progress-bar"-->
            </div><!--div class="progress"-->
            Rede:
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                    20%
                </div><!--div class="progress-bar"-->
            </div><!--div class="progress"-->
            Sistema:
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                    10%
                </div><!--div class="progress-bar"-->
            </div><!--div class="progress"-->
            Formatação:
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                    10%
                </div><!--div class="progress-bar"-->
            </div><!--div class="progress"-->
        </div><!--div class="panel-body"-->
    </div><!--div class="panel panel-primary"-->
</div><!--div class="col-lg-3"-->

<div class="col-lg-6">
    <div class="panel panel-primary ">
        <div class="panel-heading">Atendimentos mensais</div>
        <div class="panel-body">
            <div class="box">
                <div class="box-chart">
                    <canvas id="GraficoPizza" style="width:100%;"></canvas>

                    <script type="text/javascript">

                        var options = {
                            responsive: true
                        };

                        var data = [
                            {
                                value: randomnb(),
                                color: "#F7464A",
                                highlight: "#FF5A5E",
                                label: "Janeiro"
                            },
                            {
                                value: randomnb(),
                                color: "#46BFBD",
                                highlight: "#5AD3D1",
                                label: "Fevereiro"
                            },
                            {
                                value: randomnb(),
                                color: "#FDB45C",
                                highlight: "#FFC870",
                                label: "Março"
                            },
                            {
                                value: randomnb(),
                                color: "#1111FF",
                                highlight: "#3344FF",
                                label: "Abril"
                            }

                        ]

                        window.onload = function () {

                            var ctx = document.getElementById("GraficoPizza").getContext("2d");
                            var PizzaChart = new Chart(ctx).Pie(data, options);
                        }
                    </script> 
                </div><!--div class="box-chart"-->
            </div><!--div class="box"-->
        </div><!--div class="panel-body"-->
    </div><!--div class="panel panel-primary "-->
</div><!--div class="col-lg-6"-->