<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<script src="includes/Chart.min.js"></script>
<script type="text/javascript">
	var randomnb = function () {
		return Math.round(Math.random() * 300)
	};
</script>  
<!-- Icons awesome -->
<link rel="stylesheet" href="css/css/font-awesome.min.css">
<!-- Tiny -->
<script src="js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector: 'textarea'});</script>
<title>Controle de chamados</title>

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Gerenciamento de help desk</span></a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $userlogin['us_nome']; ?>  <?php echo $userlogin['us_sobrenome']; ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Perfil</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Configurações</a></li>
							<li><a href="?logoff=true" onClick="return confirm('Deseja realmente sair?')"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Sair</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<ul class="nav menu">
			<li class="active"><a href="?acao=home"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="?acao=registro"> <i class="fa fa-tasks" aria-hidden="true"></i> Registrar atendimentos</a></li>
			<li><a href="?acao=consulta"> <i class="fa fa-search" aria-hidden="true"></i> Consultar atendimentos</a></li>
			<li><a href="?acao=cad-usuario"> <i class="fa fa-user-plus" aria-hidden="true"></i> Cadastrar usuários</a></li>
			<li><a href="?acao=con-usuario"> <i class="fa fa-users" aria-hidden="true"></i> Consultar usuários</a></li>
			<li><a href="?acao=cadastrar-equipamento"> <i class="fa fa-hdd-o" aria-hidden="true"></i> Cadastrar equipamentos</a></li>
			<li><a href="?acao=consultar-equipamento"> <i class="fa fa-search" aria-hidden="true"></i> Consultar equipamentos</a></li>
			<li role="presentation" class="divider"></li>
		</ul>

	</div><!--/.sidebar-->