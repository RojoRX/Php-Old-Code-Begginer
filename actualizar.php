<?php  
session_start();//session starts here  
?> 
<?php
 include "conexion.php";
 $nombre_a=$_SESSION["nombre"];
 $apellido_a=    $_SESSION["apellido"];
 $direccion_a=    $_SESSION["direccion"];
 $celular_a=    $_SESSION["celular"];
 $descripcion_a=    $_SESSION["descripcion"];
 if(isset($_POST['Actualizar']))  
{  
	$name_n=$_POST['nombres'];  
    $lastname_n = $_POST['apellidos'];
    $password_n=$_POST['password'];  
    $celular_n = $_POST['celular'];
    $direccion_n=$_POST['direccion'];  
    $descripcion_n = $_POST['descripcion'];

      if (!empty(nombre_a)) {
 	 		$sql = "UPDATE perfil SET nombres_u= '$name_n' WHERE Nombres_u='$nombre_a'";
 	 		 if ($conexion->query($sql) === TRUE) {
  					echo "OK";      
 			}else {
  					echo "ERROR";
				  }
 	 	 if (!empty(apellido_a)) {
 	 		$sql = "UPDATE perfil SET apellidos_u= '$lastname_n' WHERE Nombres_u='$nombre_a'";
 	 		 	 		 if ($conexion->query($sql) === TRUE) {
  					echo "OK";      
 			}else {
  					echo "ERROR";
				  }
 		if (!empty(password_n)) {
 	 		$sql = "UPDATE perfil SET password_u= '$password_n' WHERE Nombres_u='$nombre_a'";
 	 		 	 		 if ($conexion->query($sql) === TRUE) {
  					echo "OK";      
 			}else {
  					echo "ERROR";
				  }
 		if (!empty(celular_a)) {
 	 		$sql = "UPDATE perfil SET celular_u= '$celular_n' WHERE Nombres_u='$nombre_a'";
 	 		 if ($conexion->query($sql) === TRUE) {
  					echo "OK";      
 			}else {
  					echo "ERROR";
				  }
 		if (!empty(direccion_a)) {
 	 		$sql = "UPDATE perfil SET direccion_u= '$direccion_n' WHERE Nombres_u='$nombre_a'";
 		 	 		 if ($conexion->query($sql) === TRUE) {
  					echo "OK";      
 			}else {
  					echo "ERROR";
				  }
 	 	if (!empty(descripcion_a)) {
 	 		$sql = "UPDATE perfil SET direccion_u= '$descripcion_n' WHERE Nombres_u='$nombre_a'";
 	 		 	 		 if ($conexion->query($sql) === TRUE) {
  					echo "OK";      
 			}else {
  					echo "ERROR";
				  }
 }
}
 mysqli_close($conexion);
?>