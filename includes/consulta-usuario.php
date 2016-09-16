<div class="table-responsive">
    <div class="panel panel-primary">
        <div class="panel-heading"><h2><i class="fa fa-search" aria-hidden="true"></i> Consultar usuários </h2></div> <!--div class="panel-heading"-->
        <div class="panel-body">
            <table class="table table-hover table-bordered table-condensed">
                <thead>
                    <tr class="bg-primary">
                        <td><b>Número</b></td> 
                        <td><b>Nome</b></td>
                        <td><b>Sobrenome</b></td>
                        <td><b>E-mail</b></td>
                        <td><b>Nível</b></td>
                        <td></td>
                        <td></td>   
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //cria objeto de consulta do usuário
                    $con_user = new Read();
                    //executa a consulta
                    $con_user->ExeRead('ws_users');
                    //foreach para preencher a tabela
                    foreach ($con_user->getResult() as $user):
                        echo "<tr>";
                        echo "<td> {$user['user_id']} </td>";
                        echo "<td> {$user['user_name']} </td>";
                        echo "<td> {$user['user_lastname']} </td>";
                        echo "<td> {$user['user_email']} </td>";
                        echo "<td> {$user['user_level']} </td>";
                        echo "<td align=\"center\"> <a href=\"menu.php?acao=editar-usuario&id=" . $user['user_id'] . "\" class=\"btn btn-success\"  > <i class=\"fa fa-pencil\" aria-hidden=\"true\"></i> Editar </a></td>";
                        echo "<td align=\"center\"> <a href=\"menu.php?acao=excluir-usuario&id=" . $user['user_id'] . "\" onClick=\"return confirm('Deseja realmente excluir o usuário?')\" class=\"btn btn-danger\"> <i class=\"fa fa-close\" aria-hidden=\"true\"></i> Excluir </a></td>";
                        echo "</tr>";
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div> <!--div class="panel-body"-->
    </div> <!--div class="panel panel-primary"-->
</div> <!--div class="table-responsive"-->

<div align="center">
    <?php
    $Atual = filter_input(INPUT_GET, 'atual', FILTER_VALIDATE_INT);
    $Pager = new Pager('menu.php?acao=con-usuario&atual=', 'Primeira', 'Última');
    $Pager->ExePager($Atual, 2);

    $read = new Read;
    $read->ExeRead('ws_users', 'LIMIT :limit OFFSET :offset', "limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");

    if (!$read->getRowCount()):
        $Pager->ReturnPage();
        echo 'Não existem resultados!<hr>';
    else:

    endif;

    $Pager->ExePaginator('ws_users');
    echo $Pager->getPaginator();
    ?>
</div>

