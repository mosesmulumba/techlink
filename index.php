<?php
	include "connection/connection.php";
?>

<html>
	<head>
		<title> - Login </title>
		<link href="css/css.css" rel="stylesheet">
		<link href="image/logo/w.png" rel="shortcut icon" type="image/x-icon"><br>
	</head>
		
	<body>
	<div class="main_container">

			<header>
	<div class="container">
		<div class="system_name">
			 <center>UGANDA MARTYRS UNIVERSITY</center>
		</div>
	</div>
</header>
			<div class="main_menue">
				<div class="container">
				<font size="3" color="yellow"> <center>ICT DEPARTIMENT</font><br></center>
				</div>
			</div>
		<div class="main_container">
		<center>
			<div class="login_container">
				<div class="login_header">
					<div class="system_name_div">
					   <center><font size="3" color="yellow"> UMU ICT DEVICES</font><br>
	<font size="3" color="yellow"> MONITORING AND DISTRIBUTION MANAGIMENT SYSTEM</font><br>
						           
					</div>
				</div><br>
<img src="image/logo/w.png"/ class="logo">
				<div class="login_form_div">


					<h3> User-Login </h3>

					<form method="post">
						<table>
							<tr>
								<td> <input type="text" class="login_input" name="username" placeholder="Username" tabindex="1" required> </td>
							</tr>
							<script>
								document.querySelector('[tabindex="1"]').focus()
							</script>
							<tr>
								<td> <input type="password" class="login_input" name="password" placeholder="Password" tabindex="2" required> </td>
							</tr>
						</table>

						<table>
							<tr>
								<td> <input type="submit" class="login_button" name="login" value="Login" tabindex="3"> </td>
							</tr>
						</table>
					</form>


					<?php
						if(isset($_POST['login'])){
							$username = trim($_POST['username']);
							$password = trim($_POST['password']);

							$sql = "SELECT * FROM admin WHERE username = '$username' AND password='$password'";
							$query = $connection -> query($sql);
							$result = mysqli_num_rows($query);

							if($result == true){

								while($row = $query -> fetch_array()) {
									$no = $row['no'];
									$id = $row['id'];
									$firstname = $row['firstname'];
									$lastname = $row['lastname'];
									$faculty = $row['faculty'];
									$username = $row['username'];
									$password = $row['password'];
								}

								session_start();

								$_SESSION['no'] = $no;
								$_SESSION['id'] = $id;
								$_SESSION['firstname'] = $firstname;
								$_SESSION['lastname'] = $lastname;
								$_SESSION['faculty'] = $faculty;
								$_SESSION['username'] = $username;
								$_SESSION['password'] = $password;

								header ("location: admin.php");
								

							} else {

								$sql_lecturer = "SELECT * FROM lecturer WHERE username = '$username' AND password='$password'";
								$query_lecturer = $connection -> query($sql_lecturer);
								$result_lecturer = mysqli_num_rows($query_lecturer);

								if($result_lecturer == true){

									while($row = $query_lecturer -> fetch_array()) {
										$no = $row['no'];
										$id = $row['id'];
										$firstname = $row['firstname'];
										$lastname = $row['lastname'];
										$faculty = $row['faculty'];
										$email = $row['email'];
										$course = $row['course'];
										$username = $row['username'];
										$password = $row['password'];
									}

									session_start();

									$_SESSION['no'] = $no;
									$_SESSION['id'] = $id;
									$_SESSION['firstname'] = $firstname;
									$_SESSION['lastname'] = $lastname;
									$_SESSION['faculty'] = $faculty;
									$_SESSION['email'] = $email;
									$_SESSION['course'] = $course;
									$_SESSION['username'] = $username;
									$_SESSION['password'] = $password;

									header ("location: home_lecturer.php");

								} else {

									$sql_staff = "SELECT * FROM staff WHERE username = '$username' AND password='$password'";
									$query_staff = $connection -> query($sql_staff);
									$result_staff = mysqli_num_rows($query_staff);

									if($result_staff == true){

										while($row = $query_staff -> fetch_array()) {
											$no = $row['no'];
											$id = $row['id'];
											$firstname = $row['firstname'];
											$lastname = $row['lastname'];
											$email = $row['email'];
											$contact = $row['contact'];
											$username = $row['username'];
											$password = $row['password'];
										}

										session_start();

										$_SESSION['no'] = $no;
										$_SESSION['id'] = $id;
										$_SESSION['firstname'] = $firstname;
										$_SESSION['lastname'] = $lastname;
										$_SESSION['email'] = $email;
										$_SESSION['contact'] = $contact;
										$_SESSION['username'] = $username;
										$_SESSION['password'] = $password;

										header ("location: home_staff.php");
										
									} else {

									$sql_student = "SELECT * FROM student WHERE username = '$username' AND password='$password'";
									$query_student = $connection -> query($sql_student);
									$result_student = mysqli_num_rows($query_student);

									if($result_student == true){

										while($row = $query_student -> fetch_array()) {
											$no = $row['no'];
											$id = $row['id'];
											$firstname = $row['firstname'];
											$lastname = $row['lastname'];
											$email = $row['email'];
											$regno = $row['regno'];
											$faculty = $row['faculty'];
											$course = $row['course'];
											$username = $row['username'];
											$password = $row['password'];
										}

										session_start();

										$_SESSION['no'] = $no;
										$_SESSION['id'] = $id;
										$_SESSION['firstname'] = $firstname;
										$_SESSION['lastname'] = $lastname;
										$_SESSION['email'] = $email;
										$_SESSION['regno'] = $regno;
										$_SESSION['faculty'] = $faculty;
										$_SESSION['course'] = $course;
										$_SESSION['username'] = $username;
										$_SESSION['password'] = $password;

										header ("location: home_student.php");
										
									} else {
										echo "Wrong username or password.... try again..";
									}
								}
							}
						}
						}
					?>

				</div>
			</div>

			<div class="copy_right_div">
				<?php
					echo "&copy ".date('d/m/y');
				?>
			</div>

		</center>
		</div>
		
	</body>

</html>