<?php
	include "start.php";

	include "connection/connection.php";
?>

<html>
	<head>
		<title> - Add Requests </title>
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
								<td> <a href="home_lecturer.php"> Home </a> </td>
								<td> <a href="requests2.php"  class="current"> Requests </a> </td>
								<td> <a href="view_reply.php"> Reply </a> </td>
								<td> <a href="student2.php"> Student </a> </td>
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
							<td onclick='location.href="home_lecturer.php"'> Cancel </td>
						</tr>
					</table>
				</div>

				<div class="body_content">
					
					<center>

					<h4> Add Request </h4>

					<?php
						$sql_department = "SELECT * FROM department";
						$query_department = $connection -> query($sql_department);
					?>

					<form method="post">
						<table>
							<tr>
								<td> Department: </td>
								<td>
									<select name="department">
										<?php
											echo "<option> Select department </option>";
											while ($row_department = $query_department -> fetch_array()) {
												echo "<option>".$row_department['department_name']."";
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td> Software Type: </td>
								<td> <input type="text" name="softwaretype" required> </td>
							</tr>
							<tr>
								<td> Software Version: </td>
								<td> <input type="text" name="softwareversion" required> </td>
							</tr>
							<tr>
								<td> Comment: </td>
								<td> <textarea name="lecturercomment"></textarea> </td>
							</tr>
							<tr>
								<td> Date: </td>
								<td> <input type="date" name="date" required> </td>
							</tr>
							<tr>
								<td> </td>
								<td> 
									<input type="submit" name="add_request" value="Add">
								</td>
							</tr>
						</table>
					</form>

					<?php
						if(isset($_POST['cancel'])){
							echo "Cancelling...";
							echo ("<meta http-equiv='refresh' content='0;URL=requests.php'");
						}

						if(isset($_POST['add_request'])){
							
							$lecturername = $_SESSION['firstname']." ".$_SESSION['lastname'];
							$department = $_POST['department'];
							$softwaretype = $_POST['softwaretype'];
							$softwareversion = $_POST['softwareversion'];
							//$requestdate = date("Y-m-d");
							$requestdate = $_POST['date'];
							$lecturercomment = $_POST['lecturercomment'];

							
							$sql = "INSERT INTO requests (lecturername, department, softwaretype, softwareversion, requestdate, lecturercomment) VALUES ('$lecturername', '$department','$softwaretype','$softwareversion','$requestdate','$lecturercomment')";
							$query = $connection -> query($sql);

							if($query){
								echo "Successfully added!";
								echo ("<meta http-equiv='refresh' content='1'");
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