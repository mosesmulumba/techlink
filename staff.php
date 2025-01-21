<?php
	include "start.php";

	include "connection/connection.php";

	$sql_staff = "SELECT * FROM staff";
	$query_staff = $connection -> query($sql_staff);

?>

<html>
	<head>
		<title> - staff </title>
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
								<td> <a href="requests3.php"> Requests </a> </td>
								<td> <a href="admin.php"> Admin </a> </td>
								<td> <a href="lecturer.php"> Lecturer </a> </td>
								<td> <a href="staff.php" class="current"> ICT-Staff </a> </td>
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
							<td onclick='location.href="admin_profile.php"'> Your Profile </td>
						</tr>
						<tr>
							<td onclick='location.href="register_staff.php"'> Add new ICT-Staff </td>
						</tr>
					</table>
				</div>

				<div class="body_content">
					
					<b> Registered ICT-Staff </b>
					<hr>		

					<table id="staff" class="display" width="100%" cellspacing="0">
						<thead>
							<td> </td>
							<td style='display:none;'> No </td>
							<td> ID </td>
							<td> First Name </td>
							<td> Last Name </td>
							<td> Email </td>
							<td> Contact </td>
							<td> Username </td>
							<td>  </td>
							<td>  </td>
						</thead>
						<?php
							while($row = $query_staff -> fetch_array()){
								echo "
									<tr>
										<td> </td>
										<td style='display:none;'>".$row['no']."</td>
										<td>".$row['id']."</td>
										<td>".$row['firstname']."</td>
										<td>".$row['lastname']."</td>
										<td>".$row['email']."</td>
										<td>".$row['contact']."</td>
										<td>".$row['username']."</td>
										<td align='center'> <a href=update_staff.php?no=".$row['no']."> Update </a> </td>
										<td align='center'> <a href=delete_staff.php?no=".$row['no']."> Delete </a> </td>


									</tr>
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