<?php
	include "start.php";

	include "connection/connection.php";

	$ICTstaffname = $_SESSION['firstname']." ".$_SESSION['lastname'];

	$sql_tasks = "SELECT * FROM tasks WHERE ICTstaffname='$ICTstaffname' AND status='Not Installed'";
	$query_tasks = $connection -> query($sql_tasks);

?>

<html>
	<head>
		<title> - Tasks </title>
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
						<tr>
							<td onclick='location.href="requests.php"'> reply request </td>
						</tr>
					</table>
				</div>

				<div class="body_content">

					<b> New requests </b>
					<hr>
					
					<table id="tasks" class="display" width="100%" cellspacing="0">
						<thead>
							<td> </td>
							<td style='display:none;'> No </td>
							<td> AdminID </td>
							<td> Admin Name </td>
							<td> Lecturer Name </td>
							<td> ICT Staff Name </td>
							<td> Software Type </td>
							<td> Software Version </td>
							<td> Task Date </td>
							<td> Admin Comment </td>
							<td> Status </td>
							<td>  </td>
							<td>  </td>
						</thead>
						<?php
							while($row = $query_tasks -> fetch_array()){
								echo "
									<tr>
										<td> </td>
										<td style='display:none;'>".$row['no']."</td>
										<td>".$row['adminid']."</td>
										<td>".$row['adminfirstname']."</td>
										<td>".$row['lecturername']."</td>
										<td>".$row['ICTstaffname']."</td>
										<td>".$row['softwaretype']."</td>
										<td>".$row['softwareversion']."</td>
										<td>".$row['taskdate']."</td>
										<td>".$row['admincomment']."</td>
										<td>".$row['status']."</td>
										<td align='center'><a href=confirm_installation.php?no=".$row['no']."> Confirm </td>
										<td align='center'><a href=delete_task.php?no=".$row['no']."> Delete </td>

									";
							}
						?>
					</table>

				</div>
					
			</div>
		</div>

		<script type="text/javascript" src="datatables/jQuery-3.2.1/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="datatables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>


 <!-- Script that helps display the ordered numbering of the table -->
        <script type="text/javascript">
            var t = $('#tasks').DataTable( {
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