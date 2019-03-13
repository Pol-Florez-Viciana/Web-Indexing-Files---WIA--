<?php 
// Codigo Para Decir que acepta el uso de coockies
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
	<!-- Caracteristicas Predeterminadas -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Autor y Descripción -->
	<meta name="author" content="Pol Flórez Viciana" >
	<meta name="owner" content="Pol Flórez Viciana" >
    <meta name="description" content="">
    <meta name="keywords" content="Pol Flórez, Trabajo de Pol Flórez, Pol Software">
    <!-- Titulo, Hoja de Estilos de Elements e Icono -->
	<title>Ejemplo Web WIA - Raiz Inicio</title>  
    <link rel="stylesheet" href="css/elements.css" type="TEXT/CSS" />
	<link rel="shortcut icon" href="img/Logo.ico" />
	<script src="./js/calendario-module.js" ></script>
	<!-- Opciones Lenguaje -->
	<meta name="language" content="es_ES" />
	<!-- Change This Dir To Your Dir Site -->
	<link rel="alternate" hreflang="es" href="http://www.@.com/" />
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
	echo '<form id="Formulario1" name="Formulario1" method="POST" action="index.php" ><br>'; 
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
	<h1 class="WebTitle" style="z-index: 13; position: relative; top: auto; left: auto;" >Ejemplo Web WIA</h1>
	<p class="WebTitle" style="z-index: 14; position: relative; top: auto; left: auto;" >Raiz-Inicio</p>
	
	<!-- Aquí Comienza El Cuadro de Cabecera que Contiene el Inicio, que Contiene las Secciones y un Listado de Últimos Artículos Actualizados -->
	<header id="Inicio" class="TextAlignCenter" >
		<!-- Este NAV contiene El Resumen de Todos los Elementos del Web ( Secciones y Ultimos Articulos + Los Destacados ) -->
		<nav>
			
			<br><br><br><br>
				
				<!-- Esta SECTION Contiene El Calendario y el Reloj Con los Links de Secciones ( Uno Horizontal y los Demás en Vertical ) -->
				<section class="ColorWhite TextAlignJustify" style="display: inline-block; vertical-align: top; min-width: 200px; width: 42%;">	
					
					<!-- Este DIV Contiene el Calendario 
					<div id="Calendario" class="TextAlignCenter" width="100%"  height="240" ></div>
					-->
					
					<!-- Este DIV Contiene El Reloj 
					<div id="RelojDigital" class="TextAlignCenter" style="width: 100%; display: inline-block; max-width: 480px; font-size: 10mm;" ></div>
					-->
					<!-- Este DIV Contiene Todos los Links de Secciones ( Uno Horizontal y los Demás en Vertical ) -->
					<div style="color: white; background-color: rgba(0,0,32,0.7); padding: 5px;">
						<label class="ColorRed">Secciones Y Artículos de Noticias:</label><br>
						<?php 
							$Dir = "./Raiz-Web-Noticias/"; // Esta es la Dirección de la Carpeta Raíz Noticias
							$MisSecciones = GetLinkSections($Dir,"index.php"); // Cargo La Sección Asociada a esta Carpeta Esta Ubicada en index.php en la Variable 
							echo($MisSecciones); // Y las Escribo a esta Parte de la Página
						?>
						<br><br>	
						<label class="ColorRed">Secciones y Artículos de Aplicaciones:</label><br>
						<?php 
							$Dir = "./Raiz-Web-Aplicaciones/"; // Esta es la Dirección de la Carpeta Raíz Aplicaciones
							$MisSecciones = GetLinkSectionsVertical($Dir,"aplicaciones.php"); // Cargo La Sección Asociada a esta Carpeta Esta Ubicada en index.php en la Variable 
							echo($MisSecciones); // Y las Escribo a esta Parte de la Página
						?>
						<br><br>
						<label class="ColorRed">Secciones y Artículos de Raiz Principal:</label><br>
						<?php 
							$Dir = "./Raiz-Web-Principal/"; // Esta es la Dirección de la Carpeta Raíz Raiz-Principal
							$MisSecciones = GetLinkSectionsVertical($Dir,"raiz-principal.php"); // Cargo La Sección Asociada a esta Carpeta Esta Ubicada en index.php en la Variable 
							echo($MisSecciones); // Y las Escribo a esta Parte de la Página
						?>
						<br><br>
					</div>
				</section>
				<!-- Esta SECTION Contiene los Links de Secciones ( Uno Horizontal y los Demás en Vertical ) -->
				<section class="ColorWhite TextAlignJustify" style="display: inline-block; vertical-align: top; min-width: 200px; width: 42%;">	
					<!-- Este DIV Contiene Todos los Links de Secciones ( Uno Horizontal y los Demás en Vertical ) -->
					<div style="color: white; background-color: rgba(0,0,32,0.7); padding: 5px;">
						<label class="ColorRed">Uso de GetListArticles Sobre Aplicaciones:</label><br>
						<?php 
							$Dir = "./Raiz-Web-Aplicaciones/"; // Esta es la Dirección de la Carpeta Raíz Musica
							$MisSecciones = GetListArticles($Dir,"aplicaciones.php"); // Cargo La Sección Asociada a esta Carpeta Esta Ubicada en musica.php en la Variable 
							echo($MisSecciones); // Y las Escribo a esta Parte de la Página
						?>
						<br><br>
						<label class="ColorRed">Uso de GetListIconArticles Sobre Aplicaciones:</label><br>
						<?php 
							$Dir = "./Raiz-Web-Aplicaciones/"; // Esta es la Dirección de la Carpeta Raíz Musica
							$MisSecciones = GetListIconArticles($Dir,"aplicaciones.php"); // Cargo La Sección Asociada a esta Carpeta Esta Ubicada en musica.php en la Variable 
							echo($MisSecciones); // Y las Escribo a esta Parte de la Página
						?>
						<br><br>
						<label class="ColorRed">Uso de GetListReportArticles Sobre Aplicaciones:</label><br>
						<?php 
							$Dir = "./Raiz-Web-Aplicaciones/"; // Esta es la Dirección de la Carpeta Raíz Musica
							$MisSecciones = GetListReportArticles($Dir,"aplicaciones.php"); // Cargo La Sección Asociada a esta Carpeta Esta Ubicada en musica.php en la Variable 
							echo($MisSecciones); // Y las Escribo a esta Parte de la Página
						?>
						<br><br>
						<br><br>
						<label class="ColorRed">Todos los Artículos de Noticias:</label><br>
						<?php 
							$Dir = "./Raiz-Web-Noticias/"; // Esta es la Dirección de la Carpeta Raíz Musica
							$MisSecciones = GetListIconArticles($Dir,"index.php"); // Cargo La Sección Asociada a esta Carpeta Esta Ubicada en musica.php en la Variable 
							echo($MisSecciones); // Y las Escribo a esta Parte de la Página
						?>
						<br><br>
						<label class="ColorRed">Secciones de Raiz-Secundaria:</label><br>
						<?php 
							$Dir = "./Raiz-Web-Secundaria/"; // Esta es la Dirección de la Carpeta Raíz Raiz-Secundaria
							$MisSecciones = GetLinkSectionsVertical($Dir,"raiz-secundaria.php"); // Cargo La Sección Asociada a esta Carpeta Esta Ubicada en raiz-secundaria.php en la Variable 
							echo($MisSecciones); // Y las Escribo a esta Parte de la Página
						?>
						<br><br>
						<label class="ColorRed">Secciones de Música:</label><br>
						<?php 
							$Dir = "./Raiz-Web-Musica/"; // Esta es la Dirección de la Carpeta Raíz Musica
							$MisSecciones = GetLinkSectionsVertical($Dir,"musica.php"); // Cargo La Sección Asociada a esta Carpeta Esta Ubicada en musica.php en la Variable 
							echo($MisSecciones); // Y las Escribo a esta Parte de la Página
						?>
						<br><br>
						<label class="ColorRed">Espacio para Raices Varias a Está:</label><br><br>
						<a class="LinkSection" href="raiz-secundaria.php" target="_BLANK" >Raiz Secundaria</a><br><br>
						<a class="LinkSection" href="#Compartir">Compartir esta Web en Google+</a><br><br>
						<br><br>
					</div>		
				</section>
		
			<!-- Esta Section Puede estar o No Estar Yo He decidido No Mostrar-la Contiene Todos los Links de los Últimos Artículos Actualizados -->
			
			
			
			<section class="ColorWhite" style="display: inline-block; vertical-align: top; text-align: center; min-width: 240px; width: 85%;">
				<div style="width: 96%; min-width: 240px; display: inline-block; background-color: rgba(0,0,32,0.7);  padding: 5px;">
					<label class="ColorWhite"><b>Últimos Artículos Actualizados:</b></label><br> 
					<label style="color: limegreen;">Secciones de Novedades Sobre los Contenidos:</label><br>
					<?php 
						$Dir = "./Raiz-Web-Noticias/"; // Esta es la Dirección de la Carpeta Raíz Noticias
						$MisSecciones = GetCurrentArticles($Dir,"index.php"); // Cargo Los Artículos Actualizados Asociados a esta Carpeta, Que Esta Ubicada en index.php en la Variable 
						echo($MisSecciones); // Y los Escribo a esta Parte de la Página
					?>
					<br><br>
					<label style="color: limegreen;">Secciones de Aplicaciones:</label><br>
					<?php
						$Dir = "./Raiz-Web-Aplicaciones/"; // Esta es la Dirección de la Carpeta Raíz Aplicaciones
						$MisSecciones = GetCurrentArticles($Dir,"index.php"); // Cargo Los Artículos Actualizados Asociados a esta Carpeta, Que Esta Ubicada en index.php en la Variable
						echo($MisSecciones); // Y los Escribo a esta Parte de la Página
					?>
					<br><br>
					<label style="color: limegreen;">Secciones de Raiz Principal:</label><br>
					<?php
						$Dir = "./Raiz-Web-Principal/"; // Esta es la Dirección de la Carpeta Raíz Raiz-Principal
						$MisSecciones = GetCurrentArticles($Dir,"index.php"); // Cargo Los Artículos Actualizados Asociados a esta Carpeta, Que Esta Ubicada en index.php en la Variable
						echo($MisSecciones); // Y los Escribo a esta Parte de la Página
					?>
					<br><br>
					<label style="color: limegreen;">Secciones de Raiz Secundaria:</label><br>
					<?php
						$Dir = "./Raiz-Web-Secundaria/"; // Esta es la Dirección de la Carpeta Raíz Raiz-Secundaria
						$MisSecciones = GetCurrentArticles($Dir,"raiz-secundaria.php"); // Cargo Los Artículos Actualizados Asociados a esta Carpeta, Que Esta Ubicada en raiz-secundaria.php en la Variable
						echo($MisSecciones); // Y los Escribo a esta Parte de la Página
					?>
					<br><br>
					<br><br>
				</div>
				
				<!-- Este DIV Contiene la Carpeta de Articulos Destacados -->
				
			
				
				<div style="width: 96%; min-width: 240px; display: inline-block; vertical-align: top; background-color: rgba(0,0,32,0.7);  padding: 5px;">
					<label class="ColorWhite"><b>Artículos Destacados</b></label><br>
					<div class="Box1px" >
						<?php
							$Dir = "./Destacados/"; // Esta es la Dirección de la Carpeta Artículos Destacados
							$MiNav = GetFilesDirectory($Dir,false,false); // el Primer FALSE te permite Ponerlos en Horizontal y en TRUE en Vertical , el Segundo FALSE es para el SITEMAPXML 
							echo $MiNav; // Y los Escribo a esta Parte de la Página
						?>
						<br><br>
					</div>
				</div>
			</section>
					
		</nav>
			
		<script>
			//var Tiempo = setInterval("Redibuja()",1000);
			function Redibuja(){
				var Fecha = new Date();
				var DiaHoy = Dia(Fecha);
				var MesHoy = Mes(Fecha);
				var AnoHoy = Ano(Fecha);
				var HoraHoy = "" + Hora(Fecha);
				var MinutoHoy = "" + Minuto(Fecha);
				var SegundoHoy = "" + Segundo(Fecha);
				var ObjetoCal = document.getElementById("Calendario");
				ObjetoCal.innerHTML = CrearCalendarioES(DiaHoy,MesHoy,AnoHoy); 	
				var ObjetoReloj = document.getElementById("RelojDigital");
				if (HoraHoy.length < 2 ){ HoraHoy = "0" + HoraHoy; }
				if (MinutoHoy.length < 2 ){ MinutoHoy = "0" + MinutoHoy; }
				if (SegundoHoy.length < 2 ){ SegundoHoy = "0" + SegundoHoy; }
				ObjetoReloj.innerHTML = HoraHoy + ":" + MinutoHoy + ":" + SegundoHoy;
			}			 	
		</script>
	</header>

	<!-- Aquí es Donde Apuntan los Enlaces Anteriores, por lo que, donde se ubiquen estas Secciones, serán las Paginas de Destino de las de Arriba -->
	<section>
		<?php
			$Dir = "./Raiz-Web-Noticias/"; // De Esta Dirección 
			$MiSection = GetSections($Dir); // Cargo Todas Sus Secciones Con Sus Artículos con sus Contenidos
			echo $MiSection; // Y Las Escribo
		?>
	</section>

	<br><br>
	
	<nav id="Creditos" class="Section Menu-Inferior" >
		<hr>
		<h2 class="TitleSection">Enlaces Sobre Intereses del Autor</h2> 
		<hr>
		<div>
			<?php
				$Dir = "./Creditos/";
				$MiNav = GetFilesDirectory($Dir,false,false);
				echo $MiNav;
			?>
		</div>
		<hr>
		<h2 class="ColorRed">Quedan Todos los Derechos Reservados.</h2>
		<hr>
	</nav>

	<div id="Compartir" class="Section">
		<hr>
		<br><br>
		<!-- Google + -->
		<div class="g-plus DisplayLineBlock" data-action="share" data-width="200" data-href="http://www.@.com/"></div>
		<br><br>
		<hr>
	</div>	
</center>
</body>
</html>