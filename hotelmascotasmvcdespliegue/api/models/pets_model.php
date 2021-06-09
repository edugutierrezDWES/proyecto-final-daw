<?php

function getAllPets($id_usuario) {

    global $conexion;
	try {
		$consulta = $conexion->prepare("SELECT * FROM mascota WHERE id_usuario=:id_usuario AND fecha_baja IS NULL");
        $consulta->bindParam(':id_usuario', $id_usuario);
		$consulta->execute();
		return $consulta->fetchAll(PDO::FETCH_ASSOC); # Si falla, devuelve NULL por defecto

	} catch (PDOException $ex) {
		return null;
	}
} 

function getOnePet($id_mascota) {

    global $conexion;
	try {
		$consulta = $conexion->prepare("SELECT * FROM mascota WHERE id_mascota=:id_mascota");
        $consulta->bindParam(':id_mascota', $id_mascota);
		$consulta->execute();
		return $consulta->fetch(PDO::FETCH_ASSOC); # Si falla, devuelve NULL por defecto

	} catch (PDOException $ex) {
		return null;
	}
} 


function savePet($mascota, $id_usuario) {

    $id = uniqid("masc", true);
    global $conexion;
	try {
		$conexion->beginTransaction();

		$insertarMascota = $conexion->prepare("INSERT INTO mascota (id_mascota, nombre, tipo, raza, descripcion, id_usuario) 
        VALUES (:id_mascota, :nombre, :tipo, :raza, :descripcion, :id_usuario)");
      
        $insertarMascota->bindParam(':id_mascota', $id);
		$insertarMascota->bindParam(':nombre', $mascota["nombre"]);
		$insertarMascota->bindParam(':tipo', $mascota["tipo"]);
        $insertarMascota->bindParam(':raza', $mascota["raza"]);
        $insertarMascota->bindParam(':descripcion', $mascota["descripcion"]);
        $insertarMascota->bindParam(':id_usuario', $id_usuario);
 
        $insertarMascota->execute();

        $conexion->commit();
        return true;

	} catch (PDOException $ex) {
		return null;
	}
}

function isPetValid($mascota){

	$nombre = preg_match('/^[a-záéíóúñ][a-záéíóúñüªº\-\.\s]+[a-záéíóúñ\.]$/i',$mascota["nombre"]);
	$raza = preg_match('/^[a-záéíóúñ][a-záéíóúñüªº\-\.\s]+[a-záéíóúñ\.]$/i',$mascota["raza"]);
	$descripcion = preg_match('/^[a-záéíóúñ][a-záéíóúñüªº\-\.\s]{2,500}[a-záéíóúñ\.]$/i',$mascota["descripcion"]);
	$tipo = preg_match('/(perro|gato)/i',$mascota["tipo"]);
    
	return $nombre && $raza && $descripcion && $tipo;

}

function updatePet($mascota) {

	global $conexion;
		try {
			$actualizarMascota = $conexion->prepare("UPDATE mascota SET nombre = :nombre, raza = :raza, descripcion = :descripcion, tipo = :tipo WHERE id_mascota = :id_mascota");
			$actualizarMascota->bindParam(":id_mascota", $mascota["id_mascota"]);
			$actualizarMascota->bindParam(":nombre", $mascota["nombre"]);
			$actualizarMascota->bindParam(":raza", $mascota["raza"]);
			$actualizarMascota->bindParam(":descripcion", $mascota["descripcion"]);
			$actualizarMascota->bindParam(":tipo", $mascota["tipo"]);
			$actualizarMascota->execute();
            
			return true;

				
		} catch (PDOException $ex) {
			return null;
	    }

}

function deletePet($id_mascota) {

	$fecha_baja = date("Y-m-d");

	global $conexion;
	try {
		$darBajaMascota = $conexion->prepare("UPDATE mascota SET fecha_baja = :fecha_baja WHERE id_mascota = :id_mascota");
		$darBajaMascota->bindParam(":id_mascota", $id_mascota);
		$darBajaMascota->bindParam(":fecha_baja", $fecha_baja);
		$darBajaMascota->execute();
		
		return true;

			
	} catch (PDOException $ex) {
		return $ex->getMessage();
	}

}

?>