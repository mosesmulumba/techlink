<?php
	include "start.php";

	include "connection/connection.php";

?>

<html>
	<head>
		<title> - Delete ADMIN </title>
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
								<td> <a href="admin.php" class="current"> Admin </a> </td>
								<td> <a href="lecturer.php"> Lecturers </a> </td>
								<td> <a href="staff.php"> ICT-Staff </a> </td>
								<td> <a href="student.php"> Student </a> </td>
								<td> <a href="logout.php"> Logout </a> </td>
						</table>
					</div>
				</div>
			</div>

			<div class="page_ody">

				<div class="second_menu">
					<table>
						<tr>
							<td onclick='location.href="admin.php"'> Cancel </td>
						</tr>
					</table>
				</div>

				<div class="body_content">
					
					<center>

					<h4> Delete ADMIN </h4>

					<?php
						$no = $_GET['no'];

						$sql = "SELECT * FROM admin WHERE no='$no'";
						$query = $connection -> query($sql);
						while($row = $query -> fetch_array()){
							$no = $row['no'];
							$id = $row['id'];
							$firstname = $row['firstname'];
							$lastname = $row['lastname'];
							$username = $row['username'];

						}

						echo "Are you sure you want to delete <b>".$firstname."</b> Admin?";
					?>

					<form method="post">
						<table>
							<tr>
								<td>
									<input type="submit" name="yes" value="Yes">
									<input type="submit" name="no" value="No"> 
								</td>
							</tr>
						</table>
					</form>

					<?php
						if(isset($_POST['no'])){
							echo "Cancelling...";
							echo ("<meta http-equiv='refresh' content='1;URL=admin.php'");
						}


						if(isset($_POST['yes'])){

							$sql = "DELETE FROM admin WHERE no = '$no'";
							$query = $connection -> query($sql);
							
							if($query){
								echo "Delete successfully...";
								echo ("<meta http-equiv='refresh' content='1;URL=admin.php'");
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