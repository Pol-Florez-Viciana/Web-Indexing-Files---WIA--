<!DOCTYPE html>
<html lang="es">
<head>
<!-- Nuevo Interfaz Creada por Pol Flórez Viciana -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Pol Flórez Viciana" >
	<meta name="owner" content="Pol Flórez Viciana" >
    <meta name="description" content="Mapa del Sitio de Ejemplo WIA">
    <meta name="keywords" content="Pol Flórez, Trabajo de Pol Flórez, Pol Software">
    <title>Mapa del Sitio</title>  
    <link rel="stylesheet" href="css/elements.css" type="TEXT/CSS" />
	<link rel="shortcut icon" href="img/Logo.ico" />
	<!-- Opciones Lenguaje -->
	<meta name="language" content="es_ES" />
	<link rel="alternate" hreflang="es" href="https://" />
</head>
<body class="FondoNegro" >


<!-- Aquí Declaraciones Obligatorias para Utilizar las Funciones en el Código del Indice -->
<?php require_once("./clss/elements-generator.php"); ?>

<!-- Aquí Comienza el Código del SiteMap Modificable en Funcion de Tu Negocio -->
<center id="Inicio" >

	<!-- Aquí establezco el enlace de Inicio o el Botón de Inicio -->
	<a class="LinkStart" href="#Inicio">Inicio</a>

	<!-- Titulo de la Página del Sitemap -->
	<h1 class="WebTitle">Ejemplo WIA Raiz Principal - Mapa del Sitio</h1>
	<!--
	<section class="WebSection" >
		<hr>
		<h2 class="TitleSection">Todos los Archivos del Menu Superior</h2>
		<hr>
		<div>
			<?php
				//$Dir = "./Menu-Superior/";
				//$MiNav = GetDataSiteMap($Dir,false,"index.php");
				//echo($MiNav);
			?>
		</div>
		<hr>
	</section>
	-->
	<section class="WebSection" >
		<hr>
		<h2 class="TitleSection">Artículos Destacados de la Raiz General</h2>
		<hr>
		<div>
			<?php
				$Dir = "./Destacados/";
				$MiNav = GetDataSiteMap($Dir,false,"index.php");
				echo($MiNav);
			?>
		</div>
		<hr>
	</section>
	<section class="WebSection" >
		<hr>
		<h2 class="TitleSection">Todos los Datos de la Raiz General</h2>
		<hr>
		<div>
			<?php
				$Dir = "./Raiz-Principal/";
				$MiNav = GetDataSiteMap($Dir,true,"index.php");
				echo($MiNav);
			?>
		</div>
		<hr>
	</section>
	<section class="WebSection" >
		<hr>
		<h2 class="TitleSection">Todos los Archivos del Menu Creditos</h2>
		<hr>
		<div>
			<?php
				$Dir = "./Creditos/";
				$MiNav = GetDataSiteMap($Dir,false,"index.php");
				echo($MiNav);
			?>
		</div>	
		<hr>
	</section>
	<br><br>
		
</center>
</body>
</html>
