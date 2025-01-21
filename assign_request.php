<?php
	include "start.php";

	include "connection/connection.php";

	$sql_admin = "SELECT * FROM admin";
	$query_admin = $connection -> query($sql_admin);

?>

<html>
	<head>
		<title> - Admin Assign </title>
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
								<td> <a href="requests.php" class="current"> Requests </a> </td>
								<td> <a href="admin.php"> Home </a> </td>
								<td> <a href="lecturer.php"> Lecturer </a> </td>
								<td> <a href="staff.php"> ICT-Staff </a> </td>
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
							<td onclick='location.href="admin_profile.php"'> Your Profile </td>
						</tr>
						
					</table>
				</div>

				<div class="body_content">
				<center>

					<?php
						$id = $_GET['id'];

						$sql_tasks = "SELECT * FROM requests WHERE id='$id'";
						$query_tasks = $connection -> query($sql_tasks);
						while($row_tasks = $query_tasks -> fetch_array()){
							$lecturername = $row_tasks['lecturername'];
							$softwaretype = $row_tasks['devicetype'];
							$softwareversion = $row_tasks['deviceversion'];
							$lecturercomment = $row_tasks['lecturercomment'];
						}

						$sql_staff = "SELECT * FROM staff";
						$query_staff = $connection -> query($sql_staff);

					?>

					<h4> Assign task to: </h4>

					
					<form method="post">
						<table>
							<tr>
								<td> 
									<select name="ICTstaffname">
										<?php 
											while($row_staff = $query_staff -> fetch_array()){
												echo "<option>".$row_staff['firstname']." ".$row_staff['lastname']."</option>";
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td> <textarea name="admincomment" placeholder="Comment"></textarea> </td>
							</tr>
							<tr>
								<td> <input type="submit" name="assign" value="Assign"> </td>
							</tr>
						</table>
					</form>

					<?php
						if(isset($_POST['assign'])){

							$adminid = $_SESSION['id'];
							$adminfirstname = $_SESSION['firstname']." ".$_SESSION['lastname'];
							$admincomment = $_POST['admincomment'];
							$ICTstaffname = $_POST['ICTstaffname'];
							$taskdate = date("Y-m-d");
							$status = 'Not Installed';

							$sql_tasks = "INSERT INTO tasks (adminid, adminfirstname, lecturername, lecturercomment, ICTstaffname, devicetype, deviceversion, taskdate, admincomment, status) VALUES ('$adminid','$adminfirstname','$lecturername','$lecturercomment','$ICTstaffname','$softwaretype','$softwareversion','$taskdate','$admincomment','$status')";
							$query_tasks = $connection -> query($sql_tasks);

							if($query_tasks){
								echo "Task submited successfully...";
								echo ("<meta http-equiv='refresh' content='1;URL=admin.php");
							} else {
								echo "Failed. Please try again...";
							}
						}
					?>

				</div>
					
			</div>
		</div>
		
	</body>

</html>