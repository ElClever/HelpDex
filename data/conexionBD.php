<?php
session_start();
// error_reporting(0);

if (!isset($_SESSION["logged_user"])){
	 $_SESSION["logged_user"] = ''; 
}


/*
$ruta = "10.0.0.5:C:\\microsip datos\\ferreaceros 2011.fdb";
$username = "SYSDBA";
$password = "masterkey";

try {
   $con_micro = new PDO("firebird:dbname=$ruta", "$username", "$password");
   $con_micro->exec("SET CHARACTER SET utf8_decode"); 
   $con_micro->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   print "Error!: " . $e->getMessage() . "<br/>";
   die();
} 
*/

$username_conexion = "root";
$password_conexion = "";
$hostname_conexion = "localhost";
$database_conexion = "helpdex";

$conex = mysqli_connect($hostname_conexion, $username_conexion, $password_conexion) or trigger_error(mysqli_error(),E_USER_ERROR);

mysqli_select_db($conex, $database_conexion);

function username($user)
{
   global $conex;
   $consulta = "
   SELECT NOMBRE FROM usuarios WHERE ID = $user
   "
   ;



   $res = mysqli_query($conex, $consulta) or die(mysqli_error());
   
   
   $total_rows = mysqli_num_rows($res);
  
      while ($row = mysqli_fetch_array( $res))
      {
         $nombre = $row['NOMBRE'];            
      }
      return $nombre; 
   
}  

function CorreoUsuario($IDTicket)
{
   global $conex;
   $consulta = "
   SELECT 
		us.CORREO as CORREO
		
	FROM registro reg
	
	LEFT JOIN usuarios us ON us.ID = reg.ID_SOL 
	WHERE reg.ID = $IDTicket
   "
   ;

   $res = mysqli_query($conex, $consulta) or die(mysqli_error());
   
   
   $total_rows = mysqli_num_rows($res);
  
      while ($row = mysqli_fetch_array( $res))
      {
         $CorreoUsuario = $row['CORREO'];            
      }
      return $CorreoUsuario; 
	  
   
}  

function permisos($ID)
{
   global $conex;
   $consulta = "
   SELECT TIPO_USUARIO FROM usuarios WHERE ID = $ID
   "
   ;



   $res = mysqli_query($conex, $consulta) or die(mysqli_error());
   
   
   $total_rows = mysqli_num_rows($res);
  
      while ($row = mysqli_fetch_array( $res))
      {
         $permiso = $row['TIPO_USUARIO'];            
      }
      return $permiso;
}

?>