<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "hotelmascotas";

	
	try {
		$conexion = new PDO("mysql:host=$servername;dbname=$database", $username, $password, 
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 	 	 	 	 	 	
		$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	 
		echo "<script>
		console.log('Conectado a base de Datos')
		</script>";	 	 	 		 	 	 	 	
	} catch (PDOException $ex) {
		echo $ex->getMessage(); 	 	 	 	 	 	
	}
?>