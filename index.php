<?php include("data/conexionBD.php");
if ((isset($_SESSION["logged_user"])) &&($_SESSION["logged_user"] == ''))
{ 
echo '<script> window.location.replace("login.php"); </script>'; 
}

?>



<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Your description">
    <meta name="author" content="Your name">

    <!-- ******** TITULO PAGINA ******** -->
    <title>HelpDex</title>
    
    <!-- Estilos -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!-- DATA TABLE -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
	
	<!-- Favicon  -->
    <link rel="icon" href="images\LOGOhdF.ico" >
</head>
<body >
    
<script language="javascript">

/* ******** FUNCIONES ******** */

function MensajeEnviar()
	{
		alert("Gracias, atenderemos tu solicitud en breve");
	}

function LimpiarDiv()
{
    $("#services").hide();
    $("#contact").hide();
    $("#header").hide();
    $("#AdminView").hide();
    $("#ReportGen").hide();
    $("#UserPanel").hide();
}

function Vistas(vista)
{
    if (vista == 0)
    {
        LimpiarDiv();
        $("#article").show();
    }    
    if (vista == 1)  
    {
        LimpiarDiv();
        $("#header").show();
    }
	
    else if (vista == 2)  
    {
        LimpiarDiv();
        $("#contact").show();
    }
	
    else if (vista == 3)  
    {
        LimpiarDiv();
        $("#AdminView").show();
    }
	
    else if (vista == 4)  
    {
        LimpiarDiv();
        $("#ReportGen").show();
    }
	
     else if (vista == 5)  
    {
		PanelUsuario();
        LimpiarDiv();
        $("#UserPanel").show();
    }
}

    function TablaSolicitudes()
    {
        var dato = "";     
                        $.ajax({
                              type: "POST",
                              url: "data/TablaSolicitudes.php",
                              data: {dato:dato},
                              dataType: "html",
                              success: function(data){   
                                                         
                              $("#tab_sol").html(data);                               
                                } 
                                }); 
        
    }

 
    function AbrirTicket(id)
    {
          $.ajax({
                              type: "POST",
                              url: "data/TablaDeAtencion.php",
                              data: {id:id},
                              dataType: "html",
                              success: function(data){   
                                                         
                              $("#ImpresionProblema").html(data);                               
                                } 
                                }); 
    }

    function SaveSolution()
    {

        var solucion = document.getElementById("comment_box").value;
        var usuario = document.getElementById("user_supp").value;
        var id_reg = document.getElementById ("id_ticket").value;
		var categoria = document.getElementById ("td_categoria").innerHTML;

         $.ajax({
                              type: "POST",
                              url: "data/ActualizarSolicitudes.php",
                              data: {solucion:solucion, usuario:usuario, id_reg:id_reg, categoria:categoria},
                              dataType: "html",
                              success: function(data){   
                                                         
                              $("#resultados").html(data);  
                          

                                } 
                                }); 
    }

    function Atender_Ticket(id_ticket)
    {
        $("#id_ticket").val(id_ticket); 
        $("#Titulo_Ticket").html('Atencion de ticket No. '+id_ticket);
    }

    function Insertar_TabSol() 
    {
        var ID = <?php echo $_SESSION["logged_user"]; ?>;
        //var SolName = document.getElementById("SolName").value;
        var SolCat = document.getElementById("SolCat").value;
        var SolDesc = document.getElementById ("SolDesc").value;

         $.ajax({
                              type: "POST",
                              url: "data/InsertarTablaSolicitudes.php",
                              data: {ID:ID, SolCat:SolCat, SolDesc:SolDesc},
                              dataType: "html",
                              success: function(data)
							  {   
							  
								$("#resultados").html(data);  
								swal("Correcto", "Registro Añadido con exito", "success");
                          

                               } 
                }); 
    }       

    function grafica() 
    {
        var fecha_in = document.getElementById("fecha1").value;
        var fecha_fin = document.getElementById("fecha2").value;

         $.ajax({
                              type: "POST",
                              url: "data/grafica.php",
                              data: {fecha_in:fecha_in, fecha_fin:fecha_fin },
                              dataType: "html",
                              success: function(data){   
                                                         
                              $("#resultados").html(data);  
                          
                          

                                } 
                                }); 
    } 

    function HomeReturn()
    {
        swal("", "El contenido desaparecerá, ¿desea continuar?", "warning", {
                buttons: {
                acepto : "Si",
                cancelar: "No",
                
        },
    })
    .then((value) => {
    switch (value) {

    case "acepto":
              window.location.replace("index.php");
    break;
    
  }
});
	}
	
	function GenExcel()
	{
		var fecha_in = document.getElementById("fecha1").value;
        var fecha_fin = document.getElementById("fecha2").value;
		window.open('data/Gen_Excel.php?fecha_in='+fecha_in+'&fecha_fin='+fecha_fin, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=400, height=400");
    }
	
	function PanelUsuario()
	{
		
		$.ajax({
                              type: "POST",
                              url: "data/PanelUsuarios.php",
                              dataType: "html",
                              success: function(data){   
                                                         
                              $("#TablaUsuarios").html(data);  
                          
                          

                                } 
                                });
	}
	
	function AddUser()
	{
		
		var id = document.getElementById("id_usuario").value;
		var nombre = document.getElementById("txt_nombre").value;
		var usuario = document.getElementById("txt_usuario").value;
		var contrasena = document.getElementById("txt_password").value;
		var correo = document.getElementById("txt_correo").value;
		var departamento = document.getElementById("select_dep").value;
		var estatus = document.getElementById("estatus").value;
		var permisos = document.getElementById("select_permisos").value;
		
//validacion de llenado de campos
		if (nombre =='')
		{
			alert("Favor de insertar un nombre");
			
			return false;
			
		}
		
		if (usuario =='')
		{
			alert("Favor de insertar un usuario");
			
			return false;
		}
		
		if (contrasena =='')
		{
			alert("Favor de insertar una contraseña");
			
			return false;
		}
		
		if (correo =='')
		{
			alert("Favor de insertar un correo");
			
			return false;
		}
		
		if (departamento =='')
		{
			alert("Favor de seleccionar un departamento");
			
			return false;
		}
		
		if (estatus =='')
		{
			alert("Favor de seleccionar un estatus");
			
			return false;
		}
				
		if (permisos =='')
		{
			alert("Favor de seleccionar un permiso");
			
			return false;
		}
		
		if (id !=='0') 
		{//si el id es diferente de 0 editamos el registro
			         $.ajax({
                              type: "POST",
                              url: "data/EditarUsuario.php",
                              data: {id:id, nombre:nombre, usuario:usuario, contrasena:contrasena, correo:correo, departamento:departamento, estatus:estatus, permisos:permisos},
                              dataType: "html",
                              success: function(data){   
                                                         
                              $("#resultados").html(data); 
							  }
	});		
		}
		else
		{//si el id es igual a 0 no existe registro y se crea uno nuevo
			
           $.ajax({
                              type: "POST",
                              url: "data/AgregarUsuario.php",
                              data: {nombre:nombre, usuario:usuario, contrasena:contrasena, correo:correo, departamento:departamento, estatus:estatus, permisos:permisos},
                              dataType: "html",
                              success: function(data){   
                                                         
                              $("#resultados").html(data); 
							  }
	});					
		}
		$("#ModalUsuarios").modal("hide");
				  
	}
	
	function LoadUserInfo(id)
	{
		$("#id_usuario").val(id);
		
		$.ajax({
                              type: "POST",
                              url: "data/CargarInfoUsuario.php",
                              data: {id:id},
                              dataType: "html",
                              success: function(data){   
                                                         
                              $("#resultados").html(data); 
							  		  }
	});			
	}
	
	function LimpiarModalUsuario()
	{
		$("#id_usuario").val(0);
		$("#txt_nombre").val("");
		$("#txt_usuario").val("");
		$("#txt_password").val("");
		$("#txt_correo").val("");
		$("#select_dep").val("");
		$("#estatus").val("");
		$("#select_permisos").val("");
	}
	
	//Notificaciones 
	//Funcion para habilitar notificaciones
	function notificacion_prueba()
	{
		if(!("Notification" in window))
		{
			alert("No admite");
		}
	
		else if(Notification.permission === "granted")
		{
			//var notification = new Notification("");
			var nada=0;
			$.ajax({
			type: "POST",
			url: "data/Notificacion.php",
			data: {nada:nada},
			dataType: "html",
			success: function(data){   
																																								
			$('#resultados').html(data);                               
			
			} }); 
												
												
			}
			else if (Notification.permission !== "denied")
			{
						Notification.requestPermission();
			}
	}
    <!-- ******** FIN DE LAS FUNCIONES ******** -->
	
</script>
    <!-- ******** BARRA DE NAVEGACION ******** -->
    <nav id="navbar" class="navbar navbar-expand-lg fixed-top navbar-dark top-nav-collapse" aria-label="Main navigation">
        <div class="container">

            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="index.php"><img src="images\LogoName.png" alt="alternative"></a> 

            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ms-auto ">
                    
                  <li class="nav-item">
                        <a class="nav-link active" aria-current="page" onclick = "Vistas(1);" href="#">Pagina principal</a>
                  </li>
 
<?php 

        $permisos = permisos($_SESSION["logged_user"]);
        if ($permisos == '2' or $permisos == 3 )
        {
            
            echo '  <li class="nav-item">
                        <a class="nav-link" href="#" onclick = "Vistas(2);">Solicitud</a>
                    </li>';        
        }

        if ($permisos == 1) {
            echo '<li class="nav-item">
                        <a class="nav-link" href="#" onclick = "Vistas(3);">AdminView</a>
                    </li>';

                         
        }
		if ($permisos == 1 or $permisos == 3  ) {
           echo '<li class="nav-item">
                        <a class="nav-link" href="#" onclick = "Vistas(4);">Generar reporte</a>
                    </li>';
            echo '<li class="nav-item">
                        <a class="nav-link" href="#" onclick = "Vistas(5);">Panel de Usuarios</a>
                    </li>';   

                         
        }
		
		
                    
?>

                   <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false"><?php echo username($_SESSION["logged_user"]); ?></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                          <li><a class="dropdown-item" href="data\logout.php">Cerrar sesion</a></li>
                        </ul>
                       
                    </li>
                    
                </ul>
                
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->

      
    <!-- ******** PAGINA PRINCIPAL ******** -->
    <div id="header" class="h-100 header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="h1-large">HELP<br> DEX<br> </h1>
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="button-container">
                        <a style="color:white;">Nuestro departamento de TI atenderá su problema.</a>
                    </div> <!-- end of button-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->

    </div> <!-- end of header -->
 
    <!-- ******** SOLICITUDES ******** -->
    <div id="contact" class="h-100 form-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">¿En que podemos ayudarte?</h2>
                    <div>
                    <h1></h1> 
                    </div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    
                    <!-- Contact Form -->
                    <form>
                        
                       <div class="form-group">
                         
                              <select id= "SolCat" class="form-select" placeholder="Tipo problema">
                                <option value="0">Selecciona una de las siguientes opciones:</option>
                                <option value="1">Verificacion de licencia disponible (ventas, compras, inventarios)</option>
                                <option value="2">Problema de periodo</option>
                                <option value="3">Modificacion de permisos a un usuario</option>
                                <option value="4">Error con impresora</option>
                                <option value="5">Configuracion de equipo</option>
                                <option value="6">Configuracion de sistema</option>
                                <option value="7">problema de teclado o raton</option>
                                <option value="8">problema con el telefono de escritorio</option>
                                <option value="9">Lentitud en equipo</option>
                                <option value="10">Problemas con correo electronico</option>
                                <option value="11">Requerimiento de usuario nuevo</option>
                                <option value="12">Requerimiento de impresion de etiquetas</option>
                                <option value="13">Requerimiento de edicion de documento</option>
                                <option value="14">Otro</option>
                             </select>
                        </div>
 

                        <div  class="form-group">
                            <textarea class="form-control-textarea" id= "SolDesc" placeholder="Descripcion adicional" required></textarea>
                        </div>
                        <div id = "SolSubmit" class="form-group">
                            <button onclick= "Insertar_TabSol();" class="form-control-submit-button">Enviar</button>
                        </div>
                        <div id = "SolCancel" class="form-group">
                            <button onclick="HomeReturn();" class="form-control-cancel-button">Cancelar</button>

                        </div>
                    </form>
                    <!-- end of contact form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-1 -->
    <!-- end of contact -->
<input type="hidden" id="resultados" size="9" value="0" />
   

     <!-- AdminView --> 
    <div id="AdminView" class= "h-200 cards-1" align = "center">
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="h3-heading">AdminView</h3>
                    <br/>
                    <br/>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12 row">
                    <div class="col-lg-6">
                        <div class="col-lg-12" id="tab_sol"> </div>
 
     
                    </div>

                    <div class="col-lg-6" id="ImpresionProblema">
                      
                    </div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->

    </div> <!-- end of cards-1 -->
    <!-- end of AdminView -->

    <!-- ******** GENERADOR DE REPORTES ******** -->
    <div id="ReportGen" class= "h-100 cards-1" align = "center" >
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="h3-heading">Generador de reporte</h3>
                    <br/>
                    <br/>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12 row">
                    <div class="col-lg-12 row">
						<div class="col-lg-2">
							<label for="start"><b>Selecciona la fecha:</b></label>
						</div>
						<div class="col-lg-2">
						<input type="date" id=fecha1 class= "form-control" >
						</div>
						
						<div class="col-lg-2">
						<input type="date" id=fecha2 class= "form-control" >
						</div>
						
						<div class="col-lg-1">
						<button type="button" OnClick="grafica();" class="btn btn-primary btn-md">Generar</button>
						</div>
						
						
						
						<div class="col-lg-2"> 
						
						<button type="button" OnClick="GenExcel();" class="btn btn-primary">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
						<path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0z"></path>
						</svg>
										Descargar .xslx
									</button>
						</div>
						
						</br>
						</br>
						</br>
						
						<div class="col-lg-12" id="grafica">
							
						</div>




                    </div>
					
                   </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div><!-- end of GENERADOR DE REPORTES -->
</div>

<!-- ******** PANEL DE USUARIOS ******** -->
    <div id="UserPanel"  class= "h-200 cards-1" align = "center" >
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="h3-heading">Panel de usuarios</h3>
                    <br/>
                    <br/>
				<button type="button" data-bs-toggle="modal" data-bs-target="#ModalUsuarios" OnClick="LimpiarModalUsuario();" class="btn btn-primary">Agregar Usuario</button>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
	        <div class="row">
                <div id="TablaUsuarios" class="col-lg-12 row">
                    
                   </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div><!-- end of PANEL DE USUARIOS -->
</div>



    
    <!-- Back To Top Button -->
    <button onclick="topFunction()" id="myBtn">
        <img src="images/up-arrow.png" alt="alternative">
    </button>
    <!-- end of back to top button -->

<!-- ******** MODAL ATENCION TICKET ******** -->    
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Titulo_Ticket">Atención de Ticket</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
      <label for="user_supp" class="form-label">¿Quien atendió?</label>
      <select id="user_supp" class="form-select" title="Seleccione usuario">
        <option value="3" >Fernando D.</option>
        <option value="1" >Emmanuel S.</option>
        <option value="2" >Edgar H.</option>
      </select>
      <br/>
      
      <div class="form-floating">
  <textarea class="form-control" placeholder="" id="comment_box" style="height: 100px"></textarea>
  <label for="comment_box">Comentarios</label>
</div>
    </div>
      </div>
      <div class="modal-footer">
            <input type="hidden" id="id_ticket" size="9" value="0" />
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button onclick="SaveSolution();" type="button" data-bs-dismiss="modal" class="btn btn-primary">Atendido</button>
      </div>
    </div>
  </div>
</div>
<!-- ******** FIN DE MODAL ATENCION TICKET ******** -->

<!-- ******** MODAL DE USUARIOS ******** -->
 
<div class="modal fade" id="ModalUsuarios" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ModalUsuariosLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
		<div class="modal-body">
			<div class="mb-3">
				<form action="" name="usuarios_mod_form">
					<div class="form-group clearfix">
						<label class="col-sm-2  control-label">  Nombre: </label>
						<div class="col-sm-10"><input class="form-control" type="text" id="txt_nombre" size="30"></div>
					</div>
					
					
					<div class="form-group clearfix">
						<label class="col-sm-2 control-label"> Usuario:  </label> <div class="col-sm-10"><input class="form-control" type="text" id="txt_usuario" size="30"></div>
					</div>
					
					<div class="form-group clearfix">
						<label class="col-sm-2 col-form-label"> Contraseña:  </label><div class="col-sm-10 col-form-label"><input class="form-control" type="text" id="txt_password" size="30">
					</div></div>
					
					<div class="form-group clearfix">
					<label class="col-sm-2 col-form-label"> Correo: </label> <div class="col-sm-10 col-form-label"> <input class="form-control" type="text" id="txt_correo" size="30" placeholder="name@example.com"></div></div>
					
					
					<div class="form-group clearfix">
						<label class="col-sm-3 col-form-label"> Departamento: </label> 
						<div class="col-sm-9 col-form-label">
							<select id="select_dep" class="form-control">
								<option value="1">Administracion</option>
								<option value="2">Ventas</option>
								<option value="3">Ventas Mostrador</option>
								<option value="4">Almacen</option>
								<option value="5">Compras</option>
								<option value="6">Ventas Allpart</option>
							</select> 
						</div>
					</div>
					
					<div class="form-group clearfix">
						<label class="col-sm-3 col-form-label"> Estatus: </label> 
						<div class="col-sm-9 col-form-label">
							<select id="estatus" class="form-control">
								
								<option value="ACTIVO">ACTIVO</option>
								<option value="BAJA">BAJA</option>
								
							</select> 
						</div>
					</div>
					
					<div class="form-group clearfix">
						<label class="col-sm-3 col-form-label"> Permisos: </label> 
						<div class="col-sm-9 col-form-label">
							<select id="select_permisos" class="form-control">
								
								<option value="1">Administrador</option>
								<option value="2">Usuario Normal</option>
								
							</select> 
						</div>
					</div>
					
					
				</form>
			</div>
		</div>
		<div class="modal-footer">
			<input type="hidden" id="id_usuario" size="9" value="0" />
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
			<button OnClick="AddUser();" type="button"  class="btn btn-primary">Guardar</button>
		</div>
		</div>
	</div>
</div>
<!-- ******** FIN DE MODAL DE USUARIOS ******** -->

  
    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © <a>NEF</a></p>
                </div> 
                
                <div class="col-lg-12">
                    <p class="p-small">Distributed by :<a> Fernando Diaz </a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
 	
    <!-- Scripts -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/purecounter.min.js"></script> <!-- Purecounter counter for statistics numbers -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
    <script src="plugins/jQuery/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <!--Librerias para gráficas-->
    <script src="Highcharts-4.1.5/js/highcharts.js"></script>
    <script src="Highcharts-4.1.5/js/modules/data.js"></script>
    <script src="Highcharts-4.1.5/js/modules/drilldown.js"></script>
	
	<!-- DATA TABLE -->
	<script type="text/javascript" charset="utf8" src="assets/js/datatable.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    
    <script >
        
    $(document).ready(function()
            {
                LimpiarDiv();
                 $("#header").show();
                 TablaSolicitudes();
				 setInterval('notificacion_prueba()', 5000);
            });
    </script>  

</body>
</html>