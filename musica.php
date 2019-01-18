<?php // Codigo Para Decir que utiliza coockies
if(isset($_POST["AceptoUsoCookies"])){
    $TiempoTrace = time() + (86400 * 30);
    setcookie("Acepto", "Acepto el Uso de Coockies de Seguimiento", $TiempoTrace, "/" );
    header('location:' . $_SERVER['PHP_SELF']);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<!-- Nuevo Interfaz Creada por Pol Flórez Viciana -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Pol Flórez Viciana" >
	<meta name="owner" content="Pol Flórez Viciana" >
    <meta name="description" content="">
    <meta name="keywords" content="Pol Flórez, Trabajo de Pol Flórez, Pol Software">
    <title>Music and Vídeo</title>  
    <link rel="stylesheet" href="css/musica.css" type="TEXT/CSS" />
	<link rel="shortcut icon" href="img/Logo.ico" />
	<!--
	<script src="./js/calendario-module.js" ></script>
	-->
	<!-- Opciones Lenguaje -->
	<meta name="language" content="es_ES" />
	<link rel="alternate" hreflang="es" href="http://" />
    <!-- API Google -->
    <script src="https://apis.google.com/js/platform.js" async defer>
      {lang: 'es'}
    </script>
</head>
<body style="font-size: 0.9em;" onload="ExitCargandoAnimated()">

<div class="hidden">
<!-- Aquí Declaración Obligatoria para Utilizar las Funciones en el Código del Indice -->
<?php require_once("./clss/elements-generator.php"); ?>
</div>

<?php
// Codigo para Aceptar el Uso de Cookies
if (!isset($_COOKIE["Acepto"])){
	echo '<div id="AvisoLegal" >';
	echo '<form id="Formulario1" name="Formulario1" method="POST" action="musica.php" ><br>'; 
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
	
	<!-- Animacion Cargando -->
	<p id="Cargando" class="WebTitle" style="z-index: 14; position: relative; top: auto; left: auto;" >-</p>
	<script>
		var TimeForLoad = window.setInterval("AnimacionLetras()",1000);
		var NumeroLetra = 0;
		var GoToExit = false; 
		function ExitCargandoAnimated(){
			GoToExit = true;
			NumeroLetra = 0;
			window.clearInterval(TimeForLoad);
			var ControlCargando = document.getElementById("Cargando");
			ControlCargando.style = "color: green; z-index: 14; position: relative; top: auto; left: auto;";
			ControlCargando.innerHTML = "-Consulte Ahora-";
		}
		function AnimacionLetras(){
			var ControlCargando = document.getElementById("Cargando");
			switch(NumeroLetra){
				case 0:
					ControlCargando.innerHTML = "-";	
					break;
				case 1:
					ControlCargando.innerHTML = "C.";	
					break;
				case 2:
					ControlCargando.innerHTML = "C.A.";	
					break;
				case 3:
					ControlCargando.innerHTML = "C.A.R.";	
					break;
				case 4:
					ControlCargando.innerHTML = "C.A.R.G.";	
					break;
				case 5:
					ControlCargando.innerHTML = "C.A.R.G.A.";	
					break;
				case 6:
					ControlCargando.innerHTML = "C.A.R.G.A.N.";	
					break;
				case 7:
					ControlCargando.innerHTML = "C.A.R.G.A.N.D.";	
					break;
				case 8:
					ControlCargando.innerHTML = "C.A.R.G.A.N.D.O.";	
			}
			if (GoToExit == true ){ ControlCargando.innerHTML = "-Consulte Ahora-"; }
			if (NumeroLetra == 8){ NumeroLetra = 0; }else{ NumeroLetra = NumeroLetra + 1; }
		}	
	</script>
	
	<!-- Titulo de la Web -->
	<h1 class="WebTitle"  style="z-index: 13; position: relative; top: auto; left: auto;" >Solo Música By Lop.</h1>
	
	<!-- Esta Parte Solo Esta Porque Hay Una GetSections() en esta Pagina, y de ser así, se le establece Una Raíz Llamada Musica -->
	<section id="Inicio">
		<h2 class="WebTitle">Los Contenidos de Música en Vídeo de YouTube y Personales</h2>	
		<br>
		<a class="LinkSection" href="#Sesiones">Vídeos de YouTube de Aquí</a><br>
		<br>
		<?php 
			$Dir = "./Raiz-Web-Musica/";
			$MisSecciones = GetLinkSectionsVertical($Dir,"musica.php");
			echo($MisSecciones);
		?>
	</section>

	<br><br>

	<!-- Esta Parte Carga Los Últimos Articulos de las Secciones de la Raíz Musica Que Existan -->
	<section style="color: white;">
		<b><label style="color: limegreen;">Últimas Incorporaciones:</label></b><br>
		<?php 
			$Dir = "./Raiz-Web-Musica/";
			$MisSecciones = GetCurrentArticles($Dir,"musica.php");
			echo($MisSecciones);
		?>
	</section>
	<br>
	
	<br><br>

	<hr>
	
	<br><br>
	
	<!-- Aquí Cargo La Seccion de la Carpeta de Vídeos de YouTube -->
	<section id="Sesiones" class="Section">
		<br>
		<hr>
		<br><br>
		<hr>
		<?php
			$Dir = "./YouTube/";
			$ObjFileSys = new ObjectFileSystem();
			$NumSecciones = $ObjFileSys->FolderFilesCount($Dir);
			$MiSection = '<hr><h2 class="TitleSection">Vídeos de YouTube: <label class="ColorBlanco">' . $NumSecciones . ' Vídeos</label></h2><hr>' ;
			$MiSection = $MiSection . GetYouTubes($Dir);
			echo $MiSection;
		?>
		<hr>
	</section>
	
	<br><br>
	
	<!-- Aquí Cargo Las Secciones de la Raíz Música -->
	<section>
		<?php
			$Dir = "./Raiz-Web-Musica/";
			$MiSection = GetSections($Dir);
			echo $MiSection;
		?>
	</section>

	<br><br>
	
	<!-- Aquí Cargo el Botón Compartir de Google -->
	<div id="Compartir" class="Section">
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