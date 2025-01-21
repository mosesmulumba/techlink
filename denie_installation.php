<?php
	include "start.php";

	include "connection/connection.php";

?>

<html>
	<head>
		<title> - Refute Instation </title>
		<link href="css/css.css" rel="stylesheet">
		<link href="image/logo/w.png" rel="shortcut icon" type="image/x-icon">

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
							<td onclick='location.href="staff_profile.php"'> Your Profile </td>
						</tr>
						<tr>
							<td onclick='location.href="old_requests.php"'> Old requests </td>
						</tr>
					</table>
				</div>

				<div class="body_content">

					<b> New requests </b>
					<hr>
					
					<?php
						$no = $_GET['no'];

						$sql_fetch_details = "SELECT * FROM tasks WHERE no='$no'";
						$query_fetch_details = $connection -> query($sql_fetch_details);
						while ($row_fetch_details = $query_fetch_details -> fetch_array()) {
							$softwaretype = $row_fetch_details['softwaretype'];
							$softwareversion = $row_fetch_details['softwareversion'];
						}
					?>

					<center>
						
						<br>
						
						<?php echo "<h3> Are you sure you haven't installed <b>".$softwaretype."</b> of version <b>".$softwareversion."</b> ? </h3>"; ?>

						<br>

						<form method="post">
							<input type="submit" name="cancel" value="Cancel">	
							<input type="submit" name="yes" value="Yes">	
						</form>

						<?php

							if (isset($_POST['cancel'])) {
								echo "Confirmation cancelled!";
								echo ("<meta http-equiv='refresh' content='0;URL=view_assignments.php'");
							}

							if (isset($_POST['yes'])) {

								$sql_confirm = "UPDATE tasks SET status='Not Installed' WHERE no='$no'";
								$query_confirm = $connection -> query($sql_confirm);

								if ($query_confirm) {
									echo "Successfully changed...";
									echo ("<meta http-equiv='refresh' content='0;URL=old_requests.php'");
								} else {
									echo "Failed..";
								}
							}

						?>

					</center>

				</div>
					
			</div>
		</div>

	</body>

</html>