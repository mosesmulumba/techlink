<?php
	include "start.php";

	include "connection/connection.php";

?>

<html>
	<head>
		<title> - Delete Requests </title>
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
								<td> <a href="admin.php"> Home </a> </td>
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
							<td onclick='location.href="requests.php"'> Cancel </td>
						</tr>
					</table>
				</div>

				<div class="body_content">
					
					<center>

					<h4> Delete Requests </h4>

					<?php
						$id = $_GET['id'];

						$sql = "SELECT * FROM requests WHERE id='$id'";
						$query = $connection -> query($sql);
						while($row = $query -> fetch_array()){
							$id = $row['id'];
							$lecturername = $row['lecturername'];
							$department = $row['department'];
							$course = $row['course'];
							$devicename = $row['devicename'];
							$roomno = $row['roomno'];
							$requestdate = $row['requestdate'];
							$leccoment = $row['leccoment'];
						}

						echo "Are you sure you want to delete <b>".$devicename."</b> Requests?";
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
							echo ("<meta http-equiv='refresh' content='0;URL=requests3.php'");
						}


						if(isset($_POST['yes'])){

							$sql = "DELETE FROM requests WHERE id = '$id'";
							$query = $connection -> query($sql);
							
							if($query){
								echo "Delete successfully...";
								echo ("<meta http-equiv='refresh' content='1;URL=requests3.php'");
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