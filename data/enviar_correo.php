<?php 

/* use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php'; */

function enviar_correo($correo, $usuario_nombre, $mensaje_html)
{

	//Estructura del mensaje 
	require_once  ("../assets/sendgrid/sendgrid-php.php");

	$email = new \SendGrid\Mail\Mail(); 
	$email->setFrom("auxsistemas@nef.com.mx", "Departamento de Sistemas");
	$email->setSubject("HelpDex - Respuesta de solicitud");
	$email->addTo($correo, $usuario_nombre);
	$email->addContent("text/plain", "prue");
	$email->addContent("text/html",  $mensaje_html);

		//API KEY
		$sendgrid = new \SendGrid('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'); 

	try 
	{
		$response = $sendgrid->send($email);
		print $response->statusCode() . "\n";
		print_r($response->headers());
		print $response->body() . "\n";
		
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
