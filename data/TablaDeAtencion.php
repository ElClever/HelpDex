<?php
include("conexionBD.php");

$IDTicket = $_POST['id'];

$consulta = "SELECT 
reg.ID, 
us.USER,
dpto.DESCRIPCION,
cat.DESCRIPCION AS CATEGORIA,
reg.ESTATUS,
reg.DESCRIPCION AS DESCPROM
		
	FROM registro reg
	
	LEFT JOIN usuarios us ON us.ID = reg.ID_SOL 
	LEFT JOIN departamento dpto ON dpto.ID = us.DEPARTAMENTO
	LEFT JOIN categorias cat ON cat.ID = reg.CATEGORIA	
	WHERE reg.ID = $IDTicket
	";



	$res = mysqli_query($conex, $consulta) or die(mysqli_error());
	
	
	$total_rows = mysqli_num_rows($res);
		while ($row = mysqli_fetch_array( $res))
	{

		$tabla = '<table border="1" class="table table-responsive table-bordered table-hover">
                             <tbody>
                            <tr>
                                 <th style="background:#2B2B4F; color:white;">ID:</th>
                                 <td id="td_folio">'.$row['ID'].'</td>
                                 <th style="background:#2B2B4F; color:white;">Usuario:</th>
                                 <td id="td_fecha">'.$row['USER'].'</td>
                            </tr>
                            <tr>
                                 <th style="background:#2B2B4F; color:white;">Problema:</th>
                                 <td id="td_categoria" colspan="3">'.$row['CATEGORIA'].'</td>
                                 
                                 <tr>
                            </tr>
                               
                            <tr>
                                 <th colspan="4" style="background:#2B2B4F; color:white;">Descripcion: </th>
                            </tr>
                            <tr >
                                  <td  colspan="4">'.$row['DESCPROM'].'</td>
                            </tr>
                             
                             </tbody>

                         </table>
                         <div class="form-group">
                            <button type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="Atender_Ticket('.$row['ID'].');" class="form-control-submit-button">Atender</button>
                        </div>';
                   
	}
	

	echo $tabla.'  
        
     	<script>$(document).ready(function(){
		
		});</script>';


?>