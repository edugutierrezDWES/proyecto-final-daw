<?php 
	$servername = "localhost";
	$username = "id17007157_eduadmin";
	$password = "VU(hZ-#z3B[zi_/7";
	$database = "id17007157_hotelmascotas";

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

	function navigateTo($url){
		echo "<script>window.open('".$url."','_self');</script>";
	}
?>