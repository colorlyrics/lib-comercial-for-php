<!DOCTYPE html>
<html lang="es">
<head>
<TITLE>libalex Librerias para uso comercial</TITLE>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body>


<?PHP
//-- libalex
//-- use asi include($_SERVER["DOCUMENT_ROOT"]."/path/libalex.php" ) ;

//-------------- Parametros del sistema --------------------

function root() {
$root=$_SERVER["DOCUMENT_ROOT"];
return $root;    
}

?>


<?php 
// ------------------- Funciones Comunes -------------
// -- FUNCIONES DE MANEJO DE DATOS --
?>


<?php
function limpia_texto($string) {
    $filtro = '-1234567890abcdefghijklmnopqrstuvwxyz -.ABCDEFGHIJKLMNOPQRSTUVWXYZáéíóúÁÉÍÓÚ';
    $length = strlen($string);
    $stringfiltrado='';
    for ($i = 0; $i < $length; $i++) {
        $caracter=substr($string,$i,1);
        $pos=strpos($filtro,$caracter);
        if ($pos<>null) { $stringfiltrado.=$caracter; }
    }
    return $stringfiltrado;
} 
?>



<?php
function alerta($mensaje) {  //---- Emite mensaje
echo '<script Language="javaScript">alert("'.$mensaje.'");</script> ';
}

function limpiar_cadena($string) {
$string = ereg_reemplaza($string);
return $string;
}


//--- funcion que reemplaza a ereg_replace
function ereg_reemplaza($string) {
    $filtro = '-1234567890abcdefghijklmnopqrstuvwxyz .ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $length = strlen($string);
    $stringfiltrado='';
    for ($i = 0; $i < $length; $i++) {
        $caracter=substr($string,$i,1);
        $pos=strpos($filtro,$caracter);
        if ($pos<>null) { $stringfiltrado.=$caracter; }
    }
    return $stringfiltrado;
} 
?>

    
<?php      
function ereg_filtrar($filtro,$string) {
    $length = strlen($string);
    $stringfiltrado='';
    for ($i = 0; $i < $length; $i++) {
        $caracter=substr($string,$i,1);
        $pos=strpos($filtro,$caracter);
        if ($pos<>null) { $stringfiltrado.=$caracter; }
    }
    return $stringfiltrado;
} 
?>       
        

<?php          
function Leer_de_Disco($path) {    //-- $path="https://www.elsitio/elpat/file.txt";
$ch = curl_init();
$timeout = 0; // set to zero for no timeout
curl_setopt ($ch, CURLOPT_URL, "$path" );
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$contenidodelarchivo = curl_exec($ch);
curl_close($ch);
return $contenidodelarchivo;
}
?>
                             

<?php
function grabar_a_disco($txt,$path) {  //$path="/home1/hostgator/public_html/sitio/file.txt";
$file = fopen($path, "w");
fwrite($file, $txt . PHP_EOL);
fclose($file);
}
?>
                                                                                                                     
                                                                     
<?php
function generaRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    //---
    $clave=substr(str_shuffle($randomString), 0, $length);
    //return $randomString;
    return $clave;
} 


    
    
function eldominio($email) {  //-- retorna el nombre del dominio a partir del mail
$tmail=trim(ltrim($email));
$wdominio=substr( $tmail, strpos($tmail,"@")+1 );
return $wdominio;
}


function strright($a,$num) {
$largo=strlen($a);
$punt=($largo-$num);
$t=substr($a, $punt);
return($t);
}


//--- FUNCIONES NUMERICAS COMUNES

function is_par($numero) {
if ($numero%2==0) // Vemos si 54 dividido en 2 da resto 0 si lo da
   { return true; } //escribo Par
else //Sino
{ return false; } //Escribo impar
}


//--- FUNCIONES PARA FECHAS

function fec2num($cFECHA) {
//$nFECHA=date("Y-m-d H:i:s", strtotime($cFECHA));
$nFECHA=strtotime($cFECHA);
return $nFECHA; 
}

    
function num2fec($nFECHA) {
$cFECHA=date("Y-m-d H:i:s",$nFECHA);
return $cFECHA; 
}

    
function fecha_hace($date2) {
$date1 = time();
$subTime = $date1 - $date2;
$y = ($subTime/(60*60*24*365));
$d = ($subTime/(60*60*24))%365;
$h = ($subTime/(60*60))%24;
$m = ($subTime/60)%60;
//echo "Hace ".date('Y-m-d H:i:s',$date1)." and ".date('Y-m-d H:i:s',$date2)." is:\n";
$ac="Hace ";
//--- if ($y>0) { $ac.=$y." años "; }
$ac.=$d."d ";
$ac.=$h."hr ";
$ac.=$m."Min ";
//echo $y." years\n";
//echo $d." days\n";
//echo $h." hours\n";
//echo $m." minutes\n";
return $ac;
}


//--- FUNCIONES DE VALIDACION COMUNES INPUT

function valida_rut($r)
{
  $r=strtoupper(solonumeros($r));
  $sub_rut=substr($r,0,strlen($r)-1);
  $sub_dv=substr($r,-1);
  $x=2;
  $s=0;
  for ( $i=strlen($sub_rut)-1;$i>=0;$i-- )
  {
    if ( $x >7 )
    {
      $x=2;
    }
    $s += $sub_rut[$i]*$x;
    $x++;
  }
  $dv=11-($s%11);
  if ( $dv==10 )
  {
    $dv='K';
  }
  if ( $dv==11 )
  {
    $dv='0';
  }
  if ( $dv==$sub_dv )
  {
    return true;
  }
  else
  {
    return false;
  }
}


function solonumeros($string) {
    //echo "<br>Validando->".$string;
    $filtro = '0123456789';
    $length = strlen($string);
    //echo "<br>largo=".$length;
    $stringfiltrado='';
    for ($i = 0; $i < $length; $i++) {
        //echo "<br>i=".$i;  
        $caracter=substr($string,$i,1);
        $pos=strpos($filtro,$caracter);
        //echo "<br>caracter=".$caracter;
        //echo "<br>pos=".$pos;        
        if ( (!empty($pos)) or ($caracter=="0")) { 
           $stringfiltrado.=$caracter;
        }
        //echo "<br>stringfiltrado=".$stringfiltrado;                
        //echo "<br>---------------------------";        
    }
    return $stringfiltrado;
} 


function validar_email($email) {
$emailok=1;
//--- validar mail en blanco
if (strlen($email)==0) { $emailok=0; }
//--- validar mail con solamente una arroba
if (strpos($email,"@")==0) { $emailok=0; }
//--- validar mail sin espacios al medio
if (trim(ltrim(strpos($email," ")))>0) { $emailok=0; }
//--- validar que el mail tenga punto
if ((strval(strpos($email,".")))<=0) { $emailok=0; }
//--- validar estructura
//if (!eregi('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]{2,})+$', $email)) { $emailok=0; }
//--- validar dominio
//$domain = explode('@', $email);
//if (!checkdnsrr($domain[1])) { $emailok=0; } 
return $emailok;
}


function validar_telefono($a) {
//echo "<br>valor inicial=".strlen($a);  
if (strlen($a)==0) {
    echo "fono en blanco";
  return 1;
}
$textoLimpio=solonumeros($a); 
//echo "<br>textolimpio=".$textoLimpio;      
//echo "<br>strlentextoLimpio=".strlen($textoLimpio);
    
if (strlen($textoLimpio)<>9) {
  return(0);
  }
return 1;
}


function repla_espacio($string) {
$limpio= str_replace(' ', '%20', $string);
return $limpio;
}


function extension_foto($LINKFOTO) {
$trozos = explode(".", $LINKFOTO); 
$extension = end($trozos);
return $extension;  
}


    
    
    

//--- Funciones de IP
    
    
function ip_real() {
    $ip = $_SERVER['REMOTE_ADDR'];
    return $ip;
}


<?php
function macdetect()
{
  $browser=array("IE","OPERA","MOZILLA","NETSCAPE","FIREFOX","SAFARI","CHROME");
  $os=array("WIN","MAC","LINUX","ANDROID");
  # definimos unos valores por defecto para el navegador y el sistema operativo
  $info['browser'] = "OTHER";
  $info['os'] = "OTHER";

  # buscamos el navegador con su sistema operativo
  foreach($browser as $parent)
  {
    $s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
    $f = $s + strlen($parent);
    $version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
    $version = preg_replace('/[^0-9,.]/','',$version);
    if ($s)
    {
      $info['browser'] = $parent;
      $info['version'] = $version;
    }
  }

  # obtenemos el sistema operativo
  foreach($os as $val)
  {
    if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),$val)!==false)
      $info['os'] = $val;
  }
  # devolvemos el array de valores
  # return $info; 
  $SistemaOperativo=substr($info["os"], 0,1);
  return $SistemaOperativo;
}

    
    
function ancho_pantalla() {
if(isset($_GET['width'])){ 
$ancho=$_GET['width']; 
}else{ 
echo "<script language='javascript'>\n"; 
echo " location.href=\"${_SERVER['SCRIPT_NAME']}?${_SERVER['QUERY_STRING']}" 
. "&width=\" + screen.width;"; 
echo "</script>\n"; 
exit(); 
} 
return $ancho;    
}

    
    
function sino($mensaje,$linkborrar,$linkvolver) {
?>
  <div class="w3-card-4 w3-blue-grey" style="width:50%; margin-left:25%; margin-top:15%;">
    <div class="w3-container w3-center">
      <h3>Aviso Importante</h3>
      <h5><?php echo $mensaje; ?></h5>
      <div class="w3-section">
        <a class="w3-button w3-green" style="width:30%;" href="<?php echo $linkborrar.'&linkvolver='.$linkvolver; ?> "> Si </a>
        &nbsp; &nbsp; &nbsp;
        <a class="w3-button w3-red" style="width:30%;" href="<?php echo $linkvolver; ?>"> No </a>
      </div>
    </div>
  </div>
<?php
}
?>
      

<?php
function mensajeok($mensaje,$link) {
?>
  <div class="w3-card-4 w3-blue-grey" style="width:50%; margin-left:25%; margin-top:15%;">
    <div class="w3-container w3-center">
      <h3>Aviso Importante</h3>
      <h5><?php echo $mensaje; ?></h5>
      <div class="w3-section">
        <a class="w3-button w3-red" style="width:30%;" href="<?php echo $link; ?>"> OK </a>
      </div>
    </div>
  </div>
<?php
}
    
    
?>
    
    