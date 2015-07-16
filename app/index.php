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
		$objetivolocal=$row['objetivoLocal'];
		$informacoeslocal=$row['informacoesLocal'];
	}
	
}else{
	$idlocal = '';
	$nomelocal='';
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
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/style.css" rel="stylesheet">
	<script src="bootstrap/js/jquery.js"></script>
	<script src="bootstrap/js/jquery-1.9.1.min.js"></script>
	<script src="bootstrap/js/easyResponsiveTabs.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/easy-responsive-tabs.js"></script>
	<script type="text/javascript" src="bootstrap/js/jquery.zclip.js"></script>

	<link rel="icon" type="image/png" href="images/favicon.png" />


	<script>

	$(document).ready(function(){

    $('a#copy-description').zclip({
        path:'http://robugos.com/locdot/app/bootstrap/js/ZeroClipboard.swf',
        copy:$('p#description').text(),
    });

    // The link with ID "copy-description" will copy
    // the text of the paragraph with ID "description"


    $('a#copy-dynamic').zclip({
        path:'http://robugos.com/locdot/app/bootstrap/js/ZeroClipboard.swf',
        copy:function(){return $('p#dynamic').val();}
    });

    // The link with ID "copy-dynamic" will copy the current value
    // of a dynamically changing input with the ID "dynamic"

});

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

	$(document).ready(function() {
        //Horizontal Tab
        $('#tab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
            	var $tab = $(this);
            	var $info = $('#nested-tabInfo');
            	var $name = $('span', $info);
            	$name.text($tab.text());
            	$info.show();
            }
        });
        
        $('#lpeditor').load(function(){
                $("#lpeditor").contents().find(".draggable").draggable({
                    iframeFix: true,
                });
            }); 
    });
	</script>
</head>
<body>
	<div class"container-fluid">
		<header class="row">
			<figure class="banner">
				<img src="./images/locdotlogo_smaller.png" style="max-width:100%;height:auto;" />
			</figure>
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
										echo '<li><a href="?idlocal='.$row['idLocal'].'">'.$row['nomeLocal'].'</a></li>';
									}
								}
								?>
								<!--<li role="separator" class="divider"></li>-->
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><?php echo $nomelocal <> '' ? "Você está em <b>".$nomelocal : ""; ?></b></a></li>
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
			<div role="complementary" class="col-md-7">
				<div class='embed-container'>
						<!--< ?php include("map.php"); ?>-->
						<iframe src='map.php' width='600' height='450' frameborder='0' style='border:0' id="lpeditor" scrolling="no"></iframe>
				</div>
			</div>
			<div role="main" class="col-md-5">
				<div id="tab">
					<ul class="resp-tabs-list hor_1">
						<li class="btn btn-default btn-lg btn-li">Localiza&ccedil;&atilde;o</li>
						<li class="btn btn-default btn-lg btn-li">Hist&oacute;ria</li>
						<li class="btn btn-default btn-lg btn-li">Cursos</li>
						<li class="btn btn-default btn-lg btn-li">Informa&ccedil;&otilde;es</li>
					</ul>
					<div class="resp-tabs-container hor_1">
						<div>
							<p align="justify" id="description"><?php echo $locallocal <> '' ? $locallocal : "Indisponível"; ?></p>
							<p align="center" style="margin:10px;">
								<a href="#" id="copy-description" class="btn btn-warning btn-lg">Copiar localiza&ccedil;&atilde;o</a>
							</p>
						</div>
						<div>
							<p align="justify" id="historico">
								<?php echo $informacoeslocal <> '' ? $informacoeslocal : "Indisponível"; ?>
							</p>
						</div>
						<div>
							<p><ul>
								<?php
								$sql = "SELECT * FROM locais_cursos, cursos WHERE locais_cursos.idLocal='$idlocal' AND locais_cursos.idCurso = cursos.idCurso";
								if ($pdo->query($sql)->rowCount() > 0) {
									foreach ($pdo->query($sql) as $row) {
										echo '<li style="list-style: none; margin:10px;"><a class="btn btn-warning btn-lg btn-block" href="'.$row['siteCurso'].'" alt="'.$row['nomeCurso'].'" title="'.$row['nomeCurso'].'" target="_blank">'.$row['nomeCurso'].'</a></li>';
									}
								}else{
									echo "Este local não possui cursos associados.";
								}
								?>
							</ul></p>
						</div>
						<div>
							<table class="table table-hover">
								<tbody>
									<tr>
										<td class="col-md-2"><b>Tipo de local:</b></td>
										<td class="col-md-10"><?php echo $tipolocal <> '' ? $tipolocal : "Indisponível"; ?></td>
									</tr>
									<tr>
										<td class="col-md-2"><b>Telefone:</b></td>
										<td class="col-md-10"><?php echo $fonelocal <> '' ? $fonelocal : "Indisponível"; ?></td>
									</tr>
									<tr>
										<td class="col-md-2"><b>E-mail:</b></td>
										<td class="col-md-10"><?php $emaillocal <> '' ? $emaillocal : "Indisponível"; ?></td>
									</tr>
									<tr>
										<td class="col-md-2"><b>Site:</b></td>
										<td class="col-md-10"><?php echo $sitelocal <> '' ? "<a href=".$sitelocal." target='_blank'>".$sitelocal."</a>" : "Indisponível"; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
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