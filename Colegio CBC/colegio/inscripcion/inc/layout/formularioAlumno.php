<?php
    session_start();   //se reanuda la sesion del usuario logeado y se rescata lo de lavariable superglobal

    if (!isset($_SESSION['numeroFolio'])) //si no hay algo almacenado en $_SESSION["usuario"] entonces se dirige a la
        {

         header("location:index.php");

        }

        $folios=$_SESSION['numeroFolio'];
        include("funciones/datosConexion.php");
        $conexion = mysqli_connect($db_host,$db_usuario,$db_password,$db_nombreBD);  //cadena de coneccion
        if(mysqli_connect_errno())     //encaso de error al conectara la base de datos
            {
                echo "<script>alert('Fallo la conexion, intente mas tarde...!'); window.location='../index.php';</script>";
            }
        mysqli_set_charset($conexion,"utf8");    //codificacion de caracteres

        $sql = "SELECT Nombres,Apellido_Paterno,Apellido_Materno,Lugar_Nacimiento,Nacionalidad,Fecha_Nacimiento,Nivel,Grado FROM colegiobc WHERE Matricula='$folios'";
        $r = mysqli_query($conexion,$sql); //se ejecuta la consulta sql en la base de datos y se guarda en $r
        mysqli_close($conexion);  //se cierra la conexion
        if (!$r)
             {
                echo"<script>alert('Error no se pudo general la solicitud, intenete mas tarde...!'); window.location='./index.php';</script>";
                    exit;
             }
        while($lastname =mysqli_fetch_assoc($r))
            {
                //$d0 = $lastname['Nombre']; //nombre completo
                $d1 = $lastname['Nombres']; //nombre
                $d2 = $lastname['Apellido_Paterno']; //apellido p
                $d3 = $lastname['Apellido_Materno']; //apellido m
                //$d4 = $lastname['Fecha_Nacimiento']; //fecha nacimiento
                //$d5 = $lastname['Mes_Nacimiento']; //mes nacimiento
                //$d6 = $lastname['An_Nacimiento']; //an nacimiento
                $d7 = $lastname['Lugar_Nacimiento']; //lugar nacimiento
                $d8 = $lastname['Nacionalidad']; //nacionalidad
                //$d39 = $lastname['Nivel'];
                //$d40 = $lastname['Grado'];
                /*$d9 = $lastname['Edad_A_Septiembre']; //edad a septiembre
                $d10 = $lastname['Escuela_Procedencia']; //escuela procedencia
                $d11 = $lastname['Religion']; //religion
                $d12 = $lastname['Telefono_Fijo']; //tel fijo
                $d13 = $lastname['Telefono_Movil']; //tel
                $d14 = $lastname['Correo']; //correo
                $d15 = $lastname['Calle']; //calle
                $d16 = $lastname['Numero_Ext']; //numero ext
                $d17 = $lastname['Numero_Int']; //numero int
                $d18 = $lastname['CP']; //cp
                $d19 = $lastname['Fraccionamiento']; //cp
                $d192 = "Calle: " . $d15 . " " . " Num: " . $d16 . " CP: " . $d18 . " Col/Frac: " . $d19;
                $d20 = $lastname['Nivel_A_Ingresar']; //nivel a ingresar
                $d21 = $lastname['Grado_A_Ingresar']; //grado a ingresar

                $d22 = $lastname['Nombre_Tutor']; //tutor
                $d23 = $lastname['Tel_Tutor']; //telefono papa
                $d24 = $lastname['Trabajo']; //trabajo
                $d25 = $lastname['Profesion']; //profesion

                $d26 = $lastname['Madre']; //madre
                $d27 = $lastname['Tel_M']; //telefono madre
                $d28 = $lastname['Trabajo_M']; //trabajo madre
                $d29 = $lastname['Profesion_M']; //profesion madre

                $d30 = $lastname['HermanoA']; //hermanoA

                $d31 = $lastname['GradoA']; //gradoA
                $d32 = $lastname['HermanoB']; //hermanoB

                $d33 = $lastname['GradoB']; //gradoB
                $d34 = $lastname['Referencias']; //referencia
                $d35 = $lastname['Nivel_A_Ingresar']; //nivel
                $d36 = $lastname['Grado_A_Ingresar']; //grado

                $d37 = $lastname['NivelA']; //nivel hermano A
                $d38 = $lastname['NivelB']; //nivel hermano B*/

            }
?>




<!DOCTYPE html>
<html lang="es" dir="ltr">    <!--ltr iza derecha  rtl dera a izq  auto usuario decide -->
	<head>
		<meta charset="utf-8"/>
		<meta charset="iso-8559-1"/>
		<meta name="description" content="Pagina de pre-registro Colegio Baja California"/>
		<meta name="keywords" content="Pre registro web"/>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">

		<link rel="stylesheet"  href="estilos/registroasp.css">
		<title>Colegio Baja California</title>

		<script>
		         function check(e)
		            {
                       tecla = (document.all) ? e.keyCode : e.which;

                      //Tecla de retroceso para borrar, siempre la permite
                       if (tecla == 8)
                          {
                            return true;
                          }

                        // Patron de entrada, en este caso solo acepta numeros y letras
                        patron = /[0-9]/;
                        tecla_final = String.fromCharCode(tecla);
                        return patron.test(tecla_final);
                   }


              function cargarNivel()
                   {
                        var array = ["KINDER", "PRIMARIA", "SECUNDARIA"];
                        array.sort();
                        addOptions("grd", array);
                    }

                //Función para agregar opciones a un <select>.
                 function addOptions(domElement, array)
                    {
                       var selector = document.getElementsByName(domElement)[0];
                       for (ni in array)
                          {
                            var opcion = document.createElement("option");
                            opcion.text = array[ni];
                            // Añadimos un value a los option para hacer mas facil escoger los pueblos
                            opcion.value = array[ni].toLowerCase()
                            selector.add(opcion);
                         }
                    }


                function cargarGrados()
                    {
                       // Objeto de provincias con pueblos
                       var listaGrados =
                           {
                             KINDER: ["1", "2", "3"],
                             PRIMARIA: ["1", "2", "3","4","5","6"],
                             SECUNDARIA: ["1", "2", "3"]

                           }

                       var provincias = document.getElementById('nivel')
                       var pueblos = document.getElementById('grado')
                       var provinciaSeleccionada = provincias.value
                      // Se limpian los grados

                      pueblos.innerHTML = '<option value="" disabled="disabled" selected="selected" >--Seleccione un grado--</option>'

                 if(provinciaSeleccionada !== '')
                      {
                         // Se seleccionan los pueblos y se ordenan
                         provinciaSeleccionada = listaGrados[provinciaSeleccionada]
                         provinciaSeleccionada.sort()

                      // Insertamos los pueblos
                         provinciaSeleccionada.forEach(function(pueblo)
                          {
                            let opcion = document.createElement('option')
                            opcion.value = pueblo
                            opcion.text = pueblo
                            pueblos.add(opcion)
                          });
                      }
                  }
              // Iniciar la carga de provincias solo para comprobar que funciona
             cargarGrados();
		</script>
	</head>

<body>
  <p>Matricula:<?php echo " " . $folios;?> </p>
  <div class="row">

    <div class="col-md-12 order-md-1">
      <form class="needs-validation"  id="regiration_form" action="" method="post">

       <!--<fieldset>-->
       <h4 class="mb-3">I.- Datos del Alumno</h4>
         <div class="row">
                 <div class="col-md-4 mb-3">
                     <label for="firstName">Nombre del Alumno</label>
                     <input type="text" class="form-control" name="nombre" id="Name" placeholder=""  maxlength="25" minlength="2" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required value="<?php echo $d1;?>">

                </div>

               <div class="col-md-4 mb-3">
                  <label for="">Apellido Paterno</label>
                  <input type="text" class="form-control" name="ap" id="apellidop" placeholder=""  maxlength="25" minlength="2" required value="<?php echo $d2;?>">

               </div>


               <div class="col-md-4 mb-3">
                  <label for="">Apellido Materno</label>
                  <input type="text" class="form-control" name="am" id="apellidom" placeholder=""  maxlength="25" minlength="2" required value="<?php echo $d3;?>">

               </div>
          </div>

         <div class="row">
               <div class="col-md-3 mb-3">
                     <label for="">Lugar de Nacimiento</label>
                     <input type="text" class="form-control" name="ln" id="" placeholder="" maxlength="20" value="<?php echo $d7;?>" required>
                        <div class="invalid-feedback">
                        Lugar de Nacimiento.
                        </div>
               </div>


               <div class="col-md-3 mb-3">
                  <label for="">Nacionalidad</label>
                  <select class="custom-select d-block w-100" name="na"  required value="<?php echo $d8;?>">
                      <option  selected="selected"><?php echo $d8;?></option>
                     <!--<option  value="" selected="selected"></option>-->
                      <option value="MEXICANO">MEXICANO</option>
                      <option value="EXTRANJERO" >EXTRANJERO</option>
                  </select>
                  <div class="invalid-feedback">
                  Por favor valida.
                  </div>
               </div>


               <div class="col-md-3 mb-3">
                    <label for="">Fecha de Nacimiento</label>
                     <!--<input type="text" class="form-control"name="fechaN" id=""  maxlength="25" minlength="2" value="">-->
                        <!--<div class="invalid-feedback">-->
                        <!--es requerido.-->
                        <!--</div>-->

                        <input type="date" id="start" name="fechaN" class="form-control"
                           value="2018-07-22"
                           min="1995-01-01" max="2050-12-31">


               </div>



            </div>  <!-- clave catastral-->

            <div class="row">


            <div class="col-md-4 mb-3">
                  <label for="">Nivel de Escuela</label>
                  <select  class="custom-select d-block w-100" id="nivel" required value="<?php echo $d20;?>" name="comboNIvel" onchange="cargarGrados()";>
                   <option selected="selected"><?php echo $d20;?></option>
                  <option value="KINDER">KINDER</option>
                  <option value="PRIMARIA">PRIMARIA</option>
                  <option value="SECUNDARIA" >SECUNDARIA</option>

                  </select>
                  <div class="invalid-feedback">
                   es requerido la seleccion.
                  </div>
               </div>

               <div class="col-md-4 mb-3">
                  <label for="">Grado</label>
                  <select class="custom-select d-block w-100" id="grado" required="" value="<?php echo $d21;?>" name="grd" value="grd">
                  <option selected="selected"><?php echo $d21;?></option>


                  </select>
                  <div class="invalid-feedback">
                   es requerido la seleccion.
                  </div>
               </div>



            </div>
            <!--inicia domicilio-->
            <div class="row">

                  <div class="col-md-12 mb-3">
                     <label for="address">Domicilio</label>
                     <input type="text" class="form-control" id="address" placeholder="" required maxlength="100" minlength="2" value="<?php echo $d192;?>" name="domicilio" required>

                  </div>


                   <div class="col-md-3 mb-3">
                     <label for="">Clave Catastral</label>
                     <input type="text" class="form-control" name="ck" id="" maxlength="25" minlength="2" value="" required="">

              </div>




              <div class="col-md-4 mb-3">
                     <label for="">Numero Cuenta de Agua</label>
                     <input type="text" class="form-control" name="ca" id="" maxlength="25" minlength="2" value="" required="">
                        <div class="invalid-feedback">
                            Num. Cuenta de Agua es requerido.
                        </div>
                  </div>

            </div>




            <!--inicia CURP,Religion y Eda a Septiembre-->
            <div class="row">


                     <div class="col-md-4 mb-3">
                         <label for="address">CURP</label>
                         <input type="text" class="form-control" id="edadasept" placeholder="" required maxlength="18" minlength="18" value="" name="curp">
                      </div>


                <!--<div class="col-md-4 mb-3">-->
                     <!--<label for="address">Edad a Septiembre</label>-->
                     <!--<input type="text" class="form-control" id="edadasept" placeholder="" required maxlength="100" minlength="2" value="" name="edadasept" required>-->

                  <!--</div>-->

                   <div class="col-md-4 mb-3">
                  <label for="">Religión</label>

                  <!-- <input type="text" class="form-control" id="" placeholder="" required maxlength="100" minlength="2" value="<?php echo $d11;?>" name="comboReligionA" required> -->

                  <select class="custom-select d-block w-100" id=""  name="comboReligionA"  required>
                     <option value="<?php echo $d11;?>"><?php echo $d11;?></option>

                     <option value="CATOLICO">CATOLICO</option>
							  <option value="MORMON">MORMON</option>
							  <option value="TESTIGO DE JEHOVA">TESTIGO DE JEHOVA</option>
							  <option value="CRISTIANO">CRISTIANO</option>
							  <option value="PENTECOSTES">PENTECOSTES</option>
							  <option value="BUDISTA">BUDISTA</option>
							  <option value="JUDIO">JUDIO</option>
							  <option value="ISLAM">ISLAM</option>
							  <option value="NINGUNO">NINGUNO</option>
                  </select>

               </div>

            </div>
            <!-- fin Datos del Alumno -->

               <hr class="mb-4">

               <!-- Datos del Padre o tutor -->
                <h4 class="mb-3">II.- Datos del Padre o Tutor</h4>
            <div class="row">
               <div class="col-md-3 mb-3">
                     <label for="Name">Nombre</label>
                     <input type="text" class="form-control" name="nPP" id="Name" maxlength="25" minlength="2" value="<?php echo $d22;?>" required>
                        <div class="invalid-feedback">
                        Nombre es requerido.
                        </div>
               </div>

               <div class="col-md-3 mb-3">
                     <label for="Edad">Edad</label>
                     <input type="text" class="form-control" name="edadP" id="edad" placeholder="" maxlength="2" minlength="1" value="" required pattern="[0-9]+" onkeypress="return check(event)">
                        <div class="invalid-feedback">
                        Edad es requerido.
                        </div>
               </div>
                <div class="col-md-3 mb-3">
                  <label for="">Estado Civil</label>
                  <select class="custom-select d-block w-100" id="" required name="comboCivilP" required>
                  <option disabled="disabled" selected="selected">--Estado civil--</option>
                  <option value="SOLTERO">SOLTERO</option>
                  <option value="CASADO">CASADO</option>
                  <option value="DIVORCIADO">DIVORCIADO</option>
                  <option value="UNION LIBRE">UNION LIBRE</option>
                  </select>
                  <div class="invalid-feedback">
                  Es requerido.
                  </div>
               </div>
               <div class="col-md-3 mb-3">
                  <label for="">Religión</label>
                  <select class="custom-select d-block w-100" id=""  name="comboReligionP" required>
                 <option disabled="disabled" selected="selected">--Religion--</option>
                  <option value="CATOLICO">CATOLICO</option>
							  <option value="MORMON">MORMON</option>
							  <option value="TESTIGO DE JEHOVA">TESTIGO DE JEOVA</option>
							  <option value="CRISTIANO">CRISTIANO</option>
							  <option value="PENTECOSTES">PENTECOSTES</option>
							  <option value="BUDISTA">BUDISTA</option>
							  <option value="JUDIO">JUDIO</option>
							  <option value="ISLAM">ISLAM</option>
							  <option value="NINGUNO">NINGUNO</option>
                  </select>
                     <div class="invalid-feedback">
                     Es requerido.
                     </div>
               </div>
            </div>
            <div class="row">
                  <div class="col-md-5 mb-3">
                     <label for="">Domicilio</label>
                     <input type="text" class="form-control" name="domPP" id="" placeholder=""maxlength="100" minlength="2" value="" placeholder="Domicilio" required>
                        <div class="invalid-feedback">
                        Domicilio es Requerido.
                        </div>
               </div>
               <div class="col-md-3 mb-3">
                  <label for="">Telefono</label>
                  <input type="text" class="form-control" id="" name="tPP" placeholder=""  pattern="[0-9]{10}" onkeypress="return check(event)" maxlength="10" value="<?php echo $d23;?>" required>
                     <div class="invalid-feedback">
                     es Requerido.
                     </div>
               </div>
               <div class="col-md-4 mb-3">
                  <label for="">Profesion</label>
                  <input type="text" class="form-control" name="prPP" id="" placeholder="" maxlength="25" minlength="2" value="<?php echo $d25;?>">
                     <div class="invalid-feedback">
                     es requerido.
                     </div>
               </div>

            </div><!-- row fin -->

            <div class="row">
                  <div class="col-md-4 mb-3">
                     <label for="">Empresa donde trabaja</label>
                     <input type="text" class="form-control" name="trPP" id="" placeholder=""  maxlength="25" minlength="2" value="<?php echo $d24;?>">
                        <div class="invalid-feedback">
                        Empresa es Requerido.
                        </div>
               </div>
               <div class="col-md-4 mb-3">
                  <label for="">Puesto que Ocupa</label>
                  <input type="text" class="form-control" id="" placeholder="" value="" name="ptrMM" maxlength="15" minlength="2">
                     <div class="invalid-feedback">
                     Es Requerido.
                     </div>
               </div>
               <div class="col-md-4 mb-3">
                  <label for="">Telefono de Oficina</label>
                  <input type="text" class="form-control" id="" placeholder="" value=""  pattern="[0-9]{10}" onkeypress="return check(event)" maxlength="10" name="tTrPP">
                     <div class="invalid-feedback">
                    Es requerido.
                     </div>
               </div>

            </div><!--fin de row-->

            <div class="row">
                <div class="col-md-8 mb-3">
                  <label for="email">Email <span class="text-muted"></span></label>
                  <input type="email" class="form-control" name="ceP" id="email" minlength="5" maxlength="100" required="" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                  <div class="invalid-feedback">
                     Actualiza tu email
                  </div>
               </div>
               <div class="col-md-4 mb-3">
                  <label for="">Telefono Celular</label>
                  <input type="text" class="form-control" id="" placeholder="" value="" required=""  pattern="[0-9]{10}" onkeypress="return check(event)" maxlength="10" name="tmtpP">
                     <div class="invalid-feedback">
                     Telefono Celular es Requerido.
                     </div>
               </div>

            </div>
            <!-- row fin datos del padre -->



         <hr class="mb-4">
             <!-- Inicio de Datos de la Madre o tutor -->
             <h4 class="mb-3">III.- Datos de la Madre o Tutor</h4>
            <div class="row">
               <div class="col-md-3 mb-3">
                     <label for="">Nombre</label>
                     <input type="text" class="form-control" name="nMM" id="" placeholder="" maxlength="25" minlength="2" value="<?php echo $d26;?>" required="">
                        <div class="invalid-feedback">
                        Es requerido.
                        </div>
               </div>

               <div class="col-md-3 mb-3">
                     <label for="">Edad</label>
                     <input type="text" class="form-control" name="edadM" id=""  maxlength="2" minlength="1" value="" required pattern="[0-9]+" onkeypress="return check(event)">
                        <div class="invalid-feedback">
                        Edad es requerido.
                        </div>
               </div>
                <div class="col-md-3 mb-3">
                  <label for="state">Estado Civil</label>
                  <select class="custom-select d-block w-100" id="state" required name="comboCivilM">
                   <option disabled="disabled" selected="selected">--Estado civil--</option>
                  <option value="SOLTERA">SOLTERA</option>
                  <option value="CASADA">CASADA</option>
                  <option value="DIVORCIADA">DIVORCIADA</option>
                  <option value="UNION LIBRE">UNION LIBRE</option>
                  </select>
                  <div class="invalid-feedback">
                  Es requerido.
                  </div>
               </div>
               <div class="col-md-3 mb-3">
                  <label for="state">Religión</label>
                  <select class="custom-select d-block w-100" id="state" required name="comboReligionM">
                  <option disabled="disabled" selected="selected">--Religion--</option>
                  <option value="CATOLICO">CATOLICO</option>
							  <option value="MORMON">MORMON</option>
							  <option value="TESTIGO DE JEHOVA">TESTIGO DE JEHOVA</option>
							  <option value="CRISTIANO">CRISTIANO</option>
							  <option value="PENTECOSTES">PENTECOSTES</option>
							  <option value="BUDISTA">BUDISTA</option>
							  <option value="JUDIO">JUDIO</option>
							  <option value="ISLAM">ISLAM</option>
							   <option value="NINGUNO">NINGUNO</option>
                  </select>
                  </select>

               </div>
            </div>
            <div class="row">
                  <div class="col-md-5 mb-3">
                     <label for="">Domicilio</label>
                     <input type="text" class="form-control" name="domMM" id="" placeholder="" maxlength="100" minlength="2" value=""  required>

               </div>
               <div class="col-md-3 mb-3">
                  <label for="">Telefono</label>
                  <input type="text" class="form-control" name="tMM" id="" placeholder=""  pattern="[0-9]{10}" onkeypress="return check(event)" maxlength="10" value="<?php echo $d27;?>" required>
                     <div class="invalid-feedback">
                      es Requerido.
                     </div>
               </div>
               <div class="col-md-4 mb-3">
                  <label for="">Profesion</label>
                  <input type="text" class="form-control" name="prMM" id="" maxlength="25" minlength="2" value="<?php echo $d29;?>" required>
                     <div class="invalid-feedback">
                     es requerido.
                     </div>
               </div>

            </div><!-- row fin -->

            <div class="row">
                  <div class="col-md-4 mb-3">
                     <label for="">Empresa donde trabaja</label>
                     <input type="text" class="form-control" name="trMM" id="" maxlength="25" minlength="2" value="<?php echo $d28;?>" required>
                        <div class="invalid-feedback">
                         es Requerido.
                        </div>
               </div>
               <div class="col-md-4 mb-3">
                  <label for="">Puesto que Ocupa</label>
                  <input type="text" class="form-control" id="" placeholder="" value="" name="puestotMadre" maxlength="15" minlength="2" >
                     <div class="invalid-feedback">
                      es Requerido.
                     </div>
               </div>
               <div class="col-md-4 mb-3">
                  <label for="">Telefono de Oficina</label>
                  <input type="text" class="form-control" id="" placeholder="" value=""  pattern="[0-9]{10}" onkeypress="return check(event)" maxlength="10" name="telTrabajoMama">
                     <div class="invalid-feedback">
                      es requerido.
                     </div>
               </div>

            </div><!--fin de row-->

            <div class="row">
                <div class="col-md-8 mb-3">
                  <label for="">Email <span class="text-muted"></span></label>
                  <input type="email" class="form-control" name="ceM" id="" placeholder="" minlength="5" maxlength="100" required pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                  <div class="invalid-feedback">
                     Email requerido
                  </div>
               </div>
               <div class="col-md-4 mb-3">
                  <label for="">Telefono Celular</label>
                  <input type="text" class="form-control" id="" placeholder="" value="" required  pattern="[0-9]{10}" onkeypress="return check(event)" maxlength="10" name="telmovilmama" >
                     <div class="invalid-feedback">
                     Telefono Celular es Requerido.
                     </div>
               </div>

            </div>
            <!-- fin de datos de la Madre-->

         <hr class="mb-4">

         <!-- <input type="button" name="previous" class="previous btn btn-default" value="Previo" /> -->
         <!--<input type="button" name="next" class="next btn btn-info" value="Siguiente" />-->

        <!-- <button class="btn btn-primary btn-lg btn-block" type="submit">Enviar Información</button> -->
        <!--</fieldset>-->

        <!-- Siguiente formulario datos generales del alumno y metodo de pago -->

        <h4 class="mb-3">IV.- Datos Generales del Alumno</h4>
        <label for="">Tiene Hermanos en el Colegio ?</label>

             <label for="">Si es asi, escribe los nombres de los hermanos y el grado.</label>
            <div class="row">
                <div class="col-md-4 mb-3">
                     <label for="firstName">Nombre del Primer Hermano del Alumno</label>
                     <input type="text" class="form-control" name="he1" id="firstName" placeholder="" maxlength="25" minlength="2" value="<?php echo $d30;?>">
                        <div class="invalid-feedback">
                        El Nombre es Requerido.
                        </div>
               </div>
               <div class="col-md-4 mb-3">
                     <label for="">Nivel de Estudio</label>
                     <input type="text" class="form-control"name="ne1" id=""  maxlength="25" minlength="2" value="<?php echo $d37;?>">
                        <div class="invalid-feedback">
                        es requerido.
                        </div>
               </div>

               <div class="col-md-4 mb-3">
                     <label for="">Grado de Estudio</label>
                     <input type="text" class="form-control" name="gr1" id="" placeholder="" maxlength="25" minlength="2" value="<?php echo $d31;?>">
                        <div class="invalid-feedback">
                        El Nombre es Requerido.
                        </div>
               </div>
               <!-- <div class="col-md-4 mb-3">
                  <label for="">Nivel de Estudio</label>
                  <select class="custom-select d-block w-100" id="" >
                  <option disabled="disabled" selected="selected">--Grado--</option>
                  <option value="KINDER">KINDER</option>
                  <option value="PRIMARIA">PRIMARIA</option>
                  <option value="SECUNDARIA" >SECUNDARIA</option>

                  </select>
                  <div class="invalid-feedback">
                  Please provide a valid state.
                  </div>
               </div> -->
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                     <label for="">Nombre del Segundo Hermano del Alumno</label>
                     <input type="text" class="form-control"  name="he2" id="" maxlength="25" minlength="2" value="<?php echo $d32;?>">
                        <div class="invalid-feedback">
                        El Nombre es Requerido.
                        </div>
               </div>

               <div class="col-md-4 mb-3">
                     <label for="">Nivel de Estudio</label>
                     <input type="text" class="form-control"name="ne2" id=""  maxlength="25" minlength="2" value="<?php echo $d38;?>" >
                        <div class="invalid-feedback">
                        es requerido.
                        </div>
               </div>

               <div class="col-md-4 mb-3">
                     <label for="">Grado de Estudio</label>
                     <input type="text" class="form-control" name="gr2" id="" placeholder="" maxlength="25" minlength="2" value="<?php echo $d33;?>">
                        <div class="invalid-feedback">
                        El Nombre es Requerido.
                        </div>
               </div>
<!--
               <div class="col-md-4 mb-3">
                  <label for="">Grado</label>
                  <select class="custom-select d-block w-100" id="" >
                 <option disabled="disabled" selected="selected">--Grado--</option>
                  <option value="KINDER">KINDER</option>
                  <option value="PRIMARIA">PRIMARIA</option>
                  <option value="SECUNDARIA" >SECUNDARIA</option>

                  </select>
                  <div class="invalid-feedback">
                   es requerido la seleccion.
                  </div>
               </div> -->
            </div>
            <hr class="mb-4">

            <label for="">En caso de emergencia avisar a </label>
            <div class="row">
                  <div class="col-md-5 mb-1">
                     <label for="">Primer Contacto</label>
                     <input type="text" class="form-control" id="" placeholder="" value="" name="f1" maxlength="15" minlength="2">
                        <div class="invalid-feedback">
                        El Nombre es Requerido.
                        </div>
                  </div>
               <div class="col-md-4 mb-1">
                  <label for="">Parentesco</label>
                  <select class="custom-select d-block w-100" id="" name="p1">
                      <option disabled="disabled" selected="selected">--Selecciona--</option>
                  <option>Padre</option>
                  <option>Madre</option>
                  <option>Abuelo</option>
                  <option>Ti@</option>
                  <option>Tutor</option>
                  <option>Otro</option>
                  </select>
                  <div class="invalid-feedback">
                  es requerido la seleccion.
                  </div>
               </div>
               <div class="col-md-3 mb-1">
                  <label for="">Telefono</label>
                  <input type="text" class="form-control" id="" placeholder="" value="" name="t1"  pattern="[0-9]{10}" onkeypress="return check(event)" maxlength="10">
                     <div class="invalid-feedback">
                     es requerido la seleccion.
                     </div>
               </div>

            </div>
            <div class="row">
                  <div class="col-md-5 mb-1">
                     <label for="">Segundo Contacto</label>
                     <input type="text" class="form-control" id="" placeholder="" value="" name="f2" maxlength="15" minlength="2">
                        <div class="invalid-feedback">
                        El Nombre es Requerido.
                        </div>
                  </div>
               <div class="col-md-4 mb-1">
                  <label for="">Parentesco</label>
                  <select class="custom-select d-block w-100" id="" name="p2">
                      <option disabled="disabled" selected="selected">--Selecciona--</option>
                 <option>Madre</option>
                  <option>Padre</option>
                  <option>Madre</option>
                  <option>Abuelo</option>
                  <option>Ti@</option>
                  <option>Tutor</option>
                  <option>Otro</option>
                  </select>
                  <div class="invalid-feedback">
                  es requerido la seleccion..
                  </div>
               </div>
               <div class="col-md-3 mb-1">
                  <label for="">Telefono</label>
                  <input type="text" class="form-control" id="" placeholder="" value="" name="t2"  pattern="[0-9]{10}" onkeypress="return check(event)" maxlength="10">
                     <div class="invalid-feedback">
                     Es Requerido.
                     </div>
               </div>

            </div>

            <div class="row">
                  <div class="col-md-5 mb-1">
                     <label for="">Tercer Contacto</label>
                     <input type="text" class="form-control" id="" placeholder="" value="" name="f3" maxlength="15" minlength="2">
                        <div class="invalid-feedback">
                        El Nombre es Requerido.
                        </div>
                  </div>
               <div class="col-md-4 mb-1">
                  <label for="">Parentesco</label>
                  <select class="custom-select d-block w-100" id="" name="p3">
                 <option disabled="disabled" selected="selected">--Selecciona--</option>
                  <option>Padre</option>
                  <option>Madre</option>
                  <option>Abuelo</option>
                  <option>Ti@</option>
                  <option>Tutor</option>
                  <option>Otro</option>
                  </select>
                  <div class="invalid-feedback">
                  Es requerido.
                  </div>
               </div>
               <div class="col-md-3 mb-1">
                  <label for="">Telefono</label>
                  <input type="text" class="form-control" id=""  value="" name="t3"  pattern="[0-9]{10}" onkeypress="return check(event)" maxlength="10" >
                     <div class="invalid-feedback">
                     Telefono es Requerido.
                     </div>
               </div>

            </div>
            <hr class="mb-4">

            <!--<input type="button" name="next" class="next btn btn-info" value="Siguiente" />-->

         <!--</fieldset>-->

         <!-- inicia tercer formulario -->
          <!--<fieldset>-->
         <h4 class="mb-4">V.- Datos Clinicos del Alumno</h4>
         <div class="row">
               <div class="col-md-12 mb-3">
                     <label for="enfermedades">Enfermedades que padece</label>
                     <input type="text" class="form-control" name="en" id="enfermedades"  maxlength="50" minlength="2" value="" required>
                        <div class="invalid-feedback">
                        Enfermedades es Requerido.
                        </div>
               </div>
         </div>

            <div class="row">


               <div class="col-md-7 mb-3">
                     <label for="">Alergico a algun  medicamento ? Cual(es)</label>
                     <input type="text" class="form-control" name="med2" id=""  maxlength="25" minlength="2" value="" required>

               </div>
            </div>
            <div class="row">

               <div class="col-md-7 mb-3">
                     <label for="">Toma actualmente algún medicamento? Cual(es)</label>
                     <input type="text" class="form-control" maxlength="25" minlength="2" value="" name="med" id=""  required>

               </div>
            </div>

         <hr class="mb-4">
         <h4 class="mb-4">VI.- Formas de Pago</h4>
         <div class="row">
               <div class="col-md-6 my-3">



                 <select class="custom-select d-block w-100" id="" name="comboTipoPago">
                 <option disabled="disabled" selected="selected">10 MESES</option>
                  <option>12 MESES</option>
                  <option>10 MESES</option>
                  <option>TODO EL AÑO</option>
                  </select>



               </div>
            </div>

            <hr class="mb-4">
            <ul>
               <li><a class="badge badge-info mb-3" style="font-size:16px;" HREF="http://www.prodysatpv.com/colegio/inscripcion/pdf/reglamento_de_uniforme_2021_2022.pdf#page=1" target="_blank"> 1.- Haz click aqui y Descarga el Reglamento de Uniformes 2021-2022</a></li>
               <li><a class="badge badge-info mb-3" style="font-size:16px;" HREF="http://www.prodysatpv.com/colegio/inscripcion/pdf/reglamento_pagos_2021-2022.pdf#page=1" target="_blank"> 2.- Haz click aqui y Descarga el Reglamento de Pagos 2021-2022 </a></li>
               <li><a class="badge badge-info mb-3" style="font-size:16px;" HREF="http://www.prodysatpv.com/colegio/inscripcion/pdf/reglamento_preescolar_2021-2022.pdf#page=1" target="_blank"> 3.- Haz click aqui y Descarga el Reglamento de Preescolar 2021-2022 </a></li>
               <li><A class="badge badge-info mb-3" style="font-size:16px;" HREF="http://www.prodysatpv.com/colegio/inscripcion/pdf/reglamento_primaria_2021-2022.pdf#page=1" target="_blank"> 4.- Haz click aqui y Descarga el Reglamento de Primaria 2021-2022 </a></li>
               <li><A class="badge badge-info mb-3" style="font-size:16px;" HREF="http://www.prodysatpv.com/colegio/inscripcion/pdf/reglamento_secundaria_2021-2022.pdf#page=1" target="_blank"> 5.- Haz click aqui y Descarga el Reglamento de Secundaria 2021-2022 </a></li>
            </ul>

           <br>
            <div class="form-row">
               <div class="form-check">


                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                  <label class="form-check-label col-md-12" for="invalidCheck">
                     Aceptas los Terminos y Condiciones de los Reglamentos del Colegio Baja California
                  </label>
                  <div class="invalid-feedback col-md-12">
                     Usted tiene que aceptar los reglamentos para poder enviar la información
                  </div>
               </div>
            </div>

            <hr class="mb-4">
         <!--<input type="button" name="previous" class="previous btn btn-default" value="Previo" />-->

         <input type="submit" name="boton" class="submit btn btn-success" value="Enviar Información" id="submit_data" />


        <!--</fieldset>-->
      </form><!-- Finaliza el form -->
    </div><!-- Finaliza el div col-md-12 -->
  </div><!-- Finaliza el row -->


 </body>
 <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

 <?php
          include("funciones/misFunciones.php");
          if (isset($_POST['boton']))     //si se presiono el boton  enviar
            {
                session_unset();
                session_destroy();
                $apellidoP = strtoupper($_POST["ap"]);   //apellido p
                $apellidoM = strtoupper($_POST["am"]);   //apellido m
                $nombre = strtoupper($_POST["nombre"]);   //nombre
                $nombreCompleto = $apellidoP . " " . $apellidoM . " " .  $nombre;
                $lugarnacimiento = strtoupper($_POST["ln"]);   //lugar nacimiento
                $nacionalidad =  strtoupper($_POST["na"]);
                $nivel = strtoupper($_POST["comboNIvel"]);
                $grado = strtoupper($_POST["grd"]);
                $fechaNacimiento = strtoupper($_POST["fechaN"]);
                //$fechaN = $d4;   //fcha nacimiento
                //$mes = $d5;    //mes
                //$an = $d6;    //año
                $reli = strtoupper($_POST["comboReligionA"]);  //religion
                $ck = strtoupper($_POST["ck"]);  //clave catastral
                $ca = strtoupper($_POST["ca"]);  //cuenta agua
                $domicilio = strtoupper($_POST["domicilio"]);
                $nombrepapa =  strtoupper($_POST["nPP"]);  //nombre del padre
                $edadP = intval($_POST["edadP"]);   //edad
                $estadoCivilP =  strtoupper($_POST["comboCivilP"]);  //estado civil papa
                $religionP =  strtoupper($_POST["comboReligionP"]);   //religion
                $domicilioP = strtoupper($_POST["domPP"]);   //domicilio papa
                $telpapa =  $_POST["tPP"];  //tel del padre
                $profesionPapa = strtoupper($_POST["prPP"]);   //profesion padre
                $trabajoPapa = strtoupper($_POST["trPP"]);    //trabajo papa
                $puestoPapa = strtoupper($_POST["ptrMM"]);// puesto mama
                $telefonoTrabajoPapa = $_POST["tTrPP"]; //telefono oficina mama
                $correoPapa = $_POST["ceP"];  //correo papa
                $telefonoMovilPapa = $_POST["tmtpP"];  //tel movil papa

                $nombremama =  strtoupper($_POST["nMM"]);  //nombre del madre
                $edadM = $_POST["edadM"];   //edad mama
                $estadoCivilM =  strtoupper($_POST["comboCivilM"]);  //estado civil mama
                $religionM =  strtoupper($_POST["comboReligionM"]);   //religion
                $domicilioM = strtoupper($_POST["domMM"]);   //domicilio mama
                $telmama =  $_POST["tMM"];  //tel del mama
                $profesionMama = strtoupper($_POST["prMM"]);   //profesion madre
                $trabajoMama = strtoupper($_POST["trMM"]);    //trabajo mama
                $puestoMama = strtoupper($_POST["puestotMadre"]); //puesto madre
                $telefonoTrabajoMama = $_POST["telTrabajoMama"];  //tele trabajo mama
                $correoMama = $_POST["ceM"];  //correo mama
                $telefonoMovilMama =  $_POST["telmovilmama"];// tel movil mama

                $hermanoA = strtoupper($_POST["he1"]);    //hermano 1
                $nivelhA= strtoupper($_POST["ne1"]);   //nivel 1
                $gradoA = strtoupper($_POST["gr1"]);    //grado 1
                $hermanoB = strtoupper($_POST["he2"]);    //hermano 2
                $nivelhB = strtoupper($_POST["ne2"]);   //nivel 2
                $gradoB = strtoupper($_POST["gr2"]);    //grado 2

                 $referencia1 = strtoupper($_POST["f1"]);    //emergencias 1
                 $parentesco1 = strtoupper($_POST["p1"]);    //parentesco 1
                 $telefono1 = strtoupper($_POST["t1"]);      //telefono 1

                 $referencia2 = strtoupper($_POST["f2"]);    //emergencias 2
                 $parentesco2 = strtoupper($_POST["p2"]);    //parentesco 2
                 $telefono2 = strtoupper($_POST["t2"]);      //telefono 2

                 $referencia3 = strtoupper($_POST["f3"]);    //emergencias 3
                 $parentesco3 = strtoupper($_POST["p3"]);    //parentesco 3
                 $telefono3 = strtoupper($_POST["t3"]);      //telefono 3

                 $enfermedad = strtoupper($_POST["en"]);    //enfermedad que padece
                 $medicamento = strtoupper($_POST["med"]);    //medicamento
                 $alergia = strtoupper($_POST["med2"]);    //alergia a medicamneto

                 $tipoPago = strtoupper($_POST["comboTipoPago"]);

                 $formaEscolar ="Si"; //strtoupper($_POST["combopagoReg"]);  //forma de escolar
                 $formaPago = "Si";//strtoupper($_POST["comboPag"]);  //forma de pago
                 $formaUniforme = "Si";//strtoupper($_POST["comboUni"]);  //forma de uniforme

                 $curp = strtoupper($_POST["curp"]);

                 //$nivel = strtoupper($_POST["comboNIvel"]);  //nivel
                 //$gr = $_POST["grd"];  //grado

                date_default_timezone_set('America/Los_Angeles');
                $Year = strftime("%Y");
                $Mont = strftime("%m");
                $fechaInscripcion=date('d-m-Y');
                //$estatus = "ACTIVO";
                actualizaDatosInscripcionX($nombreCompleto,$nombre,$apellidoP,$apellidoM,$lugarnacimiento,$nacionalidad,$nivel,$grado,$domicilio,$reli,$ck,$ca,$nombrepapa,$edadP,$estadoCivilP,$religionP,$domicilioP,$telpapa,$profesionPapa,$trabajoPapa,$puestoPapa,$telefonoTrabajoPapa,$correoPapa,$telefonoMovilPapa,$nombremama,$edadM,$estadoCivilM,$religionM,$domicilioM,$telmama,$profesionMama,$trabajoMama,$puestoMama,$telefonoTrabajoMama,$correoMama,$telefonoMovilMama,$hermanoA,$gradoA,$hermanoB,$gradoB,$referencia1,$parentesco1,$telefono1,$referencia2,$parentesco2,$telefono2,$referencia3,$parentesco3,$telefono3,$enfermedad,$medicamento,$alergia,$tipoPago,$formaEscolar,$formaPago,$formaUniforme,$fechaInscripcion,$Mont,$Year,$fechaNacimiento,$curp,$folios);





            }
    ?>


 </html>
