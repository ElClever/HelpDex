<?php
include("conexionBD.php");


//Consulta
$consulta = "SELECT 
				us.ID, 
				us.USER,
				us.PASSWORD,
				us.DEPARTAMENTO,
				us.NOMBRE,
				us.ESTATUS,
				us.TIPO_USUARIO,
				us.CORREO,
				us.FECHA_HORA_C,
				depto.DESCRIPCION
				
	FROM usuarios us
	
	LEFT JOIN departamento depto ON depto.ID = us.DEPARTAMENTO";


//Campos de tabla
	$res = mysqli_query($conex, $consulta) or die(mysqli_error());
	$tabla = ' <table class="table table-striped" id = "panel_usuario"> 
      <thead style="background:#2B2B4F; color:white;">
        <tr>
            <th>ID</th>
            <th>USUARIO</th>
            <th>CONTRASEÑA</th>
            <th>DEPARTAMENTO</th>
			<th>NOMBRE</th>
            <th>ESTATUS</th>
			<th>TIPO DE USUARIO</th>
			<th>CORREO</th>
			<th>FECHA DE CREACION</th>
			<th> </th>
        </tr>
      </thead>
      <tbody>';
	
//Impresion de la consulta	
	$total_rows = mysqli_num_rows($res);

		while ($row = mysqli_fetch_array( $res))
	{	if ($row['TIPO_USUARIO'] == 1)
		{
			$tipo_usuario = "Admin";
		}
		else
		{
			$tipo_usuario = "Normal";
		}

		$tabla .= '<tr OnClick= "EditarUusario('.$row['ID'].');">
				<td align="center"  >'.$row['ID'].'</td>
				<td align="center"  >'.$row['USER'].'</td>
				<td align="center"  >'.$row['PASSWORD'].'</td>
				<td align="center"  >'.$row['DESCRIPCION'].'</td>
				<td align="center"  >'.$row['NOMBRE'].'</td>
				<td align="center"  >'.$row['ESTATUS'].'</td>
				<td align="center"  >'.$tipo_usuario.'</td>				
				<td align="center"  >'.$row['CORREO'].'</td>
				<td align="center"  >'.$row['FECHA_HORA_C'].'</td>
				<td align="center"  ><a class ="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalUsuarios" OnClick= "LoadUserInfo('.$row['ID'].');" >Editar<i class="fa-solid fa-pen-to-square"></i></a></td>
				</tr>';
		
	}
	

	echo $tabla.'  
        
      </tbody>
    </table>
		</br>
		<script>$(document).ready(function(){
		
			$("#panel_usuario").DataTable();
		
			
		
			
		});</script>';


?>