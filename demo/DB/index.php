<?php
Include("Conexion.php");
$connection = new Conexion;
$result_data = false;
$message = '';
$connection -> connect();

if(isset($_POST['frnCreateUser']) ){
	$result_data = $connection->createUser($_POST['userName'],$_POST['userPassword']);
	$message = 'The user was created successfully';
}

if(isset($_POST['frnDeleteUser']) ){
	$result_data = $connection->deleteUser($_POST['d_id']);
	$message = 'The user was deleted successfully';
}

$result = $connection->getAllUsers();

?>
<!DOCTYPE html>
<html>
<head>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Carga de datos</title>
		<link rel="stylesheet" href="http://localhost/DB/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://localhost/DB/fontawesome/css/all.min.css">
	</head>

</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-sm"> 	

				<h1>User CRUD </h1>
			</div>
			<div class="col-sm"> 
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#newUser">Add new user</button>
			</div>
		</div>
		<div class="row">
			<!-- showing result message -->
			<?php if (isset($result_data)  && ($result_data === true)) {?>
			<div class="alert alert-primary" role="alert">
				<div class="col-sm"> 
					<?= $message ?>
				</div>
			</div>
			<?php } ?>

		</div>
		<div class="row">
			<div class="col-sm"> 
				<table class="table table-striped" border='1'>
					<thead>
						<tr>
							<th scope="col">id</th>
							<th scope="col">Name</th>
							<th scope="col">Pass</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
				</div>
				<?php
				if ($result-> num_rows > 0){
					while($row = $result-> fetch_assoc()){
						echo "<tr><td>" . $row['id'] . "</td><td>" . $row['user_name'] . "</td><td>" . $row['user_password'] 
						. '</td><td>
						<div class="btn-group mr-1" role="group" aria-label="Second group">
						<button type="button" class="btn btn-secondary"><i class="fa fa-eye"></i></button>
						<button type="button" class="btn btn-secondary"><i class="fa fa-pen"></i></button>
						
						<button type="button" class="btn btn-secondary" onClick="deleteData('.$row['id'].');"><i class="fa fa-trash"></i></button>


						</div>
						</td></tr>';
					}
					echo "</table>";
				}
				else{
					echo "0 result";
				} 
				?> 
			</table>
		</div>
	</div>

	<form id="deleteUser" method="post" action="http://localhost/DB/index.php" name="deleteUser">
		<input type="hidden" name="frnDeleteUser" value=""/>
		<input type="hidden" name="d_id" id="d_id"/>
	</form>

	<!--MODALS -->

	<!-- Modal -->
	<div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newUserModalLabel">New User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="createUser" method="post" action="http://localhost/DB/index.php" name="createUser">
						<div class="form-group">
							<label for="userName">User Name</label>
							<input type="email" class="form-control" id="userName" name="userName">
						</div>
						<div class="form-group">
							<label for="userPassword">Password</label>
							<input type="password" class="form-control" id="userPassword" name= "userPassword">
						</div>
						<input type="hidden" name="frnCreateUser" value=""/>

					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" onClick="createUserAction();">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!--  importin boostrap JS -->
<script src="http://localhost/DB/jquery/jquery-3.3.1.min.js" ></script>
<script src="http://localhost/DB/popper/popper.min.js" ></script>
<script src="http://localhost/DB/bootstrap/js/bootstrap.min.js" ></script>

<script type="text/javascript">
	//JAVASCRIPT + Jquery Example
	function myFunction(){
		$("#newUser").fadeOut( "slow" );

	}

	function createUserAction(){
		var form = document.getElementById("createUser")
		form.submit();
	}

	function deleteData(d_id){
		document.getElementsByName("d_id")[0].value = d_id;
		var form = document.getElementById("deleteUser");
		form.submit();
	}

	</script>
</body>
</html>