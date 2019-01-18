<?php 
// Codigo Para Decir que utiliza coockies
if(isset($_POST["AceptoUsoCookies"])){
    //$_COOKIE["Acepto"] = "Acepto el Uso de Cookies y el Aviso Legal de Pol Software";
    $TiempoTrace = time() + (86400 * 30);
    setcookie("Acepto", "Acepto el Uso de Coockies de Seguimiento", $TiempoTrace, "/" );
    header('location:' . $_SERVER['PHP_SELF']);
}
?>
<!DOCTYPE html>
<html  lang="es">
<head>
<!-- Nuevo Raiz Secundaria -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Pol Flórez Viciana" >
	<meta name="owner" content="Pol Flórez Viciana" >
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Raiz Principal - Ejemplo Web WIA</title>  
    <link rel="stylesheet" href="css/elements.css" type="TEXT/CSS" />
	<link rel="shortcut icon" href="img/Logo.ico" />
	<!-- Opciones Lenguaje -->
	<meta name="language" content="es_ES" />
	<link rel="alternate" hreflang="es" href="http://" />
    <!-- API Google -->
    <script src="https://apis.google.com/js/platform.js" async defer>
      {lang: 'es'}
    </script>
	
</head>
<body class="FondoNegro" >

<header class="hidden">
<!-- Aquí Declaración Obligatoria para Utilizar las Funciones en el Código del Indice -->
<?php require_once("./clss/elements-generator.php"); ?>
</header>

<?php
// Codigo para Aceptar el Uso de Cookies
if (!isset($_COOKIE["Acepto"])){
	echo '<div id="AvisoLegal" >';
	echo '<form id="Formulario1" name="Formulario1" method="POST" action="raiz-principal.php" ><br>'; 
	echo '<input type="text" id="AceptoUsoCookies" name="AceptoUsoCookies" value="Acepto" class="InVisible" />';
	echo '<b><label class="ColorRed">Aviso Legal:</label></b> <label class="ColorWhite">Este Sitio Web hace uso de <i>Coockies de Seguimiento</i> para Mejorar Nuestros Servicios <a class="LinkArticle" href="./Politica-de-Uso-de-Coockies.pdf" target="_BLANK" >Mas Información</a>.<br>¿Aceptas el Uso de Coockies de Seguimiento?</label> ';
	echo ' <input type="submit" class="Margen5px Padding5px Fuente7mm BorderRadius10px DisplayLineBlock FondoVerde ColorNegro" value="Entendido" /><br><br>';
	echo '</form></div>';
}
?>

<!-- Aquí Comienza el Código del Indice Modificable en Funcion de Tu Negocio -->
<center>
	
	<!-- Menú Superior o Secciones de las Carpetas Principales -->
	<nav class="Menu-Superior" >
		<div>
			<div class="LinkSection" style="display: inline-block;" ><a class="LinkStartMenu" href="index.php#Inicio">Inicio</a></div>
			<!-- Cargamos los Elementos del Menú Superior que Contiene las Secciones de las Carpetas Principales -->
			<?php include_once('./Menus/menu-superior.php'); ?>
		</div>
		<hr>
	</nav>

	<br><br><br><br><br><br>

	<!-- Titulo de la Web -->
	<h1 class="WebTitle"> Ejemplo Web WIA Raiz Principal</h1>

	<!-- Aquí Cargo Todos los Artículos y Secciones de Toda la Raíz Llamada Raiz-Secundaria -->
	<section>
		<?php
			$Dir = "./Raiz-Web-Principal/";
			$MiSection = GetSections($Dir);
			echo $MiSection;
		?>
	</section>
	
	<br><br>

<!-- Aquí Cargo el Botón Compartir de Google -->
<div id="Compartir" class="Tamano98x100">
	<hr>
	<br><br>
	<!-- Google + -->
	<div class="g-plus DisplayLineBlock" data-action="share" data-width="200" data-href="http://"></div>
	<br><br>
	<hr>
</div>
</center>
</body>
</html>
