<?php
	include "start.php";

	include "connection/connection.php";

?>

<html>
	<head>
		<title> - Update Lecturer </title>
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
								<td> <a href="department.php" > Departments </a> </td>
								<td> <a href="requests.php"> Requests </a> </td>
								<td> <a href="admin.php"> Admin </a> </td>
								<td> <a href="lecturer.php" class="current"> Lecturer </a> </td>
								<td> <a href="student.php"> Student </a> </td>
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

					<h4> Update Lecturer </h4>

					<?php
						$no = $_GET['no'];

						$sql = "SELECT * FROM lecturer WHERE no='$no'";
						$query = $connection -> query($sql);
						while($row = $query -> fetch_array()){
							$id = $row['id'];
							$firstname = $row['firstname'];
							$lastname = $row['lastname'];
							$faculty = $row['faculty'];
							$email = $row['email'];
							$course = $row['course'];
							$username = $row['username'];
						}
					?>

					<form method="post">
						<table>
							<tr>
								<td> ID: </td>
								<td> <?php echo "<input type='text' name='id' value='".$id."'> </td>" ;?>
							</tr>
							<tr>
								<td> First Name: </td>
								<td> <?php echo "<input type='text' name='firstname' value='".$firstname."'> </td>" ;?>
							</tr>
							<tr>
								<td> Last Name: </td>
								<td> <?php echo "<input type='text' name='lastname' value='".$lastname."'> </td>" ;?>
							</tr>
							<tr>
								<td> faculty: </td>
								<td> <?php echo "<input type='text' name='faculty' value='".$faculty."'> </td>" ;?>
							</tr>
							<tr>
								<td> Email: </td>
								<td> <?php echo "<input type='text' name='email' value='".$email."'> </td>" ;?>
							</tr>
							<tr>
								<td> Course: </td>
								<td> <?php echo "<input type='text' name='course' value='".$course."'> </td>" ;?>
							</tr>
							<tr>
								<td> Username: </td>
								<td> <?php echo "<input type='text' name='username' value='".$username."'> </td>" ;?>
							</tr>
							<tr>
								<td></td>
								<td>
									<input type="submit" name="update_lecturer" value="Update">
									<input type="submit" name="cancel" value="Cancel"> 
								</td>
							</tr>
						</table>
					</form>

					<?php
						if(isset($_POST['cancel'])){
							echo "Cancelling...";
							echo ("<meta http-equiv='refresh' content='0;URL=lecturer.php'");
						}


						if(isset($_POST['update_lecturer'])){
							$id = $_POST['id'];
							$firstname = $_POST['firstname'];
							$lastname = $_POST['lastname'];
							$faculty = $_POST['faculty'];
							$email = $_POST['email'];
							$course = $_POST['course'];
							$username = $_POST['username'];

							$sql = "UPDATE lecturer SET id='$id', firstname='$firstname', lastname='$lastname', faculty='$faculty', email='$email', course='$course', username='$username' WHERE no='$no'";
							$query = $connection -> query($sql);
							
							if($query){
								echo "Updated successfully...";
								echo ("<meta http-equiv='refresh' content='1;URL=lecturer.php'");
							} else {
								echo "Failed!";
							}
						}
					?>

				</div>
					
			</div>
		</div>
		
	</body>

</html>