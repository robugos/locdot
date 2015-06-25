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
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/style.css" rel="stylesheet">
	<script src="bootstrap/js/jquery.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script>
	$(function() {
		$( "#menuaccordion" ).accordion({
			collapsible: true,
			active: false,
			autoHeight: false,
		});
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
						<li class="active"><a href="">Home <span class="sr-only">(current)</span></a></li>
						<li class="dropdown" id="listalocais">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lista de locais <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<?php
								$sql = 'SELECT * FROM locais ORDER BY idLocal ASC';
								if ($pdo->query($sql)<>"") {
									foreach ($pdo->query($sql) as $row) {
										echo '<li><a href="?idlocal='.$row['idLocal'].'">'.$row['nomeLocal'].'</a></li>';
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
<!--Mapa
	<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d586.1180012791928!2d-34.944347133276615!3d-8.017843997144892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1spt-BR!2sus!4v1434657593582' width='600' height='450' frameborder='0' style='border:0'></iframe></div>-->
</div>
<div role="complementary" class="col-md-5">
	<div id="menuaccordion">
		<h3 class="btn btn-primary btn-lg btn-block menuaccordion">Localiza&ccedil;&atilde;o</h3>
		<div class="accordioncontent">
			<p align="justify"><?php echo $locallocal; ?></p>
		</div>
		<h3 class="btn btn-primary btn-lg btn-block menuaccordion">Hist&oacute;ria</h3>
		<div class="accordioncontent">
			<p>
				Once upon a time...
			</p>
		</div>
		<h3 class="btn btn-primary btn-lg btn-block menuaccordion">Cursos</h3>
		<div class="accordioncontent">
			<p>
				Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
				Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
				ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
				lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
			</p>
			<ul>
				<li>List item one</li>
				<li>List item two</li>
				<li>List item three</li>
			</ul>
		</div>
		<h3 class="btn btn-primary btn-lg btn-block menuaccordion">Informa&ccedil;&otilde;es</h3>
		<div class="accordioncontent">
			<p>
				<?php
					echo "<b>Tipo de local:</b> ".$tipolocal.
					"<br><b>Telefone:</b> ".$fonelocal.
					"<br><b>E-mail:</b> ".$emaillocal.
					"<br><b>Site :</b> ".$sitelocal;
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