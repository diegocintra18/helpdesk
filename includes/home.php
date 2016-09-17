<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading"><strong>Últimos atendimentos</strong></div>
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
                    //cria um objeto de consulta
                    $readConsulta = new Read();
                    //executa a consulta
                    $readConsulta->ExeRead("atendimentos a", "INNER JOIN categorias c on a.categorias_ct_idcategoria = c.ct_idcategoria INNER JOIN usuarios u on a. usuarios_us_idUser  = u.us_idUser LIMIT 5");
                    //foreach para exibição na tela
                    foreach ($readConsulta->getResult() as $consulta):

                        echo "<tr>";
                        echo utf8_decode("<td> {$consulta['at_data']}</td>");
                        echo utf8_decode("<td> {$consulta['at_users']}</td>");
                        echo utf8_decode("<td> {$consulta['at_contato']}</td>");
                        echo utf8_decode("<td> {$consulta['at_ocorrencia']}</td>");
                        echo utf8_decode("<td> {$consulta['ct_categoria']} </td>");
                        echo "<td> {$consulta['us_nome']} {$consulta['us_sobrenome']}</td>";
                        echo "</tr>";

                    endforeach;
                    ?>                                                              
                </tbody>
            </table>
        </div><!--div class="panel-body"-->
    </div><!--div class="panel panel-danger"-->
</div><!--div class="col-lg-12"-->
<?php
    $Consulta = new Read();
    $ConsultaTotal = new Read();
    //executa a consulta
    //$Consulta->ExeRead("atendimentos a", "INNER JOIN categorias c on a.categorias_ct_idcategoria = c.ct_idcategoria INNER JOIN usuarios u on a. usuarios_us_idUser  = u.us_idUser LIMIT 5");
    //foreach para exibição na tela
?>
<div class="col-lg-4">
    <div class="panel panel-primary">
        <div class="panel-heading">Aten. por técnico</div>
        <div class="panel-body">            
            <?php               
                $ConsultaUser = new Read();
                $ConsultaUser->ExeRead("usuarios");
                foreach($ConsultaUser->getResult() as $user){
                    
                    $Consulta->ExeRead("atendimentos", "where usuarios_us_idUser = {$user['us_idUser']}");
                    
                    $ConsultaTotal->ExeRead("atendimentos");
                    $a = $ConsultaTotal->getRowCount();
                    $b = $Consulta->getRowCount();
                    $c = ($b * 100) / $a;                    
                    echo $user['us_nome'] . " " . $user['us_sobrenome'];
                    echo ": <b>" . $b . "</b>";
                    echo '<div class="progress">' ;
                    echo "<div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"20\" aria-valuemin=\"0\" aria-valuemax=\"400\" style=\"width:" . $c . "%\">";
                    echo round($c, 2) . "%";
                    echo '</div><!--div class="progress-bar"-->';
                    echo '</div><!--div class="progress"-->';
                }
            ?>     
        </div><!--div class="panel-body"-->
    </div><!--div class="panel panel-primary"-->
</div><!--div class="col-lg-3"-->

<div class="col-lg-4">
    <div class="panel panel-primary">
        <div class="panel-heading">Aten. por categoria</div>
        <div class="panel-body">            
            <?php               
                $ConsultaCat = new Read();
                $ConsultaCat->ExeRead("categorias");
                foreach($ConsultaCat->getResult() as $cat){
                    
                    $Consulta->ExeRead("atendimentos", "where categorias_ct_idcategoria = {$cat['ct_idcategoria']}");
                    
                    $ConsultaTotal->ExeRead("atendimentos");
                    $a = $ConsultaTotal->getRowCount();
                    $b = $Consulta->getRowCount();
                    $c = ($b * 100) / $a;                    
                    echo $cat['ct_categoria'];
                    echo ": <b>" . $b . "</b>";
                    echo '<div class="progress">' ;
                    echo "<div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"20\" aria-valuemin=\"0\" aria-valuemax=\"400\" style=\"width:" . $c . "%\">";
                    echo round($c, 2) . "%";
                    echo '</div><!--div class="progress-bar"-->';
                    echo '</div><!--div class="progress"-->';
                }
            ?>     
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