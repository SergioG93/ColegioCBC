<?php

class ControladorAsignacion{

    /*=============================================
	MOSTRAR ALUMNOS COLEGIOBC
	=============================================*/

	static public function ctrMostrarAsignacion($item, $valor){

		$tabla = "colegiobc";

		$respuesta = ModeloAsignacion::mdlMostrarAsignacion($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR ASIGNACION
	=============================================*/

	static public function ctrEditarAsignacion(){

		if(isset($_POST["editarGrupo"])){


				  $tabla = "colegiobc";

				  $datos = array("Id"=>$_POST["idAsignacion"],
				                "Apellido_Materno"=>$_POST["editarAMaterno"],
				 				"Apellido_Paterno"=>$_POST["editarAPaterno"],
				  				"Nombres"=>$_POST["editarNombre"],
				                 "Grupo"=>$_POST["editarGrupo"],
								 "Grado"=>$_POST["editarGrado"],
								 "Estatus"=>$_POST["editarEstatus"],
								 "genero"=>$_POST["editargenero"],
								 "turno"=>$_POST["editarturno"],
								 "Curp"=>$_POST["editarCurp"],
								 "Domicilio"=>$_POST["editarDomicilio"],
								 "Fecha_Nacimiento"=>$_POST["editarFecha_Nacimiento"],
								 "Nombre_Padre"=>$_POST["editarNombre_Padre"],
								 "Edad_Padre"=>$_POST["editarEdad_Padre"],
								 "Domicilio_Padre"=>$_POST["editarDomicilio_Padre"],
								 "Telefono_Padre"=>$_POST["editarTelefono_Padre"],
								 "Correo_Padre"=>$_POST["editarCorreo_Padre"],
								 "Profesion_Padre"=>$_POST["editarProfesion_Padre"],
								 "Nombre_Madre"=>$_POST["editarNombre_Madre"],
								 "Edad_Madre"=>$_POST["editarEdad_Madre"],
								 "Domicilio_Madre"=>$_POST["editarDomicilio_Madre"],
								 "Telefono_Madre"=>$_POST["editarTelefono_Madre"],
								 "Profesion_Madre"=>$_POST["editarProfesion_Madre"],
								 "Correo_Madre"=>$_POST["editarCorreo_Madre"],





							 "Nivel"=>$_POST["editarNivel"]);

				  $respuesta = ModeloAsignacion::mdlEditarAsignacion($tabla, $datos);

				  if($respuesta == "ok"){

				   echo'<script>

				   swal({
						 type: "success",
						 title: "El Alumno ha sido asignado correctamente",
						 showConfirmButton: true,
						 confirmButtonText: "Cerrar"
						 }).then(function(result){
								   if (result.value) {

								   window.location = "asignacion";

								   }
							   })

				   </script>';

			   }else{

					echo'<script>

						swal({
							  type: "error",
							  title: "¡El no se pudo asignar!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "asignacion";

								}
							})

					  </script>';

				}

		}


	}



/*=============================================
BORRAR USUARIO
=============================================*/

static public function ctrBorrarAsignacion(){

	if(isset($_GET["idAsignacion"])){

		$tabla ="colegiobc";
		$datos = $_GET["idAsignacion"];

		$respuesta = ModeloAsignacion::mdlBorrarAsignacion($tabla, $datos);

		if($respuesta == "ok"){

			echo'<script>

				swal({
						type: "success",
						title: "Ha sido borrada correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
								if (result.value) {

								window.location = asignacion;

								}
							})

				</script>';
		}
	}

}

static public function getTotalAsignacion(){

		$response = ModeloAsignacion::getTotalAsignacion();
		return $response;
}

}
