<?php include("../data/conexionBD.php");

/* if ($_SESSION["logged_user"] <> ''){ header('Location: ../index.php'); } */
		//variables usuario y contraseña
		$user = $_POST['usuario'];
		$pass = $_POST['contrasena'];
		
	  if ($user != ''){
	  
			verifica_datos($user,$pass);
	  }

 function verifica_datos($user,$pass){ 
global $conex;
$consulta = "SELECT * FROM usuarios WHERE user = '$user' AND estatus = 'ACTIVO' ";

$resultado = mysqli_query($conex, $consulta) or die(mysqli_error());
$row = mysqli_fetch_assoc($resultado);
$total_rows = mysqli_num_rows($resultado);

if ($total_rows == 0){
 echo 0; // usuario no registrado

} else if ($total_rows > 0){
			
			if ($row['PASSWORD'] == $pass){
				echo 1; // acceso consedido
				$_SESSION["logged_user"] = $row['ID'];
			} 
			else
			{
				echo 2; // contrasena incorrecta
			}


}

}




?>