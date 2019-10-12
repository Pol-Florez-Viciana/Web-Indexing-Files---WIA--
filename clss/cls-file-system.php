<?php
/**
 * Clase File System
 *
 * author Pol Florez Viciana
 */
class ObjectFileSystem {
	const Cero = 0;
	const Uno = 1;
	const Dos = 2;
	const Punto = ".";
	const StringNulo = "";
	public $Dia = Uno;
	public $Mes = Uno;
	public $Ano = 2018;
	public $Hora = Cero;
	public $Minuto = Cero;
	public $Segundo = Cero;
	function __construct(){
		$this->CapturarHora();
	}
	public function CapturarHora(){
        //$ZonaTiempo = date_default_timezone_get();
        date_default_timezone_set('Europe/Madrid');
		setlocale(LC_ALL,"es_ES");
		
		$this->Dia = date("j");
		$this->Mes = date("n");
		$this->Ano = date("Y");
		$this->Hora = date("H");
		$this->Minuto = date("i");
		$this->Segundo = date("s");
	}
    public function FileExtensionName($FilePath){
        $ArchivoExtension = StringNulo;
        if ($this->StringsWordCount($FilePath,".") > Cero ){
            $Tempo = $this->StringsToPositionWordRight($FilePath,".",false);
            $ArchivoExtension = $this->StringsRight($Tempo, $this->StringsCount($Tempo) -1 );
        }
        return $ArchivoExtension;
    }
    public function FolderFilesSize($FolderPath){
        $Listado = $this->FolderFilesNamesSORT($FolderPath);
        $Man = Cero;
        $Cuenta = Cero;
        if (count($Listado) > Cero){
            for ($Man = Cero; $Man < count($Listado); $Man++ ) {
                $Cuenta = $Cuenta + $this->FileTextCount( $FolderPath . $Listado[$Man]);
            }
        }
        return $Cuenta;
    }
    public function StringBytes($TamanoenBytes){
		$MilVeintiCuatro = 1024;
        $NumBytes = $TamanoenBytes;
        $NumKiloBytes = Cero;
        $NumMegaBytes = Cero;
        $NumGigaBytes = Cero;
        $TextoRetorno = StringNulo;
		if ($NumBytes < MilVeintiCuatro){
            //$NumKiloBytes = $NumBytes / 1024;
            $TextoRetorno = $NumBytes . ' Bytes';
        }
        if ($NumBytes > $MilVeintiCuatro){
            $NumKiloBytes = $NumBytes / $MilVeintiCuatro;
            $TextoRetorno = number_format($NumKiloBytes, Dos,',','') . ' Bytes^2';
        }
        if ($NumKiloBytes > $MilVeintiCuatro){
            $NumMegaBytes = $NumKiloBytes / $MilVeintiCuatro;
            $TextoRetorno = number_format($NumMegaBytes, Dos, ',','') . ' Bytes^3';
        }
        if ($NumMegaBytes > $MilVeintiCuatro){
            $NumGigaBytes = $NumMegaBytes / $MilVeitiCuatro;
            $TextoRetorno = number_format($NumGigaBytes, Dos, ',','') . ' Bytes^4';
        }
         return $TextoRetorno; 
    }
    public function FileSizeBytes($FilePath){
		$MilVeintiCuatro = 1024;
        $NumBytes = filesize($FilePath);
        $NumKiloBytes = Cero;
        $NumMegaBytes = Cero;
        $NumGigaBytes = Cero;
        $TextoRetorno = StringNulo;
        if ($NumBytes < $MilVeintiCuatro){
            $TextoRetorno = $NumBytes . ' Bytes';
        }
        if ($NumBytes > $MilVeintiCuatro){
            $NumKiloBytes = $NumBytes / $MilVeintiCuatro;
            $TextoRetorno = number_format($NumKiloBytes, Dos,',','') . ' Bytes^2';
        }
        if ($NumKiloBytes > $MilVeintiCuatro){
            $NumMegaBytes = $NumKiloBytes / $MilVeintiCuatro;
            $TextoRetorno = number_format($NumMegaBytes, Dos, ',','') . ' Bytes^3';
        }
        if ($NumMegaBytes > $MilVeintiCuatro){
            $NumGigaBytes = $NumMegaBytes / $MilVeintiCuatro;
            $TextoRetorno = number_format($NumGigaBytes, Dos, ',','') . ' Bytes^4';
        }
         return $TextoRetorno; 
    }
    public function FileSize($FilePath){
        return filesize($FilePath);
    }
    public function FileDateModify($FilePath){
        return date("d/m/Y H:i:s",filemtime($FilePath));
    }
	public function FileDateModifyATOM($FilePath){
        return date(DATE_ATOM,filemtime($FilePath));
    }	
    public function FileExist($FilePath){
        return file_exists($FilePath);
    }
    public function FileRead($FilePath,$FileLenght){
        $Datos = StringNulo;
		if ($FileLenght <= Cero ){
            $Temporal = filesize($FilePath);
            if ($Temporal != Cero ){
				$MyFile = fopen($FilePath, "r");
				$Datos = fread($MyFile,$Temporal );
				fclose($MyFile);
			}else{
				$Datos = StringNulo;
			}
        }else{
            if ($FileLenght >= filesize($FilePath)){ 
                $FileLenght = filesize($FilePath); 
            }
            $MyFile = fopen($FilePath, "r");
            $Datos = fread($MyFile,$FileLenght );
            fclose($MyFile);        
        }
        return $Datos;
    }
    public function FileWrite($FilePath , $FileData ){
        return file_put_contents($FilePath ,$FileData);
    }
    public function FileTextCount($FilePath){
        return filesize($FilePath);
    }
    public function FileCopy($FileOrigin , $FileDestination){
        copy($FileOrigin,$FileDestination); 
    }
    public function FileGetName($FilePath){
        $Retorno = basename($FilePath);
        return $Retorno;
    }
    public function FileSetName($FilePath,$NewFilePathName){
        if ($this->FileExist($FilePath) == false ){
            return false;
            exit();
        }else{
            $X = rename($FilePath,$NewFilePathName);
            if ($X == Uno){
                return true; 
            }else{
                return false;
            }
        }
    }
    public function FileRealPath($FilePath){
        $Retorno = realpath($FilePath);
        return $Retorno;
    }
    public function FileFileDelete($FilePath){
        return unlink($FilePath);
    }
    public function FileFreeFilePath($FolderPath,$FreeName,$Extension){
        //$Retorno = tempnam($FolderPath,$FreeName);
        if ($Extension == StringNulo){ exit(); }
        if ($FreeName == StringNulo){ exit(); }
        if ($FolderPath == StringNulo or $this->FolderExist($FolderPath) == false){ exit(); }
        $FilePath = $this->FolderRepair($FolderPath) . $FreeName . Punto . $Extension;
        $Contador = Cero;
        while($this->FileExist($FilePath) == true){
            $FilePath = $this->FolderRepair($FolderPath) . $FreeName . $Contador . Punto . $Extension;
            $Contador++;
        }
        $Retorno = $FilePath;
        return $Retorno;
    }
	public function FileGetTitleHTML($FilePath){
		if ( $this->FileExist($FilePath) == false ){ exit(); }
		if ( $this->FileExtensionName($FilePath) != "html" && $this->FileExtensionName($FilePath) != "php" ){ exit(); }	
		$Original = StringNulo;
		$Titulo = $this->FileGetName($FilePath);
		$Original = $this->FileRead($FilePath , 10000 );
		if ( $Original != StringNulo ){ 
			if ( $this->StringsExistWord($Original , "<title>" ) != false || $this->StringsExistWord($Original , "</title>" ) != false ){ 
				$Encabezado = $this->StringsToPositionWordLeft($Original , "</title>" , true );
				$Titulo = $this->StringsToPositionWordRight($Encabezado , "<title>" , true );
			}
		}
		return $Titulo;	
	}
	public function FileGetDescriptionHTML($FilePath){
		if ( $this->FileExist($FilePath) == false ){ exit(); }
		if ( $this->FileExtensionName($FilePath) != "html" && $this->FileExtensionName($FilePath) != "php" ){ exit(); }	
		$Original = StringNulo;
		$DescripcionPagina = StringNulo;
		$Original = $this->FileRead($FilePath , 10000 );
		if ( $Original != StringNulo ){ 
			if ( $this->StringsExistWord($Original , '<meta name="description"' ) != false || $this->StringsExistWord($Original , "/>" ) != false ){ 
				$Encabezado = $this->StringsToPositionWordRight($Original , '<meta name="description" content="' , true );
				if ( $Encabezado != StringNulo ){ 
					$LongEncabezado = $this->StringsCount($Encabezado);
					$LongOriginal = $this->StringsCount($Original);
					$SubEncabezado = $this->StringsToPositionWordLeft($Encabezado , '<meta name="description" content="' , true );
					$LongSubEncabezado = $this->StringsCount($SubEncabezado);
					$Copia = $this->StringsRight($Encabezado , $LongEncabezado - $LongSubEncabezado);
					$DescripcionPagina = $this->StringsToPositionWordLeft($Copia , '"' , false );
				}
			}
		}		
		return $DescripcionPagina;
	}
	public function FileGetMyFolder($FilePath){
		if ( $this->FileExist($FilePath) == false ){ exit(); }
		$NombreArchivo = $this->FileGetName($FilePath);
		$Pariente = $this->StringsToPositionWordLeft($FilePath , $NombreArchivo , true );
		return $Pariente;
		
	}
	// Y aqui con las funciones de Carpetas
    public function FolderRepair($FolderPath){
        if ($this->StringsRight($FolderPath, Uno) == "/"){
            return $FolderPath;
        }else{
            return $FolderPath . "/";
        }
    }
    public function FolderRepairRoot($FolderPath){
        if ($this->StringsLeft($FolderPath, Uno) == "."){
            return $FolderPath;
        }else{
            return $FolderPath . Punto;
        }
    }
    public function FolderCreateReadFolder($FolderPath){
        mkdir($FolderPath,4,false,null);
    }
    public function FolderCreateWriteFolder($FolderPath){
        mkdir($FolderPath,Dos,false,null);
    }
    public function FolderExist($FolderPath){
        return is_dir($FolderPath);
    }
    public function FolderDelete($FolderPath){
        rmdir($FolderPath);
    }
    public function FolderFilesCount($FolderPath){
        $Retorno = Cero; 
        if ($Datos = opendir($FolderPath)){
            while (($file = readdir($Datos)) !== false){
				$Temporal = $FolderPath . $file;
				if ($this->FolderExist($Temporal) == false){
					$Retorno++;
				}    
            }       
        }
        return $Retorno;
    }
    public function FolderFilesNames($FolderPath){
        $Retorno = array();
        if ($Datos = opendir($FolderPath)){
            while (($file = readdir($Datos)) !== false){
                $Temporal = $this->FolderRepair($FolderPath) . $file;
				if ($this->FolderExist($Temporal) == false){
					$Retorno[] = $this->FileGetName($Temporal);
				}    
            }       
        }
        return $Retorno;
    }
    public function FolderFilesNamesSORT($FolderPath){
        $Retorno = array(); 
        if ($Datos = opendir($FolderPath)){
            while (($file = readdir($Datos)) !== false){
				$Temporal = $this->FolderRepair($FolderPath) . $file;
				if ($this->FolderExist($Temporal) == false){
					$Retorno[] = $this->FileGetName($Temporal);
				}    
            }       
        }
        sort($Retorno);
        return $Retorno;
    }
    public function FolderFilesSORT($FolderPath){
        $Retorno = array(); 
        if ($Datos = opendir($FolderPath)){
            while (($file = readdir($Datos)) !== false){
				$Temporal = $this->FolderRepair($FolderPath) . $file;
				if ($this->FolderExist($Temporal) == false){
					$Retorno[] = $Temporal;
				}    
            }       
        }
        sort($Retorno);
        return $Retorno;
    }
    public function FolderSubFoldersSORT($FolderPath){
        $Retorno = array(); 
        if ($Datos = opendir($FolderPath)){
            $Retorno = array();
            while (($file = readdir($Datos)) !== false){
                if ( $this->StringsLeft($file, Uno) != "." ){
                    $Temporal = $this->FolderRepair($FolderPath) . $file;
                    if ($this->FolderExist($Temporal) == true){
                        $Retorno[] = $Temporal;
                    }
                }
            }       
        }
        sort($Retorno);
        return $Retorno;
    }
    public function FolderSubFoldersNamesSORT($FolderPath){
        $Retorno = array(); 
        if ($Datos = opendir($FolderPath)){
            $Retorno = array();
            while (($file = readdir($Datos)) !== false){
                if ( $this->StringsLeft($file, Uno) != "." ){
                    $Temporal = $FolderPath . $file;
                    if ($this->FolderExist($Temporal) == false){
                        $Retorno[] = $file;
                    }
                }
            }       
        }
        sort($Retorno);
        return $Retorno;
    }
    public function FolderFiles($FolderPath){
        $Retorno = array(); 
        if ($Datos = opendir($FolderPath)){
            $Retorno = array();
            while (($file = readdir($Datos)) !== false){
                if ( $this->StringsLeft($file, Uno) != "." ){
                    $Temporal = $FolderPath . $file;
                    if ($this->FolderExist($Temporal) == false){
                        $Retorno[] = $Temporal;
                    }    
                }
            }       
        }
        return $Retorno;
    }
    public function FolderSubFolders($FolderPath){
        $Retorno = array(); 
        if ($Datos = opendir($FolderPath)){
            $Retorno = array();
            while (($file = readdir($Datos)) !== false){
                if ( $this->StringsLeft($file, Uno) != "." ){
                    $Temporal = $FolderPath . $file;
                    if ($this->FolderExist($Temporal) == true){
                        $Retorno[] = $FolderPath . $file;
                    }
                }
            }       
        }
        return $Retorno;
    }
    public function FolderSubFoldersNames($FolderPath){
        $Retorno = array(); 
        if ($Datos = opendir($FolderPath)){
            $Retorno = array();
            while (($file = readdir($Datos)) !== false){
                if ( $this->StringsLeft($file, Uno) != "." ){
                    $Temporal = $FolderPath . $file;
                    if ($this->FolderExist($Temporal) == true){
                        $Retorno[] = $file;
                    }
                }
            }       
        }
        return $Retorno;
    }
    public function FolderSubFoldersCount($FolderPath){
        $Retorno = Cero; 
        if ($Datos = opendir($FolderPath)){
            while (($file = readdir($Datos)) !== false){
                if ( $this->StringsLeft($file, Uno) != "." ){
                    $Temporal = $FolderPath . $file;
                    if ($this->FolderExist($Temporal) == true){
                        $Retorno++;
                    }
                }
            }       
        }
        return $Retorno;
    }
	public function FolderExistFileNameIntoFolder($FolderPath,$FileName){
		$Archivos = $this->FolderFiles($FolderPath);
		$Respuesta = false;
		for ($Man = Cero; $Man < count($Archivos); $Man++ ) {
			if ( $this->FileGetName($Archivos[$Man]) == $FileName ){
				$Respuesta = true; 
			} 
		}
		return $Respuesta;
	}
	public function FolderExistFileExtensionIntoFolder($FolderPath,$FileExtension){
		$Archivos = $this->FolderFiles($FolderPath);
		$Respuesta = false;
		for ($Man = Cero; $Man < count($Archivos); $Man++ ) {
			if ( $this->FileGetExtensionName($Archivos[$Man]) == $FileExtension ){
				$Respuesta = true; 
			} 
		}
		return $Respuesta;
	}
    public function StringsLeft( $Cadena , $NumStrings ){
        if (strlen($Cadena) != Cero and $NumStrings > Cero and $NumStrings < strlen($Cadena) ){
            if ($NumStrings == strlen($Cadena) ){
                return $Cadena;    
            }else{
                $VarResult = substr($Cadena, Cero, $NumStrings);
				return $VarResult;
            }
        }else{
            return $Cadena;
        }    
    }
    public function StringsRight( $Cadena , $NumStrings ){
        if (strlen($Cadena) != Cero and $NumStrings > Cero and $NumStrings < strlen($Cadena) ){
            if ($NumStrings == strlen($Cadena) ){
                return $Cadena;    
            }else{
                $Tempo = strrev($Cadena);
                $SubTempo = substr($Tempo, Cero, $NumStrings);
                Return strrev($SubTempo);
            }
        }else{
            return $Cadena;
        }
    }
    public function StringsToPositionWordLeft($Cadena , $Palabra , $SinPalabra ){
        // Inicializo Variables
        $Texto = StringNulo;
        $Resultado = StringNulo;
        $Caracteres = StringNulo;
        $Man = Cero;
        $NumRestantes = Cero;
        // Y las uso
        $Texto = $Cadena;
        $NumVeces = strlen($Cadena) ;
        if ($this->StringsLeft($Texto, strlen($Palabra)) != $Palabra){
            for( $Man = Cero ; $Man < $NumVeces ; $Man++ ){
                $NumRestantes = strlen($Texto) - Uno;
                $Caracteres = $this->StringsLeft($Texto, Uno);
                $Texto = $this->StringsRight($Texto, $NumRestantes);
                if ($this->StringsLeft($Texto, strlen($Palabra)) == $Palabra){
                    if ($SinPalabra == true){
                        $Resultado = $Resultado . $Caracteres;
                    }else{
                        $Resultado = $Resultado . $Caracteres . $Palabra;
                    }
                    break;                
                }
                $Resultado = $Resultado . $Caracteres;
            }
        }else{
            $Resultado = $Caracteres . $Palabra;
        }
        return $Resultado;       
    }
    public function StringsToPositionWordRight($Cadena , $Palabra , $SinPalabra ){
        // Inicializo Variables
        $Texto = StringNulo;
        $Resultado = StringNulo;
        $Caracteres = StringNulo;
        $Man = Cero;
        $NumRestantes = Cero;
        // Y las uso
        $Texto = $Cadena;
        $NumVeces = strlen($Cadena) ;
        if ($this->StringsRight($Texto, strlen($Palabra)) != $Palabra){
            for( $Man = $NumVeces ; $Man > Cero ; $Man-- ){
                $NumRestantes = strlen($Texto) - Uno;
                $Caracteres = $this->StringsRight($Texto, Uno);
                $Texto = $this->StringsLeft($Texto, $NumRestantes);
                if ($this->StringsRight($Texto, strlen($Palabra)) == $Palabra){
                    if ($SinPalabra == true){
                        $Resultado = $Caracteres . $Resultado ;
                    }else{
                        $Resultado = $Palabra . $Caracteres . $Resultado ;
                    }
                    break;                
                }
                $Resultado = $Caracteres . $Resultado;
            }
        }else{
            $Resultado = $Palabra . $Caracteres ;
        }
        return $Resultado;       
    }
    public function StringsWordCount( $Cadena , $Palabra ){
        // Inicializo Variables
        $NumChrsPalabra = Cero;
        $NumChrsCadena = Cero;
        $Tempo = StringNulo;
        $NumChrsRestantes = Cero;
        $Resultado1 = Cero;
        $Resultado2 = Cero;
        // Y Ahora Establezco los Valores
        $NumChrsPalabra = strlen($Palabra);
        $NumChrsCadena = strlen($Cadena);
        $Tempo = $this->StringsDeleteWords($Cadena, $Palabra );
        $NumChrsRestantes = strlen($Tempo);
        if ($NumChrsCadena == $NumChrsRestantes ){
            return Cero;
        }else{
            $Resultado1 = $NumChrsCadena - $NumChrsRestantes;
            $Resultado2 = $Resultado1 / $NumChrsPalabra;
            return $Resultado2;
        }
    }
    public function StringsAllLower($Cadena){
        return strtolower($Cadena);
    }
    public function StringsAllUpper($Cadena){
        return strtoupper($Cadena);
    }
    public function StringsAllReverse($Cadena){
        return strrev($Cadena);
    }
    public function StringsReemplaceWords($Cadena , $LaPalabra , $PorPalabra ){
        return str_replace($LaPalabra,$PorPalabra,$Cadena);
    }
    public function StringsDeleteWords($Cadena , $Palabra ){
        $Nada = StringNulo; 
        return $this->StringsReemplaceWords($Cadena, $Palabra, $Nada);
    }
    public function StringsExistWord($Cadena , $Palabra ){
        $NumWords = $this->StringsWordCount($Cadena, $Palabra);
        if ($NumWords > Cero ){
            return true;
        }else{
            return false;
        }
    }
    public function StringsCount( $Cadena ){
        return strlen($Cadena);
    }
	public function GetTextoDiaSemana( $NumDia ) {
		if ( $NumDia == 1 ) { 
		return "Lunes";
		}
		if ( $NumDia == 2 ) {
		return "Martes";
		}
		if ( $NumDia == 3 ) {
		return "Miércoles";
		}
		if ( $NumDia == 4 ) {
		return "Jueves";
		}	
		if ( $NumDia == 5 ) {
		return "Viernes";
		}
		if ( $NumDia == 6 ) {
		return "Sábado";
		}
		if ( $NumDia == 0 ) {
		return "Domingo";
		}
		
	}	
}
?>