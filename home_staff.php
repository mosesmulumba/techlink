<?php
	include "start.php";

	include "connection/connection.php";

	$sql_staff = "SELECT * FROM staff";
	$query_staff = $connection -> query($sql_staff);

?>

<html>
	<head>
		<title> - ICT-STAFF </title>
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
								<td> <a href="home_staff.php" class="current"> Home </a> </td>
								<td> <a href="view_assignments.php"> Tasks </a> </td>
								<td> <a href="logout.php"> Logout </a> </td>
							</tr>
						</table>
					</div>
				</div>
			</div>
<h3 class="text">Welcome <?php echo $_SESSION["username"]; ?></h3><br><hr><br>
			<div class="page_ody">

				<div class="second_menu">
					<table>
						<tr>
							<td onclick='location.href="staff_profile.php"'> Your Profile </td>
						</tr>
						<tr>
							<td onclick='location.href="available_software4.php"'> Available Software </td>
						</tr>
					</table>
				</div>

				<div class="body_content">

					<b> Registered Staff </b>
					<hr>
					
					<table id="staff" class="display" width="100%" cellspacing="0">
						<thead>
							
							<td> </td>
							<td style='display:none;'> No </td>
							<td> ID </td>
							<td> firstname </td>
							<td> Lastname </td>
							<td> Email </td>
							<td> Contact </td>

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