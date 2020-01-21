<?php
    //call conextion 
    Include("Conexion.php");
    $conn = conectar();
    echo "Connection successfully";
    
 	$sql = "INSERT INTO user (id, user_name, user_password)
	VALUES ('', 'Hanzo', '12345')";

	if ($conn-> query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>