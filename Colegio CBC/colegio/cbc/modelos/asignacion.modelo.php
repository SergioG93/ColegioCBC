<?php

require_once "conexion.php";

class ModeloAsignacion{

	/*=============================================
	MOSTRAR ASIGNACION
	=============================================*/

	static public function mdlMostrarAsignacion($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR ASIGNACION
	=============================================*/

	static public function mdlEditarAsignacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Apellido_Materno = :Apellido_Materno, Apellido_Paterno = :Apellido_Paterno, Nombres = :Nombres, Grado = :Grado, Grupo = :Grupo, Estatus = :Estatus, Nivel = :Nivel, genero = :genero, turno = :turno, Curp = :Curp, Domicilio = :Domicilio, Fecha_Nacimiento = :Fecha_Nacimiento, Nombre_Padre = :Nombre_Padre, Edad_Padre = :Edad_Padre, Domicilio_Padre = :Domicilio_Padre, Correo_Padre = :Correo_Padre, Telefono_Padre = :Telefono_Padre, Profesion_Padre = :Profesion_Padre,  Nombre_Madre = :Nombre_Madre, Edad_Madre = :Edad_Madre, Domicilio_Madre = :Domicilio_Madre, Telefono_Madre = :Telefono_Madre, Profesion_Madre = :Profesion_Madre, Correo_Madre = :Correo_Madre WHERE Id = :Id");

		$stmt -> bindParam(":Apellido_Materno", $datos["Apellido_Materno"], PDO::PARAM_STR);
		$stmt -> bindParam(":Apellido_Paterno", $datos["Apellido_Paterno"], PDO::PARAM_STR);
		$stmt -> bindParam(":Nombres", $datos["Nombres"], PDO::PARAM_STR);
		$stmt -> bindParam(":Grado", $datos["Grado"], PDO::PARAM_STR);
		$stmt -> bindParam(":Grupo", $datos["Grupo"], PDO::PARAM_STR);
	 $stmt -> bindParam(":Estatus", $datos["Estatus"], PDO::PARAM_STR);
	 $stmt -> bindParam(":Nivel", $datos["Nivel"], PDO::PARAM_STR);
	 $stmt -> bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
	 $stmt -> bindParam(":turno", $datos["turno"], PDO::PARAM_STR);
	 $stmt -> bindParam(":Curp", $datos["Curp"], PDO::PARAM_STR);
	 $stmt -> bindParam(":Domicilio", $datos["Domicilio"], PDO::PARAM_STR);
	 $stmt -> bindParam(":Fecha_Nacimiento", $datos["Fecha_Nacimiento"], PDO::PARAM_STR);
	 $stmt -> bindParam(":Nombre_Padre", $datos["Nombre_Padre"], PDO::PARAM_STR);
	 $stmt -> bindParam(":Edad_Padre", $datos["Edad_Padre"], PDO::PARAM_STR);
	 $stmt -> bindParam(":Domicilio_Padre", $datos["Domicilio_Padre"], PDO::PARAM_STR);
	 $stmt -> bindParam(":Correo_Padre", $datos["Correo_Padre"], PDO::PARAM_STR);
	 $stmt -> bindParam(":Telefono_Padre", $datos["Telefono_Padre"], PDO::PARAM_STR);
	 $stmt -> bindParam(":Profesion_Padre", $datos["Profesion_Padre"], PDO::PARAM_STR);
	 $stmt -> bindParam(":Nombre_Madre", $datos["Nombre_Madre"], PDO::PARAM_STR);
	 $stmt -> bindParam(":Edad_Madre", $datos["Edad_Madre"], PDO::PARAM_STR);
	 $stmt -> bindParam(":Domicilio_Madre", $datos["Domicilio_Madre"], PDO::PARAM_STR);
	 $stmt -> bindParam(":Telefono_Madre", $datos["Telefono_Madre"], PDO::PARAM_STR);
	 $stmt -> bindParam(":Profesion_Madre", $datos["Profesion_Madre"], PDO::PARAM_STR);
	 $stmt -> bindParam(":Correo_Madre", $datos["Correo_Madre"], PDO::PARAM_STR);







		$stmt -> bindParam(":Id", $datos["Id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}

/**************************************************************************/

	static public function mdlBorrarAsignacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

		$stmt = null;

	}

	public static function getTotalAsignacion()
{

	try {
			$sum = Conexion::conectar()->prepare("SELECT COUNT(*) FROM colegiobc");
			$sum->execute();

			return $sum->fetch();
	} catch (PDOException $e) {
			$e->getMessage();
	}
}

}
