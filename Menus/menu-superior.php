<?php
// Ubicación de la Carpeta Raíz Principal
$Dir = "./Raiz-Web-Principal/";
$MisSecciones = GetLinkSections($Dir,"raiz-principal.php");
echo($MisSecciones);

// Ubicación de la Carpeta Raíz Secundaria
$Dir = "./Raiz-Web-Aplicaciones/";
$MisSecciones = GetLinkSections($Dir,"aplicaciones.php");
echo($MisSecciones);

// Ubicación de la Carpeta Raíz Secundaria
$Dir = "./Raiz-Web-Secundaria/";
$MisSecciones = GetLinkSections($Dir,"raiz-secundaria.php");
echo($MisSecciones);

// Ubicación de la Carpeta Musica
$Dir = "./Raiz-Web-Musica/";
$MisSecciones = GetLinkSections($Dir,"musica.php");
echo($MisSecciones);

?>