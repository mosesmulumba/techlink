<?php
	include "start.php";

	include "connection/connection.php";
	
?>


<html>
	<head>
		<title> - Reports </title>
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
							<td onclick='location.href="request_reports.php"'> According to day </td>
						</tr>
						<tr>
							<td onclick='location.href="request_reports_week.php"'> According to week </td>
						</tr>
						<tr>
							<td onclick='location.href="request_reports_installed.php"'> Successfully installed </td>
						</tr>
						<tr>
							<td onclick='location.href="request_reports_not_installed.php"'> Not installed yet </td>
						</tr>
					</table>
				</div>

				<div class="body_content">

					<b> View requests according to days </b>
					<hr>
					
					<div class="data">

						<?php
							$sql_department = "SELECT * FROM department";
							$query_department = $connection -> query($sql_department);
						?>

						<form method="POST">

							<select name="department" class="search_input">
								<?php
									echo "<option> Select department </option>";
									while ($row_department = $query_department -> fetch_array()) {
										echo "<option>".$row_department['department_name']."";
									}
								?>
							</select>

							<input type="date" class="search_input" name="requestdate">

							<input type="submit" class="report_button" name="search" value="Search">

						</form>


					<?php
						if (isset($_POST['search'])) {
							$department = $_POST['department'];
							$requestdate = $_POST['requestdate'];

							$sql_search = "SELECT * FROM requests WHERE department='$department' AND requestdate='$requestdate'";
							$query_search = $connection -> query($sql_search);
							$num_rows_search = mysqli_num_rows($query_search);

							if(empty($requestdate)){
								echo "Please choose a date...";
							} else {

								if($num_rows_search == true){

									if($query_search){

									?>
										
										<table id='staff' class='display' width='100%'' cellspacing='0'>
											<thead>
												<td> </td>
												<td> Lecturer name </td>
												<td> Department </td>
												<td> Device type </td>
												<td> Device version </td>
												<td> Date </td>
											</thead>
										
									<?php

										while($row = $query_search -> fetch_array()){

									?>
											<tr>
												<td> </td>
												<td><?php echo $row['lecturername'];?></td>
												<td><?php echo $row['department'];?></td>
												<td><?php echo $row['softwaretype'];?></td>
												<td><?php echo $row['softwareversion'];?></td>
												<td><?php echo $row['requestdate'];?></td>
											</tr>
											
									<?php

											}

										}

									} else {
										echo "Sorry, there was no requestion on this date..";
									}
								}
							}
						?>


						</table>
					
					</div>
					
				</div>
					
			</div>
		</div>


		<script type="text/javascript" src="datatables/jQuery-3.2.1/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="datatables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>


 <!-- Script that helps display the ordered numbering of the table -->
        <script type="text/javascript">
            var t = $('#staff').DataTable( {
        	"columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
		        } ],
		        "order": [[ 1, 'asc' ]]
		    } );
		 
		    t.on( 'order.dt search.dt', function () {
		        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
		            cell.innerHTML = i+1;
		        } );
		    } ).draw();
        </script>



	</body>

</html>