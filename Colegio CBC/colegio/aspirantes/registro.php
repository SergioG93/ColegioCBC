<!DOCTYPE html>
<html lang="es" dir="ltr">    <!--ltr iza derecha  rtl dera a izq  auto usuario decide -->
	<head>
		<meta charset="utf-8"/>
		<meta charset="iso-8559-1"/>
		<meta name="description" content="Pagina de pre-registro Colegio Baja California"/>
		<meta name="keywords" content="Pre registro web"/>
		<link rel="icon" type="imagen/jpg" href="img/logos/favicon.ico"/>    <!--favicon-->
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="stylesheet"  href="estilos/registro.css">
		<title>Colegio Baja California</title>
	</head>
	
	<body>
		<header>
			<nav>
				<img src="img/logo.png" width="40" height="40" id="logotipo">	
				<label class="logo"><code>&#9474;</code>Colegio Baja California</label>
			</nav>	
        </header>

		<section>
            <section class="forma">
            <form action="http://colegiobc.com/" method="get" id="formulario">    
			   <h1>Muchas garcias por llenar la solicitud, Su registro fue correcto y enviado al Colegio Baja California...!</h1>
			    <hr>
			   
			    <?php 
			        $folio=$_GET['folio']; 
			        $nombre=$_GET['nombre'];
			        $cl=$_GET['cl'];
			    ?>
			    <p class="respuesta">Folio: <?php echo $folio;?></p>
		        <p class="respuesta">Aspirante: <?php echo $nombre;?></p>
		        <p class="respuesta">Clave: <?php echo $cl;?></p>
		        
                   
                <hr>
                <input  class="botones" type="submit" value="Concluir Proceso..." name="boton" id="miBoton">
                
             </form> 
	        </section>
		</section>

	
    </body>

    <?php
          
          if (isset($_POST['boton']))     //si se presiono el boton  enviar                           {
            {   
               //http://colegiobc.com/
             
               echo"<script>window.location='http://colegiobc.com';</script>"; 
                 die();
               
            }
            
    ?>        

   
</html>	