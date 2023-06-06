<?php 

function enviar_correo($correo, $usuario_nombre, $mensaje_html)
{

	require_once  ("../assets/sendgrid/sendgrid-php.php");

	$email = new \SendGrid\Mail\Mail(); 
	$email->setFrom("auxsistemas@nef.com.mx", "Departamento de TI");
	$email->setSubject("HelpDex - Solicitud atendida");
	$email->addTo($correo, $usuario_nombre);
	$email->addContent("text/plain", "Esto es contenido en texto plano");
	$email->addContent("text/html",  $mensaje_html);

	$sendgrid = new \SendGrid('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');
	//$sendgrid = new \SendGrid('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');
	try {
		$response = $sendgrid->send($email);
	   /*  print $response->statusCode() . "\n";
		print_r($response->headers());
		print $response->body() . "\n"; */
		
		 echo '<script>
		$(document).ready(function(){
		  alert("Correo Enviado");
		 });   
		 </script>';
	} 
	
	catch (Exception $e) 
	{
	    echo 'Caught exception: '. $e->getMessage() ."\n";
		echo '<script>
		$(document).ready(function(){
		  alert("Correo fallido '. $e->getMessage() .'");
		 });   
		 </script>';
	}

}

function estructurar_html_correo($msj_titulo,$msj_header,$msj_body)
{
	$mensaje_html = '
	<html lang="es-mx">
	<head> <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>'.$msj_titulo.'</title>
	</head>
	<body> 
			<br>
			<header>
				'.$msj_header.'
			</header>
			<br>	'.$msj_body.'
				
	</body>
	</html>';

	return $mensaje_html;	
}
 
?>
