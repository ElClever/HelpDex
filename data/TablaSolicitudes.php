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
	WHERE reg.ESTATUS = 'P'
	";



	$res = mysqli_query($conex, $consulta) or die(mysqli_error());
	$tabla = '                   <table class="table  table-striped" id = "tabla_solic">
      <thead style="background:#2B2B4F; ">
        <tr style="color:white;">
            <th>ID</th>
            <th>USUARIO</th>
            <th>DEPARTAMENTO</th>
            <th>PROBLEMA</th>
            <th>ESTATUS</th>
        </tr>
      </thead>
      <tbody>';
	
	$total_rows = mysqli_num_rows($res);
	
		while ($row = mysqli_fetch_array( $res))
	{

		$tabla .= '<tr OnClick= "AbrirTicket('.$row['ID'].');">
				<td align="center"  >'.$row['ID'].'</td>
				<td align="center"  >'.$row['USER'].'</td>
				<td align="center"  >'.$row['DESCRIPCION'].'</td>
				<td align="center"  >'.$row['CATEGORIA'].'</td>
				<td align="center"  >'.$row['ESTATUS'].'</td>
				</tr>';
		
	}
	

	echo $tabla.'  
        
      </tbody>
    </table>
		</br>
		<script>$(document).ready(function(){
		
			$("#tabla_solic").DataTable();
		
			
		
			
		});</script>';


?>