<?php  
session_start();//session starts here  
?> 
<?php
 include "conexion.php";
 if(isset($_POST['datos']))  
{  
	  $titulo_n=$_POST['Titulo'];
    $_SESSION['titulo']=$titulo;
}
echo "<script>window.open('juego.php','_self')</script>";    
mysqli_close($conexion);
?>