<?php
include("conexionBD.php");
//variables
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$usuario = $_POST['usuario'];
		$contrasena = $_POST['contrasena'];
		$correo = $_POST['correo'];
		$departamento = $_POST['departamento'];
		$estatus = $_POST['estatus'];
		$permisos = $_POST['permisos'];

//consulta

		$update = "UPDATE usuarios SET

				USER = '$usuario',
				PASSWORD = '$contrasena',
				DEPARTAMENTO = '$departamento', 
				NOMBRE = '$nombre',
				ESTATUS = '$estatus',
				TIPO_USUARIO = '$permisos',
				CORREO = '$correo'
				
				WHERE ID = $id
					";	
					
				
		if (mysqli_query($conex, $update) or die(mysqli_error()))
				{
					echo '<script>
					  $("#comment_box").val(""); 
					  PanelUsuario();
					  $("#ImpresionProblema").html(""); 
					</script>';
					
				}				
				

?>