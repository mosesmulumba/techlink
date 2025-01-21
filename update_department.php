<?php
	include "start.php";

	include "connection/connection.php";

?>

<html>
	<head>
		<title> - Update Faculty </title>
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
								<td> <a href="department.php" class="current"> Faculties</a> </td>
								<td> <a href="requests.php"> Requests </a> </td>
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
							<td onclick='location.href="department.php"'> Cancel </td>
						</tr>
					</table>
				</div>

				<div class="body_content">
					
					<center>

					<h4> Update Faculty </h4>

					<?php
						$no = $_GET['no'];

						$sql = "SELECT * FROM department WHERE no='$no'";
						$query = $connection -> query($sql);
						while($row = $query -> fetch_array()){
							$id = $row['id'];
							$department_name = $row['department_name'];
						}
					?>

					<form method="post">
						<table>
							<tr>
								<td> Faculty ID: </td>
								<td> <?php echo "<input type='text' name='department_id' value='".$id."'> </td>" ;?>
							</tr>
							<tr>
								<td> Faculty Name: </td>
								<td> <?php echo "<input type='text' name='department_name' value='".$department_name."'> </td>" ;?>
							</tr>
							<tr>
								<td></td>
								<td>
									<input type="submit" name="update_department" value="Update">
									<input type="submit" name="cancel" value="Cancel"> 
								</td>
							</tr>
						</table>
					</form>

					<?php
						if(isset($_POST['cancel'])){
							echo "Cancelling...";
							echo ("<meta http-equiv='refresh' content='0;URL=department.php'");
						}


						if(isset($_POST['update_department'])){
							$id = $_POST['department_id'];
							$department_name = $_POST['department_name'];

							$sql = "UPDATE department SET id='$id', department_name='$department_name' WHERE no='$no'";
							$query = $connection -> query($sql);
							
							if($query){
								echo "Updated successfully...";
								echo ("<meta http-equiv='refresh' content='0;URL=department.php'");
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