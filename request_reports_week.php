d<?php
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

					<b> View requests according to weeks </b>
					<hr>
					
					<div class="data">

						<?php
							$sql_department = "SELECT * FROM department";
							$query_department = $connection -> query($sql_department);
						?>

						<form method="POST">

							Between:
							<input type="date" class="search_input" name="startdate" class="search_input">

							And
							<input type="date" class="search_input" name="enddate" class="search_input">

							<input type="submit" class="report_button" name="search" value="Search">

						</form>


					<?php

						if (isset($_POST['search'])) {

							$startdate = $_POST['startdate'];
							$enddate = $_POST['enddate'];

						?>


					<table id="requests" class="display" width="100%" cellspacing="0">
						<thead>
							<td> </td>
							<td style="display: none;"> ID </td>
							<td> Lecturer Name </td>
							<td> Department </td>
							<td> Software Type </td>
							<td> Software Version </td>
							<td> Request Date </td>
							<td>  </td>
							
						</thead>


						<?php

							$sql_request_date = "SELECT * FROM requests WHERE requestdate BETWEEN '$startdate' AND '$enddate'";

	  						$query_request_date = $connection -> query($sql_request_date);
							
							while ($row = $query_request_date -> fetch_array()) {

	  							echo "
									<tr>
										<td> </td>
										<td style='display: none;'>".$row['id']."</td>
										<td>".$row['lecturername']."</td>
										<td>".$row['department']."</td>
										<td>".$row['softwaretype']."</td>
										<td>".$row['softwareversion']."</td>
										<td>".$row['requestdate']."</td>
										<td> </td>
									</tr>
								";

	  							//$startdate = strtotime("+1 Day", $startdate);

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
            var t = $('#requests').DataTable( {
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