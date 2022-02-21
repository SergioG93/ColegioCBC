<?php



        //***********************************************************************************************//
        //funcion que me regresa el numero del mes dado un mes en texto
        function getMonthRange($mes): int
            {
                $mesnacimiento=$mes;

               if($mesnacimiento=="ENERO")
                 {
                     $mes=1;
                 }elseif($mesnacimiento=="FEBRERO")
                 {
                      $mes=2;

                 }elseif($mesnacimiento=="MARZO")
                 {
                     $mes=3;

                 }elseif($mesnacimiento=="ABRIL")
                 {
                      $mes=4;

                 }elseif($mesnacimiento=="MAYO")
                 {
                      $mes=5;

                 }elseif($mesnacimiento=="JUNIO")
                 {
                      $mes=6;

                 }elseif($mesnacimiento=="JULIO")
                 {
                      $mes=7;

                 }elseif($mesnacimiento=="AGOSTO")
                 {
                      $mes=8;

                 }elseif($mesnacimiento=="SEPTIEMBRE")
                 {
                      $mes=9;

                 }elseif($mesnacimiento=="OCTUBRE")
                 {
                      $mes=10;

                 }elseif($mesnacimiento=="NOVIEMBRE")
                 {
                      $mes=11;
                 }else
                 {
                    $mes=12;
                 }


               return $mes;
            }




        //***********************************************************************************************//
        //funcion que me genera el folio del documento
        function generaFolio()
        {
           date_default_timezone_set('America/Los_Angeles');
           $prefijo='A';
           $an = strval(strftime("%Y"));
           $r = rand(0, 1000);
           $num = getLastFolio() + 1;
           actualizaNumero($num);
           $folio = $prefijo . $an . $r . strval($num);
           return $folio;
        }



        //***********************************************************************************************//
        //funcion que me actualiza Numero en la tabla el folio
        function actualizaNumero($num)
        {
            include("datosConexion.php");
            $id=1;
            $conexion = mysqli_connect($db_host,$db_usuario,$db_password,$db_nombreBD);  //cadena de coneccion
            if(mysqli_connect_errno())     //encaso de error al conectara la base de datos
                {
                    echo "<script>alert('Fallo la conexion, intente mas tarde...!'); window.location='../index.php';</script>";             
                }
            mysqli_set_charset($conexion,"utf8");    //codificacion de caracteres
            $consulta = "UPDATE folio SET Numero='$num' WHERE Id='$id'";   //actualiza el Numero en la tabla folio de la base de datos
            $resultado = mysqli_query($conexion,$consulta);  //se ejecuta la consulta sql en la base de datos
            mysqli_close($conexion);  //se cierra la conexion
        }


        //***********************************************************************************************//
        //funcion para que me regrese el ultimo valor de 'numero ' de la tabla 'folio' de la base de datos
        function getLastFolio(): int
        {
            include("datosConexion.php");
            $id=1;
            $conexion = mysqli_connect($db_host,$db_usuario,$db_password,$db_nombreBD);  //cadena de coneccion
            if(mysqli_connect_errno())     //encaso de error al conectara la base de datos
                {
                    echo "<script>alert('Fallo la conexion, intente mas tarde...!'); window.location='../index.php';</script>";
                }
            mysqli_set_charset($conexion,"utf8");    //codificacion de caracteres

            $sql = "SELECT Numero FROM folio WHERE Id='$id'"; //seleccioname el Nuumero de la tabla folio donde Id=1
            $r = mysqli_query($conexion,$sql); //se ejecuta la consulta sql en la base de datos y se guarda en $r
            mysqli_close($conexion);  //se cierra la conexion
            if (!$r)
                {
                    echo"<script>alert('Error no se pudo general la solicitud, intenete mas tarde...!'); window.location='./index.php';</script>";
                    exit;
                }
            while($lastNum =mysqli_fetch_assoc($r))
                {
                    $rf = $lastNum['Numero'];
                }

            $numero = $rf;

            return $numero;
        }


        //*******************************************************************************************//
        //funcio que cambia la actividad de REVISADO a INSCRITO para que ya no pueda ingresar al formulario 2
        //esta funcion se manda llamar cuando se registra el formulario 2
        function inscrito($folio)
        {
             $actividad = "INSCRITO";
             include("datosConexion.php");
             $conexion = mysqli_connect($db_host,$db_usuario,$db_password,$db_nombreBD);  //cadena de coneccion
            if(mysqli_connect_errno())     //encaso de error al conectara la base de datos
                {
                   //echo "<script>alert('Fallo la conexion, intente mas tarde...!'); window.location='../index.php';</script>";
                }
            mysqli_set_charset($conexion,"utf8");    //codificacion de caracteres
            $consulta = "UPDATE aspirantes SET Actividad='$actividad' WHERE Folio='$folio'";   //actualiza el Numero e la tabla folio de la base de datos
            $resultado = mysqli_query($conexion,$consulta);  //se ejecuta la consulta sql en la base de datos
            mysqli_close($conexion);  //se cierra la conexion

        }

        //***********************************************************************************************//
        //funcion que inserta los datos a la tabla 'aspirantes' de la base de datos 'colegiobct'
        function InsertaDatosAspirante($nombreCompleto,$nombre,$apellidoP,$apellidoM,$fNacimineto,$fn,$mes,$aaaa,$lNacimineto,$nacionalidad,$edadReal,$escuelaProcedencia,$religion,$telFijo,$telMovil,$correoA,$fecharegistro,$Mont,$Year,$calle,$numE,$numI,$codigoPostal,$fracColonia,$localidad,$nivel,$nGrado,$nombreTutor,$tutorTM,$tutorProfesion,$tutorTrabajo,$nombreMadre,$telMadre,$profesionMadre,$trabajoMadre,$h1,$n1,$g1,$h2,$n2,$g2,$ref1)
        {
            include("datosConexion.php");
            $conexion = mysqli_connect($db_host,$db_usuario,$db_password,$db_nombreBD);  //cadena de coneccion
            if(mysqli_connect_errno())     //encaso de error al conectara la base de datos
                {
                    echo "<script>alert('Fallo la conexion, intente mas tarde...!'); window.location='../index.php';</script>";
                }
            mysqli_set_charset($conexion,"utf8");    //codificacion de caracteres
            $actividad = "EN ESPERA DE REVISION";
            $folio=generaFolio();
            //inserta los datos a la base de datos en la tabla 'asirantes'
            $consulta="INSERT INTO aspirantes (Folio,Nombre,Nombres,Apellido_Paterno,Apellido_Materno,Fecha_Nacimiento,FN,Mes_Nacimiento,An_Nacimiento,Lugar_Nacimiento,Nacionalidad,Edad_A_Septiembre,Escuela_Procedencia,Religion,Telefono_Fijo,Telefono_Movil,Correo,Fecha_Registro,Mes_Registro,An_Registro,Calle,Numero_Ext,Numero_Int,CP,Fraccionamiento,Localidad,Nivel_A_Ingresar,Grado_A_Ingresar,Nombre_Tutor,Tel_Tutor,Profesion,Trabajo,Madre,Tel_M,Profesion_M,Trabajo_M,HermanoA,NivelA,GradoA,HermanoB,NivelB,GradoB,Referencias,Actividad) VALUES ('".$folio."','".$nombreCompleto."','".$nombre."','".$apellidoP."','".$apellidoM."','".$fNacimineto."','".$fn."','".intval($mes)."','".intval($aaaa)."','".$lNacimineto."','".$nacionalidad."','".$edadReal."','".$escuelaProcedencia."','".$religion."','".$telFijo."','".$telMovil."','".$correoA."','".$fecharegistro."','".intval($Mont)."','".intval($Year)."','".$calle."','".$numE."','".$numI."','".$codigoPostal."','".$fracColonia."','".$localidad."','".$nivel."','".$nGrado."','".$nombreTutor."','".$tutorTM."','".$tutorProfesion."','".$tutorTrabajo."','".$nombreMadre."','".$telMadre."','".$profesionMadre."','".$trabajoMadre."','".$h1."','".$n1."','".$g1."','".$h2."','".$n2."','".$g2."','".$ref1."','".$actividad."')";

            $resultado = mysqli_query($conexion,$consulta);  //se ejecuta la consulta sql en la base de datos
            mysqli_close($conexion);  //se cierra la conexion

            if ($resultado == false)  // si hay un error
            {
                echo "<script>alert('Error no se pudo conectar al portal, intenete mas tarde...!'); window.location='../index.php';</script>";


            }else                                      //de lo contrario se registraron los datos
            {

               //echo"<script>alert('Muchas garcias por llenar la solicitud, Su registro fue correcto y enviado al Colegio Baja California...!'); window.location='registro.php';</script>";

               echo"<script>window.location='registro.php?nombre=$nombreCompleto&folio=$folio&cl=$fn';</script>";


                //session_start();
                //$_SESSION['nombre']=$nombreCompleto;
                //$_SESSION['folio']=$folio;
                //header('location:./registro.php');
                //exit();


                //echo"<script>window.location='registro.php';</script>";

                // remove all session variables
                //session_unset();

                // destroy the session
                //session_destroy();

            }


        }



         //************************************************************************************************
        //**inscripciones******************************************************************************


        //***********************************************************************************************//
        //funcion para que me regrese el ultimo valor de 'numero ' de la tabla 'matfolio' de la base de datos
        function getLastMatFolio(): int
        {
            include("datosConexion.php");
            $id=1;
            $conexion = mysqli_connect($db_host,$db_usuario,$db_password,$db_nombreBD);  //cadena de coneccion
            if(mysqli_connect_errno())     //encaso de error al conectara la base de datos
                {
                    echo "<script>alert('Fallo la conexion, intente mas tarde...!'); window.location='../index.php';</script>";
                }
            mysqli_set_charset($conexion,"utf8");    //codificacion de caracteres

            $sql = "SELECT Numero FROM matfolio WHERE Id='$id'"; //seleccioname el Nuumero de la tabla folio donde Id=1
            $r = mysqli_query($conexion,$sql); //se ejecuta la consulta sql en la base de datos y se guarda en $r
            mysqli_close($conexion);  //se cierra la conexion
            if (!$r)
                {
                   // echo"<script>alert('Error no se pudo general la solicitud, intenete mas tarde...!'); window.location='./index.php';</script>";
                    //exit;
                }
            while($lastNum =mysqli_fetch_assoc($r))
                {
                    $rf = $lastNum['Numero'];
                }

            $numero = $rf;

            return $numero;
        }


        //***********************************************************************************************//
        //funcion que me actualiza Numero en la tabla el matfolio
        function actualizaNumeroMatFolio($num)
        {
            include("datosConexion.php");
            $id=1;
            $conexion = mysqli_connect($db_host,$db_usuario,$db_password,$db_nombreBD);  //cadena de coneccion
            if(mysqli_connect_errno())     //encaso de error al conectara la base de datos
                {
                   //echo "<script>alert('Fallo la conexion, intente mas tarde...!'); window.location='../index.php';</script>";
                }
            mysqli_set_charset($conexion,"utf8");    //codificacion de caracteres
            $consulta = "UPDATE matfolio SET Numero='$num' WHERE Id='$id'";   //actualiza el Numero en la tabla folio de la base de datos
            $resultado = mysqli_query($conexion,$consulta);  //se ejecuta la consulta sql en la base de datos
            mysqli_close($conexion);  //se cierra la conexion
        }



        //***********************************************************************************************//
        //funcion que me genera el matricula del alumno
        function generaMatricula(): ?string
        {
           $mat = "";
           date_default_timezone_set('America/Los_Angeles');
           $an = strval(strftime("%Y"));
           $num = getLastMatFolio() + 1;
           actualizaNumeroMatFolio($num);

           if ($num >= 1 || $num<10)
              {
                 $mat = "0000" . strval($num);
              }
           elseif($num >= 10 || $num<100)
              {
                 $mat = "000" . strval($num);
              }
           elseif($num >= 100 || $num<1000)
              {
                 $mat = "00" . strval($num);
              }
           elseif($num >= 1000 || $num<10000)
              {
                 $mat = "0" . strval($num);
              }
            else
              {
                 $mat = strval($num);
              }


           return $an . $mat;

        }



        //***********************************************************************************************//
        //funcion que me resetea  Numero en la tabla el matfolio para inicar un nuevo matriculado
        function resetNumeroMatFolio()
        {
            include("datosConexion.php");
            $id=1;
            $num=0;
            $conexion = mysqli_connect($db_host,$db_usuario,$db_password,$db_nombreBD);  //cadena de coneccion
            if(mysqli_connect_errno())     //encaso de error al conectara la base de datos
                {
                    echo "<script>alert('Fallo la conexion, intente mas tarde...!'); window.location='../index.php';</script>";
                }
            mysqli_set_charset($conexion,"utf8");    //codificacion de caracteres
            $consulta = "UPDATE matfolio SET Numero='$num' WHERE Id='$id'";   //actualiza el Numero en la tabla folio de la base de datos
            $resultado = mysqli_query($conexion,$consulta);  //se ejecuta la consulta sql en la base de datos
            mysqli_close($conexion);  //se cierra la conexion
        }


        //************************************************************************************************
        //funcion para loguera a la inscripcion en linea
        function logIn($folio,$clave): int
        {
            include("datosConexion.php");
            $existe=0;
            $estatus="REVISADO";
            $conexion = mysqli_connect($db_host,$db_usuario,$db_password,$db_nombreBD);  //cadena de coneccion
            if(mysqli_connect_errno())     //encaso de error al conectara la base de datos
                {
                    echo "<script>alert('Fallo la conexion, intente mas tarde...!'); window.location='../index.php';</script>";
                }
            mysqli_set_charset($conexion,"utf8");    //codificacion de caracteres

            $sql = "SELECT Folio,Actividad FROM aspirantes WHERE Folio='$folio' And FN='$clave'";
            $r = mysqli_query($conexion,$sql); //se ejecuta la consulta sql en la base de datos y se guarda en $r
            mysqli_close($conexion);  //se cierra la conexion
            if (!$r)
                {
                    echo"<script>alert('Error no se pudo general la solicitud, intenete mas tarde...!'); window.location='./index.php';</script>";
                    exit;
                }
            while($lastname =mysqli_fetch_assoc($r))
                {
                    $d1 = $lastname['Folio'];
                    $a1 = $lastname['Actividad'];

                }

                if(strlen($d1)>0 and $estatus==$a1)
                  {
                      $existe=1;
                  }
                  else
                  {
                    $existe=0;
                  }
           return $existe;
        }




       //*****************************************************************************************************
       //control escolar



       //******************************************************************************************************
       //funcion para el log in a control escolar
       function userlogIn($user,$clave): int
       {
            include("datosConexion.php");
            $estatus="ACTIVO";
            $existe=0;
            $conexion = mysqli_connect($db_host,$db_usuario,$db_password,$db_nombreBD);  //cadena de coneccion
            if(mysqli_connect_errno())     //encaso de error al conectara la base de datos
                {
                    echo "<script>alert('Fallo la conexion, intente mas tarde...!'); window.location='sice.php';</script>";
                }
            mysqli_set_charset($conexion,"utf8");    //codificacion de caracteres

            $sql = "SELECT Nombres,Estatus FROM usuarios WHERE userName='$user' And Clave='$clave'";
            $r = mysqli_query($conexion,$sql); //se ejecuta la consulta sql en la base de datos y se guarda en $r
            mysqli_close($conexion);  //se cierra la conexion
            if (!$r)
                {
                    echo"<script>alert('Error no se pudo conectar al servidor, intenete mas tarde...!'); window.location='sice.php';</script>";
                    exit;
                }
            while($lastname =mysqli_fetch_assoc($r))
                {
                    $d1 = $lastname['Nombres'];
                    $d2 = $lastname['Estatus'];

                }

                if(strlen($d1)>0 and $estatus==$d2)
                  {
                      $existe=1;
                  }
                  else
                  {
                    $existe=0;
                  }
           return $existe;
       }





        //***********************************************************************************************//
        //funcion que inserta los datos de inscripciopn a la tabla 'colegiobc' de la base de datos 'colegiobct'
        function insertaDatosInscripcion($nombreCompleto,$nombre,$apellidoP,$apellidoM,$lugarnacimiento,$nacionalidad,$fechaN,$mes,$an,$religion,$ck,$ca,$domicilio,$nombrepapa,$edadP,$estadoCivilP,$religionP,$domicilioP,$telpapa,$profesionPapa,$trabajoPapa,$puestoPapa, $telefonoTrabajoPapa,$correoPapa,$telefonoMovilPapa,$nombremama,$edadM,$estadoCivilM,$religionM,$domicilioM,$telmama,$profesionMama,$trabajoMama,$puestoMama,$telefonoTrabajoMama,$correoMama,$telefonoMovilMama,$hermanoA,$nivelA,$gradoA,$hermanoB,$nivelB,$gradoB,$referencia1,$parentesco1,$telefono1,$referencia2,$parentesco2,$telefono2,$referencia3,$parentesco3,$telefono3,$enfermedad,$medicamento,$alergia,$tipoPago,$formaEscolar,$formaPago,$formaUniforme,$fechaInscripcion,$Mont,$Year,$nivel,$grado,$estatus)
        {

            include("datosConexion.php");
            $conexion = mysqli_connect($db_host,$db_usuario,$db_password,$db_nombreBD);  //cadena de coneccion
            if(mysqli_connect_errno())     //encaso de error al conectara la base de datos
                {
                    //echo "<script>alert('Fallo la conexion, intente mas tarde...!'); window.location='../cbc/index.php';</script>";
                    echo "<script>alert('Error (1) Fallo la conexion, intente mas tarde...!');</script>";
                }
            mysqli_set_charset($conexion,"utf8");    //codificacion de caracteres
            $matricula=generaMatricula(); //genera matricula();
            //inserta los datos a la base de datos en la tabla 'asirantes'
            $consulta="INSERT INTO colegiobc (Matricula,Nombre,Nombres,Apellido_Paterno,Apellido_Materno,Lugar_Nacimiento,Nacionalidad,Fecha_Nacimiento,Mes_Nacimiento,An_Nacimiento,Religion,Clave_Catastral,Cuenta_Agua,Domicilio,Nombre_Padre,Edad_Padre,Estado_Civil_Padre,Religion_Padre,Domicilio_Padre,Telefono_Padre,Profesion_Padre,Empresa_Trabajo_Padre,Puesto_Padre,Telefono_Oficina_Padre,Correo_Padre,Tel_Movil_Padre,Nombre_Madre,Edad_Madre,Estado_Civil_Madre,Religion_Madre,Domicilio_Madre,Telefono_Madre,Profesion_Madre,Trabajo_Madre,Puesto_Madre,Telefono_Oficina_Madre,Correo_Madre,Tel_Movil_Madre,HermanoA,NivelA,GradoA,HermanoB,NivelB,GradoB,Nombre_EmgA,ParentescoA,TelefonoEA,Nombre_EmgB,ParentescoB,TelefonoEB,Nombre_EmgC,ParentescoC,TelefonoEC,Padecimiento,Medicamento,Alergia_A_Medicamento,Tipo_Pago,Reglamento_Escolar,Reglamento_Pagos,Reglamento_Uniformes,Fecha_Inscripcion,Mes_Inscripcion,An_Inscripcion,Nivel,Grado,Estatus) VALUES ('".$matricula."','".$nombreCompleto."','".$nombre."','".$apellidoP."','".$apellidoM."','".$lugarnacimiento."','".$nacionalidad."','".$fechaN."','".$mes."','".$an."','".$religion."','".$ck."','".$ca."','".$domicilio."','".$nombrepapa."','".$edadP."','".$estadoCivilP."','".$religionP."','".$domicilioP."','".$telpapa."','".$profesionPapa."','".$trabajoPapa."','".$puestoPapa."','".$telefonoTrabajoPapa."','".$correoPapa."','".$telefonoMovilPapa."','".$nombremama."','".$edadM."','".$estadoCivilM."','".$religionM."','".$domicilioM."','".$telmama."','".$profesionMama."','".$trabajoMama."','".$puestoMama."','".$telefonoTrabajoMama."','".$correoMama."','".$telefonoMovilMama."','".$hermanoA."','".$nivelA."','".$gradoA."','".$hermanoB."','".$nivelB."','".$gradoB."','".$referencia1."','".$parentesco1."','".$telefono1."','".$referencia2."','".$parentesco2."','".$telefono2."','".$referencia3."','".$parentesco3."','".$telefono3."','".$enfermedad."','".$medicamento."','".$alergia."','".$tipoPago."','".$formaEscolar."','".$formaPago."','".$formaUniforme."','".$fechaInscripcion."','".$Mont."','".$Year."','".$nivel."','".$grado."','".$estatus."')";

            $resultado = mysqli_query($conexion,$consulta);  //se ejecuta la consulta sql en la base de datos
            mysqli_close($conexion);  //se cierra la conexion

            if ($resultado == false)  // si hay un error
            {
                //echo "<script>alert('Error no se pudo conectar al portal, intenete mas tarde...!'); window.location='../cbc/index.php';</script>";
                echo "<script>alert('Error (2) no se pudo conectar al portal, intenete mas tarde...!');</script>";


            }else                                      //de lo contrario se registraron los datos
            {


              echo "<script>alert('Su registro fue correcto...!, Precetese al plantel a concluir el tramite');window.location='http://colegiobc.com';</script>";
              exit;


            }


        }





?>
