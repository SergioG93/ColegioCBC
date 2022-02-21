/*=============================================
EDITAR ASIGNACION DE GRUPO Y Nombre Completo
=============================================*/
$(".tablas").on("click", ".btnEditarAsignacion", function(){

	var idAsignacion = $(this).attr("idAsignacion");

	var datos = new FormData();
	datos.append("idAsignacion", idAsignacion);

	$.ajax({
		url: "ajax/asignacion.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

            $("#editarAMaterno").val(respuesta["Apellido_Materno"]);
            $("#editarAPaterno").val(respuesta["Apellido_Paterno"]);
     		$("#editarNombre").val(respuesta["Nombres"]);
				$("#editarCurp").val(respuesta["Curp"]);
				$("#editarNivel").val(respuesta["Nivel"]);
				$("#editarGrado").val(respuesta["Grado"]);
				$("#editarGrupo").val(respuesta["Grupo"]);
				$("#editarturno").val(respuesta["turno"]);
				$("#editarEstatus").val(respuesta["Estatus"]);
				$("#editargenero").val(respuesta["genero"]);
				$("#editarCurp").val(respuesta["Curp"]);
				$("#editarFecha_Nacimiento").val(respuesta["Fecha_Nacimiento"]);
				$("#editarDomicilio").val(respuesta["Domicilio"]);
				$("#editarNombre_Padre").val(respuesta["Nombre_Padre"]);
				$("#editarEdad_Padre").val(respuesta["Edad_Padre"]);
				$("#editarDomicilio_Padre").val(respuesta["Domicilio_Padre"]);
				$("#editarCorreo_Padre").val(respuesta["Correo_Padre"]);
				$("#editarTelefono_Padre").val(respuesta["Telefono_Padre"]);
				$("#editarProfesion_Padre").val(respuesta["Profesion_Padre"]);
				$("#editarNombre_Madre").val(respuesta["Nombre_Madre"]);
				$("#editarEdad_Madre").val(respuesta["Edad_Madre"]);
				$("#editarDomicilio_Madre").val(respuesta["Domicilio_Madre"]);
				$("#editarCorreo_Madre").val(respuesta["Correo_Madre"]);
				$("#editarTelefono_Madre").val(respuesta["Telefono_Madre"]);
				$("#editarProfesion_Madre").val(respuesta["Profesion_Madre"]);




     		$("#idAsignacion").val(respuesta["Id"]);

     	}

	})


})

/*=============================================
BOTON VER EXPEDIENTE
=============================================*/

$(".tablas").on("click", ".btnVerAlumno", function(){

	var idAlumno = $(this).attr("idAlumno");

	window.location = "index.php?ruta=veralumno&idAlumno="+idAlumno;


})

/*=============================================
Eliminar Usuario
=============================================*/

$(".tablas").on("click", ".btnEliminarAsignacion", function(){

	 var idAsignacion = $(this).attr("idAsignacion");

	 swal({
	 	title: '¿Está seguro de borrar?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=asignacion&idAsignacion="+idAsignacion;

	 	}

	 })

})
