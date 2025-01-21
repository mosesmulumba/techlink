<?php
	include "start.php";

	include "connection/connection.php";

?>

<html>
	<head>
		<title> - Update Requests </title>
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
							<td onclick='location.href="requests2.php"'> Cancel </td>
						</tr>
					</table>
				</div>

				<div class="body_content">
					
					<center>

					<h4> Update Requests </h4>

					<?php
						$id = $_GET['id'];

						$sql = "SELECT * FROM requests WHERE id='$id'";
						$query = $connection -> query($sql);
						while($row = $query -> fetch_array()){
							$id = $row['id'];
							$department = $row['department'];
							$softwaretype = $row['softwaretype'];
							$softwareversion = $row['softwareversion'];
						}
					?>

					<form method="post">
						<table>
							<tr>
								<td> ID: </td>
								<td> <?php echo "<input type='text' name='id' value='".$id."'> </td>" ;?>
							</tr>
							<tr>
								<td> Department: </td>
								<td> <?php echo "<input type='text' name='department' value='".$department."'> </td>" ;?>
							</tr>
							<tr>
								<td> Software Type: </td>
								<td> <?php echo "<input type='text' name='softwaretype' value='".$softwaretype."'> </td>" ;?>
							</tr>
							<tr>
								<td> Software Version: </td>
								<td> <?php echo "<input type='text' name='softwareversion' value='".$softwareversion."'> </td>" ;?>
							</tr>
							<tr>
								<td></td>
								<td>
									<input type="submit" name="update_requests" value="Update">
									<input type="submit" name="cancel" value="Cancel"> 
								</td>
							</tr>
						</table>
					</form>

					<?php
						if(isset($_POST['cancel'])){
							echo "Cancelling...";
							echo ("<meta http-equiv='refresh' content='0;URL=requests2.php'");
						}


						if(isset($_POST['update_requests'])){
							$id = $_POST['id'];
							$department = $_POST['department'];
							$softwaretype = $_POST['softwaretype'];
							$softwareversion = $_POST['softwareversion'];

							$sql = "UPDATE requests SET id='$id', department='$department', softwaretype='$softwaretype', softwareversion='$softwareversion' WHERE id='$id'";
							$query = $connection -> query($sql);
							
							if($query){
								echo "Updated successfully...";
								echo ("<meta http-equiv='refresh' content='1;URL=requests2.php'");
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