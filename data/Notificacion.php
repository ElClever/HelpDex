<?php
include("conexionBD.php");



$consulta = "SELECT 
reg.ID, 
us.USER,
dpto.DESCRIPCION,
cat.DESCRIPCION AS CATEGORIA,
reg.ESTATUS
		
	FROM registro reg
	
	LEFT JOIN usuarios us ON us.ID = reg.ID_SOL 
	LEFT JOIN departamento dpto ON dpto.ID = us.DEPARTAMENTO
	LEFT JOIN categorias cat ON cat.ID = reg.CATEGORIA	
	WHERE reg.ESTATUS = 'P' and reg.NOTIFICACION = 'N'
	
	";

	$res = mysqli_query($conex, $consulta) or die(mysqli_error());
	
	$total_rows = mysqli_num_rows($res);
	
		while ($row = mysqli_fetch_array( $res))
	{ 
		$id_reg = $row['ID'];
		$update = "UPDATE registro SET
				   NOTIFICACION = 'S'
				   
				   WHERE ID = $id_reg ";	
				
		if (mysqli_query($conex, $update) or die(mysqli_error()))
		{
				echo ' <script>$(document).ready(function(){
		
		var notificacion = new Notification("Solicitud '.$row['ID'].'\n'.$row['USER'].'\n'.$row['CATEGORIA'].'");
			
		});</script>';
		
		exit;
		}
	}




?>
