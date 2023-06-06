<?php
include("conexionBD.php");
//variables
		$nombre = $_POST['nombre'];
		$usuario = $_POST['usuario'];
		$contrasena = $_POST['contrasena'];
		$correo = $_POST['correo'];
		$departamento = $_POST['departamento'];
		$estatus = $_POST['estatus'];
		$permisos = $_POST['permisos'];

//consulta
$consulta = "INSERT INTO usuarios

(USER, PASSWORD, DEPARTAMENTO, NOMBRE, ESTATUS, TIPO_USUARIO, CORREO) 

VALUES 
('$usuario','$contrasena','$departamento','$nombre','$estatus',$permisos,'$correo')

	";

//ejecuta consulta, si ejecuta realiza el if
		if (mysqli_query($conex, $consulta) or die(mysqli_error()))
				{
					//imprimir resultado
					echo '<script>
					 alert("Usuario agregado");
					 PanelUsuario();
					</script>';
					
				}

?>