<?php
	$database="web";
	$user='prueba';
	$password='prueba123';

try {
	
	$con=new PDO('mysql:host=localhost;dbname='.$database,$user,$password);

} catch (PDOException $e) {
	echo "Error".$e->getMessage();
}

?>