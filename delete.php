<?php  
include("conexion.php");  
$delete_id=$_GET['del'];
$valu="SELECT Estado from perfil where Correo_u='$delete_id'";
$run=mysqli_query($conexion,$valu);
        while($row=mysqli_fetch_array($run))
        {  
            $resultado=$row[0];  
        }
if ("$resultado" == 'X') {
	$delete_query="Update perfil SET Estado='A' WHERE Correo_u='$delete_id'";//delete query  
	$run=mysqli_query($conexion,$delete_query);  
	if($run)  
	{  
	//javascript function to open in the same window   
 	   echo "<script>alert('Usuario Habilitado')</script>";
 	   echo "<script>window.open('viewusers.php','_self')</script>";    
	} 
}
else{
	$delete_query="Update perfil SET Estado='X' WHERE Correo_u='$delete_id'";//delete query  
	$run=mysqli_query($conexion,$delete_query);  
	if($run)  
	{  
	//javascript function to open in the same window   
     echo "<script>alert('Usuario Deshabilitado')</script>"; 
     echo "<script>window.open('viewusers.php','_self')</script>";    
	}  
	} 

  
?> 
