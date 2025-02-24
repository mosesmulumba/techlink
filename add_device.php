<?php
	include "start.php";

	include "connection/connection.php";

?>

<html>
	<head>
		<title> - Add New Device </title>
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

					<h4> Add New Device </h4>

					<form method="post">
						<table>
							<tr>
								<td> ID: </td>
								<td> <input type="text" name="DID" required> </td>
							</tr>
							<tr>
								<td>DEVICE NUMBER: </td>
								<td> <input type="text" name="D_NO" required> </td>
							</tr>
							<tr>
								<td> DEVICE NAME: </td>
								<td> <input type="text" name="D_NAME" required> </td>
							</tr>
							<tr>
								<td>DEVICE TYPE: </td>
								<td> <input type="text" name="D_TYPE" required> </td>
							</tr>
							<tr>
								<td>UMU NUMBER: </td>
								<td> <input type="text" name="UMU_NO" required> </td>
							</tr>
							<tr>
								<td> </td>
								<td> 
									<input type="submit" name="add_device" value="Add">
								</td>
							</tr>
						</table>
					</form>

					<?php
						if(isset($_POST['cancel'])){
							echo "Cancelling...";
							echo ("<meta http-equiv='refresh' content='0;URL=old_requests.php'");
						}

						if(isset($_POST['add_device'])){
							$id = $_POST['DID'];
							$d_no = $_POST['D_NO'];
							$d_name= $_POST['D_NAME'];
							$d_type = $_POST['D_TYPE'];
							$umu_no = $_POST['UMU_NO'];
							$sql_check = "SELECT * FROM devices WHERE id='$id'";
							$query_check = $connection -> query($sql_check);
							$num_rows = mysqli_num_rows($query_check);

							if($num_rows == true){
								echo "Sorry, device already exist!";
							} else {
								$sql = "INSERT INTO devices (DID, D_NO,D_NAME,D_TYPE,UMU_NO) VALUES ('$id', '$d_no', '$d_name', '$d_type','$umu_no')";
								$query = $connection -> query($sql);

								if($query){
									echo "device successfully added!";
									echo ("<meta http-equiv='refresh' content='0;URL=available_device.php'");
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