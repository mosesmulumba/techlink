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
								<td> <a href="home_lecturer.php"> Home </a> </td>
								<td> <a href="requests2.php" class="current"> Requests </a> </td>
								<td> <a href="lecturer2.php"> Lecturer </a> </td>
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
							<td onclick='location.href="available_software2.php"'> Available Software </td>
						</tr>
					</table>
				</div>

				<div class="body_content">
					
					<table id="requests" class="display" width="100%" cellspacing="0">
						<thead>
							<td> </td>
							<td style='display:none;'> No </td>
							<td> ID </td>
							<td> Lecturer Name </td>
							<td> Department </td>
							<td> Course Unit </td>
							<td> Software Type </td>
							<td> Software Version </td>
							<td> Request Date </td>
							<td>  </td>
							<td>  </td>
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
										<td>".$row['courseunit']."</td>
										<td>".$row['softwaretype']."</td>
										<td>".$row['softwareversion']."</td>
										<td>".$row['requestdate']."</td>
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