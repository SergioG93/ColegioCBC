<!DOCTYPE html>
<html lang="es" dir="ltr">    <!--ltr iza derecha  rtl dera a izq  auto usuario decide -->
	<head>
		<meta charset="utf-8"/>
		<meta charset="iso-8559-1"/>
		<meta name="description" content="Pagina de pre-registro Colegio Baja California"/>
		<meta name="keywords" content="Pre registro web"/>
		<link rel="icon" type="imagen/jpg" href="imagenes/favicon.ico"/>    <!--favicon-->
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		
		<meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
  
		<link rel="stylesheet"  href="estilos/sce.css">
		<title>Colegio Baja California</title>
		
	</head>
	
	<body>
		<header id="cabecera">
		      <figure id="foto">
		        <img src="img/logos/Logo.png" width="40" height="40" id="logotipo" >
			  </figure>
			  <label class="logo"><code>&#9474;</code>Colegio Baja California</label>
			  <label id="sce"  ><code>&#9679;</code>Inscripcion en Linea<code>&#9679;</code></label>
        </header>

		<section class="forma">
           <h4>Iniciar Sesion</h4>
            	<form action="" method="post" id="formulario">
            	    
            	    <center>
            	        <h1>Ingresa numero de folio...</h1>
						</center>
		            	<input class="controls" type="text" name="userName" id="user"  placeholder="Folio" maxlength="20" minlength="6" required>
		            	
						<center>
		            	<h1>Ingresa clave de acceso...</h1>
						</center>
		            	<input class="controls" type="password" name="fecha" id="pass"  placeholder="Clave" maxlength="8" minlength="6" required >
		            
		            
		                

		            	<input class="botones" type="submit" value="Ingresar" name="boton" id="miBoton">
	            	</form>
    		 

		</section>
    </body>



    <?php
          include("funciones/misFunciones.php"); 
          if (isset($_POST['boton']))     //si se presiono el boton  enviar                           {
            {   
                $folio = strtoupper($_POST["userName"]);   //folio
                $clave = $_POST["fecha"];   //clave
                if (logIn($folio,$clave)==1)    //si existe
                   {
                     session_start();
                     $_SESSION['numeroFolio']=$folio;
                     header("location:registroasp.php");
                    //header("location:https://portalprodysa.com/inscripcion/");
                    
                   }
            else
                  {
                     echo"<script>alert('Numero de folio o clave de acceso son incorrectos...');</script>";  
                    
                  }
              
            }
    ?>
  	  
</html>	