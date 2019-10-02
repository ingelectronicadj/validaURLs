<html>

<head>
	<meta charset="utf-8">
	<title>Validador de URL's - UNAD</title>
	<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Interfaz para la automatización de la validación de enlaces URL’s, herramienta de apoyo para el gestor tecnopedagógico que realiza revisión de entornos de conocimiento.">
	<meta name="keywords" content="scripting web vimep, validador de URL's">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<?php
		session_start(); 
	?>
	<header>
		<div class="header">
			<div class="moduleTop_izq">
				<figure>
					<a href="https://www.unad.edu.co/#" title="Aplicativo para verificación de enlaces URL's"><img src="images/logoUNAD.png" srcset="images/logoUNAD-HD.png 2x" alt="Unad"></a>
				</figure>
			</div>
			<div class="moduleTop_der">
				<div class="custom">
					<div class="caja1">
						<div class="caja2">Vicerrectoría de Medios y Mediaciones Pedagógicas</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="page-header">
		<h2 class="headline" itemprop="headline">Ejecución de script's desde el navegador</h2>
	</div>
	
	<?php
		if (isset($_SESSION['message']) && $_SESSION['message'])
		{
		printf('<b>%s</b>', $_SESSION['message']);
		unset($_SESSION['message']);
		}
	?>
	<form method="POST" action="upload.php" enctype="multipart/form-data">
	<h2>Cargue sus archivos:</h2>
		<div class="upload">
			<input type="file" name="uploadedFile" />
			<input type="submit" name="uploadBtn" value="Subir" />
		</div>
		
	</form>

	<?php
	if (isset($_POST['lista_url'])) {
		$output = shell_exec('bash ./scripts/crawler.sh /home/diegiot/projects/scripts/validaURLs/ficherosDePruebas/fichero.pdf');
		//echo "<pre>".$output."</pre>";
		?>
		<div class="container-centro">
			<p>Reporte:
				<a class="link" href="./salidas/url-list.php">Listado de enlaces URL</a>
			</p>
		</div>
		<?php
	}?>
	<form action="" method="post">
		<input class="BotonAzul" type="submit" name="lista_url" value="Extraer enlaces">
	</form>

	<?php
	if (isset($_POST['validaURL'])) {
		$output = shell_exec('bash ./scripts/csvcheck.sh ./scripts/urls-list.txt');
		// echo "<pre>".$output."</pre>";
		?>
		<div class="container-centro">
			<p>Reporte: 
				<a class="link" href="./salidas/urlRotos.php">Enlaces rotos</a> ||
				<a class="link" href="./salidas/urlBuenos.php">Enlaces buenos</a>
			</p>
		</div>
		<?php
	}?>
	<form action="" method="post">
		<input class="BotonAzul" type="submit" name="validaURL" value="Filtrar enlaces">
	</form>

	<div class="footer">
		<img src="images/footer_UNAD.png">
	</div>
</body>

</html>