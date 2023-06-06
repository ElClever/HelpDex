<?php
include("conexionBD.php");

		//recibir variables
		$ID = $_POST['ID'];
		//$SolName = $_POST['SolName'];
		$SolCat = $_POST['SolCat'];
		$SolDesc = $_POST['SolDesc'];
		
		//consulta
		$insert = "INSERT INTO registro 
			(ID_SOL, CATEGORIA, DESCRIPCION, ESTATUS)
	 VALUES ($ID, $SolCat, '$SolDesc', 'P')";	
					
				//ejecuta consulta, si ejecuta realiza el if
		if (mysqli_query($conex, $insert) or die(mysqli_error()))
				{
					//imprimir resultado
					echo '<script>
					 
					</script>';
					
				}
	
?>