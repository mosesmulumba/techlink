<?php
	include "start.php";

	include "connection/connection.php";

	$sql_requests = "SELECT * FROM requests";
	$query_requests = $connection -> query($sql_requests);

?>

<html>
	<head>
		<title> - requests </title>
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
								<td> <a href="admin.php"> Home </a> </td>
								<td> <a href="requests3.php" class="current"> Requests </a> </td>
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
							<td onclick='location.href="add_requests4.php"'>Add_Request</td>
						</tr>
						<tr>
						<td onclick='location.href="available_deviceAdmin.php"'>View Available Devices </td>
						</tr>
						<tr>
							<td onclick='location.href="help.php"'> Email</td>
						</tr>
					</table>
				</div>

				<div class="body_content">

					<b> Available requests</b>
					<hr>
					
					<table id="requests" class="display" width="100%" cellspacing="0">
						<thead>
							<td> </td>
							<td style='display:none;'> No </td>
							<td> ID </td>
							<td> User Name </td>
							<td> Department </td>
							<td> Courseunit</td>
							<td> Devicename</td>
							<td> RoomNumber </td>
							<td> Request Date </td>
							<td> User Comment</td>
						</thead>
						<?php
							while($row = $query_requests -> fetch_array()){
								echo "
									<tr>
										<td> </td>
										<td style='display:none;'>".$row['id']."</td>
										<td>".$row['id']."</td>
										<td>".$row['lecturername']."</td>
										<td>".$row['department']."</td>
										<td>".$row['softwaretype']."</td>
										<td>".$row['softwareversion']."</td>
										<td>".$row['requestdate']."</td>
										<td>".$row['lecturercomment']."</td>
										
										<td align='center'> <a href=reply_requests.php?id=".$row['id']."> Reply </a> </td>
										<td align='center'> <a href=delete_requests.php?id=".$row['id']."> Delete </a> </td>
										
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