<?php
session_start();
?>
<html>  
<head lang="en">  
    <meta charset="UTF-8">  
  <title>Games4All</title>
  <link rel="stylesheet" type="text/css" href="games.css">
</head>  
<style>  
    .login-panel {  
        margin-top: 150px;  
    }  
    .table {  
        margin-top: 50px;  
     }  
</style>  
<div id="aspect">
<body>
<header>
      <nav id="Menu"><!--Importante para crear una lista o cunjunto de botones-->
      <ul><!--Atributo que contiene los botones-->
        <li><a href="index.php">Tienda</a> </li><!--Botones que contienen un link que referencia a una pagina-->
        <li><a href="Geraltweb.html">Noticias</a></li>
        <li><a href="Ciriweb.html">Preguntas</a></li>
        <li><a href="Moreweb.html">Acerca</a></li>

      </ul>

      </nav>
      <button style="position: absolute;left: 1650px;" id="Loggin"> <a>
      <?php 
         if (isset($_SESSION["correo"])) 
         {
          echo '<a href="perfil.php"> Tu Perfil</a>';
         }
         else{
          echo '<a href="registro.html">Registrate</a>';
         }
         ?>
          </a> </button>


      <button id="Loggin"> <a>
      <?php 
         if (isset($_SESSION["correo"])) 
         {
          echo '<a href="logout.php"> Cerrar Sesion</a>';
         }
        else{
             echo '<a href="Iniciosesion.html"> Inicia Sesion</a>';
          }?>
          </a> </button>
  </header>
<aside id="botom2"><!--Estos paneles deben estar ubicados antes de "section" para poder flotar a la derecha o izquierda de forma ordenada-->
  <img src="images/ss_eda99e7f705a113d04ab2a7a36068f3e7b343d17.1920x1080.jpg"><!--Este atributo hace posible insertar una imagen en la pagina-->
  <img src="images/The_Witcher_3_Wild_Hunt_Blood_and_Wine_Wine_Festival_EN.jpg">
  <img src="images/ss_608af6cfe0eab3f37265550b391732a3e88d1a4f.1920x1080.jpg">
  <img src="images/The_Witcher_3_Wild_Hunt_Blood_and_Wine_Road_to_Palace_EN.jpg">
</aside>
<section id="principal">  
<div class="">  
    <h1 align="center">Resultados</h1>  
  
<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
    <table class="" style="margin: 8px; color: white">  
        <thead> 
        <tr>  
            <th style="margin: 10px">Portada</th>
            <th style="margin: 10px">Titulo</th>   
            <th style="margin: 10px">Autor</th>  
        </tr>  
        </thead> 
<?php
//cadena de conexion

include("conexion.php");
$busqueda=$_POST["busqueda"];
// DEBO PREPARAR LOS TEXTOS QUE VOY A BUSCAR si la cadena existe
if (isset($busqueda))
 {
   $p=0;
   $cadbusca="SELECT * FROM juegos WHERE Autor LIKE '%$busqueda%' OR Titulo LIKE '%$busqueda%' LIMIT 50";
   echo "<script>alert('Estos son los Resultados')</script>"; 
   $run=mysqli_query($conexion,$cadbusca);  
   while($row=mysqli_fetch_array($run))  
   {  
    $p=$p+1;
    $ng='.png';
    $port=$p.$ng;
    $portada=$row[1];
    $user_titulo=$row[2];  
    $user_descripcion=$row[3]; 
    $user_demo=$row[4];  
    $user_archivo=$row[5]; 
    $user_autor=$row[6];

    $Base64Img ="$portada";
    $Base64Img = base64_decode($Base64Img);
    file_put_contents($port,$Base64Img);    
    ?>  
    <tr>
    <td><img style="width: 200px; height: 310px;margin: 10px;"  src="<?php echo $port; ?>"/></td>
      <td style="margin: 10px;"><?php echo $user_titulo;  ?></td>  
      <td style="margin: 10px;"><?php echo $user_autor;  ?></td> 
      <td><a href="juego.php?var1=<?php echo $user_titulo?>"><button class="btn btn-danger">Ver Juego</button></a></td> 
    </tr>  
<?php }
  }
else
  {
    echo "Sin Resultados";
  }
?>
</table>  
        </div>  
</div>
</section>
</div>  
</body>  
  
</html>  