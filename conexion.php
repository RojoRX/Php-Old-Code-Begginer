<?php
$server="localhost";
$user="root";
$password="";
$database="games4all";
$conexion=mysqli_connect($server,$user,$password) or die("Servidor,Usuario o contraseña incorrectos");

$db=mysqli_select_db($conexion,$database) or die("No se encontro la base de datos");
?>