<?php
	include "start.php";

	include "connection/connection.php";

?>

<html>
	<head>
		<title> - Add Software </title>
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
								<td> <a href="home_staff.php"> Home </a> </td>
								<td> <a href="view_assignments.php"> Tasks </a> </td>
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
							<td onclick='location.href="old_requests.php"'> Cancel </td>
						</tr>
					</table>
				</div>

				<div class="body_content">
					
					<center>

					<h4> Add Software </h4>

					<form method="post">
						<table>
							<tr>
								<td> ID: </td>
								<td> <input type="text" name="id" required> </td>
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
								<td> Status: </td>
								<td> <input type="text" name="status" required> </td>
							</tr>
							<tr>
								<td> </td>
								<td> 
									<input type="submit" name="add_software" value="Add">
								</td>
							</tr>
						</table>
					</form>

					<?php
						if(isset($_POST['cancel'])){
							echo "Cancelling...";
							echo ("<meta http-equiv='refresh' content='0;URL=old_requests.php'");
						}

						if(isset($_POST['add_software'])){
							$id = $_POST['id'];
							$softwaretype = $_POST['softwaretype'];
							$softwareversion = $_POST['softwareversion'];
							$status = $_POST['status'];
							$sql_check = "SELECT * FROM software WHERE id='$id'";
							$query_check = $connection -> query($sql_check);
							$num_rows = mysqli_num_rows($query_check);

							if($num_rows == true){
								echo "Sorry, Software already exist!";
							} else {
								$sql = "INSERT INTO software (id, softwaretype, softwareversion, status) VALUES ('$id', '$softwaretype', '$softwareversion', '$status')";
								$query = $connection -> query($sql);

								if($query){
									echo "Software successfully added!";
									echo ("<meta http-equiv='refresh' content='0;URL=available_software4.php'");
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