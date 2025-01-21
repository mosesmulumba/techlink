<?php
	include "start.php";

	include "connection/connection.php";

?>

<html>
	<head>
		<title> - Add User </title>
		<link href="css/css.css" rel="stylesheet">
		<link href="image/logo/w.png" rel="shortcut icon" type="image/x-icon">

		<link rel="stylesheet" type="text/css" href="datatables/DataTables-1.10.16/css/jquery.dataTables.min.css">

	</head>
		
	<body>
		<div class="main_container">

			<?php include "header.php"; ?>

			<div class="main_menue">
				<div class="container">
					<div class="menue_items">
						<table>
							<tr>
								<td> <a href="department.php"> Departments </a> </td>
								<td> <a href="requests.php"> Requests </a> </td>
								<td> <a href="admin.php"> Admin </a> </td>
								<td> <a href="lecturer.php" class="current"> User </a> </td>
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
							<td onclick='location.href="lecturer.php"'> Cancel </td>
						</tr>
					</table>
				</div>

				<div class="body_content">
					
					<center>

					<h4> Regester User </h4>

					<form method="post">
						<table>
							<tr>
								<td> ID: </td>
								<td> <input type="text" name="id" required> </td>
							</tr>
							<tr>
								<td> First Name: </td>
								<td> <input type="text" name="firstname" required> </td>
							</tr>
							<tr>
								<td> Last name: </td>
								<td> <input type="text" name="lastname" required> </td>
							</tr>
							<tr>
								<td> Faculty: </td>
								<td> <input type="text" name="faculty" required> </td>
							</tr>
							<tr>
								<td> Email: </td>
								<td> <input type="text" name="email" required> </td>
							</tr>
							<tr>
								<td> Course: </td>
								<td> <input type="text" name="course" required> </td>
							</tr>
							<tr>
								<td> </td>
								<td> 
									<input type="submit" name="add_lecturer" value="Add">
								</td>
							</tr>
						</table>
					</form>

					<?php
						if(isset($_POST['cancel'])){
							echo "Cancelling...";
							echo ("<meta http-equiv='refresh' content='0;URL=lecturer.php'");
						}

						if(isset($_POST['add_lecturer'])){
							$id = $_POST['id'];
							$firstname = $_POST['firstname'];
							$lastname = $_POST['lastname'];
							$faculty = $_POST['faculty'];
							$email = $_POST['email'];
							$course = $_POST['course'];
							$sql_check = "SELECT * FROM lecturer WHERE id='$id'";
							$query_check = $connection -> query($sql_check);
							$num_rows = mysqli_num_rows($query_check);
							if($num_rows == true){
								echo "Sorry, Lecturer already exist!";
							} else {
								$sql = "INSERT INTO lecturer (id, firstname, lastname, faculty, email, course, username, password) VALUES ('$id', '$firstname', '$lastname','$faculty', '$email', '$course','$id','$id')";
								$query = $connection -> query($sql);

								if($query){
									echo "Lecturer successfully added!";
								} else {
									echo "Failed!";
								}
							}
						}
					?>

				</div>
					
			</div>
		</div>
		
	</body>

</html>