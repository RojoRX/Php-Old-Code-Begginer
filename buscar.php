<?php
//cadena de conexion
include("conexion.php");
$busqueda=$_POST["busqueda"];
// DEBO PREPARAR LOS TEXTOS QUE VOY A BUSCAR si la cadena existe
if ($busqueda<>''){
  //CUENTA EL NUMERO DE PALABRAS
  $trozos=explode(" ",$busqueda);
  $numero=count($trozos);
  if ($numero==1) {
    //SI SOLO HAY UNA PALABRA DE BUSQUEDA SE ESTABLECE UNA INSTRUCION CON LIKE
    $cadbusca="SELECT  Autor, Titulo FROM juegos WHERE VISIBLE =1
      AND Autor LIKE  '%$busqueda%' OR titulo LIKE  '%$busqueda%' LIMIT 50";
  } elseif ($numero>1) {
    //SI HAY UNA FRASE SE UTILIZA EL ALGORTIMO DE BUSQUEDA AVANZADO DE MATCH AGAINST
    //busqueda de frases con mas de una palabra y un algoritmo especializado
    $cadbusca="SELECT  Autor, Titulo, MATCH ( Autor, Titulo )
      AGAINST (  '$busqueda' ) AS Score FROM juegos WHERE
      MATCH ( Autor, Titulo ) AGAINST (  '$busqueda' ) ORDER  BY Score DESC LIMIT 50";
  }
  $result=mysql($conexion, $cadbusca);
  While($row=mysql_fetch_object($result))
  {
    //Mostramos los titulos de los articulos o lo que deseemos...
    $referencia=$row->REFERENCIA;
    $titulo=$row->TITULO;
    echo $referencia." - ".$titulo."<br>";
  }
}
?>