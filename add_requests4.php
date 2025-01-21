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
							<td> <a href="home_lecturer.php" class="current"> Home </a> </td>
								<td> <a href="requests2.php"> Requests </a> </td>
								<td> <a href="view_reply.php">View Reply </a> </td>	
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
							<td onclick='location.href="requests2.php"'> Cancel/Back </td>
						</tr>
					</table>
				</div>

				<div class="body_content">
					
					<center>

					<h4> FILL THE FORM TO REQUEST FOR A DEVICE </h4>

					<form method="post">
						<table>
						<tr>
								<td>User Name: </td>
								<td> <input type="text" name="lecturername" required> </td>
							</tr>
							<tr>
								<td> Faculty: </td>
								<td> <input type="text" name="department" required> </td>
							</tr>
							<tr>
								<td> Course Unit: </td>
								<td> <input type="text" name="courseunit" required> </td>
							</tr>
						
							<tr>
								<td> Device Name: </td>
								<td> <input type="text" name="devicename" required> </td>
							</tr>
						
							<tr>
								<td>Room Number: </td>
								<td> <input type="text" name="roomno" required> </td>
							</tr>
							<tr>
								<td>Requestdate: </td>
								<td> <input type="text" name="requestdate" required> </td>
							</tr>
							<tr>
								<td> Comment: </td>
								<td><textarea name="leccoment"></textarea> </td>
							</tr>
							<tr>
								<td> </td>
								<td> 
									<input type="submit" name="add_request" value="SUBMIT">
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
							
							$lecturername = $_POST['lecturername'];
							$department = $_POST['department'];
							$courseunit = $_POST['courseunit'];
							$devicename = $_POST['devicename'];
							$roomnumber = $_POST['roomno'];
							$requestdate=$_POST['requestdate'];
							$comment = $_POST['leccoment'];

							
							$sql = "INSERT INTO requests (lecturername, department, course, devicename, roomno,requestdate,leccoment) VALUES ('$lecturername', '$department', '$courseunit','$devicename','$roomnumber','$requestdate','$comment')";
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