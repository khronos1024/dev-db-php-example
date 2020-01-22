<?php 
class Conexion{
 	//Field members publics
	public $username = "root";
	public $servername = "localhost";
	public $password = "";
	public $db_name = "demo";
	public $db_instance = null;

	//conecting data bases
	function connect(){

		$this->db_instance = new mysqli($this->servername,$this->username, $this->password, $this->db_name);

		if ($this->db_instance->connect_errno) {
			echo "MySQL connection fail: (" . $conn->connect_errno . ") " . $conn->connect_error;
			$this->db_instance = null;
			return null;
		}

		return $this->db_instance;
	}
/*
DB CRUD OPERATIONS
*/
function getAllUsers(){
	$result = null;
	$sql = "SELECT id, user_name, user_password FROM user";

	if( $this->db_instance != null){
		$result = $this->db_instance -> query($sql);
	}

	return $result;
} 


function createUser($userName, $userPassword){
	$sql = "INSERT INTO user (user_name, user_password) values ('".$userName."','".$userPassword."')";
	$inserted = false;
	if( $this->db_instance != null){

		if ($this->db_instance->query($sql) === TRUE)
		{
			$inserted = true;
		}
		else
		{
		//TODO: handled this error better
			echo "Error: " . $sql . "<br>" . $this->db_instance->error;
			$inserted = false;
		}

	}
	return $inserted;
}

function deleteUser($id){
	$sql = "DELETE FROM user WHERE id=".$id."";
	echo $sql;
	if( $this->db_instance != null){

		if ($this->db_instance->query($sql) === TRUE)
		{
			$inserted = true;
		}
		else
		{
		//TODO: handled this error better
			echo "Error: " . $sql . "<br>" . $this->db_instance->error;
			$inserted = false;
		}

	}
	return $inserted;
}
}

?>