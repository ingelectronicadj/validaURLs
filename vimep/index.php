<html>

<head>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>Scripting Web</h1> <h1 class="vimep">VIMEP</h1>
	<h2>Ejecución de script desde el navegador</h2>
	<header>
		<div class="header">
			<figure>
				<a href="#"
					title="Script de la VIMEP Universidad Nacional Abierta y a Distancia">
					<img src="https://www.unad.edu.co/templates/unadgeneral/images/logoUNAD.png" alt="Unad"></a>
			</figure>
		</div>
	</header>
	<?php
	session_start(); 
	?>
	<?php
		if (isset($_SESSION['message']) && $_SESSION['message'])
		{
		printf('<b>%s</b>', $_SESSION['message']);
		unset($_SESSION['message']);
		}
	?>
	<form method="POST" action="upload.php" enctype="multipart/form-data">
		<div>
		<span>Cargue sus archivos:</span>
		<input type="file" name="uploadedFile" />
		<input type="submit" name="uploadBtn" value="Subir" />
		</div>
	</form>

	<?php
	if (isset($_POST['lista_url'])) {
		$output = shell_exec('bash ./scripts/crawler.sh /home/diegiot/projects/scripts/validaURLs/ficherosDePruebas/fichero.pdf');
		//echo "<pre>".$output."</pre>";
		?>
		<a href="./salidas/url-list.php">Listado de enlaces URL</a>
		<?php
	}?>
	<form action="" method="post">
		<input type="submit" name="lista_url" value="Extraer enlaces">
	</form>

	<?php
	if (isset($_POST['validaURL'])) {
		$output = shell_exec('bash ./scripts/csvcheck.sh ./scripts/urls-list.txt');
		// echo "<pre>".$output."</pre>";
		?>
		<a href="./salidas/urlRotos.php">Enlaces rotos</a>
		<a href="./salidas/urlBuenos.php">Enlaces buenos</a>
		<?php
	}?>
	<form action="" method="post">
		<input type="submit" name="validaURL" value="Filtrar enlaces">
	</form>
</body>

</html>