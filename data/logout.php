<?php include("../data/conexionBD.php"); 
if ($_SESSION["logged_user"] <> ''){ 
$_SESSION["logged_user"] = '';
echo '<script> window.location.replace("../login.php"); </script>';}
else{
	echo '<script> window.location.replace("../login.php"); </script>';
}

?>