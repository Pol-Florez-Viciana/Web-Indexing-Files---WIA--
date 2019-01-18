/* ------------------------------------------------------- */
/* Funciones de Fecha Desarrolladas por Pol Florez Viciana */
/* ------------------------------------------------------- */
/* ------------------------------------------------------- */
/* ------------------------------- 05/10/2017 a 05/10/2017 */
/* ------------------------------------------------------- */
/* Listado de Funciones y Variables Globales ------------- */
/* ------------------------------------------------------- */
/* Funciones de Dia de Hoy y Fechas ---------------------- */
/* ------------------------------------------------------- */
/* Variables: DiaHoy MesHoy AnoHoy ----------------------- */
/* Función TraerFechaAhora()    Devuelve Var Fecha ------- */
/* Función Diasemana(Fecha)     Devuelve Var Dia Semana -- */
/* Función Dia(Fecha)           Devuelve Var Dia Mes ----- */
/* Función Mes(Fecha)           Devuelve Var Mes --------- */
/* Función Ano(Fecha)           Devuelve Var Año --------- */
/* Función Hora(Fecha)          Devuelve Var Hora -------- */
/* Función Minuto(Fecha)        Devuelve Var Minuto ------ */
/* Función Segundo(Fecha)       Devuelve Var Segundo ----- */
/* Función TextoFecha(Fecha)    Devuelve Var Texto Fecha - */
/* Función TextoHoraMinutos(Fecha)    Devuelve Var Texto Hora y Minutos - */
/* Función TextoHoraMinutosSegundos(Fecha)    Devuelve Var Texto Hora Minutos y Segundos - */
/* TextoMesES(NumMes)           Devuelve Var Texto Mes Español */
/* TextoMesEN(NumMes)           Devuelve Var Texto Mes Ingles */
/* TextoDiaSemanaES(NumDiaSemana)     Devuelve Var Texto Dia Semana Español */
/* TextoDiaSemanaEN(NumDiaSemana)     Devuelve Var Texto Dia Semana Ingles */
/* NumeroSemanasMesES(Fecha) Devuelve Var Numero Semanas del Mes Español */
/* NumeroSemanasMesEN(Fecha) Devuelve Var Numero Semanas del Mes Ingles */
/* NumeroSemanasFechaES(Fecha) Devuelve el Numero de Semana de un Dia en concreto en Español */
/* NumeroSemanasFechaEN(Fecha) Devuelve el Numero de Semana de un Dia en concreto en Ingles */
/* NumeroDiasMes(Fecha)        Devuelve el Numero de Dias del Mes Completo de una Fecha */
/* CrearCalendarioES(Fecha)    Devuelve una Tabla HTML con el Calendario de esa Fecha en Español */
/* CrearCalendarioEN(Fecha)    Devuelve una Tabla HTML con el Calendario de esa Fecha en Ingles */

var TextoTablaFinal = "";    
var DiaHoy = 0;
var MesHoy = 0;
var AnoHoy = 0;

/* Funciones de Inicialización */
function CargarHoy(){
	DiaHoy = Dia(TraerFechaAhora());
	MesHoy = Mes(TraerFechaAhora());	
	AnoHoy = Ano(TraerFechaAhora());
}

/* Funciones Especificas de Fecha */
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
    return "Miércoles";
    }
    if ( Tempo == 4 ) {
    return "Jueves";
    }	
    if ( Tempo == 5 ) {
    return "Viernes";
    }
    if ( Tempo == 6 ) {
    return "Sábado";
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
function EstablecerDia01(){
	DiaHoy = 1;
}
function EstablecerDia02(){
	DiaHoy = 2;
}
function EstablecerDia03(){
	DiaHoy = 3;
}
function EstablecerDia04(){
	DiaHoy = 4;
}
function EstablecerDia05(){
	DiaHoy = 5;
}
function EstablecerDia06(){
	DiaHoy = 6;
}
function EstablecerDia07(){
	DiaHoy = 7;
}
function EstablecerDia08(){
	DiaHoy = 8;
}
function EstablecerDia09(){
	DiaHoy = 9;
}
function EstablecerDia10(){
	DiaHoy = 10;
}
function EstablecerDia11(){
	DiaHoy = 11;
}
function EstablecerDia12(){
	DiaHoy = 12;
}
function EstablecerDia13(){
	DiaHoy = 13;
}
function EstablecerDia14(){
	DiaHoy = 14;
}
function EstablecerDia15(){
	DiaHoy = 15;
}
function EstablecerDia16(){
	DiaHoy = 16;
}
function EstablecerDia17(){
	DiaHoy = 17;
}
function EstablecerDia18(){
	DiaHoy = 18;
}
function EstablecerDia19(){
	DiaHoy = 19;
}
function EstablecerDia20(){
	DiaHoy = 20;
}
function EstablecerDia21(){
	DiaHoy = 21;
}
function EstablecerDia22(){
	DiaHoy = 22;
}
function EstablecerDia23(){
	DiaHoy = 23;
}
function EstablecerDia24(){
	DiaHoy = 24;
}
function EstablecerDia25(){
	DiaHoy = 25;
}
function EstablecerDia26(){
	DiaHoy = 26;
}
function EstablecerDia27(){
	DiaHoy = 27;
}
function EstablecerDia28(){
	DiaHoy = 28;
}
function EstablecerDia29(){
	DiaHoy = 29;
}
function EstablecerDia30(){
	DiaHoy = 30;
}
function EstablecerDia31(){
	DiaHoy = 31;
}
function AgregarColumna( DiaAgregar , DiaTempo ){
if ( DiaAgregar == "0" ) {
    TextoTablaFinal = TextoTablaFinal + '<TD style="WIDTH:12%; text-ALIGN:CENTER; border: solid 1px blue;" >';
    TextoTablaFinal = TextoTablaFinal + "-";
    TextoTablaFinal = TextoTablaFinal + "</TD>";
} else {
    if ( DiaTempo == DiaAgregar ) {
            TextoTablaFinal = TextoTablaFinal + '<TD STYLE="WIDTH:12%; text-ALIGN:CENTER; border: solid 1px blue; background: RED; color: BLUE;">' ;
            DiaAgregarTemp = DiaAgregar;
            TextoTablaFinal = TextoTablaFinal + '<input type="button"  onclick="EstablecerDia' +  DiaAgregarTemp + '()" value="' +  DiaAgregarTemp + '" />';
            TextoTablaFinal = TextoTablaFinal + "</TD>";
    } else {
            TextoTablaFinal = TextoTablaFinal + '<TD style="WIDTH:12%; text-ALIGN:CENTER; border: solid 1px blue; background: white; color: black;">';
            DiaAgregarTemp = DiaAgregar;
            TextoTablaFinal = TextoTablaFinal + '<input type="button" onclick="EstablecerDia' +  DiaAgregarTemp + '()" value="' +  DiaAgregarTemp + '" />';
            TextoTablaFinal = TextoTablaFinal + "</TD>" ;
    }
}
}
function CrearCalendarioES(FechaTempo) {
var FechaTemporal = new Date();
var VD = 1;
var VS = 1;
var NDia = Dia(FechaTempo);
var NMes = Mes(FechaTempo);
NMes--;
var NAno = Ano(FechaTempo);
TextoTablaFinal = "";

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
                
    TextoTablaFinal = '<div style="display: inline-block;" ><TABLE display: inline-block;" ><tr>';
    TextoTablaFinal = TextoTablaFinal + '<TD COLSPAN=8 style="text-ALIGN:CENTER; VERTICAL-ALIGN:MIDDLE; font-size: 1.5em; background-color: green; COLOR: White;">' + TempoMes + ' del ' + NAno + "</TD>";	
    TextoTablaFinal = TextoTablaFinal + "</TR><TR>";
    TextoTablaFinal = TextoTablaFinal + '<TD style="WIDTH:12%; text-ALIGN:CENTER; border: solid 1px blue; background-color: yellow; COLOR: black;"><b>' + "NS" + "</b></TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD style="WIDTH:12%; text-ALIGN:CENTER; border: solid 1px blue; background-color: white; COLOR: black;"><b>' + "Lu" + "</b></TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD style="WIDTH:12%; text-ALIGN:CENTER; border: solid 1px blue; background-color: white; COLOR: black;"><b>' + "Ma" + "</b></TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD style="WIDTH:12%; text-ALIGN:CENTER; border: solid 1px blue; background-color: white; COLOR: black;"><b>' + "Mi" + "</b></TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD style="WIDTH:12%; text-ALIGN:CENTER; border: solid 1px blue; background-color: white; COLOR: black;"><b>' + "Ju" + "</b></TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD style="WIDTH:12%; text-ALIGN:CENTER; border: solid 1px blue; background-color: white; COLOR: black;"><b>' + "Vi" + "</b></TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD style="WIDTH:12%; text-ALIGN:CENTER; border: solid 1px blue; background-color: white; COLOR: black;"><b>' + "Sá" + "</b></TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD style="WIDTH:12%; text-ALIGN:CENTER; border: solid 1px blue; background-color: white; COLOR: black;"><b>' + "Do" + "</b></TD>" ;
    
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
                TextoTablaFinal = TextoTablaFinal + '<TD style="WIDTH:12%; text-ALIGN:CENTER; border: solid 1px blue; background-color: yellow' +  '; COLOR: black' + ';">' ;
                TextoTablaFinal = TextoTablaFinal + "" + VS;
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
    TextoTablaFinal = TextoTablaFinal + "</TABLE></div>" ;

    return TextoTablaFinal;
}


function CrearCalendarioEN(FechaTempo) {
var FechaTemporal = new Date();
var VD = 1;
var VS = 1;
var NDia = Dia(FechaTempo);
var NMes = Mes(FechaTempo);
NMes--;
var NAno = Ano(FechaTempo);
TextoTablaFinal = "";

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
                
    TextoTablaFinal = '<div style="display: inline-block;" ><TABLE display: inline-block;" ><tr>';
    TextoTablaFinal = TextoTablaFinal + '<TD COLSPAN=8 style="text-ALIGN:CENTER; VERTICAL-ALIGN:MIDDLE; font-size: 1.5em; background-color: green; COLOR: White;">' + TempoMes + ' ' + NAno + "</TD>";	
    TextoTablaFinal = TextoTablaFinal + "</TR><TR>";
    TextoTablaFinal = TextoTablaFinal + '<TD style="WIDTH:12%; text-ALIGN:CENTER; border: solid 1px blue; background-color: yellow; COLOR: black;"><b>' + "WN" + "</b></TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD style="WIDTH:12%; text-ALIGN:CENTER; border: solid 1px blue; background-color: white; COLOR: black;"><b>' + "Su" + "</b></TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD style="WIDTH:12%; text-ALIGN:CENTER; border: solid 1px blue; background-color: white; COLOR: black;"><b>' + "Mo" + "</b></TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD style="WIDTH:12%; text-ALIGN:CENTER; border: solid 1px blue; background-color: white; COLOR: black;"><b>' + "Tu" + "</b></TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD style="WIDTH:12%; text-ALIGN:CENTER; border: solid 1px blue; background-color: white; COLOR: black;"><b>' + "We" + "</b></TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD style="WIDTH:12%; text-ALIGN:CENTER; border: solid 1px blue; background-color: white; COLOR: black;"><b>' + "Th" + "</b></TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD style="WIDTH:12%; text-ALIGN:CENTER; border: solid 1px blue; background-color: white; COLOR: black;"><b>' + "Fr" + "</b></TD>" ;
    TextoTablaFinal = TextoTablaFinal + '<TD style="WIDTH:12%; text-ALIGN:CENTER; border: solid 1px blue; background-color: white; COLOR: black;"><b>' + "Sa" + "</b></TD>" ;
    
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
                TextoTablaFinal = TextoTablaFinal + '<TD style="WIDTH:12%; text-ALIGN:CENTER; border: solid 1px blue; background-color: yellow' +  '; COLOR: black' + ';">' ;
                TextoTablaFinal = TextoTablaFinal + "" + VS;
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
    TextoTablaFinal = TextoTablaFinal + "</TABLE></div>" ;

    return TextoTablaFinal;
}