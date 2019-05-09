<?php 
// Codigo Para Decir que utiliza coockies
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
    <meta name="description" content="Esta es la Raíz Web de Busqueda Para La Web de Pol Software. Ejemplo WIA">
    <meta name="keywords" content="Pol Flórez, Trabajo de Pol Flórez, Pol Software">
    <title>Busqueda de Ejemplo WIA</title>  
    <link rel="stylesheet" href="css/elements.css" type="TEXT/CSS" />
	<link rel="shortcut icon" href="img/Logo.ico" />
	<!-- Opciones Lenguaje -->
	<meta name="language" content="es_ES" />
	<link rel="alternate" hreflang="es" href="http://www.tu-web.com/" />
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
	echo '<form id="Formulario1" name="Formulario1" method="POST" action="buscar.php" ><br>'; 
	echo '<input type="text" id="AceptoUsoCookies" name="AceptoUsoCookies" value="Acepto" class="InVisible" />';
	echo '<b><label class="ColorRed">Aviso Legal:</label></b> <label class="ColorWhite">Este Sitio Web hace uso de <i>Coockies de Seguimiento</i> para Mejorar Nuestros Servicios <a class="LinkArticle" href="./Politica-de-Uso-de-Coockies.pdf" target="_BLANK" >Mas Información</a>.<br>¿Aceptas el Uso de Coockies de Seguimiento?</label> ';
	echo ' <input type="submit" class="Margen5px Padding5px Fuente7mm BorderRadius10px DisplayLineBlock FondoVerde ColorNegro" value="Entendido" /><br><br>';
	echo '</form></div>';
}
?>

<!-- Aquí Comienza el Código del Indice Modificable en Funcion de Tu Negocio -->
<center>
	
	<!-- Aquí establezco el enlace de Inicio o el Botón de Inicio 
	<a class="LinkStart" style="z-index: 21;" href="#Inicio">Inicio</a>
	-->
	
	<!-- Menú Inicial o Archivos de la Carpeta Menu-Superior -->
	<nav class="Menu-Superior" >
		<div>
			<div class="LinkSection" style="display: inline-block;" ><a class="LinkStartMenu" href="index.php#Inicio">Inicio</a></div>
			<?php include_once('./Menus/menu-superior.php'); ?>
		</div>
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
	<h1 class="WebTitle" style="z-index: 13; position: relative; top: auto; left: auto;" >Busqueda de Ejemplo WIA</h1>
	
	<br><br>
	
	<section style="background-color: rgb(16,16,16); max-width: 900px;">
		<?php
			if (isset($_POST["Search"])){
				// Listado de Raices Web en las Que Buscar
				$Dirs = array ("./Raiz-Web-Aplicaciones/","./Raiz-Web-Musica/","./Raiz-Web-Noticias/","./Raiz-Web-Principal/","./Raiz-Web-Secundaria/");
				// Listado de Paginas de Destino en el Orden de esas Raices Web
				$InPages = array ("aplicaciones.php","musica.php","index.php","raiz-principal.php","raiz-secundaria.php");
				// Buscamos 
				$MiSection = SearchInSections($Dirs,$InPages,$_POST["Search"]);
				// Y Ponemos Los Resultados
				if ($MiSection == ""){
					// Formulario Para el Buscador
					echo('<form action="buscar.php" method="POST"  style="display: inline-block;" >');
					echo('<input style="display: inline-block; font-size: 7mm; width: 70%;" id="Search" name="Search" type="text" value="' . $_POST["Search"] . '" placeholder="Introduzca el Termino..." />');
					echo('<input style="display: inline-block; font-size: 7mm;" id="submit" type="submit" value="Buscar" />');
					echo('</form> ');
					echo ('<br><label style="font-size: 8mm; color: white;">No Hay Resultados de Busqueda Para ' . $_POST["Search"] . '...</label>');
				}else{
					// Formulario Para el Buscador
					echo('<form action="buscar.php" method="POST"  style="display: inline-block;" >');
					echo('<input style="display: inline-block; font-size: 7mm; width: 70%;" id="Search" name="Search" type="text" value="' . $_POST["Search"] . '" placeholder="Introduzca el Termino..." />');
					echo('<input style="display: inline-block; font-size: 7mm;" id="submit" type="submit" value="Buscar" />');
					echo('</form> ');
					echo "<br>" . $MiSection;	
				}
			}else{
				// Formulario Para el Buscador
				echo('<form action="buscar.php" method="POST"  style="display: inline-block;" >');
				echo('<input style="display: inline-block; font-size: 7mm; width: 70%;" id="Search" name="Search" type="text" value="" placeholder="Introduzca el Termino..." />');
				echo('<input style="display: inline-block; font-size: 7mm;" id="submit" type="submit" value="Buscar" />');
				echo('</form> ');
			}
		?>
	</section>
	<br><br><br><br>	
</center>
</body>
</html>