<?php
include 'dbconnect.php';
$pdo = Database::connect();
if(isset($_GET['idlocal'])) {
	$idlocal = $_GET['idlocal'];
	$sql = 'SELECT * FROM locais WHERE idLocal='.$idlocal;
	foreach ($pdo->query($sql) as $row) {
		$nomelocal=$row['nomeLocal'];
		$tipolocal=$row['tipoLocal'];
		$emaillocal=$row['emailLocal'];
		$fonelocal=$row['foneLocal'];
		$sitelocal=$row['siteLocal'];
		$locallocal=$row['localLocal'];
	}
	
}else{
		$idlocal = '';
		$nomelocal='Nenhum local selecionado.';
		$tipolocal='Indisponível';
		$emaillocal='Indisponível';
		$fonelocal='Indisponível';
		$sitelocal='Indisponível';
		$locallocal='Nenhum local selecionado.';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>loc.dot</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/style.css" rel="stylesheet">
	<script src="bootstrap/js/jquery.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script>
	function getParam(name) {
		var query = location.search.substring(1);
		if (query.length) {
			var parts = query.split('&');
			for (var i = 0; i < parts.length; i++) {
				var pos = parts[i].indexOf('=');
				if (parts[i].substring(0,pos) == name) {
					return parts[i].substring(pos+1);
				}
			}
		}
		return false;
	}

	$(function() {
		var defaultPanel = parseInt(getParam('panel'));
		$( "#menuaccordion" ).accordion({
			collapsible: true,
			active: defaultPanel,
			autoHeight: false,
		});
		
		$( "#draggable" ).draggable();
	});
	</script>
</head>
<body>
	<div class"container-fluid">
		<header class="row">
			<figure class="banner">
				<img src="./images/banner.png"/>
			</figure>
			<h1>loc.dot</h1>
		</header>
		<nav class="navbar navbar-default main">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!--<a class="navbar-brand" href="#">Brand</a>-->
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-left">
						<li class="active"><a href="./">Home <span class="sr-only">(current)</span></a></li>
						<li class="dropdown" id="listalocais">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lista de locais <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<?php
								$sql = 'SELECT * FROM locais ORDER BY idLocal ASC';
								if ($pdo->query($sql)<>"") {
									foreach ($pdo->query($sql) as $row) {
										echo '<li><a href="?idlocal='.$row['idLocal'].'&panel=0">'.$row['nomeLocal'].'</a></li>';
									}
								}
								?>
								<!--<li role="separator" class="divider"></li>-->
							</ul>
						</li>
					</ul>
					<!--<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>-->
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
		<div class="row">
			<div role="main" class="col-md-7" style="text-align: center; vertical-align: middle;">
	<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><div id="draggable" style="width: 600px; height: 450px; padding: 0.5em;" class="ui-widget-content"><?php include("map.php"); ?><!--<iframe src='map.php' width='600' height='450' frameborder='0' style='border:0'></iframe>--><p>teste</p></div></div>
</div>
<div role="complementary" class="col-md-5">
	<div id="menuaccordion">
		<h3 class="btn btn-primary btn-lg btn-block menuaccordion">Localiza&ccedil;&atilde;o</h3>
		<div class="accordioncontent">
			<p align="justify"><?php echo $locallocal <> '' ? $locallocal : "Indisponível"; ?></p>
		</div>
		<h3 class="btn btn-primary btn-lg btn-block menuaccordion">Hist&oacute;ria</h3>
		<div class="accordioncontent">
			<p>
				Once upon a time...
			</p>
		</div>
		<h3 class="btn btn-primary btn-lg btn-block menuaccordion">Cursos</h3>
		<div class="accordioncontent">
			<p><ul>
				<?php
					$sql = "SELECT * FROM locais_cursos, cursos WHERE locais_cursos.idLocal='$idlocal' AND locais_cursos.idCurso = cursos.idCurso";
					if ($pdo->query($sql)->rowCount() > 0) {
						foreach ($pdo->query($sql) as $row) {
							echo '<li><a href="'.$row['siteCurso'].'" alt="'.$row['nomeCurso'].'" title="'.$row['nomeCurso'].'">'.$row['nomeCurso'].'</a></li>';
						}
					}else{
						echo "Este local não possui cursos associados.";
					}
					?>
			</ul></p>
		</div>
		<h3 class="btn btn-primary btn-lg btn-block menuaccordion">Informa&ccedil;&otilde;es</h3>
		<div class="accordioncontent">
			<p>
				<?php
					echo "<b>Tipo de local:</b> ";
					echo $tipolocal <> '' ? $tipolocal : "Indisponível";
					echo "<br><b>Telefone:</b> ";
					echo $fonelocal <> '' ? $fonelocal : "Indisponível";
					echo "<br><b>E-mail:</b> ";
					echo $emaillocal <> '' ? $emaillocal : "Indisponível";
					echo "<br><b>Site :</b> ";
					echo $sitelocal <> '' ? $sitelocal : "Indisponível";
				?>
			</p>
		</div>
	</div>
</div>
</div>
<footer class="row">
	&copy; 2015 loc.dot. Todos os direitos reservados.
</footer>
</div>

<!-- jQuery (necessario para os plugins Javascript Bootstrap) -->

</body>
</html>
<?php
Database::disconnect();
?>