<?php

echo('<form action="buscar.php" method="POST"  style="display: inline-block;" >');
echo('<input style="display: inline-block;" id="Search" name="Search" type="text" value="" />');
echo('<input style="display: inline-block;" id="submit" type="submit" value="Buscar" />');
echo('</form> ');

// Ubicación de la Carpeta Raíz Principal
$Dir = "./Raiz-Web-Principal/";
$MisSecciones = GetLinkSections($Dir,"raiz-principal.php");
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