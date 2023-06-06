<?php
include("conexionBD.php");

			$id = $_POST['id'];

$consulta = "SELECT 
				us.ID, 
				us.USER,
				us.PASSWORD,
				us.DEPARTAMENTO,
				us.NOMBRE,
				us.ESTATUS,
				us.TIPO_USUARIO,
				us.CORREO,
				us.FECHA_HORA_C
				
			FROM usuarios us 
			
			WHERE ID = $id";


	$res = mysqli_query($conex, $consulta) or die(mysqli_error());

	
	$total_rows = mysqli_num_rows($res);

		while ($row = mysqli_fetch_array( $res))
	{
		$nombre = $row['NOMBRE'];
		$usuario = $row['USER'];
		$contrasena = $row['PASSWORD'];
		$correo = $row['CORREO'];
		$departamento = $row['DEPARTAMENTO'];
		$permisos = $row['TIPO_USUARIO'];
				
		
	}


	echo '  
        
     	</br>
		<script>$(document).ready(function(){
		$("#txt_nombre").val("'.$nombre.'");
		$("#txt_usuario").val("'.$usuario.'");
		$("#txt_password").val("'.$contrasena.'");
		$("#txt_correo").val("'.$correo.'");
		$("#select_dep").val("'.$departamento.'");
		$("#select_permisos").val("'.$permisos.'");
		
			
		});</script>';
?>