<?php 
require_once "../vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



$username_conexion = "root";
$password_conexion = "";
$hostname_conexion = "localhost";
$database_conexion = "helpdex";

$conex = mysqli_connect($hostname_conexion, $username_conexion, $password_conexion) or trigger_error(mysqli_error(),E_USER_ERROR);

mysqli_select_db($conex, $database_conexion);

//**************************************************************************


	$fecha_in  = $_GET['fecha_in'];
	$fecha_fin = $_GET['fecha_fin'];
	$fecha_in  = $fecha_in.' 00:00:00';
    $fecha_fin = $fecha_fin.' 23:59:59';
/**/

 mostrar();

function mostrar()
{
  
	global $conex, $fecha_in, $fecha_fin;


	//consulta de casos
	$consulta = "SELECT 
	us.NOMBRE as solicitante, 
	depto.DESCRIPCION as Departamento,
	cat.DESCRIPCION as Tipo_Problema,
	reg.DESCRIPCION as Descripcion_Problema,
	reg.FECHA_HORA_C as Fecha_Creacion,
	reg.FECHA_HORA_SUPP as Fecha_Soporte,
	us2.NOMBRE as atendio,
	reg.SOLUCION as solucion


	FROM registro reg
	LEFT JOIN usuarios us ON us.ID = reg.ID_SOL
	LEFT JOIN departamento depto ON depto.ID = us.DEPARTAMENTO
	LEFT JOIN categorias cat ON cat.ID = reg.CATEGORIA
	LEFT JOIN usuarios us2 ON us2.ID = reg.ID_SUPP


	WHERE reg.FECHA_HORA_C BETWEEN '$fecha_in' AND '$fecha_fin' "; 
	
		$res = mysqli_query($conex, $consulta) or die(mysqli_error());
		$total_rows = mysqli_num_rows($res);


	$documento = new Spreadsheet();
	$documento
	->getProperties()
	->setCreator("System Team NEF")
	->setLastModifiedBy('PHP')
	->setTitle('Archivo generado desde HelpDex')
	->setDescription('Reporte de tickets');

	$hojaDeReporte = $documento->getActiveSheet();
	$hojaDeReporte->setTitle("Reporte de Tickets");

	# Encabezado de tickets
	$encabezado = ["Solicitante", "Departamento", "Tipo de problema", "Descripcion del problema", "Fecha de solicitud", "Fecha de soporte", "Atendio", "Solucion"];
	# El último argumento es por defecto A1
	$hojaDeReporte->fromArray($encabezado, null, 'A1');

	# Comenzamos en la fila 2
	$NumeroDeFila = 2;
	while ($row = mysqli_fetch_array($res))
	{
		
			$solicitante          = $row['solicitante'];
			$Departamento         = $row['Departamento'];
			$Tipo_Problema        = $row['Tipo_Problema'];
			$Descripcion_Problema = $row['Descripcion_Problema'];
			$Fecha_Creacion       = $row['Fecha_Creacion'];
			$Fecha_Soporte        = $row['Fecha_Soporte'];
			$atendio              = $row['atendio'];
			$solucion             = $row['solucion'];
		
	//echo $solicitante.'-'.$Departamento.'-'.$Tipo_Problema.'-'.$Descripcion_Problema.'-'.$Fecha_Creacion.'-'.$Fecha_Soporte.'-'.$resolvio;

				# Escribir registros en el documento
				$hojaDeReporte->setCellValueByColumnAndRow(1, $NumeroDeFila, $solicitante);
				$hojaDeReporte->setCellValueByColumnAndRow(2, $NumeroDeFila, $Departamento);
				$hojaDeReporte->setCellValueByColumnAndRow(3, $NumeroDeFila, $Tipo_Problema);
				$hojaDeReporte->setCellValueByColumnAndRow(4, $NumeroDeFila, $Descripcion_Problema);
				$hojaDeReporte->setCellValueByColumnAndRow(5, $NumeroDeFila, $Fecha_Creacion);
				$hojaDeReporte->setCellValueByColumnAndRow(6, $NumeroDeFila, $Fecha_Soporte);
				$hojaDeReporte->setCellValueByColumnAndRow(7, $NumeroDeFila, $atendio);
				$hojaDeReporte->setCellValueByColumnAndRow(8, $NumeroDeFila, $solucion);
				$NumeroDeFila++;
	}

	$fileName="Reporte_Casos.xlsx";

	# Crear un "escritor"
	$writer = new xlsx($documento);

	# Ruta de guardado
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
	$writer->save('../reportes_excel/Reporte_Casos.xlsx');
	$writer->save('php://output');

}

?>
