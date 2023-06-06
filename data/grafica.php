<?php include("conexionBD.php"); 
//Datos recibidos desde INDEX
               $fecha_in = $_POST['fecha_in'];
               $fecha_fin = $_POST['fecha_fin'];
               
               $fecha_in_ = $fecha_in.' 00:00:00';
               $fecha_fin_ = $fecha_fin.' 23:59:59';
               
               $rango = $fecha_in.' a '.$fecha_fin;
               

//NUMEROS DE CASOS POR FECHA               
               $fecha_inicial = new DateTime($fecha_in);
               $fecha_final =new DateTime($fecha_fin);
               $diferencia =  $fecha_inicial->diff($fecha_final);
               $meses = $diferencia -> format('%M');
			   
			   
               if ($meses > 2)//si son mas de tres meses los muestro por mes   
               {
                              $tooltip = 'point.x: %B';
                              $consulta = "SELECT
							  COUNT(re.FECHA_HORA_C) as numero_casos,
							  MONTH(re.FECHA_HORA_C) as meses,
							  YEAR(re.FECHA_HORA_C) as year
							  
							  
							FROM registro re 
							WHERE re.FECHA_HORA_C BETWEEN '$fecha_in_' AND '$fecha_fin_' 
							GROUP BY meses
							ORDER BY re.FECHA_HORA_C ASC
               ";
			   
			

               $nombre_ch="";
               $datos="";

               $res = mysqli_query($conex, $consulta) or die(mysqli_error());
               $total_rows = mysqli_num_rows($res);
               while ($row = mysqli_fetch_array( $res))
               {
                              
                              $nombre_ch .= "name: 'Cantidad de casos', ";
                              $mes =$row['meses'] - 1;
                             /*  $dia = $row['dias'];
                              if ($dia<10)
                              {$dia='0'.$dia;} */
                              $datos .= "[Date.UTC(".$row['year'].", ".$mes."), ".$row['numero_casos']." ],";
               }
               
               }             
               else{ //si son dos meses o menos
               $tooltip = 'point.x: %d-%B';
               $consulta = "SELECT
							COUNT(re.FECHA_HORA_C) as numero_casos,
							MONTH(re.FECHA_HORA_C) as meses,
							YEAR(re.FECHA_HORA_C) as year,
                            DAY(re.FECHA_HORA_C) as dia
														  
							FROM registro re 
							WHERE re.FECHA_HORA_C BETWEEN '$fecha_in_' AND '$fecha_fin_'  
					
							GROUP BY dia
                            ORDER BY re.FECHA_HORA_C ASC
               ";

               $nombre_ch="";
               $datos="";

               $res = mysqli_query($conex, $consulta) or die(mysqli_error());
               $total_rows = mysqli_num_rows($res);
               while ($row = mysqli_fetch_array( $res))
               {
                              
                              $nombre_ch .= "name: 'Cantidad de casos', ";
                              $mes =$row['meses'] - 1;
                              $dia = $row['dia'];
                              if ($dia<10)
                              {$dia='0'.$dia;}
                              $datos .= "[Date.UTC(".$row['year'].", ".$mes.", ".$dia."), ".$row['numero_casos']." ],";
               }
               
               }
               
               
  /// IMPRESION DE CASOS RESUELTOS
               echo "<style type='text/css'>

                              </style>
                              <script type='text/javascript'>
$(function () {
    $('#grafica').highcharts({
        chart: {
            type: 'spline'
        },
        title: {
            text: 'Reporte de casos'
        },
        subtitle: {
            text: '".$rango."'
        },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: { // don't display the dummy year
                month: ' %b',
                year: '%b'
            },
            title: {
                text: 'Fechas'
            }
        },
        yAxis: {
            title: {
                text: 'Numero de casos'
            },
            min: 0
        },
        tooltip: {
            headerFormat: '<b>{series.name}</b><br>',
            pointFormat: '{".$tooltip."}:  {point.y:.f} '
        },

        plotOptions: {
            spline: {
                marker: {
                    enabled: true
                }
            }
        },

        series: [{".$nombre_ch."
            data: [".$datos."]
        }]
    });
});
                              </script>";
                              
                              
                              
           

?>