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
                    $readConsulta->ExeRead("atendimentos a", "INNER JOIN categorias c on a.categorias_ct_idcategoria = c.ct_idcategoria INNER JOIN usuarios u on a. usuarios_us_idUser  = u.us_idUser ORDER BY at_data DESC LIMIT 5");
                    //foreach para exibição na tela
                    foreach ($readConsulta->getResult() as $consulta):

                        echo "<tr>";
                        $data = $consulta['at_data'];
                        echo "<td>" . date('d/m/Y H:i:s', strtotime($data)) . "</td>";
                        echo utf8_decode("<td> {$consulta['at_users']}</td>");
                        echo utf8_decode("<td> {$consulta['at_contato']}</td>");
                        echo "<td> {$consulta['at_ocorrencia']}</td>";
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
<div class="col-lg-12">
    <div class="alert bg-success" align="center" role="alert">
        <?php
        $ConsultaTotal->ExeRead("atendimentos");
        $a = $ConsultaTotal->getRowCount();
        echo "<b style=\"font-size: 22px;\">" . number_format($a, 0, ",", ".") . " atendimentos realizados </b>";
        ?>
    </div>
</div>
<div class="col-lg-4">
    <div class="panel panel-blue">
        <div class="panel-heading">Aten. por técnico</div>
        <div class="panel-body">            
            <?php
            $ConsultaUser = new Read();
            $ConsultaUser->ExeRead("usuarios");
            foreach ($ConsultaUser->getResult() as $user) {

                $Consulta->ExeRead("atendimentos", "where usuarios_us_idUser = {$user['us_idUser']}");
                $b = $Consulta->getRowCount();
                $c = ($b * 100) / $a;
                echo $user['us_nome'] . " " . $user['us_sobrenome'];
                echo ": <b>" . number_format($b, 0, ",", ".") . "</b>";
                echo '<div class="progress">';
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
    <div class="panel panel-teal">
        <div class="panel-heading">Aten. por categoria</div>
        <div class="panel-body">            
            <?php
            $ConsultaCat = new Read();
            $ConsultaCat->ExeRead("categorias");
            foreach ($ConsultaCat->getResult() as $cat) {

                $Consulta->ExeRead("atendimentos", "where categorias_ct_idcategoria = {$cat['ct_idcategoria']}");
                $b = $Consulta->getRowCount();
                $c = ($b * 100) / $a;
                echo $cat['ct_categoria'];
                echo ": <b>" . number_format($b, 0, ",", ".") . "</b>";
                echo '<div class="progress">';
                echo "<div class=\"progress-bar progress-bar-success\" role=\"progressbar\" aria-valuenow=\"20\" aria-valuemin=\"0\" aria-valuemax=\"400\" style=\"width:" . $c . "%\">";
                echo round($c, 2) . "%";
                echo '</div><!--div class="progress-bar"-->';
                echo '</div><!--div class="progress"-->';
            }
            ?>     
        </div><!--div class="panel-body"-->
    </div><!--div class="panel panel-primary"-->
</div><!--div class="col-lg-3"-->

<div class="col-lg-4">
    <div class="panel panel-orange">
        <div class="panel-heading">Aten. por setor</div>
        <div class="panel-body">            
            <?php
            $ConsultaCat = new Read();
            $ConsultaCat->ExeRead("setores");
            foreach ($ConsultaCat->getResult() as $cat) {

                $Consulta->ExeRead("atendimentos", "where setores_st_idsetor = {$cat['st_idsetor']}");
                $b = $Consulta->getRowCount();
                $c = ($b * 100) / $a;
                echo $cat['st_setor'];
                echo ": <b>" . number_format($b, 0, ",", ".") . "</b>";
                echo '<div class="progress">';
                echo "<div class=\"progress-bar progress-bar-danger\" role=\"progressbar\" aria-valuenow=\"20\" aria-valuemin=\"0\" aria-valuemax=\"400\" style=\"width:" . $c . "%\">";
                echo round($c, 2) . "%";
                echo '</div><!--div class="progress-bar"-->';
                echo '</div><!--div class="progress"-->';
            }
            ?>     
        </div><!--div class="panel-body"-->
    </div><!--div class="panel panel-primary"-->
</div><!--div class="col-lg-3"-->

<div class="col-lg-12">
    <div class="panel panel-primary ">
        <div class="panel-heading">Atendimentos da semana</div>
        <div class="panel-body">
            <div class="box">
                <div class="box-chart">

                    <canvas id="GraficoBarra" style="width:100%;"></canvas>

                    <script type="text/javascript">

                        var options = {
                            responsive: true
                        };
                        <?php
                            $consultaDias = new Read();
                            $consultaDias->FullRead("SELECT * from atendimentos where at_data between '2016-09-12 00:00:00' and '2016-09-12 23:59:59'"); 
                            $consultaDias2 = new Read();
                            $consultaDias2->FullRead("SELECT * from atendimentos where at_data between '2016-09-13 00:00:00' and '2016-09-13 23:59:59'");                           
                            $consultaDias3 = new Read();
                            $consultaDias3->FullRead("SELECT * from atendimentos where at_data between '2016-09-14 00:00:00' and '2016-09-14 23:59:59'");                           
                            $consultaDias4 = new Read();
                            $consultaDias4->FullRead("SELECT * from atendimentos where at_data between '2016-09-15 00:00:00' and '2016-09-15 23:59:59'");                           
                            $consultaDias5 = new Read();
                            $consultaDias5->FullRead("SELECT * from atendimentos where at_data between '2016-09-16 00:00:00' and '2016-09-16 23:59:59'");                           
                        ?>
                        var data = {
                            labels: ["Segunda", "Terça", "Quarta", "Quinta", "Sexta"],
                            datasets: [
                                {
                                    label: "Dados primários",
                                    fillColor: "rgba(220,220,220,0.5)",
                                    strokeColor: "rgba(220,220,220,0.8)",
                                    highlightFill: "rgba(220,220,220,0.75)",
                                    highlightStroke: "rgba(220,220,220,1)",
                                    data: [<?php echo $segunda = $consultaDias->getRowCount(); ?>, 
                                        <?php echo $terça = $consultaDias2->getRowCount(); ?>, 
                                        <?php echo $quarta = $consultaDias3->getRowCount(); ?>, 
                                        <?php echo $quinta = $consultaDias4->getRowCount(); ?>, 
                                        <?php echo $sexta = $consultaDias5->getRowCount(); ?>]
                                }
                            ]
                        };

                        window.onload = function () {
                            var ctx = document.getElementById("GraficoBarra").getContext("2d");
                            var BarChart = new Chart(ctx).Bar(data, options);
                        }
                    </script>
                </div>
            </div><!--div class="box" -->
        </div><!--div class="panel-body"-->
    </div><!--div class="panel panel-primary "-->
</div><!--div class="col-lg-6"-->

