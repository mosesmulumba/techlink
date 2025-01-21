<?php
	include "start.php";

	include "connection/connection.php";

?>

<html>
	<head>
		<title> - Delete REPLY </title>
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
								<td> <a href="view_reply.php"> Reply </a> </td>
								<td> <a href="student2.php"> Student </a> </td>
								<td> <a href="logout.php"> Logout </a> </td>
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

					<h4> Delete REPLY </h4>

					<?php
						$id = $_GET['id'];

						$sql = "SELECT * FROM replies WHERE id='$id'";
						$query = $connection -> query($sql);
						while($row = $query -> fetch_array()){
							$id = $row['id'];
							$adminid = $row['adminid'];
							$adminfirstname = $row['adminfirstname'];
							$lecturername = $row['lecturername'];
							$softwaretype = $row['softwaretype'];
							$softwareversion = $row['softwareversion'];
							$status = $row['status'];
							$repleydate = $row['repleydate'];
							$admincomment = $row['admincomment'];

						}

						echo "Are you sure you want to delete <b>".$id."</b> reply?";
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
							echo ("<meta http-equiv='refresh' content='1;URL=view_reply.php'");
						}


						if(isset($_POST['yes'])){

							$sql = "DELETE FROM replies WHERE id = '$id'";
							$query = $connection -> query($sql);
							
							if($query){
								echo "Delete successfully...";
								echo ("<meta http-equiv='refresh' content='1;URL=view_reply.php'");
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