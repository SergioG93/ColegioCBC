

<!DOCTYPE html>
<html lang="en-es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colegio Baja California - Inscripciones</title>
    <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
</head>
<body>

    <div class="container">
        <!-- Sign Up Page -->
     <div class="signup-page">
         <br>
         <div class="signup-page-top">
            
             <div class="signup-page-logo logo">
                 <img src="images/Logo.png" width="40" height="40" alt="">
                <span>Colegio Baja California</span>
             </div>
            
         </div>
         <div class="signup-page-content">
             <div class="signup-page-content-left">
                 <h1>Proceso para Reinscripción</h1>
                 <hr>
                 <br>
                 <h2 style="font-size:17px;">Instrucciones</h2>
                 <br>
                 <p id="cajatexto"> 1. Este proceso es para reinscribirte en el colegio baja california.<br>
                     2. Los alumnos repetidores, reingresos y cambios de plantel, deberán actualizar sus datos. <br>
                     3. Revisa, modifica y actualiza la información de tus datos personales, de tu padre o tutor sin dejar en blanco los campos requeridos para poder reinscribirte.  <br>
                     4. Llenar el cuestionario de contexto.<br>    
                     5. Verifica que estén correctos tus datos y asignaturas a cursar, antes de presionar el botón Enviar. En caso de error acude al Colegio Baja California.<br>
                     <b></b><br><br>
                     <b>DATOS DE CONTACTO:</b><br>
                     </p>
                 <p>Ave. Universidad #709, Otay Universidad. <br>
                    Tijuana, B.C., México. C.P. 22427</p>
                    <p>(664) 682-1222<br>
                    (664) 682-1872</p>
                
                

                 <br>
                 <br>
                 <div class="content-left-images">
                     <img src="images/person-1.jpg">
                     <img src="images/person-2.jpg">
                     <img src="images/person-3.jpg">
                 </div>
             </div>
             <div class="signup-page-content-right">
                   <!-- Login Page -->
                 <br>
                 <br>
                 <h3 style="text-align:center;">Iniciar Sesion:</h3>
                 <br>
                 <form action="" method="post"  class="login-page-form">
                     <label style="font-size: 14px;">Escribe tu Matricula:</label>
                    <input type="text" class="form-login-input" placeholder="Matricula" name="userMatricula" id="user" maxlength="20" minlength="6" required>
                    <label style="font-size: 14px;">Escribe tu apellido paterno: </label>
                    <input type="password" class="form-login-input" placeholder="Apellido" name="userApellido" maxlength="20" minlength="1" required  >
                   <input type="submit" class="form-login-btn"  value="Ingresar" name="boton" >
                  
                </form>
                
             </div>
        </div>
      </div>
    
    </div>
</body>


    
<?php
    include("inscripcion/funciones/misFunciones.php"); 
      //include("funciones/misFunciones.php"); 
    if (isset($_POST['boton']))     //si se presiono el boton  enviar                           
      {   
         
        
         
          $matricula = $_POST["userMatricula"];   
          $apellido = strtoupper($_POST["userApellido"]); 
                  
          if (logIn2($matricula,$apellido)==1)    //si existe
             {
               session_start();
               $_SESSION['numeroFolio']=$matricula;
               header("location:inscripcion/registroaspAlumno.php");
           
              
             }
          else
            {
               echo"<script>alert('Mtricula o apellido son incorrectos...');</script>";  
              
            }
            
        
      }
?>    
    





</html>
