<?php
			//call conection
			Include("Conexion.php");
			//Include("metodos.php");
    		$conn = conectar();
    		//$log = insert_data();
?>
<!DOCTYPE html>
	<html>
	<head>
		<title>Carga de datos</title>
	</head>
	<body>
		<table border='1'>
        <tr>
        	<th>id</th>
	        <th>Name</th>
	        <th>Pass</th>
	    </tr>
		<?php
			//call conection
			//Include("Conexion.php");
    		//$conn = conectar();
    					
			if ($conn-> connect_error)	{
        		die ("Failed to connect to MySQL: " . $conn -> connect_error);
        	}

        	$sql = "SELECT id, user_name, user_password FROM user";

        	$result = $conn -> query($sql);

        	if ($result-> num_rows > 0){
        		while($row = $result-> fetch_assoc()){
	            	echo "<tr><td>" . $row['id'] . "</td><td>" . $row['user_name'] . "</td><td>" . $row['user_password'] . "</td></tr>";
	        	}
        		echo "</table>";
        	}
        	else{
        		echo "0 result";
        	} 
        	$conn->close();
		?>
		</table>
		<br>
		<input type="button" value="New" name="new_user">
	</body>
</html>