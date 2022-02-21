<?php

class ControladorAspirantes{
    /*=============================================
	MOSTRAR ASPIRANTES
	=============================================*/

	static public function ctrMostrarAspirantes($item, $valor){

		$tabla = "aspirantes";

		$respuesta = ModeloAspirantes::mdlMostrarAspirantes($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR ASPIRANTES
	=============================================*/

	static public function ctrEditarAspirante(){

		 if(isset($_POST["editarAspirante"])){


			   	$tabla = "aspirantes";

			   	$datos = array("Id"=>$_POST["idAspirante"],
			   				   "Nombre"=>$_POST["editarAspirante"],
			   				   "Actividad"=>$_POST["editarActividad"]);

			   	$respuesta = ModeloAspirantes::mdlEditarAspirante($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El aspirante ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "aspirantes";

									}
								})

					</script>';

				}


			 }

		}



		static public function ctrBorrarAspirante(){

			if(isset($_GET["idAspirante"])){

				$tabla ="Aspirantes";
				$datos = $_GET["idAspirante"];

				$respuesta = ModeloAspirantes::mdlBorrarAspirante($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "Ha sido borrada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = aspirantes;

										}
									})

						</script>';
				}
			}

		}


		static public function getTotalAspirantes(){

				$response = ModeloAspirantes::getTotalAspirantes();
				return $response;
		}
}
