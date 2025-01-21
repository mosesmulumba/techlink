<?php
	include "start.php";

	include "connection/connection.php";
?>

<html>
	<head>
		<title> - Reply Requisitions </title>
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
								<td> <a href="admin.php"> Admin </a> </td>
								<td> <a href="lecturer.php"> Users </a> </td>
							
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
							<td onclick='location.href="available_device.php"'> Available device </td>
						</tr>
					</table>
				</div>

				<div class="body_content">
					<center>

					<?php
						$id = $_GET['id'];

						$sql_request = "SELECT * FROM requests WHERE id='$id'";
						$query_request = $connection -> query($sql_request);
						while($row_request = $query_request -> fetch_array()){
							$lecturername = $row_request['lecturername'];
							$devicename = $row_request['devicename'];
							$roomnumber = $row_request['roomno'];
							$date = $row_request['requestdate'];
						}
					?>

					<h4> Reply to this request: </h4>

					<?php
						echo "<b>".$lecturername."</b> is requesting for the <b>".$devicename."</b> in room <b>".$roomnumber."</b> on <b>".$date."</b>";
					?>

					<br>
					<br>

					<form method="post">
						<table>
							<tr>
								<td> 
									<select name="status">
										<option> Available </option>
										<option> Unavailable </option>
									</select>
								</td>
							</tr>
							<tr>
								<td> <textarea name="admincomment" placeholder="Comment"></textarea> </td>
							</tr>
							<tr>
								<td> <input type="submit" name="reply" value="Reply"> </td>
							</tr>
						</table>
					</form>

					<?php
						if(isset($_POST['reply'])){

							$adminid = $_SESSION['id'];
						    $requestid=$_SESSION['id'];
							$adminfirstname = $_SESSION['firstname'];
							$admincomment = $_POST['admincomment'];
							
							$status = $_POST['status'];
							$date = date("Y-m-d");
					

							$sql_reply = "INSERT INTO replies (adminid, adminfirstname, devicename, status, repleydate, admincomment) VALUES ('$adminid','$adminfirstname','$devicename','$status','$date','$admincomment')";
							$query_reply = $connection -> query($sql_reply);

							if($query_reply){
								echo "Reply submited successfully...";
								echo ("<meta http-equiv='refresh' content='0;URL=requests.php");
							} else {
								echo "Failed. Please contact your system administrator...";
							}
						}
					?>

				</div>
					
			</div>
		</div>

	</body>

</html>