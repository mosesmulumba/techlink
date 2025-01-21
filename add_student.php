<?php
	include "start.php";

	include "connection/connection.php";

?>

<html>
	<head>
		<title> - Add Student </title>
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
								<td> <a href="lecturer.php"> Lecturer </a> </td>
								<td> <a href="student.php" class="current"> Student </a> </td>
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
							<td onclick='location.href="student.php"'> Cancel </td>
						</tr>
					</table>
				</div>

				<div class="body_content">
					
					<center>

					<h4> Add Student </h4>

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
								<td> Email: </td>
								<td> <input type="text" name="email" required> </td>
							</tr>
							<tr>
								<td> Registration Number: </td>
								<td> <input type="text" name="regno" required> </td>
							</tr>
							<tr>
								<td> Faculty: </td>
								<td> <input type="text" name="faculty" required> </td>
							</tr>
							<tr>
								<td> Course: </td>
								<td> <input type="text" name="course" required> </td>
							</tr>
							<tr>
								<td> </td>
								<td> 
									<input type="submit" name="add_student" value="Add">
								</td>
							</tr>
						</table>
					</form>

					<?php
						if(isset($_POST['cancel'])){
							echo "Cancelling...";
							echo ("<meta http-equiv='refresh' content='0;URL=student.php'");
						}

						if(isset($_POST['add_student'])){
							$id = $_POST['id'];
							$firstname = $_POST['firstname'];
							$lastname = $_POST['lastname'];
							$email = $_POST['email'];
							$regno = $_POST['regno'];
							$faculty = $_POST['faculty'];
							$course = $_POST['course'];
							$sql_check = "SELECT * FROM student WHERE id='$id'";
							$query_check = $connection -> query($sql_check);
							$num_rows = mysqli_num_rows($query_check);
							if($num_rows == true){
								echo "Sorry, student already exist!";
							} else {
								$sql = "INSERT INTO student (id, firstname, lastname, email, regno,faculty, course, username, password) VALUES ('$id', '$firstname', '$lastname', '$email', '$regno', '$faculty', '$course','$id','$id')";
								$query = $connection -> query($sql);

								if($query){
									echo "student successfully added!";
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