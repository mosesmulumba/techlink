
<?php
	include "start.php";

	include "connection/connection.php";

	$sql_software = "SELECT * FROM DEVICES";
	$query_software = $connection -> query($sql_software);

?>

<html>
	<head>
		<title> - Available devices</title>
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
								<td> <a href="view_assignments.php"> Tasks </a> </td>
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
							<tr>
							<td onclick='location.href="admin.php"'> Back</td>
						</tr>
						</tr>
					</table>
				</div>

				<div class="body_content">

					<b> Available Device</b>
					<hr>
					
					<table id="software" class="display" width="100%" cellspacing="0">
						<thead>
							<td style='display:none;'> No </td>
							<td> DID </td>
							<td> DEVICE_NO </td>
							<td> DEVICE_NAME</td>
							<td>D_TYPE </td>
							<td>UMU_NO</td>
							<td>  </td>
							
						</thead>
						<?php
							while($row = $query_software -> fetch_array()){
								echo "
									<tr>
									
										<td style='display:none;'>".$row['DID']."</td>
										<td>".$row['DID']."</td>
										<td>".$row['D_NO']."</td>
										<td>".$row['D_NAME']."</td>
										<td>".$row['D_TYPE']."</td>
										<td>".$row['UMU_NO']."</td>
										<td> </td>
										
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
            var t = $('#software').DataTable( {
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