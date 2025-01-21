<?php
	include "start.php";

	include "connection/connection.php";

?>

<html>
	<head>
		<title> - Delete ICT-Staff Task </title>
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
								<td> <a href="view_assignments.php"  class="current"> Tasks </a> </td>
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
							<td onclick='location.href="home_staff.php"'> Cancel </td>
						</tr>
					</table>
				</div>

				<div class="body_content">
					
					<center>

					<h4> Delete ICT-Staff TASK </h4>

					<?php
						$no = $_GET['no'];

						$sql = "SELECT * FROM tasks WHERE no='$no'";
						$query = $connection -> query($sql);
						while($row = $query -> fetch_array()){
							$no = $row['no'];
							$adminid = $row['adminid'];
							$adminfirstname = $row['adminfirstname'];
							$lecturername = $row['lecturername'];
							$lecturercomment = $row['lecturercomment'];
							$ICTstaffname = $row['ICTstaffname'];
							$softwaretype = $row['softwaretype'];
							$softwareversion = $row['softwareversion'];
							$taskdate = $row['taskdate'];
							$admincomment = $row['admincomment'];

						}

						echo "Are you sure you want to delete <b>".$no."</b> TASK?";
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
							echo ("<meta http-equiv='refresh' content='1;URL=home_staff.php'");
						}


						if(isset($_POST['yes'])){

							$sql = "DELETE FROM tasks WHERE no = '$no'";
							$query = $connection -> query($sql);
							
							if($query){
								echo "Delete successfully...";
								echo ("<meta http-equiv='refresh' content='1;URL=old_requests.php'");
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