/* 
 * Este es el Modulo Calendar IO para Javascript realizado por Pol Florez Viciana
 * se creo el 13/07/2015 y se Reviso el dia 02/06/2016 
 * 
 * Funciones de Cadenas y Numeros
 *      EsNumero(Numero);               EsTexto(Texto);
 *      ToPositionWordLeft(Texto,Palabra,SinPalabra); Texto, Palabra , True o False
 *      ToPositionWordRight(Texto,Palabra,SinPalabra); Texto, Palabra , True o False
 *      
 *      ReemplazarTodo(Texto,EstaPalabra,PorEstaOtra);
 *      ReemplazarPrimeraPalabra(Texto,EstaPalabra,PorEstaOtra);  
 *      WordsCount(Texto,Palabra);      Cuenta Palabras de un Texto
 *      
 *      TextoReverse(Texto);            Le da la vuelta al texto
 *      ExistePalabraEnTexto(Texto,Palabra);    devuelve True o False
 *      PosicionPalabraEnTexto(Texto,Palabra);  Devuelve la Primera Posicion de la palabra en el Texto
 *      
 *      NumeroAHexadecimal(Numero);     HexadecimalANumero(Hexadecimal);
 *      BinarioANumero(NumeroBinario);  NumeroABinario(Numero);
 *      NumberToBinary(Numero); Numero entero
 *      
 *      Aleatorio(Minimo,Maximo);
 *      CharsLeft(Texto,NumChars);      CharsRight(Texto,NumChars);
 *      CharToUnicode(Char);            UnicodeToChar(Number);
 *      CerosToLeft(NumeroenTexto, LongitudCerosALaAIzquierdaConElNumeroIncluido );
 *      
 * Funcion Crear Reloj en Canvas     
 *      DibujarRelojMini(); id="RelojMini"      --> de 200px de Alto y Ancho
 *      DibujarReloj();     id="Reloj"          --> de 300px de Alto y Ancho
 *      ------------------------Utiliza SetInterval para actualizarlo
 *
 * Funciones Calendario      
 *      Dia(Fecha); Mes(Fecha); Ano(Fecha); DiaSemana(Fecha);
 *      TraerFechaAhora(); setea una Fecha de Ahora
 *      Hora(Fecha); Minuto(Fecha); Segundo(Fecha);  
 *      TextoFecha(Fecha); TextoHoraMinutos(Fecha);    TextoHoraMinutosSegundos(Fecha);
 *      TextoMesES(Mes); TextoDiaSemanaES(DiaSemana);  TextoDiaSemanaEN(DiaSemana)
 *      NumeroSemanasMesES(Fecha); NumeroSemanasMesEN(Fecha);
 *      NumeroSemanasFechaES(Fecha); NumeroSemanasFechaEN(Fecha);
 *      NumeroDiasMes(Fecha);
 *      NumeroDiaAno(Fecha);
 *      CrearCalendarioES(Dia,Mes,Ano); 
 *      CrearCalendarioEN(Dia,Mes,Ano); 
 */

/* Funciones de Strings y Numeros */

function ToPositionWordLeft(Texto,Palabra,SinPalabra){
    if(ExistePalabraEnTexto(Texto,Palabra) == true){
        var Numero = -1;
        Numero = PosicionPalabraEnTexto(Texto,Palabra);
        //if (Numero == -1){ break; }
        if (SinPalabra == true){
            var Resultado = CharsLeft(Texto,Numero + Palabra.length) ;
        }else{
            var Resultado = CharsLeft(Texto,Numero);
        }
        return Resultado;
    }else{
        return Texto;
    }    
}

function ToPositionWordRight(Texto,Palabra,SinPalabra){
    Texto = TextoReverse(Texto);
    Palabra = TextoReverse(Palabra);
    if(ExistePalabraEnTexto(Texto,Palabra) == true){
        var Numero = -1;
        Numero = PosicionPalabraEnTexto(Texto,Palabra);
        //if (Numero == -1){ break; }
        if (SinPalabra == true){
            var Resultado = CharsLeft(Texto,Numero + Palabra.length);
        }else{
            var Resultado = CharsLeft(Texto,Numero);
        }
        return TextoReverse(Resultado);
    }else{
        return TextoReverse(Texto);
    }    
}

function SeparaWords(Texto){
    return Texto.split(" ");
}

function ReemplazarPrimeraPalabra(Texto,EstaPalabra,PorEstaOtra){
    return Texto.replace( EstaPalabra , PorEstaOtra );
}

function ReemplazarTodo(Texto,EstaPalabra,PorEstaOtra){
    var Numero = Texto.length;
    var TextoResultado = Texto;
    var Man = 1;
    while(Man <= Numero){
        TextoResultado = TextoResultado.replace(EstaPalabra ,PorEstaOtra)
        Man++;
    }
    return TextoResultado;
}

function WordsCount(Texto,Palabra){
    var NumeroCaracteres = Texto.length;
    var NumeroPalabras = 0;
    var Respuesta = 0;
    var LongitudPalabra = Palabra.length;
    var TextoResultado = ReemplazarTodo(Texto,Palabra ,"");
    if ( NumeroCaracteres == TextoResultado.length ){
        NumeroPalabras = 0;
    }else{
        Respuesta = NumeroCaracteres - TextoResultado.length;
        NumeroPalabras = Respuesta / LongitudPalabra;
    }
    return NumeroPalabras;
}

function TextoReverse(Texto){
    var Numero = Texto.length;
    var TextoTemporal = Texto;
    var Man = 1;
    var Respuesta = 0;
    var Temporal = "";
    if ( Numero > 0 ){
        while(Man <= Numero){
            Temporal = Temporal + CharsRight(TextoTemporal,1);
            Respuesta = Numero - Man;
            TextoTemporal = CharsLeft(Texto, Respuesta );
            Man++;
        }
        return Temporal;
    }
}

function PosicionPalabraEnTexto(Texto,Palabra){
    return Texto.search(Palabra);
}

function ExistePalabraEnTexto(Texto,Palabra){
    var Numero = Texto.search(Palabra);
    if(Numero == -1){
        return false;
    }else{
        return true;
    }
}

function NumeroAHexadecimal(Numero){
    if( typeof(Numero) == "number" ){
        var Num = Numero.toString(16);
        var Resultado = Num.toUpperCase();
        return Resultado;
    }
}

function HexadecimalANumero(Hexadecimal){
    if( typeof(Hexadecimal) == "string" ){
        return parseInt(Hexadecimal, 16);;
    }
}

function BinarioANumero(NumeroBinario){
    //return NumeroBinario.toString();
if (typeof(NumeroBinario) == "string" ){
      var ResultadoNumerico = 0;
      var NumeroDerecha = "";
        var ResTempo = 0;

        var Cuenta = 0;
        while (NumeroBinario.length > 0){
            NumeroDerecha = "" + CharsRight(NumeroBinario,1);

            if (NumeroDerecha == "0"){
                if (Cuenta == 0){
                   ResTempo = 0;        
                }else{
                   ResTempo = 0 ;
                }
            }else{
                if (Cuenta == 0){
                   ResTempo = 1;
                }else{
                   ResTempo = Math.pow(2,Cuenta);
                }

            }
            ResultadoNumerico = ResultadoNumerico + ResTempo;
            if(NumeroBinario.length == 1){ break; }
            NumeroBinario = CharsLeft(NumeroBinario, NumeroBinario.length - 1);
            Cuenta++;
        }

        return ResultadoNumerico;
    }    
}

function NumeroABinario(Numero){
    return Numero.toString(2);
}
    
function NumberToBinary(Numero){    
    if( Numero > 1 ){
        var ResultadoBin = "";
        var ResTempo = 0;
        var ResTempoStr = "";

        while (Numero > 0){
            ResTempo = Numero / 2;
            ResTempoStr = "" + ResTempo;
            if (CharsRight(ResTempoStr, 1) == "5"){
                ResultadoBin =  "1" + ResultadoBin; 
                Numero = ResTempo - 0.5;
            }else{
                ResultadoBin = "0" + ResultadoBin; 
                Numero = ResTempo
            }
            if (Numero == 0){
                ResultadoBin = "0" + ResultadoBin ; 
                break;
            }
            if (Numero == 1){
                ResultadoBin = "1" + ResultadoBin; 
                break;
            }
            if(Numero == 0.50){
                ResultadoBin = "1" + ResultadoBin;
                break;
            }
        }
    }else{
        ResultadoBin = Numero;
    }
    return ResultadoBin;
}

function EsTexto(Texto){
    if ( typeof(Texto) == "string" ){
        return true;
    }else{
        return false;
    }
}

function EsNumero(Numero){
    if ( typeof(Numero) == "number" ){
        return true;
    }else{
        return false;
    }
}
function Aleatorio(Minimo,Maximo){
    var posibilidades = Maximo - Minimo;
    var a = Math.random() * posibilidades;
    a = Math.floor(a);
    return parseInt(Minimo) + a;
}

function CharsLeft(TextChars , NumChars){
    if ( typeof(TextChars) == "string" ){
        if ( typeof(NumChars) == "number" ){
           if (TextChars == ""){ exit(); }
           if (TextChars.length >= NumChars && NumChars >= 1 ){
               var Retorno = TextChars.slice(0, NumChars);
               return Retorno;
           }else{
               return TextChars;
           }
        }
    }    
}

function CharsRight(TextChars , NumChars){
    if ( typeof(TextChars) == "string" ){
        if ( typeof(NumChars) == "number" ){
           if (TextChars == ""){ exit(); }
           if (TextChars.length >= NumChars && NumChars >= 1 ){
               var Retorno = TextChars.slice(TextChars.length - NumChars,TextChars.length);
               return Retorno;
           }else{
               return TextChars;
           }
        }
    }    
}

function CharToUnicode(Char){
    if (typeof(Char) == "string"){
        if (Char.length == 1){
            return Char.charCodeAt(0);
        }else{
            return -1; 
        }
    }
}

function UnicodeToChar(Number){
    if(typeof(Number) == "number"){
        var Man = 0;
        var Char = "";
        for ( Man = 0; Man < 256;Man++){
           if (Man ==  Number){
               return String.fromCharCode(Man);
               break;
           }
        }
        return Ret;
    }    
}

function CerosToLeft(Number , CountCeros){
    if ( typeof(Number) == "string" ){
        if ( typeof(CountCeros) == "number" ){
            var StringNumber = "";
            var Longitud = 0;
            var Resultado = "";
            StringNumber = "" + Number;
            Longitud = StringNumber.length;
            if ( Longitud < CountCeros ){
                var Man = 0;
                Resultado = "" + StringNumber;
                for (Man=0;Man<CountCeros - Longitud ; Man++ ){
                    Resultado = "0" + Resultado; 
                }
                return Resultado;
            }else{
                Resultado = "" + StringNumber;
                return Resultado;
            }
        }
    }
}

/* Variables Globales para Funciones Date Fecha */
var TextoTablaFinal = "";    

function DibujarRelojMini(){
    var Tempo = document.getElementById("RelojMini");
    var lienzo = Tempo.getContext("2d");
    var Fecha = new Date();
    // Valor del reloj
    var hora = 0;
    if (parseInt(Fecha.getHours()) > 12){
        hora = parseInt(Fecha.getHours());
    }else{
        hora = Fecha.getHours() - 12;
    }
    var minuto = parseInt(Fecha.getMinutes());
    var segundo = parseInt(Fecha.getSeconds());
    // Longitudes de las manecillas del reloj
    var horatero = 35;
    var minutero = 50;
    var segundero = 66;
    var radio = 72;
    // Defino lí­mites en pí­xeles
    var minx = 20;
    var maxx = 180;
    var miny = 20;
    var maxy = 180;
    var cx = 0;
    var cy = 0;
    // Centro del recuadro
    cx = minx + ((maxx - minx) / 2);
    cy = miny + ((maxy - miny) / 2);
    // Borrar lienzo
    lienzo.clearRect(0,0,200,200);
    lienzo.strokeStyle="white";
    lienzo.lineWidth = 1;
    //Dibujo todos los numeros 
    lienzo.font = "22px Arial";
    lienzo.fillStyle="yellow";
    lienzo.fillText("12",87,20);
    lienzo.fillText("09",1,108);
    lienzo.fillText("03",176,108);
    lienzo.fillText("06",87,196);

    // Dibujar el cí­rculo del reloj
    lienzo.beginPath();
    lienzo.strokeStyle="white";
    lienzo.lineWidth = 3;
    lienzo.arc(cx,cy,radio,0,Math.PI*2,false);
    lienzo.stroke();

    // Dibujar el Titulo
    lienzo.font = "20px Arial";
    lienzo.fillStyle="Yellow";
    lienzo.fillText("Pol Software",42,84);

    // Dibujar el horatero
    lienzo.beginPath();
    lienzo.lineWidth = 6;
    lienzo.strokeStyle="white";
    lienzo.moveTo(cx,cy); // posiciono el lápiz en el centro del recuadro
    var masdecimas = 0;
    if (minuto >= 0 && minuto < 10){ masdecimas = 0; }
    if (minuto >= 10 && minuto < 25){ masdecimas = 1; }
    if (minuto >= 25 && minuto < 40){ masdecimas = 2; }
    if (minuto >= 40 && minuto < 50){ masdecimas = 3; }
    if (minuto >= 50 && minuto < 60){ masdecimas = 4; }
    angulo = 2*Math.PI * (((hora * 5)+masdecimas)/60);// calculo el ángulo del minutero
    // Calculo los desplazamientos para el minutero
    dx = horatero * Math.sin(angulo);
    dy = -horatero * Math.cos(angulo);
    lienzo.lineTo(cx+dx,cy+dy);
    lienzo.stroke();
    lienzo.lineWidth = 1;

    // Dibujar el minutero
    lienzo.beginPath();
    lienzo.lineWidth = 3;
    lienzo.strokeStyle="white";
    lienzo.moveTo(cx,cy); // posiciono el lápiz en el centro del recuadro
    angulo = 2*Math.PI * (minuto/60); // calculo el ángulo del minutero
    // Calculo los desplazamientos para el minutero
    dx = minutero * Math.sin(angulo);
    dy = -minutero * Math.cos(angulo);
    lienzo.lineTo(cx+dx,cy+dy);
    lienzo.stroke();
    lienzo.lineWidth = 1;
    lienzo.beginPath();
    lienzo.moveTo(cx,cy); // posiciono el lápiz en el centro del recuadro
    angulo = 2 * Math.PI * (segundo/60); // calculo el ángulo del segundero
    // Calculo los desplazamientos para el segundero
    lienzo.strokeStyle="red";
    dx = segundero * Math.sin(angulo);
    dy = -segundero * Math.cos(angulo);
    lienzo.lineTo(cx+dx,cy+dy);
    lienzo.stroke();        
    // Dibujar los marcadores cada 1 minuto
    lienzo.beginPath();
    lienzo.lineWidth = 1;
    lienzo.strokeStyle="white";
    for (i=0; i<60; i+=1) {
        lienzo.moveTo(cx,cy);
        angulo = 2*Math.PI * (i/60);
        px = (radio-7) * Math.sin(angulo);
        py = -(radio-7) * Math.cos(angulo);
        lienzo.moveTo(cx+px,cy+py);
        dx = 5 * Math.sin(angulo);
        dy = -5 * Math.cos(angulo);
        lienzo.lineTo(cx+px+dx,cy+py+dy);
    }
    lienzo.stroke();
    // Dibujar los marcadores cada 5 minutos
    lienzo.beginPath();
    lienzo.lineWidth = 3;
    lienzo.strokeStyle="white";
    for (i=0; i<60; i+=5) {
        lienzo.moveTo(cx,cy);
        angulo = 2*Math.PI * (i/60);
        px = (radio-10) * Math.sin(angulo);
        py = -(radio-10) * Math.cos(angulo);
        lienzo.moveTo(cx+px,cy+py);
        dx = 5 * Math.sin(angulo);
        dy = -5 * Math.cos(angulo);
        lienzo.lineTo(cx+px+dx,cy+py+dy);
    }
lienzo.stroke();
}

function DibujarReloj(){
    var Tempo = document.getElementById("Reloj");
    var lienzo = Tempo.getContext("2d");
    var Fecha = new Date();
    // Valor del reloj
    var hora = 0;
    if (parseInt(Fecha.getHours()) > 12){
        hora = parseInt(Fecha.getHours());
    }else{
        hora = Fecha.getHours() - 12;
    }
    var minuto = parseInt(Fecha.getMinutes());
    var segundo = parseInt(Fecha.getSeconds());
    // Longitudes de las manecillas del reloj
    var horatero = 70;
    var minutero = 100;
    var segundero = 112;
    var radio = 118;
    // Defino lí­mites en pí­xeles
    var minx = 50;
    var maxx = 250;
    var miny = 50;
    var maxy = 250;
    var cx = 0;
    var cy = 0;
    // Centro del recuadro
    cx = minx + ((maxx - minx) / 2);
    cy = miny + ((maxy - miny) / 2);
    // Borrar lienzo
    lienzo.clearRect(0,0,300,300);
    lienzo.strokeStyle="white";
    lienzo.lineWidth = 1;
    //Dibujo todos los numeros 
    lienzo.font = "22px Arial";
    lienzo.fillStyle="yellow";
    lienzo.fillText("12",137,24);
    lienzo.fillText("09",2,157);
    lienzo.fillText("03",274,157);
    lienzo.fillText("06",137,298);

    // Dibujar el cí­rculo del reloj
    lienzo.beginPath();
    lienzo.strokeStyle="white";
    lienzo.lineWidth = 3;
    lienzo.arc(cx,cy,radio,0,Math.PI*2,false);
    lienzo.stroke();

    // Dibujar el Titulo
    lienzo.font = "22px Arial";
    lienzo.fillStyle="Yellow";
    lienzo.fillText("Pol Software",85,117);

    // Dibujar el horatero
    lienzo.beginPath();
    lienzo.lineWidth = 6;
    lienzo.strokeStyle="white";
    lienzo.moveTo(cx,cy); // posiciono el lápiz en el centro del recuadro
    var masdecimas = 0;
    if (minuto >= 0 && minuto < 10){ masdecimas = 0; }
    if (minuto >= 10 && minuto < 25){ masdecimas = 1; }
    if (minuto >= 25 && minuto < 40){ masdecimas = 2; }
    if (minuto >= 40 && minuto < 50){ masdecimas = 3; }
    if (minuto >= 50 && minuto < 60){ masdecimas = 4; }
    angulo = 2*Math.PI * (((hora * 5)+masdecimas)/60);// calculo el ángulo del minutero
    // Calculo los desplazamientos para el minutero
    dx = horatero * Math.sin(angulo);
    dy = -horatero * Math.cos(angulo);
    lienzo.lineTo(cx+dx,cy+dy);
    lienzo.stroke();
    lienzo.lineWidth = 1;

    // Dibujar el minutero
    lienzo.beginPath();
    lienzo.lineWidth = 3;
    lienzo.strokeStyle="white";
    lienzo.moveTo(cx,cy); // posiciono el lápiz en el centro del recuadro
    angulo = 2*Math.PI * (minuto/60); // calculo el ángulo del minutero
    // Calculo los desplazamientos para el minutero
    dx = minutero * Math.sin(angulo);
    dy = -minutero * Math.cos(angulo);
    lienzo.lineTo(cx+dx,cy+dy);
    lienzo.stroke();
    lienzo.lineWidth = 1;
    lienzo.beginPath();
    lienzo.moveTo(cx,cy); // posiciono el lápiz en el centro del recuadro
    angulo = 2 * Math.PI * (segundo/60); // calculo el ángulo del segundero
    // Calculo los desplazamientos para el segundero
    lienzo.strokeStyle="red";
    dx = segundero * Math.sin(angulo);
    dy = -segundero * Math.cos(angulo);
    lienzo.lineTo(cx+dx,cy+dy);
    lienzo.stroke();        
    // Dibujar los marcadores cada 1 minuto
    lienzo.beginPath();
    lienzo.lineWidth = 1;
    lienzo.strokeStyle="white";
    for (i=0; i<60; i+=1) {
        lienzo.moveTo(cx,cy);
        angulo = 2*Math.PI * (i/60);
        px = (radio-7) * Math.sin(angulo);
        py = -(radio-7) * Math.cos(angulo);
        lienzo.moveTo(cx+px,cy+py);
        dx = 5 * Math.sin(angulo);
        dy = -5 * Math.cos(angulo);
        lienzo.lineTo(cx+px+dx,cy+py+dy);
    }
    lienzo.stroke();
    // Dibujar los marcadores cada 5 minutos
    lienzo.beginPath();
    lienzo.lineWidth = 3;
    lienzo.strokeStyle="white";
    for (i=0; i<60; i+=5) {
        lienzo.moveTo(cx,cy);
        angulo = 2*Math.PI * (i/60);
        px = (radio-10) * Math.sin(angulo);
        py = -(radio-10) * Math.cos(angulo);
        lienzo.moveTo(cx+px,cy+py);
        dx = 5 * Math.sin(angulo);
        dy = -5 * Math.cos(angulo);
        lienzo.lineTo(cx+px+dx,cy+py+dy);
    }
lienzo.stroke();
}


/* Funciones de Fecha */

function TraerFechaAhora(){
    var Traer = new Date();
    return Traer;
}
function DiaSemana( FechaTempo ) {
    var TemporalDate = FechaTempo.getDay();   
    return TemporalDate;
}
function Dia( FechaTempo ) {
    var TemporalDate = FechaTempo.getDate();    
    return TemporalDate;		
}
function Mes( FechaTempo ) {
    var Retorno = FechaTempo.getMonth();
    Retorno++;
    return Retorno;
}
function Ano( FechaTempo ) {
    var TemporalDate = FechaTempo.getFullYear();
    return TemporalDate;
}
function Hora( FechaTempo ){
    var TemporalDate = FechaTempo.getHours();    
    return TemporalDate;		
}
function Minuto( FechaTempo ){
    var TemporalDate = FechaTempo.getMinutes();    
    return TemporalDate;		
}
function Segundo( FechaTempo ){
    var TemporalDate = FechaTempo.getSeconds();    
    return TemporalDate;		
}


function TextoFecha( FechaTempo ) {
    var DiaSemanaT = DiaSemana(FechaTempo);
    var DiaT = Dia(FechaTempo);
    var MesT = Mes(FechaTempo);
    var AnoT = Ano(FechaTempo);
    var TempoDiaSemana = TextoDiaSemana( DiaSemanaT );
    var TempoMes = TextoMes( MesT );
    var Resultado = TempoDiaSemana + " " + DiaT + " de " + TempoMes + " de " + AnoT + ".";
    return Resultado;
    }
function TextoHoraMinutos( FechaTempo ) {
    var Horas = FechaTempo.getHours();
    var Minutos = FechaTempo.getMinutes();
    var Resultado = Horas + " Horas y " + Minutos + " minutos.";
    return Resultado;
}
function TextoHoraMinutosSegundos( FechaTempo ) {
    var Horas = FechaTempo.getHours();
    var Minutos = FechaTempo.getMinutes();
    var Segundos = FechaTempo.getSeconds();
    var Resultado = Horas + " Horas, " + Minutos + " minutos, " + Segundos + " segundos, ";
    return Resultado;
}
function TextoMesES( Tempo ) {
    if ( Tempo == 1 ) { 
    return "Enero";
    }
    if ( Tempo == 2 ) { 
    return "Febrero";
    }
    if ( Tempo == 3 ) { 
    return "Marzo";
    }
    if ( Tempo == 4 ) { 
    return "Abril";
    }
    if ( Tempo == 5 ) { 
    return "Mayo";
    }
    if ( Tempo == 6 ) { 
    return "Junio";
    }
    if ( Tempo == 7 ) { 
    return "Julio";
    }
    if ( Tempo == 8 ) { 
    return "Agosto";
    }
    if ( Tempo == 9 ) { 
    return "Septiembre";
    }
    if ( Tempo == 10 ) { 
    return "Octubre";
    }
    if ( Tempo == 11 ) { 
    return "Noviembre";
    }
    if ( Tempo == 12 ) { 
    return "Diciembre";
    }
}

function TextoMesEN( Tempo ) {
    if ( Tempo == 1 ) { 
    return "January";
    }
    if ( Tempo == 2 ) { 
    return "February";
    }
    if ( Tempo == 3 ) { 
    return "March";
    }
    if ( Tempo == 4 ) { 
    return "April";
    }
    if ( Tempo == 5 ) { 
    return "May";
    }
    if ( Tempo == 6 ) { 
    return "June";
    }
    if ( Tempo == 7 ) { 
    return "July";
    }
    if ( Tempo == 8 ) { 
    return "August";
    }
    if ( Tempo == 9 ) { 
    return "September";
    }
    if ( Tempo == 10 ) { 
    return "October";
    }
    if ( Tempo == 11 ) { 
    return "November";
    }
    if ( Tempo == 12 ) { 
    return "December";
    }
}

function TextoDiaSemanaES( Tempo ) {
    if ( Tempo == 1 ) { 
    return "Lunes";
    }
    if ( Tempo == 2 ) {
    return "Martes";
    }
    if ( Tempo == 3 ) {
    return "Miercoles";
    }
    if ( Tempo == 4 ) {
    return "Jueves";
    }	
    if ( Tempo == 5 ) {
    return "Viernes";
    }
    if ( Tempo == 6 ) {
    return "Sabado";
    }
    if ( Tempo == 0 ) {
    return "Domingo";
    }
}

function TextoDiaSemanaEN( Tempo ) {
    if ( Tempo == 1 ) { 
    return "Monday";
    }
    if ( Tempo == 2 ) {
    return "Tuesday";
    }
    if ( Tempo == 3 ) {
    return "Wednesday";
    }
    if ( Tempo == 4 ) {
    return "Thursday";
    }	
    if ( Tempo == 5 ) {
    return "Friday";
    }
    if ( Tempo == 6 ) {
    return "Saturday";
    }
    if ( Tempo == 0 ) {
    return "Sunday";
    }
}

function NumeroDiaAno(FechaTemporal){
    var Contador = 1;
    var NuevoDia = Dia(FechaTemporal);
    var NuevoMes = Mes(FechaTemporal);
    var NuevoAno = Ano(FechaTemporal);
    var Man = 1;
    var SubMan = 1;
    var CuentaMes = 0;
    var NuevaFecha = new Date();
    NuevaFecha = new Date( NuevoAno , 0 , 1 ); 
    for(Man = 1; Man <= 12; Man++ ){        
        NuevaFecha = new Date( NuevoAno , Man -1 , 1 ); 
        CuentaMes = NumeroDiasMes(NuevaFecha);
        for (SubMan = 1; SubMan < CuentaMes; SubMan++){
            NuevaFecha = new Date( NuevoAno , Man -1 , SubMan ); 
            if(Man == NuevoMes && SubMan == NuevoDia ){
                break;
            }
            Contador++;
        }
        if(Man == NuevoMes && SubMan == NuevoDia ){
            break;
        }
        Contador++;
    }
    return Contador;
}

function NumeroSemanasMesES( FechaTemporal ) {
    var Contador = 1;
    var NuevoDia = 1;
    var NuevoMes = Mes(FechaTemporal);
            NuevoMes--;
    var NuevoAno = Ano(FechaTemporal);
    var TempoDias = NumeroDiasMes(FechaTemporal) + 1;
    var NuevaFecha = new Date( NuevoAno , NuevoMes , NuevoDia ); 
    var DiaS = DiaSemana(NuevaFecha);
    for ( NuevoDia = 1; NuevoDia < TempoDias; NuevoDia++ ){
        NuevaFecha = new Date( NuevoAno , NuevoMes , NuevoDia ); 
        DiaS = DiaSemana(NuevaFecha);
        if (DiaS == 1 && NuevoDia != 1 ) {
                Contador = Contador + 1;
        }
    }
    return Contador;
}
function NumeroSemanasFechaES( FechaTemporal ) {
    var Contador = 1;
    var Man = 0;
    var SubMan = 1;
    var NuevoDia = Dia(FechaTemporal);
    var SubMes = Mes(FechaTemporal);
    var NuevoMes = SubMes - 1;
    var NuevoAno = Ano(FechaTemporal);
    var NuevaFecha = new Date( NuevoAno , NuevoMes , NuevoDia ); 
    var TempoDias = NumeroDiasMes(NuevaFecha);
    var TempoDia = 1;
    var TempoMes = 0;
    NuevaFecha = new Date( NuevoAno , TempoMes , TempoDia ); 	
    TempoDias = NumeroDiasMes(NuevaFecha);
    for ( Man = 0; Man <= 11; Man++ ){
        var TempoDia = 1;
        var TempoMes = Man;
        var TempoAno = NuevoAno;
        NuevaFecha = new Date( NuevoAno , TempoMes , TempoDia ); 
        TempoDias = NumeroDiasMes(NuevaFecha);
            for ( SubMan = 1; SubMan <= TempoDias; SubMan++ ){
            NuevaFecha = new Date( NuevoAno , Man  , SubMan ); 
            var DiaS = DiaSemana(NuevaFecha);
            if (DiaS == 1 ) {
                    if( Man == 0 && Contador == 1 && SubMan == 1 ){
                        //Este es el Caso del Año que empieza en Lunes
                    }else{
                        Contador = Contador + 1;
                    }
            }
            if ( Man == NuevoMes ) {
                    if ( SubMan == NuevoDia ) {
                            break;
                    }
            }
        }
            if ( Man == NuevoMes ) {
                    if ( SubMan == NuevoDia ) {
                            break;
                    }
            }
        }
    return Contador;
}
function NumeroDiasMes( FechaTemp ) {
var AnoT = Ano( FechaTemp );
var MesT = Mes( FechaTemp );  
var Retorno = AnoT % 4;
    if ( Retorno == 0 ) {
        if ( MesT == 1 ) {
        return 31;
        }
        if ( MesT == 2 ) {
        return 29;
        }
        if ( MesT == 3 ) {
        return 31;
        }
        if ( MesT == 4 ) {
        return 30;
        }
        if ( MesT == 5 ) {
        return 31;
        }
        if ( MesT == 6 ) {
        return 30;
        }
        if ( MesT == 7 ) {
        return 31;
        }
        if ( MesT == 8 ) {
        return 31;
        }
        if ( MesT == 9 ) {
        return 30;
        }
        if ( MesT == 10 ) {
        return 31;
        }
        if ( MesT == 11 ) {
        return 30;
        }
        if ( MesT == 12 ) {
        return 31;
        }
    } else {
        if ( MesT == 1 ) {
        return 31;
        }
        if ( MesT == 2 ) {
        return 28;
        }
        if ( MesT == 3 ) {
        return 31;
        }
        if ( MesT == 4 ) {
        return 30;
        }
        if ( MesT == 5 ) {
        return 31;
        }
        if ( MesT == 6 ) {
        return 30;
        }
        if ( MesT == 7 ) {
        return 31;
        }
        if ( MesT == 8 ) {
        return 31;
        }
        if ( MesT == 9 ) {
        return 30;
        }
        if ( MesT == 10 ) {
        return 31;
        }
        if ( MesT == 11 ) {
        return 30;
        }
        if ( MesT == 12 ) {
        return 31;
        }
    }
}

function NumeroSemanasMesEN( FechaTemporal ) {
    var Contador = 1;
    var NuevoDia = 1;
    var NuevoMes = Mes(FechaTemporal);
    NuevoMes--;
    var NuevoAno = Ano(FechaTemporal);
    var TempoDias = NumeroDiasMes(FechaTemporal) + 1;
    var NuevaFecha = new Date( NuevoAno , NuevoMes , NuevoDia ); 
    var DiaS = DiaSemana(NuevaFecha);
    for ( NuevoDia = 1; NuevoDia < TempoDias; NuevoDia++ ){
        NuevaFecha = new Date( NuevoAno , NuevoMes , NuevoDia ); 
        DiaS = DiaSemana(NuevaFecha);
        if (DiaS == 0 && NuevoDia != 1 ) {
                Contador = Contador + 1;
        }
    }
    return Contador;
}
function NumeroSemanasFechaEN( FechaTemporal ) {
    var Contador = 1;
    var Man = 0;
    var SubMan = 1;
    var NuevoDia = Dia(FechaTemporal);
    var SubMes = Mes(FechaTemporal);
    var NuevoMes = SubMes - 1;
    var NuevoAno = Ano(FechaTemporal);
    var NuevaFecha = new Date( NuevoAno , NuevoMes , NuevoDia ); 
    var TempoDias = NumeroDiasMes(NuevaFecha);
    var TempoDia = 1;
    var TempoMes = 0;
    NuevaFecha = new Date( NuevoAno , TempoMes , TempoDia ); 	
    TempoDias = NumeroDiasMes(NuevaFecha);
    for ( Man = 0; Man <= 11; Man++ ){
        var TempoDia = 1;
        var TempoMes = Man;
        var TempoAno = NuevoAno;
        NuevaFecha = new Date( NuevoAno , TempoMes , TempoDia ); 
        TempoDias = NumeroDiasMes(NuevaFecha);
            for ( SubMan = 1; SubMan <= TempoDias; SubMan++ ){
            NuevaFecha = new Date( NuevoAno , Man  , SubMan ); 
            var DiaS = DiaSemana(NuevaFecha);
            if (DiaS == 0 ) {
                    if( Man == 0 && Contador == 1 && SubMan == 1 ){
                        //Este es el Caso del Año que empieza en Domingo
                    }else{
                        Contador = Contador + 1;
                    }
            }
            if ( Man == NuevoMes ) {
                    if ( SubMan == NuevoDia ) {
                            break;
                    }
            }
        }
            if ( Man == NuevoMes ) {
                    if ( SubMan == NuevoDia ) {
                            break;
                    }
            }
        }
    return Contador;
}
function AgregarColumna( DiaAgregar , DiaTempo ){
if ( DiaAgregar == "0" ) {
    TextoTablaFinal = TextoTablaFinal + '<TD WIDTH="10%" ALIGN=CENTER>';
    TextoTablaFinal = TextoTablaFinal + "-";
    TextoTablaFinal = TextoTablaFinal + "</TD>";
} else {
    if ( DiaTempo == DiaAgregar ) {
            TextoTablaFinal = TextoTablaFinal + '<TD WIDTH="10%" ALIGN=CENTER STYLE="background: RED; color: BLUE">' ;
            DiaAgregarTemp = DiaAgregar;
            TextoTablaFinal = TextoTablaFinal + DiaAgregarTemp;
            TextoTablaFinal = TextoTablaFinal + "</TD>";
    } else {
            TextoTablaFinal = TextoTablaFinal + '<TD WIDTH="10%" ALIGN=CENTER style="background: white; color: black;">';
            //document.write ( '<TD WIDTH="10%" ALIGN=CENTER >' );
            DiaAgregarTemp = DiaAgregar;
            TextoTablaFinal = TextoTablaFinal + DiaAgregarTemp ;
            TextoTablaFinal = TextoTablaFinal + "</TD>" ;
    }
}
}
function CrearCalendarioES(NumDia,NumMes,NumAno) {
if ( typeof(NumDia) != "number" ){
    exit();
}
if ( typeof(NumMes) != "number" ){
    exit();
} 
if ( typeof(NumAno) != "number" ){
    exit();
}
var FechaTemporal = new Date();
var VD = 1;
var VS = 1;
var NDia = NumDia;
var NMes = NumMes;
NMes--;
var NAno = NumAno;
TextoTablaFinal = "";

NDia = NumDia;
NMes = NumMes;
NMes--;
NAno = NumAno;
var FechaActual = new Date( NAno , NMes , NDia );
var DiaSemanaT = FechaActual.getDay();
    if ( DiaSemanaT == 0 ) {
    DiaSemanaT = 0;
    }
    //var TempoDiaSemana = TextoDiaSemanaES( DiaSemanaT );
    var DiaT = NDia;
    var MesT = NMes; 
    MesT++;
    var TempoMes = TextoMesES( MesT );
    MesT--;
    var AnoT = NAno;
    //var Horas = FechaActual.getHours();
    //var Minutos = FechaActual.getMinutes();	
                
    TextoTablaFinal = TextoTablaFinal + '<TABLE><tr>' ;
    TextoTablaFinal = TextoTablaFinal + '<TD COLSPAN=8 WIDTH="100%" ALIGN="CENTER" VERTICAL-ALIGN="MIDDLE" style="font-size: 1.5em; background-color: green; COLOR: White;">' + TempoMes + ' ' + NumAno + "</TD>";	
    TextoTablaFinal = TextoTablaFinal + "</TR><TR>";
    TextoTablaFinal = TextoTablaFinal + '<TD WIDTH="10%" ALIGN="CENTER" style="background-color: yellow; COLOR: black;">' + "NS" + "</TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD WIDTH="10%" ALIGN="CENTER" style="background-color: white; COLOR: black;">' + "Lu" + "</TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD WIDTH="10%" ALIGN="CENTER" style="background-color: white; COLOR: black;">' + "Ma" + "</TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD WIDTH="10%" ALIGN="CENTER" style="background-color: white; COLOR: black;">' + "Mi" + "</TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD WIDTH="10%" ALIGN="CENTER" style="background-color: white; COLOR: black;">' + "Ju" + "</TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD WIDTH="10%" ALIGN="CENTER" style="background-color: white; COLOR: black;">' + "Vi" + "</TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD WIDTH="10%" ALIGN="CENTER" style="background-color: white; COLOR: black;;">' + "Sa" + "</TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD WIDTH="10%" ALIGN="CENTER" style="background-color: white; COLOR: black;">' + "Do" + "</TD>" ;
    
    TextoTablaFinal = TextoTablaFinal + "</TR>";			
    FechaTemporal = new Date( AnoT , MesT , 1 );
    DiaSemanaTempo = FechaTemporal.getDay();
    SubMan = -5;
    if ( DiaSemanaTempo == 1 ) {  
    SubMan = 1;
    }
    if ( DiaSemanaTempo == 2 ) {  
    SubMan = 0;
    }
    if ( DiaSemanaTempo == 3 ) {  
    SubMan = -1;
    }
    if ( DiaSemanaTempo == 4 ) {  
    SubMan = -2;
    }
    if ( DiaSemanaTempo == 5 ) {  
    SubMan = -3;
    }
    if ( DiaSemanaTempo == 6 ) {  
    SubMan = -4;
    }
    if ( DiaSemanaTempo == 0 ) {  
    SubMan = -5;
    }
    NSubMan = NumeroDiasMes( FechaTemporal );
    NSubMan++;
    DiaT = NDia;
    VD = NumeroSemanasMesES( FechaTemporal );
    VS = NumeroSemanasFechaES( FechaTemporal );	
    for ( Man = 0 ; Man < VD; Man++ ) {
        TextoTablaFinal = TextoTablaFinal + '<TR vertical-align="middle">';
        for ( TempMan = 1 ; TempMan <= 8 ; TempMan++ ) {
            if ( TempMan == 1 ) {
                if ( SubMan < 1 ) {
                    FechaTemporal = new Date( AnoT , MesT , 1 );
                } else {
                    FechaTemporal = new Date( AnoT , MesT , SubMan );
                }
                VS = NumeroSemanasFechaES( FechaTemporal );
                TextoTablaFinal = TextoTablaFinal + '<TD WIDTH="10%" ALIGN="CENTER" style="background-color: yellow' +  '; COLOR: black' + ';">' ;
                TextoTablaFinal = TextoTablaFinal + "" + VS ;
                TextoTablaFinal = TextoTablaFinal + "</TD>" ;
                } else {
                if ( SubMan > 0 && SubMan < NSubMan ) {
                    FechaTemporal = new Date( AnoT , MesT , SubMan );
                    VS = NumeroSemanasFechaES( FechaTemporal );
                if ( SubMan > 0 && SubMan < 10 ) {
                    SubTextoSubMan = "0" + SubMan;
                    TextoDiaT = "0" + DiaT;
                } else {
                    SubTextoSubMan = "" + SubMan;
                    TextoDiaT = "" + DiaT;
                }
                AgregarColumna( SubTextoSubMan ,  TextoDiaT );
                if ( TempMan == 8 ) {
                    TextoTablaFinal = TextoTablaFinal + "</TR>";	
                }
                } else {
                    AgregarColumna( "0" , DiaT );
                    if ( TempMan == 8 ) {
                        TextoTablaFinal = TextoTablaFinal + "</TR>";
                    }
                }
                SubMan = SubMan + 1 ;
                }
        } // Fin For
    } // Fin For
    TextoTablaFinal = TextoTablaFinal + "</table>" ;

    return TextoTablaFinal;
}


function CrearCalendarioEN(NumDia,NumMes,NumAno) {
if ( typeof(NumDia) != "number" ){
    exit();
}
if ( typeof(NumMes) != "number" ){
    exit();
} 
if ( typeof(NumAno) != "number" ){
    exit();
} 
var FechaTemporal = new Date();
var VD = 1;
var VS = 1;
var NDia = NumDia;
var NMes = NumMes;
NMes--;
var NAno = NumAno;
TextoTablaFinal = "";

NDia = NumDia;
NMes = NumMes;
NMes--;
NAno = NumAno;
var FechaActual = new Date( NAno , NMes , NDia );
var DiaSemanaT = FechaActual.getDay();
    if ( DiaSemanaT == 6 ) {
    DiaSemanaT = 6;
    }
    //var TempoDiaSemana = TextoDiaSemanaES( DiaSemanaT );
    var DiaT = NDia;
    var MesT = NMes; 
    MesT++;
    var TempoMes = TextoMesEN( MesT );
    MesT--;
    var AnoT = NAno;
    //var Horas = FechaActual.getHours();
    //var Minutos = FechaActual.getMinutes();	
                
    TextoTablaFinal = TextoTablaFinal + '<TABLE><tr>' ;
    TextoTablaFinal = TextoTablaFinal + '<TD COLSPAN=8 WIDTH="100%" ALIGN="CENTER" VERTICAL-ALIGN="MIDDLE" style="font-size: 1.5em; background-color: green; COLOR: White;">' + TempoMes + ' ' + NumAno + "</TD>";	
    TextoTablaFinal = TextoTablaFinal + "</TR><TR>";
    TextoTablaFinal = TextoTablaFinal + '<TD WIDTH="10%" ALIGN="CENTER" style="background-color: yellow; COLOR: black;">' + "WN" + "</TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD WIDTH="10%" ALIGN="CENTER" style="background-color: white; COLOR: black;">' + "Su" + "</TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD WIDTH="10%" ALIGN="CENTER" style="background-color: white; COLOR: black;">' + "Mo" + "</TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD WIDTH="10%" ALIGN="CENTER" style="background-color: white; COLOR: black;">' + "Tu" + "</TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD WIDTH="10%" ALIGN="CENTER" style="background-color: white; COLOR: black;">' + "We" + "</TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD WIDTH="10%" ALIGN="CENTER" style="background-color: white; COLOR: black;">' + "Th" + "</TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD WIDTH="10%" ALIGN="CENTER" style="background-color: white; COLOR: black;;">' + "Fr" + "</TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD WIDTH="10%" ALIGN="CENTER" style="background-color: white; COLOR: black;">' + "Sa" + "</TD>" ;
    
    TextoTablaFinal = TextoTablaFinal + "</TR>";			
    FechaTemporal = new Date( AnoT , MesT , 1 );
    DiaSemanaTempo = FechaTemporal.getDay();
    SubMan = -5;
    if ( DiaSemanaTempo == 0 ) {  
    SubMan = 1;
    }
    if ( DiaSemanaTempo == 1 ) {  
    SubMan = 0;
    }
    if ( DiaSemanaTempo == 2 ) {  
    SubMan = -1;
    }
    if ( DiaSemanaTempo == 3 ) {  
    SubMan = -2;
    }
    if ( DiaSemanaTempo == 4 ) {  
    SubMan = -3;
    }
    if ( DiaSemanaTempo == 5 ) {  
    SubMan = -4;
    }
    if ( DiaSemanaTempo == 6 ) {  
    SubMan = -5;
    }
    
    NSubMan = NumeroDiasMes( FechaTemporal );
    NSubMan++;
    DiaT = NDia;
    VD = NumeroSemanasMesEN( FechaTemporal );
    VS = NumeroSemanasFechaEN( FechaTemporal );	
    for ( Man = 0 ; Man < VD; Man++ ) {
        TextoTablaFinal = TextoTablaFinal + '<TR vertical-align="middle">';
        for ( TempMan = 1 ; TempMan <= 8 ; TempMan++ ) {
            if ( TempMan == 1 ) {
                if ( SubMan < 1 ) {
                    FechaTemporal = new Date( AnoT , MesT , 1 );
                } else {
                    FechaTemporal = new Date( AnoT , MesT , SubMan );
                }
                VS = NumeroSemanasFechaEN( FechaTemporal );
                TextoTablaFinal = TextoTablaFinal + '<TD WIDTH="10%" ALIGN="CENTER" style="background-color: yellow' +  '; COLOR: black' + ';">' ;
                TextoTablaFinal = TextoTablaFinal + "" + VS ;
                TextoTablaFinal = TextoTablaFinal + "</TD>" ;
                } else {
                if ( SubMan > 0 && SubMan < NSubMan ) {
                    FechaTemporal = new Date( AnoT , MesT , SubMan );
                    VS = NumeroSemanasFechaEN( FechaTemporal );
                if ( SubMan > 0 && SubMan < 10 ) {
                    SubTextoSubMan = "0" + SubMan;
                    TextoDiaT = "0" + DiaT;
                } else {
                    SubTextoSubMan = "" + SubMan;
                    TextoDiaT = "" + DiaT;
                }
                AgregarColumna( SubTextoSubMan ,  TextoDiaT );
                if ( TempMan == 8 ) {
                    TextoTablaFinal = TextoTablaFinal + "</TR>";	
                }
                } else {
                    AgregarColumna( "0" , DiaT );
                    if ( TempMan == 8 ) {
                        TextoTablaFinal = TextoTablaFinal + "</TR>";
                    }
                }
                SubMan = SubMan + 1 ;
                }
        } // Fin For
    } // Fin For
    TextoTablaFinal = TextoTablaFinal + "</table>" ;

    return TextoTablaFinal;
}
