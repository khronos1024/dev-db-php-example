<?php 
	//conecting data bases
	function conectar(){
	$servername = "localhost";
	$username = "root";
	$password = "M4rt1nL0v3";
	$db = "demo";
	$conn = new mysqli($servername, $username, $password, $db) or die ("Error al conectar base de datos".mysql_error());
	//selecting data bases
	/*$selected = mysqli_select_db($con, "demo") or die ("Could not select examples");*/
	return $conn;
}
?>