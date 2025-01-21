<?php
	include "start.php";

	include "connection/connection.php";

	
?>

<html>
	<head>
		<title> - Profile </title>
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
								<td> <a href="home_lecturer.php" class="current"> Home </a> </td>
								<td> <a href="requests2.php"> Requests </a> </td>
								<td> <a href="view_reply.php"> Reply </a> </td>
								
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
					
					<div class="profile_div">
						<?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?>
						<hr>

						<form method="post">
							<table>
								<tr>
									<td> <input type="submit" class="trigger_update" name="trigger_update" value="Update profile"> </td>
									<td> <input type="submit" class="update_username_password" name="update_username_password" value="Update username and password"> </td>
								</tr>
							</table>
						</form>

						<?php
							if(!isset($_POST['trigger_update'])){
						?>

						<table class="information_table">
							<tr>
								<td> ID: </td>
								<td> <?php echo "<b>".$_SESSION['id']."</b>" ;?> </td>
							</tr>
							<tr>
								<td> Firstname: </td>
								<td> <?php echo "<b>".$_SESSION['firstname']."</b>" ;?> </td>
							</tr>
							<tr>
								<td> Lastname: </td>
								<td> <?php echo "<b>".$_SESSION['lastname']."</b>" ;?> </td>
							</tr>
							<tr>
								<td> Faculty: </td>
								<td> <?php echo "<b>".$_SESSION['faculty']."</b>" ;?> </td>
							</tr>
							
							<tr>
								<td> Username: </td>
								<td> <?php echo "<b>".$_SESSION['username']."</b>" ;?> </td>
							</tr>
						</table>

						<?php

							} else {

						?>

							<style>
								.trigger_update, .update_username_password {
									display: none;
								}
							</style>

							<h4> Update profile </h4>

							<form method="post">
								<table>
									<tr>
										<td> ID: </td>
										<td> <?php echo "<input type='text' name='id' value='".$_SESSION['id']."'" ;?> </td>
									</tr>
									<tr>
										<td> Firstname: </td>
										<td> <?php echo "<input type='text' name='firstname' value='".$_SESSION['firstname']."'" ;?> </td>
									</tr>
									<tr>
										<td> Lastname: </td>
										<td> <?php echo "<input type='text' name='lastname' value='".$_SESSION['lastname']."'" ;?> </td>
									</tr>
									<tr>
										<td> Faculty: </td>
										<td> <?php echo "<input type='text' name='faculty' value='".$_SESSION['faculty']."'" ;?> </td>
									</tr>
									<tr>
										<td> Email: </td>
										<td> <?php echo "<input type='text' name='email' value='".$_SESSION['email']."'" ;?> </td>
									</tr>
									<tr>
										<td> Course: </td>
										<td> <?php echo "<input type='text' name='course' value='".$_SESSION['course']."'" ;?> </td>
									</tr>
									<tr>
										<td> Username: </td>
										<td> <?php echo "<input type='text' name='username' value='".$_SESSION['username']."'" ;?> </td>
									</tr>

									<tr>
										<td> </td>
										<td> 
											<input type="submit" name="update" value="Submit">
											<button onclick="window.location='lecturer_profile.php'"> Cancel </button>
										</td>
									</tr>
								</table>
							</form>

						<?php }

							if (isset($_POST['update'])) {

								$no = $_SESSION['no'];
								$id = $_POST['id'];
								$firstname = $_POST['firstname'];
								$lastname = $_POST['lastname'];
								$faculty = $_POST['faculty'];
								$email = $_POST['email'];
								$course = $_POST['course'];
								$username = $_POST['username'];

								$sql_update = "UPDATE lecturer SET id='$id', firstname='$firstname', lastname='$lastname', faculty='$faculty', email='$email', course='$course', username='$username' WHERE no='$no'";
								$query_update = $connection -> query($sql_update);

								if ($query_update) {
									echo "<style>
											.trigger_update, .update_username_password, .information_table {
												display: none;
											}
										</style>

									Updated successfully. Login again to see changes...";

									echo ("<meta http-equiv='refresh' content='2;URL=home_lecturer.php'");

								} else {
									echo "Operation failed...";
								}
							}


							if(isset($_POST['update_username_password'])){

						?>
							
							<style>
								.trigger_update, .update_username_password, .information_table {
									display: none;
								}
							</style>

							<h4> Update username and password </h4>

						<form method="post">
							<table>
								<tr>
									<td> Username: </td>
									<td> <?php echo "<input type='text' name='username' value='".$_SESSION['username']."'" ;?> </td>
								</tr>
								<tr>
									<td> Old Password: </td>
									<td> <input type="password" name="old_password"> </td>
								</tr>
								<tr>
									<td> New Password: </td>
									<td> <input type="password" name="new_password"> </td>
								</tr>
								<tr>
									<td> Repeat New Password: </td>
									<td> <input type="password" name="repeat_new_password"> </td>
								</tr>
								<tr>
									<td> </td>
									<td> 
										<input type="submit" name="update_password" value="Submit">
										<button onclick="window.location='lecturer_profile.php'"> Cancel </button>
									</td>
								</tr>
							</table>
						</form>

						<?php }

							if (isset($_POST['update_password'])) {
								$no = $_SESSION['no'];
								$username = $_POST['username'];
								$old_password = $_POST['old_password'];
								$session_password = $_SESSION['password'];
								$new_password = $_POST['new_password'];
								$repeat_new_password = $_POST['repeat_new_password'];

								if(empty($old_password) AND empty($new_password) AND empty($repeat_new_password)){

									$sql_update = "UPDATE lecturer SET username='$username' WHERE no='$no'";
									$query_update = $connection -> query($sql_update);

									if($query_update){
										echo "<style>
											.trigger_update, .update_username_password, .information_table {
												display: none;
											}
										</style>

										Your username has been updated successfully. Login again to see changes...";

										echo ("<meta http-equiv='refresh' content='4;URL=logout.php'");

									} else {
										echo "Operation failed...";
									}

								} elseif ($old_password != $session_password){
									echo "<style>
											.trigger_update, .update_username_password, .information_table {
												display: none;
											}
										</style>

										The password you entered does not match your old password. Please try again. Wait...";

										echo ("<meta http-equiv='refresh' content='4;URL=lecturer_profile.php'");

								} elseif ($new_password != $repeat_new_password){
									echo "<style>
											.trigger_update, .update_username_password, .information_table {
												display: none;
											}
										</style>

										Please repeat your new password correctly. Wait...";

										echo ("<meta http-equiv='refresh' content='4;URL=lecturer_profile.php'");

								} elseif ($new_password == $session_password){
									echo "<style>
											.trigger_update, .update_username_password, .information_table {
												display: none;
											}
										</style>

										Please, make sure your new password is different from your old password. Wait...";

										echo ("<meta http-equiv='refresh' content='4;URL=lecturer_profile.php'");

								} else {

									$sql_update = "UPDATE lecturer SET username='$username', password='$new_password' WHERE no='$no'";
									$query_update = $connection -> query($sql_update);

									if($query_update){
										echo "<style>
											.trigger_update, .update_username_password, .information_table {
												display: none;
											}
										</style>

										Updated successfully. Login again to see changes...";

										echo ("<meta http-equiv='refresh' content='2;URL=logout.php'");

									} else {
										echo "Operation failed...";
									}
								}
							}

						?>

					</div>

				</div>
					
			</div>
		</div>

		
	</body>

</html>