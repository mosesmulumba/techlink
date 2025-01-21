<?php
	include "start.php";

	include "connection/connection.php";

?>

<html>
	<head>
		<title> - Admin - Registration </title>
		<link href="css/css.css" rel="stylesheet">
		<link href="image/logo/w.png" rel="shortcut icon" type="image/x-icon">

		

	</head>
		
	<body>
		<div class="main_container">

			<?php include "header.php"; ?>

			<div class="main_menue">
				<div class="container">
					<div class="menue_items">
						<table>
							<tr>
								<td> <a href="admin.php"> Home </a> </td>
								<td> <a href="requests3.php" > Requests </a> </td>
								<td> <a href="admin.php" class="current"> Admin </a> </td>
								<td> <a href="lecturer.php"> User </a> </td>
								<td> <a href="department.php"> Departments </a> </td>
								<td> <a href="logout.php"> Logout </a> </td>
								
							</tr>
						</table>
					</div>
				</div>
			</div>

			<div class="page_ody">

				<div class="second_menu">
					<table>
						<tr>
							<td onclick='location.href="index.php"'> Cancel </td>
						</tr>
					</table>
				</div>

				<div class="body_content">
					
					<center>

					<h4> Admin - Registration </h4>

					<form method="post">
						<table>
							<tr>
								<td>ID:</td>	
								<td><input type="text" name="id" placeholder="Id" required/></td>
							</tr>
							<tr>
								<td>Firstname:</td>
								<td><input type="text" name="firstname" placeholder="Firstname" required/></td>
							</tr>
							<tr>	
								<td>Lastname: </td>
								<td><input type="text" name="lastname" placeholder="Lastname" required/></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<input type="submit" name="register_btn" value="Register"/>
								</td>
							</tr>	
						</table>
					</form>

					<?php
						if(isset($_POST['cancel'])){
							echo "Cancelling...";
							echo ("<meta http-equiv='refresh' content='0;URL=admin.php'");
						}

						if (isset($_POST['register_btn'])){
							
							$id = ($_POST['id']);	
							$firstname = ($_POST['firstname']);
							$lastname = ($_POST['lastname']);
							
							$sql_check = "SELECT * FROM admin WHERE id='$id'";
							$query_check = $connection -> query($sql_check);
							$num_rows = mysqli_num_rows($query_check);

							if($num_rows == true){
								echo "This admin already exist...";
							} else {
								
								//create user
								$sql = "INSERT INTO admin (id, firstname, lastname, username, password) VALUES ('$id', '$firstname', '$lastname', '$id', '$id')";
								$query = $connection -> query($sql);

								if($query){
									echo "<b>".$firstname."</b> has been registered successfully. You can add another one...";
								} else {
									echo "Sorry, operation failed...";
								}
							}
						}
					?>

				</div>
					
			</div>
		</div>
		
	</body>

</html>