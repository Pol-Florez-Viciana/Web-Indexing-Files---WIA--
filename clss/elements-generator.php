<?php // Código del Motor de la Web 
	// Llamadas Requeridas para Utilizar las Funciones Aquí Definidas
	include("cls-file-system.php");
	date_default_timezone_set('Europe/Madrid');
	setlocale(LC_ALL,"es_ES");
	
	// Aquí se Configura el Tipo de Protocolo Usado por la Web ( http:// o https:// )
	const TypeProtocol = "http://";
	// Aquí Se Configura el Número de los Dias Anteriores que se Muestran en Actualizados Recientemente 
	const DaysCurrentList = 28;
	// Aquí Se Configura el Número de Articulos Maximos Cada Vez que se Llama a la Función GetCurrentArticles();
	const MaxCountCurrentList = 12;
	// *********************************************************************************************************	
	// Funciones para la Utilización del Módulo: 	
	// $Dir = Dirección de Carpeta Raíz Escogida 
	// $InPage = Pagina que Contiene Esa Section ( Pagina  GetSections($Dir); )
	// $WithBR = Con Saltos de Linea Entre Elementos de Archivos Contenidos en los Artículos
	// $SiteMapBoolean = Carga Direcciones Completas de la Ubicación en la Web en el Propio Enlace
	// $FoldersOrFiles = FALSE Carga Carpetas Artículo, TRUE Carga Carpetas Raiz, Secciones y Artículos 
	// $FilePathWrite = Direccion y Nombre que le quieras dar al archivo XML
	// *********************************************************************************************************
	// - GetCurrentArticles($Dir,$InPage); Carga Artículos Con Las Ultimas Carpetas de Artículos Actualizadas 
	// *********************************************************************************************************	
	// - GetLinkSections($Dir,$InPage); GetLinkSectionsVertical($Dir,$InPage);
	// *********************************************************************************************************
	// - GetListArticles($Dir,$InPage); GetListArticlesVertical($Dir,$InPage);
	// *********************************************************************************************************
	// - GetSections($Dir); Carga Toda la Raíz en Formato de Artículos de Todas las Secciones 
	// *********************************************************************************************************
	// - GetFilesDirectory($Dir,$WithBR,$SiteMapBoolean);  Carga un Directorio de Elementos en Formato Artículo	
	// *********************************************************************************************************
	// - GetYouTubes($Dir); Carga un Listado de Archivos con las direcciones de los Vídeos de un IFRAME YouTube
	// *********************************************************************************************************
	// - GetDataSiteMap($Dir,$FoldersOrFiles,$InPage); Carga Un Mapa del Sitio Con Todos los Elementos de Raíz 
	// *********************************************************************************************************
	// - WriteDataSiteMapForXML($Dir,$FilePathWrite); Escribe Todas las Direcciones de los Elementos de la Raíz
	// en un archivo que se escribira en el servidor cuando carguemos una pagina no mostrada a los usuarios
	// *********************************************************************************************************
	// constantes y Funciones Obligatorias de Creación de Códigos de Enlaces
	const Cero = 0;
	const Uno = 1; 
	const Dos = 2;
	const SegundosDia = 86400;
	const EtiquetasTiempo1 = "Y/m/d H:i:s";
	const EtiquetasTiempo2 = "w";
	const Ahora = "now";
	const StringCero = "0";
	const StringUno = "1";
	const StringDos = "2";
	const StringTres = "3";
	const StringCuatro = "4";
	const StringCinco = "5";
	const Barra = "/";
	const Guion = "-";
	const CodeInterrogacion = "~8";
	const CodeInterrogante = "~9";
	const Interrogacion = "¿";
	const Interrogante = "?";
	const EspacioBlanco = " ";
	const StringNulo = "";
	const EstrellaEnabled = "./img/Estrella-Enabled.jpg";
	const EstrellaDisabled = "./img/Estrella-Disabled.jpg";
	const DirValorations = "./Valoraciones/";
	const DirExtensionTxt = ".txt";
	const FileTxt = "txt";
	const FileJpg = "jpg";
	const FileGif = "gif";
	const FileJpeg = "jpeg";
	const FilePng = "png";
	const FileZip = "zip";
	const FilePdf = "pdf";
	const FileJs = "js";
	const FileCss = "css";
	const FileMp3 = "mp3";
	const FileMp4 = "mp4";
	const FileHtml = "html";
	const FilePhp = "php";
	
	$ObjFileSys = new ObjectFileSystem();
	
	function GetLinkAbsolute($Dir){
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$NameFile = $Dir;
		$Long = $ObjFileSys->StringsCount($NameFile);
		$Name = TypeProtocol . $_SERVER['HTTP_HOST'] . Barra . $ObjFileSys->StringsRight( $Dir , $Long - Dos );
		$Result = '<a href="' . $Dir . '" target="_BLANK" title="' . $Name . '" class="LinkArticle" >' .  $Name . '</a>';
		return $Result; 	
	}
	function GetLinkSection($Dir){
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$NameFile = $ObjFileSys->FileGetName($Dir);
		$Long = $ObjFileSys->StringsCount($NameFile);
		$Extension = $ObjFileSys->FileExtensionName($Dir);
		$LongExtension = $ObjFileSys->StringsCount($Extension);
		$LongExtension++;
		$NameTemp = $ObjFileSys->StringsLeft($NameFile, $Long - $LongExtension );
		$NameNoSpaces = $ObjFileSys->StringsReemplaceWords($NameTemp , Guion , EspacioBlanco );
		$NameInterrogation = $ObjFileSys->StringsReemplaceWords($NameNoSpaces , CodeInterrogacion , Interrogacion );
		$Name = $ObjFileSys->StringsReemplaceWords($NameInterrogation , CodeInterrogante  , Interrogante );
		$Result = '<a href="' . $Dir . '" title="' . $Name . '" class="LinkSection" >' . $Name . '</a> ';
		return $Result; 	
	}
	function GetLinkCurrentSection($Dir,$Name){
		$Result = '<div class="DisplayLineBlock" style="font-size: 5.5mm; vertical-align: top;"><label style="color: white;">•</label><a href="' . $Dir . '" title="' . $Name . '" class="LinkArticle" >' . $Name . '</a></div> ';
		return $Result; 	
	}
	function GetLinkArticle($Dir){
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$NameFile = $ObjFileSys->FileGetName($Dir);
		$Long = $ObjFileSys->StringsCount($NameFile);
		$Extension = $ObjFileSys->FileExtensionName($Dir);
		$LongExtension = $ObjFileSys->StringsCount($Extension);
		$LongExtension++;
		$NameTemp = $ObjFileSys->StringsLeft($NameFile, $Long - $LongExtension );
		$NameNoSpaces = $ObjFileSys->StringsReemplaceWords($NameTemp , Guion , EspacioBlanco );
		$NameInterrogation = $ObjFileSys->StringsReemplaceWords($NameNoSpaces , CodeInterrogacion , Interrogacion );
		$Name = $ObjFileSys->StringsReemplaceWords($NameInterrogation , CodeInterrogante  , Interrogante );
		if ( $Extension == FileHtml || $Extension == FilePhp ){
			$NameTitlePage = $ObjFileSys->FileGetTitleHTML($Dir);
			if ($NameTitlePage == StringNulo ){ $NameTitlePage = $NameFile; }
			$DescriptionPage = $ObjFileSys->FileGetDescriptionHTML($Dir);
			$Result = '<a href="' . $Dir . '" title="' . $NameFile . " \n " . $DescriptionPage . '" class="LinkArticle" target="_BLANK" >' . $NameTitlePage . '</a> ';
		}else{
			if ($Extension == FileZip || $Extension == FilePdf || $Extension == FileMp4 || $Extension == FileMp3) {
				$Result = '<a href="' . $Dir . '" title="' . $NameFile . '" class="LinkArticle" target="_BLANK" >' . $NameFile . '</a> ';
			}else{	
				$Result = '<a href="' . $Dir . '" title="' . $Name . '" class="LinkArticle" target="_BLANK" >' . $Name . '</a> ';
			}
		}
		return $Result; 	
	}
	function GetLinkArticleAbrebiate($Dir){
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$NameFile = $ObjFileSys->FileGetName($Dir);
		$Long = $ObjFileSys->StringsCount($NameFile);
		$Extension = $ObjFileSys->FileExtensionName($Dir);
		$LongExtension = $ObjFileSys->StringsCount($Extension);
		$LongExtension++;
		$NameTemp = $ObjFileSys->StringsLeft($NameFile, $Long - $LongExtension );
		$Name = $ObjFileSys->StringsReemplaceWords($NameTemp , Guion , EspacioBlanco );
		//$ShortName = StringNulo;
		//$NameTitlePageAbrebiate = StringNulo;
		//if ( $ObjFileSys->StringsCount($Name) > 18 ){
		//	$ShortName = $ObjFileSys->StringsLeft($Name, 18) . '...';
		//	$ShortNameFile = $ObjFileSys->StringsLeft($Name, 18) . '...';
		//}else{
			$ShortName = $Name;
		//}
		//if ( $ObjFileSys->StringsCount($Name) > 18){
		//	$ShortNameFile = $ObjFileSys->StringsLeft($Name, 18) . '...';
		//}else{
			$ShortNameFile = $Name;
		//}	
		if ( $Extension == FileHtml || $Extension == FilePhp ){
			$NameTitlePage = $ObjFileSys->FileGetTitleHTML($Dir);
			$DescriptionPage = $ObjFileSys->FileGetDescriptionHTML($Dir);
			//$VarCount = $ObjFileSys->StringsCount($NameTitlePage);
			//if ( $VarCount > 18){
				$NameTitlePageAbrebiate = $NameTitlePage; // $ObjFileSys->StringsLeft($NameTitlePage, 18) . '...';
			//}else{
			//	$NameTitlePageAbrebiate = $NameTitlePage;
			//}
			$Result = '<label style="color: white;">•</label><a href="' . $Dir . '" title="'  . $NameFile . " \n " . $DescriptionPage .  '" class="LinkArticle" target="_BLANK" >' . $NameTitlePageAbrebiate . '</a> ';
		}else{
			if ($Extension == FileZip || $Extension == FilePdf || $Extension == FileMp4 || $Extension == FileMp3) {
				$Result = '<label style="color: white;">•</label><a href="' . $Dir . '" title="' . $NameFile . '" class="LinkArticle" target="_BLANK" >' . $NameFile . '</a> ';
			}else{	
				$Result = '<label style="color: white;">•</label><a href="' . $Dir . '" title="' . $Name . '" class="LinkArticle" target="_BLANK" >' . $ShortName . '</a> ';
			}
		}
		return $Result; 	
	}
	function GetCodeBR($NumTagsBR){
		if ($NumTagsBR != Cero || $NumTagsBR >= Uno ){ 
			$Resultado = StringNulo;
			for ($Man = Cero; $Man < $NumTagsBR; $Man++ ){
				$Resultado = $Resultado . "<br>";
			}
			return $Resultado;
		}
	}
	// Funciones obligatorias para la Creación de Códigos para Graficos
	function GetImageArticle($Dir){
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$NameFile = $ObjFileSys->FileGetName($Dir);
		$Long = $ObjFileSys->StringsCount($NameFile);
		$Extension = $ObjFileSys->FileExtensionName($Dir);
		$LongExtension = $ObjFileSys->StringsCount($Extension);
		$LongExtension++;
		$NameTemp = $ObjFileSys->StringsLeft($NameFile, $Long - $LongExtension );
		$Name = $ObjFileSys->StringsReemplaceWords($NameTemp , Guion , EspacioBlanco );
		$Retorno = '<a href="'. $Dir .'"><img src="' . $Dir . '" title="' . $Name . '" alt="' . $Name . '" class="ImageArticle" /></a> ';
		return $Retorno;
	}
	function GetImagePost($Dir){
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$NameFile = $ObjFileSys->FileGetName($Dir);
		$Long = $ObjFileSys->StringsCount($NameFile);
		$Extension = $ObjFileSys->FileExtensionName($Dir);
		$LongExtension = $ObjFileSys->StringsCount($Extension);
		$LongExtension++;
		$NameTemp = $ObjFileSys->StringsLeft($NameFile, $Long - $LongExtension );
		$Name = $ObjFileSys->StringsReemplaceWords($NameTemp , Guion , EspacioBlanco );
		$Retorno = '<img src="' . $Dir . '" title="' . $Name . '" alt="' . $Name . '" style="width: 88px; height: 64px;" /> ';
		return $Retorno;
	}
	function GetIcon($Dir){
		$Result = '<img src="' . $Dir . '" class="LinkIcon" /> ';
		return $Result;
	}
	function GetVideo($Dir){
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$NameFile = $ObjFileSys->FileGetName($Dir);
		$Long = $ObjFileSys->StringsCount($NameFile);
		$Extension = $ObjFileSys->FileExtensionName($Dir);
		$LongExtension = $ObjFileSys->StringsCount($Extension);
		$LongExtension++;
		$NameTemp = $ObjFileSys->StringsLeft($NameFile, $Long - $LongExtension );
		$Name = $ObjFileSys->StringsReemplaceWords($NameTemp , Guion , EspacioBlanco );
		$Retorno = '<video src="' . $Dir . '" title="' . $Name . '" alt="' . $Name . '" class="VideoArticle" controls ></video><br>';
		return $Retorno; 	
	}
	// Funciones Obligatorias para el Acceso a los Archivos y Carpetas
	function GetListArticles($Dir,$InPage){
		$Result = StringNulo;
		$ArticlesCount = Cero;
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$ListFoldersPrin = $ObjFileSys->FolderSubFoldersSORT($Dir);	
		for ($Man = Cero; $Man < count($ListFoldersPrin); $Man++ ) {
			$ListFolders = $ObjFileSys->FolderSubFoldersSORT($ListFoldersPrin[$Man] . Barra);
			//$Result = $Result . '<div><h2 class="TitleSection" >' . $NameFolder . '</h2>';
			for ($SubMan = Cero; $SubMan < count($ListFolders); $SubMan++ ) {
				$Path = $ObjFileSys->FolderRepair($ListFolders[$SubMan]);
				$TempNameFolder = $ObjFileSys->FileGetName($Path);
				$NameFolder = $ObjFileSys->StringsReemplaceWords($TempNameFolder , EspacioBlanco , Guion );
				$NameTemp = $ObjFileSys->StringsReemplaceWords($NameFolder , Guion , EspacioBlanco );
				$NameNoSpaces = $ObjFileSys->StringsReemplaceWords($NameTemp , Guion , EspacioBlanco );
				$NameInterrogation = $ObjFileSys->StringsReemplaceWords($NameNoSpaces , CodeInterrogacion , Interrogacion );
				$Name = $ObjFileSys->StringsReemplaceWords($NameInterrogation , CodeInterrogante  , Interrogante );
				$Result = $Result . '<div style="display: inline-block;" ><a class="LinkArticle" href="'  . $InPage . "#" . $NameFolder . '" >' . $Name . '</a></div> ';
			}
		}
		return $Result;
	}
	function GetListArticlesVertical($Dir,$InPage){
		$Result = StringNulo;
		$ArticlesCount = Cero;
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$ListFoldersPrin = $ObjFileSys->FolderSubFoldersSORT($Dir);	
		for ($Man = Cero; $Man < count($ListFoldersPrin); $Man++ ) {
			$ListFolders = $ObjFileSys->FolderSubFoldersSORT($ListFoldersPrin[$Man] . Barra);
			//$Result = $Result . '<div><h2 class="TitleSection" >' . $NameFolder . '</h2>';
			for ($SubMan = Cero; $SubMan < count($ListFolders); $SubMan++ ) {
				$Path = $ObjFileSys->FolderRepair($ListFolders[$SubMan]);
				$TempNameFolder = $ObjFileSys->FileGetName($Path);
				$NameFolder = $ObjFileSys->StringsReemplaceWords($TempNameFolder , EspacioBlanco , Guion );
				$NameTemp = $ObjFileSys->StringsReemplaceWords($NameFolder , Guion , EspacioBlanco );
				$NameNoSpaces = $ObjFileSys->StringsReemplaceWords($NameTemp , Guion , EspacioBlanco );
				$NameInterrogation = $ObjFileSys->StringsReemplaceWords($NameNoSpaces , CodeInterrogacion , Interrogacion );
				$Name = $ObjFileSys->StringsReemplaceWords($NameInterrogation , CodeInterrogante  , Interrogante );
				$Result = $Result . '<div><a class="LinkArticle" href="'  . $InPage . "#" . $NameFolder . '" >' . $Name . '</a></div>';
			}
		}
		return $Result;
	}
	function GetListIconArticles($Dir,$InPage){
		$Result = StringNulo;
		$ArticlesCount = Cero;
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$ListFoldersPrin = $ObjFileSys->FolderSubFoldersSORT($Dir);	
		for ($Man = Cero; $Man < count($ListFoldersPrin); $Man++ ) {
			$ListFolders = $ObjFileSys->FolderSubFoldersSORT($ListFoldersPrin[$Man] . Barra);
			//$Result = $Result . '<div><h2 class="TitleSection" >' . $NameFolder . '</h2>';
			for ($SubMan = Cero; $SubMan < count($ListFolders); $SubMan++ ) {
				$Path = $ObjFileSys->FolderRepair($ListFolders[$SubMan]);
				$TempNameFolder = $ObjFileSys->FileGetName($Path);
				$NameFolder = $ObjFileSys->StringsReemplaceWords($TempNameFolder , EspacioBlanco , Guion );
				$NameTemp = $ObjFileSys->StringsReemplaceWords($NameFolder , Guion , EspacioBlanco );
				$NameNoSpaces = $ObjFileSys->StringsReemplaceWords($NameTemp , Guion , EspacioBlanco );
				$NameInterrogation = $ObjFileSys->StringsReemplaceWords($NameNoSpaces , CodeInterrogacion , Interrogacion );
				$Name = $ObjFileSys->StringsReemplaceWords($NameInterrogation , CodeInterrogante  , Interrogante );
				$Result = $Result . '<a class="LinkArticle" href="'  . $InPage . "#" . $NameFolder . '" >' . '<div style="display: inline-block; pading: 2px; cursor: pointer; border: double 2px white; border-radius: 10px;" >' . GetFirstImageArticle($ListFolders[$SubMan]) . '<label class="LinkArticle" style="cursor: pointer;" >' . $Name . '</label></div></a> ';
			}
		}
		return $Result;
	}
	function GetListIconArticlesVertical($Dir,$InPage){
		$Result = StringNulo;
		$ArticlesCount = Cero;
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$ListFoldersPrin = $ObjFileSys->FolderSubFoldersSORT($Dir);	
		for ($Man = Cero; $Man < count($ListFoldersPrin); $Man++ ) {
			$ListFolders = $ObjFileSys->FolderSubFoldersSORT($ListFoldersPrin[$Man] . Barra);
			//$Result = $Result . '<div><h2 class="TitleSection" >' . $NameFolder . '</h2>';
			for ($SubMan = Cero; $SubMan < count($ListFolders); $SubMan++ ) {
				$Path = $ObjFileSys->FolderRepair($ListFolders[$SubMan]);
				$TempNameFolder = $ObjFileSys->FileGetName($Path);
				$NameFolder = $ObjFileSys->StringsReemplaceWords($TempNameFolder , EspacioBlanco , Guion );
				$NameTemp = $ObjFileSys->StringsReemplaceWords($NameFolder , Guion , EspacioBlanco );
				$NameNoSpaces = $ObjFileSys->StringsReemplaceWords($NameTemp , Guion , EspacioBlanco );
				$NameInterrogation = $ObjFileSys->StringsReemplaceWords($NameNoSpaces , CodeInterrogacion , Interrogacion );
				$Name = $ObjFileSys->StringsReemplaceWords($NameInterrogation , CodeInterrogante  , Interrogante );
				$Result = $Result . '<a class="LinkArticle" href="'  . $InPage . "#" . $NameFolder . '" >' . '<div style="border: double 2px white; pading: 2px; cursor: pointer; border-radius: 10px;" >' . GetFirstImageArticle($ListFolders[$SubMan]) . '<label class="LinkArticle" style="cursor: pointer;" >' . $Name . '</label></div></a><br>';
			}
		}
		return $Result;
	}
	function GetCurrentArticles($Dir,$InPage){
		$Result = StringNulo;
		//$ArticlesCount = Cero;
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$ListFoldersPrin = $ObjFileSys->FolderSubFoldersSORT($Dir);
		$ListadoRecolecta[] = StringNulo;
		$Cuenta = Cero;	
		for ($Man = Cero; $Man < count($ListFoldersPrin); $Man++ ) {
			$ListFolders = $ObjFileSys->FolderSubFoldersSORT($ListFoldersPrin[$Man] . Barra);
			//$Result = $Result . '<div><h2 class="TitleSection" >' . $NameFolder . '</h2>';
			for ($SubMan = Cero; $SubMan < count($ListFolders); $SubMan++ ) {
				$Path = $ObjFileSys->FolderRepair($ListFolders[$SubMan]);
				$TempNameFolder = $ObjFileSys->FileGetName($Path);
				$NameFolder = $ObjFileSys->StringsReemplaceWords($TempNameFolder , EspacioBlanco , Guion );
				$NameNoSpaces = $ObjFileSys->StringsReemplaceWords($NameFolder , Guion , EspacioBlanco );
				$NameInterrogation = $ObjFileSys->StringsReemplaceWords($NameNoSpaces , CodeInterrogacion , Interrogacion );
				$Name = $ObjFileSys->StringsReemplaceWords($NameInterrogation , CodeInterrogante  , Interrogante );
				//$fecha1 = date("Y/m/d H:i:s");
				$fecha2 = date(EtiquetasTiempo1,filemtime($ListFolders[$SubMan] . Barra));
				$VarDia = date(EtiquetasTiempo2,filemtime($ListFolders[$SubMan] . Barra));
				$fecha3 = $ObjFileSys->GetTextoDiaSemana( $VarDia );
				//$fecha3 = $ObjFileSys->FileDateModify($ListFolders[$SubMan]);
				$interval = strtotime(Ahora) - strtotime($fecha2);
				$DaysInterval = SegundosDia * DaysCurrentList; 
				If ($interval < $DaysInterval){
					$ListadoRecolecta[$Cuenta] = '<div class="CurrentArticle"><label style="color: rgb(255,64,64);">' . $fecha2 . ' , ' . $fecha3 . ' </label><br><label style="vertical-align: top;">'  . GetLinkCurrentSection( $InPage . "#" . $NameFolder, $Name) . '</label><br>' . GetFirstTitleTextDirectory($ListFolders[$SubMan]) . '<br>' . GetFirstLinksDirectory($ListFolders[$SubMan]) . '<br><br><p style="text-align: center;" >' . GetFirstImagesDirectory($ListFolders[$SubMan]) . '</p></div>';
					$Cuenta++;
					//$ArticlesCount = $ArticlesCount + Uno;
				}			
			}
		}
		rsort($ListadoRecolecta);
		for ($Man = Cero; $Man < count($ListadoRecolecta); $Man++ ) {
			$Result = $Result . $ListadoRecolecta[$Man] . EspacioBlanco;
			if ($Man + Uno >= MaxCountCurrentList){
				break;
			}
		}	
		return $Result;	
	}
	function GetDataSubFolders($Dir){
		$Result = StringNulo;
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$ListFolders = $ObjFileSys->FolderSubFoldersSORT($Dir);
		for ($SubMan = Cero; $SubMan < count($ListFolders); $SubMan++ ) {
			$Path = $ListFolders[$SubMan];
			$NameFile = $ObjFileSys->FileGetName($Path);
			$NameNoSpaces = $ObjFileSys->StringsReemplaceWords($NameFile , Guion , EspacioBlanco );
			$NameInterrogation = $ObjFileSys->StringsReemplaceWords($NameNoSpaces , CodeInterrogacion , Interrogacion );
			$Name = $ObjFileSys->StringsReemplaceWords($NameInterrogation , CodeInterrogante  , Interrogante );
			$Extension = $ObjFileSys->FileExtensionName($Path);
			$Long = $ObjFileSys->StringsCount($Path);
			$ResultFunction = GetFilesDirectory($Path,true,false);
			if ($ResultFunction != StringNulo){
				$LongTempo = $ObjFileSys->StringsCount($Path) - $ObjFileSys->StringsCount($Dir);
				$NameTemporal = $ObjFileSys->StringsRight($Path, $LongTempo);
				if ( $ObjFileSys->FileExist(DirValorations . $NameTemporal . DirExtensionTxt ) == false ){
					$Long = $ObjFileSys->StringsCount($Path) - $ObjFileSys->StringsCount($Dir);
					$NameTemp = $ObjFileSys->StringsRight($Path, $Long);
					//$Name = $ObjFileSys->StringsReemplaceWords($NameTemp , Guion , EspacioBlanco );
					$Result = $Result . '<article id="' . $NameTemp . '" class="Article"><br><br><hr><br><h3 class="TitleArticle">' . GetIcon('./img/Articulo.png') . $Name . '</h3><br><hr><br>' . $ResultFunction . '</article>';
				}else{
					$Valoracion = StringNulo . $ObjFileSys->FileRead(DirValorations . $NameTemporal . DirExtensionTxt,Cero);
					$Estrellas = StringNulo;
					if($Valoracion == StringCero){
						$Estrellas = GetIcon(EstrellaDisabled) . GetIcon(EstrellaDisabled) . GetIcon(EstrellaDisabled) . GetIcon(EstrellaDisabled) . GetIcon(EstrellaDisabled);
					}
					if($Valoracion == StringUno){
						$Estrellas = GetIcon(EstrellaEnabled) . GetIcon(EstrellaDisabled) . GetIcon(EstrellaDisabled) . GetIcon(EstrellaDisabled) . GetIcon(EstrellaDisabled);
					}
					if($Valoracion == StringDos){
						$Estrellas = GetIcon(EstrellaEnabled) . GetIcon(EstrellaEnabled) . GetIcon(EstrellaDisabled) . GetIcon(EstrellaDisabled) . GetIcon(EstrellaDisabled);
					}
					if($Valoracion == StringTres){
						$Estrellas = GetIcon(EstrellaEnabled) . GetIcon(EstrellaEnabled) . GetIcon(EstrellaEnabled) . GetIcon(EstrellaDisabled) . GetIcon(EstrellaDisabled);
					}
					if($Valoracion == StringCuatro){
						$Estrellas = GetIcon(EstrellaEnabled) . GetIcon(EstrellaEnabled) . GetIcon(EstrellaEnabled) . GetIcon(EstrellaEnabled) . GetIcon(EstrellaDisabled);
					}
					if($Valoracion == StringCinco){
						$Estrellas = GetIcon(EstrellaEnabled) . GetIcon(EstrellaEnabled) . GetIcon(EstrellaEnabled) . GetIcon(EstrellaEnabled) . GetIcon(EstrellaEnabled);
					}
					if($Estrellas == StringNulo){
						$Estrellas = GetIcon(EstrellaDisabled) . GetIcon(EstrellaDisabled) . GetIcon(EstrellaDisabled) . GetIcon(EstrellaDisabled) . GetIcon(EstrellaDisabled);
					}
					$Long = $ObjFileSys->StringsCount($Path) - $ObjFileSys->StringsCount($Dir);
					$NameTemp = $ObjFileSys->StringsRight($Path, $Long);
					$Name = $ObjFileSys->StringsReemplaceWords($NameTemp , Guion , EspacioBlanco );
					$Result = $Result . '<article id="' . $NameTemp . '" class="Article"><br><br><hr><br><h3 class="TitleArticle">' . GetIcon('./img/Articulo.png') . $Name . '</h3><br><hr><br>' . $ResultFunction . '<br><hr><p class="TitleArticle"><br>Puntuación del Autor: <label class="ColorWhite">' . $Valoracion . '</label><br><br>' . $Estrellas . '</p><br><hr><br>' . '</article>';
				}
			}	
		}
		return $Result;	
	}
	function GetLinkSections($Dir,$InPage){
		$Resultado = StringNulo;
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$ListadoSubDirectorios = $ObjFileSys->FolderSubFoldersSORT($Dir);
		if (count($ListadoSubDirectorios) > Cero){
			for ($Man = Cero; $Man < count($ListadoSubDirectorios); $Man++ ) {
				$NombreDirectorio = $ObjFileSys->FileGetName($ListadoSubDirectorios[$Man]);
				$IdNombre = $ObjFileSys->StringsReemplaceWords($NombreDirectorio , EspacioBlanco , Guion );
				$NombreTemp = $ObjFileSys->StringsReemplaceWords($NombreDirectorio , Guion , EspacioBlanco );
				$NameNoSpaces = $ObjFileSys->StringsReemplaceWords($NombreTemp , Guion , EspacioBlanco );
				$NameInterrogation = $ObjFileSys->StringsReemplaceWords($NameNoSpaces , CodeInterrogacion , Interrogacion );
				$Nombre = $ObjFileSys->StringsReemplaceWords($NameInterrogation , CodeInterrogante  , Interrogante );
				$Resultado = $Resultado . '<div class="DisplayLineBlock Padding5px"><a class="LinkSection" href="' . $InPage . '#' . $IdNombre . '" >' . $Nombre . '</a></div> ';
			}
		}
		return $Resultado;	
	}
	function GetLinkSectionsVertical($Dir,$InPage){
		$Resultado = StringNulo;
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$ListadoSubDirectorios = $ObjFileSys->FolderSubFoldersSORT($Dir);
		if (count($ListadoSubDirectorios) > Cero){
			for ($Man = Cero; $Man < count($ListadoSubDirectorios); $Man++ ) {
				$NombreDirectorio = $ObjFileSys->FileGetName($ListadoSubDirectorios[$Man]);
				$IdNombre = $ObjFileSys->StringsReemplaceWords($NombreDirectorio , EspacioBlanco , Guion );
				$NombreTemp = $ObjFileSys->StringsReemplaceWords($NombreDirectorio , Guion , EspacioBlanco );
				$NameTemp = $ObjFileSys->StringsReemplaceWords($NombreTemp , Guion , EspacioBlanco );
				$NameNoSpaces = $ObjFileSys->StringsReemplaceWords($NameTemp , Guion , EspacioBlanco );
				$NameInterrogation = $ObjFileSys->StringsReemplaceWords($NameNoSpaces , CodeInterrogacion , Interrogacion );
				$Nombre = $ObjFileSys->StringsReemplaceWords($NameInterrogation , CodeInterrogante  , Interrogante );
				$Resultado = $Resultado . '<div class="Padding5px"><a class="LinkSection" href="' . $InPage . '#' . $IdNombre . '" >' . $Nombre . '</a></div>';
			}
		}
		return $Resultado;	
	}
	function GetSections($Dir){
		$Resultado = StringNulo;
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$ListadoSubDirectorios = $ObjFileSys->FolderSubFoldersSORT($Dir);
		if (count($ListadoSubDirectorios) > Cero){
			for ($Man = Cero; $Man < count($ListadoSubDirectorios); $Man++ ) {
				$NombreDirectorio = $ObjFileSys->FileGetName($ListadoSubDirectorios[$Man]);
				$NombreTemp = $ObjFileSys->StringsReemplaceWords($NombreDirectorio , Guion , EspacioBlanco );
				$NameInterrogation = $ObjFileSys->StringsReemplaceWords($NombreTemp , CodeInterrogacion , Interrogacion );
				$Nombre = $ObjFileSys->StringsReemplaceWords($NameInterrogation , CodeInterrogante  , Interrogante );
				$IdNombre = $ObjFileSys->StringsReemplaceWords($NombreDirectorio , EspacioBlanco , Guion );
				$Resultado = $Resultado . '<section id="'. $IdNombre .'" class="Section"><hr><hr><br><br><br><hr><hr><br>';
				$NewDir = $ListadoSubDirectorios[$Man];
				$NumSecciones = $ObjFileSys->FolderSubFoldersCount($NewDir . Barra);
				$Resultado = $Resultado . '<h2 class="TitleSection">' . GetIcon('./img/Carpeta.png') . $Nombre . ': <label class="ColorWhite">' . $NumSecciones . ' Articulos</label></h2><br><hr><br>';
				$Resultado = $Resultado . GetDataSubFolders($NewDir . Barra);
				$Resultado = $Resultado . '<hr></section><br><br>';
			}
		}
		return $Resultado;
	}
	// Funcion Principal que Trae Archivos y Monta sus Codigos en Funcion del Tipo de Archivo que sea
	function GetFirstImageArticle($Dir){
		$Result = StringNulo;
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$ListFiles = $ObjFileSys->FolderFilesSORT($Dir);
		$ImgCount = Cero;
		if (count($ListFiles) > Cero){
			for ($Man = Cero; $Man < count($ListFiles); $Man++ ) {
				$Extension = $ObjFileSys->StringsAllLower($ObjFileSys->FileExtensionName($ListFiles[$Man]));
				$NameFile = $ObjFileSys->FileGetName($ListFiles[$Man]);
				if ($Extension == FileJpg || $Extension == FilePng || $Extension == FileJpeg || $Extension == FileGif ) {
					if ( $ImgCount == Cero ) { $Result = GetImagePost($ListFiles[$Man]); }
					$ImgCount++;
				}
			}
			
		}
		return $Result;
	}
	function GetFirstTitleTextDirectory($Dir){
		$Result = StringNulo;
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$ListFiles = $ObjFileSys->FolderFilesSORT($Dir);
		if (count($ListFiles) > Cero){
			for ($Man = Cero; $Man < count($ListFiles); $Man++ ) {
				$Extension = $ObjFileSys->StringsAllLower($ObjFileSys->FileExtensionName($ListFiles[$Man]));
				$NameFile = $ObjFileSys->FileGetName($ListFiles[$Man]);
				if ($Extension == FileTxt){					
					$Long = $ObjFileSys->StringsCount($NameFile);
					$LongExtension = $ObjFileSys->StringsCount($ObjFileSys->FileExtensionName($ListFiles[$Man]));
					$LongExtension++;
					$NameTemp = $ObjFileSys->StringsLeft($NameFile, $Long - $LongExtension );
					$Name = $ObjFileSys->StringsReemplaceWords($NameTemp , Guion , EspacioBlanco );
					//$ContenFile = $ObjFileSys->FileRead($NewDir, filesize($NewDir) );
					$Result = '<label style="color: white;">' . $Name . '</label>';
					break;	
				}
			}
		}
		return $Result;
	}		
	function GetFirstImagesDirectory($Dir){
		$Result = StringNulo;
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$ListFiles = $ObjFileSys->FolderFilesSORT($Dir);
		$ImgCount = Cero;
		if (count($ListFiles) > Cero){
			for ($Man = Cero; $Man < count($ListFiles); $Man++ ) {
				$Extension = $ObjFileSys->StringsAllLower($ObjFileSys->FileExtensionName($ListFiles[$Man]));
				$NameFile = $ObjFileSys->FileGetName($ListFiles[$Man]);
				if ($Extension == FileJpg || $Extension == FilePng || $Extension == FileJpeg || $Extension == FileGif ) {
					$Result = $Result . GetImagePost($ListFiles[$Man]);	
					if ( $ImgCount == Dos ) { break; }
					$ImgCount++;
				}
			}
			
		}
		return $Result;
	}
	function GetFirstLinksDirectory($Dir){
		$Result = StringNulo;
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$ListFiles = $ObjFileSys->FolderFilesSORT($Dir);
		$Cuenta = Cero;
		if (count($ListFiles) > Cero){
			for ($Man = Cero; $Man < count($ListFiles); $Man++ ) {
				$Extension = $ObjFileSys->StringsAllLower($ObjFileSys->FileExtensionName($ListFiles[$Man]));
				$NameFile = $ObjFileSys->FileGetName($ListFiles[$Man]);
				if ($Extension == FileHtml || $Extension == FilePhp || $Extension == FilePdf || $Extension == FileZip ) {
					$Result = $Result . GetLinkArticleAbrebiate($ListFiles[$Man]) . EspacioBlanco;			
					if ($Cuenta < 5){ $Cuenta++; }else{ break; }
				}
			}
		}
		return $Result;
	}		
	function GetFilesDirectory($Dir,$WithBR,$SiteMapBoolean){
		$Result = StringNulo;
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$ListFiles = $ObjFileSys->FolderFilesSORT($Dir);
		if (count($ListFiles) > Cero){
			for ($Man = Cero; $Man < count($ListFiles); $Man++ ) {
				$NewDir = $ListFiles[$Man];
				$NewFileSize = '<label style="color: white; vertical-align: top;">' . $ObjFileSys->FileSizeBytes($NewDir) . '</label>';
				$Extension = $ObjFileSys->StringsAllLower($ObjFileSys->FileExtensionName($ListFiles[$Man]));
				$NameFile = $ObjFileSys->FileGetName($ListFiles[$Man]);
				if ($Extension == FileJpg || $Extension == FilePng || $Extension == FileJpeg || $Extension == FileGif ) {
					if ($SiteMapBoolean == false ){
						if ( $WithBR == true ){
							$Result = $Result . GetImageArticle($NewDir) . EspacioBlanco;	
						}else{	
							$Result = $Result .  GetImageArticle($NewDir) . EspacioBlanco;	
						}
					}else{
						$Result = $Result . GetIcon($NewDir) . GetLinkAbsolute($NewDir) . "<br>";	
					}		
				}else{
					if ($Extension == FileTxt){
						if ($SiteMapBoolean == false ){
							//if ( $WithBR == true ){
								$Long = $ObjFileSys->StringsCount($NameFile);
								$LongExtension = $ObjFileSys->StringsCount($ObjFileSys->FileExtensionName($NewDir));
								$LongExtension++;
								$NameTemp = $ObjFileSys->StringsLeft($NameFile, $Long - $LongExtension );
								$Name = $ObjFileSys->StringsReemplaceWords($NameTemp , Guion , EspacioBlanco );
								$ContenFile = $ObjFileSys->FileRead($NewDir, filesize($NewDir) );
								$Result = $Result . '<br><br><h5 class="TextTitleArticle">' . $Name . '</h5><div class="TextArticle" >' . $ContenFile . '</div><br>'; 
							//}else{
								//$Long = $ObjFileSys->StringsCount($NameFile);
								//$LongExtension = $ObjFileSys->StringsCount($ObjFileSys->FileExtensionName($NewDir));
								//$LongExtension++;
								//$NameTemp = $ObjFileSys->StringsLeft($NameFile, $Long - $LongExtension );
								//$Name = $ObjFileSys->StringsReemplaceWords($NameTemp , "-" , " " );
								//$ContenFile = $ObjFileSys->FileRead($NewDir, filesize($NewDir));
								//$Result = $Result . '<br><br><h5 class="TextTitleArticle">' . $Name . '</h5><div class="TextArticle" >' . $ContenFile . '</div><br>'; 
							//}
						}//else{
							//$Result = $Result . GetIcon('./img/Checked.jpg') . GetLinkAbsolute($NewDir) . "<br>";	
						//}	
					}else{
						if ($Extension == FilePdf){
							if ($SiteMapBoolean == false ){
								if ( $WithBR == true ){
									$Result = $Result . '<br><div class="DisplayLineBlock">' . GetIcon('./img/PDF.png') . GetLinkArticle($NewDir) . EspacioBlanco . $NewFileSize . "</div><br>";	
								}else{
									$Result = $Result . ' <div class="DisplayLineBlock">' .  GetIcon('./img/PDF.png') . GetLinkArticle($NewDir) .'</div> ';
								}
							}else{
								$Result = $Result . '<div class="DisplayLineBlock">' . GetIcon('./img/PDF.png') . GetLinkAbsolute($NewDir) . "</div><br>";	
							}	
						}else{
							if ($Extension == FileZip){
								if ($SiteMapBoolean == false ){
									if ( $WithBR == true ){
										$Result = $Result . '<br><div class="DisplayLineBlock">' . GetIcon('./img/ZIP.png') . GetLinkArticle($NewDir) . EspacioBlanco . $NewFileSize . "</div><br><br>";	
									}else{
										$Result = $Result . ' <div class="DisplayLineBlock">' . GetIcon('./img/ZIP.png') . GetLinkArticle($NewDir) . "</div> ";
									}
								}else{
									$Result = $Result . '<div class="DisplayLineBlock">' . GetIcon('./img/ZIP.png') . GetLinkAbsolute($NewDir) . "</div><br>";	
								}	
							}else{
								if ($Extension == FilePhp){
									if ($SiteMapBoolean == false ){
										if ( $WithBR == true ){
											$Result = $Result . '<br><div class="DisplayLineBlock">' . GetIcon('./img/Logo.png') . GetLinkArticle($NewDir) . "</div><br>";	
										}else{
											$Result = $Result . '<div class="DisplayLineBlock">' . GetIcon('./img/Logo.png') . GetLinkArticle($NewDir) . '</div> ';
										}
									}else{
										$Result = $Result . '<div class="DisplayLineBlock">' . GetIcon('./img/Logo.png') . GetLinkAbsolute($NewDir) . "</div><br>";
									}		
								}else{
									if ($Extension == FileMp3 || $Extension == FileMp4 ){
										if ($SiteMapBoolean == false ){
											if ($Extension == "mp4" ){
												if ( $WithBR == true ){
													$Result = $Result . GetVideo($NewDir) . "<br><br>";
													$Result = $Result . '<div class="DisplayLineBlock">' . GetIcon('./img/Video.png') . GetLinkArticle($NewDir) . EspacioBlanco . $NewFileSize . "</div><br><br>";	
												}else{
													$Result = $Result . GetVideo($NewDir) . " ";
													$Result = $Result . '<div class="DisplayLineBlock">' . GetIcon('./img/Video.png') . GetLinkArticle($NewDir) . "</div> ";
												}
											}else{
												if ( $WithBR == true ){
													$Result = $Result . GetVideo($NewDir) . "<br><br>";
													$Result = $Result . '<div class="DisplayLineBlock">' . GetIcon('./img/Audio.png') . GetLinkArticle($NewDir) . EspacioBlanco . $NewFileSize . "</div><br><br>";	
												}else{
													$Result = $Result . GetVideo($NewDir) . " ";
													$Result = $Result . '<div class="DisplayLineBlock">' . GetIcon('./img/Audio.png') . GetLinkArticle($NewDir) . "</div> ";
												}		
											}
										}else{
											$Result = $Result . '<div class="DisplayLineBlock">' . GetIcon('./img/Video.png') . GetLinkAbsolute($NewDir) . "</div><br>";
										}		
									}else{
										if ($Extension != FileJs || $Extension != FileCss){
											// En este Caso se Pueden Incluir mas Extensiones a Excluir de los Resultados		
											if ($SiteMapBoolean == false ){
												if ( $WithBR == true ){
													$Result = $Result . '<br><div class="DisplayLineBlock">' . GetLinkArticle($NewDir) . "</div><br>";	
												}else{
													$Result = $Result . '<div class="DisplayLineBlock">' . GetLinkArticle($NewDir) . '</div> ';
												}
											}else{
												$Result = $Result . '<div class="DisplayLineBlock">' . GetLinkAbsolute($NewDir) . "</div><br>";	
											}	
										}else{
											
										}		
									}	
								}
							}	
						}	
					}	
				}
			}
		}		
		return $Result;		
	}
	function GetYouTubes($Dir){
		$Result = StringNulo;
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$ListFiles = $ObjFileSys->FolderFilesSORT($Dir);
		if (count($ListFiles) > Cero){
			for ($Man = Cero; $Man < count($ListFiles); $Man++ ) {
				$NewDir = $ListFiles[$Man];
				$NameFile = $ObjFileSys->FileGetName($ListFiles[$Man]);
				$Long = $ObjFileSys->StringsCount($NameFile);
				$LongExtension = $ObjFileSys->StringsCount($ObjFileSys->FileExtensionName($NewDir));
				$LongExtension++;
				$NameTemp = $ObjFileSys->StringsLeft($NameFile, $Long - $LongExtension );
				$Name = $ObjFileSys->StringsReemplaceWords($NameTemp , Guion , EspacioBlanco );
				$ContenFile = $ObjFileSys->FileRead($NewDir, filesize($NewDir) );
				$Result = $Result . '<article class="Article"><hr><br><h3 class="TitleArticle">' . $Name . '</h3><br><hr><br><iframe class="DisplayLineBlock" width="98%" height="240" src="' . $ContenFile . '" ></iframe><br><br><a href="' . $ContenFile . '" target="_BLANK" class="LinkArticle" >' . $ContenFile . '</a></article>';
			}
		}
		return $Result;	
	}
	// Y por Último la Funcion para Acceder a los Datos para el Sitemap
	function GetDataSiteMap($Dir,$FoldersOrFiles,$InPage){
		$Result = StringNulo;
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		if ($FoldersOrFiles == true){
			$ListFoldersPrin = $ObjFileSys->FolderSubFoldersSORT($Dir);
			for ($Man = Cero; $Man < count($ListFoldersPrin); $Man++ ) {
				$ListFolders = $ObjFileSys->FolderSubFoldersSORT($ListFoldersPrin[$Man] . Barra);
				$NameFolder = $ObjFileSys->FileGetName($ListFoldersPrin[$Man]);
				$NameSite = TypeProtocol . $_SERVER['HTTP_HOST'] . Barra . $InPage;
				$Result = $Result . '<div><h2 class="TitleSection" >' . $NameFolder . '</h2>';
				$Result = $Result . '<a class="LinkSection" href="' . $NameSite . '#' . $NameFolder . '">' . $NameFolder . '</a><br>';
				for ($SubMan = Cero; $SubMan < count($ListFolders); $SubMan++ ) {
					$Path = $ObjFileSys->FolderRepair($ListFolders[$SubMan]);
					$NameFolder = $ObjFileSys->FileGetName($ListFolders[$SubMan]);
					$ResultFunction = GetFilesDirectory($Path,false,true);
					if ($ResultFunction != StringNulo){
						$Name = $ObjFileSys->StringsReemplaceWords($NameFolder , Guion , EspacioBlanco );
						$Result = $Result . '<div><h2 class="TitleArticle" >' . $NameFolder . '</h2>';
						$Result = $Result . '<a class="LinkSection" href="' . $NameSite . '#' . $NameFolder . '">' . $NameFolder . '</a><br>';
						$Result = $Result . '<div><h3 class="TitleArticle">'. $NameFolder . '</h3>' . $ResultFunction . '</div></div>';
					}
				}
				$Result = $Result . '</div>' ;
			}	
		}else{
			$ResultFunction = GetFilesDirectory($Dir,true,true);
			$NameFolder = $ObjFileSys->FileGetName($Dir);
			$Result = $Result . '<div><h3 class="TitleArticle">'. $NameFolder . '</h3><br>' . $ResultFunction . '</div>';
		}
		return $Result;	
	}
	function WriteDataSiteMapForXML($Dir,$FilePathWrite){
		$Result = "";
		global $ObjFileSys;
		//$ObjFileSys = new ObjectFileSystem();
		$NameRoot = $ObjFileSys->FileGetName($Dir);
		$Result = $Result . '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
		$Result = $Result . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" >' . "\n";
		$ListFoldersPrin = $ObjFileSys->FolderSubFoldersSORT($Dir);
		for ($Man = Cero; $Man < count($ListFoldersPrin); $Man++ ) {
			$ListFolders = $ObjFileSys->FolderSubFoldersSORT($ListFoldersPrin[$Man] . Barra);
			$NameFolder1 = $ObjFileSys->FileGetName($ListFoldersPrin[$Man]);
			$NameSite = TypeProtocol . $_SERVER['HTTP_HOST'] . Barra;
			for ($SubMan = Cero; $SubMan < count($ListFolders); $SubMan++ ) {
				//$Path = $ObjFileSys->FolderRepair($ListFolders[$SubMan]);
				$NameFolder2 = $ObjFileSys->FileGetName($ListFolders[$SubMan]);
				$ListFiles = $ObjFileSys->FolderFilesSORT($ListFolders[$SubMan]);
				for ($TempMan = Cero; $TempMan < count($ListFiles); $TempMan++ ) {
					$FechaAtom = $ObjFileSys->FileDateModifyATOM($ListFiles[$TempMan]);
					$Path = $NameSite . $NameRoot . "/" . $NameFolder1 . Barra . $NameFolder2 . Barra . $ObjFileSys->FileGetName($ListFiles[$TempMan]);
					$Result = $Result . '<url><loc>' . $Path . '</loc><lastmod>' . $FechaAtom . '</lastmod><priority>0.80</priority></url>' . "\n";
				}
			}
		}
		$Result = $Result . '</urlset>' . "\n";
		$ObjFileSys->FileWrite($FilePathWrite,$Result);		
	}
?>