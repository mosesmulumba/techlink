
<?php
	include "start.php";

	include "connection/connection.php";

	$sql_replies = "SELECT * FROM replies";
	$query_replies = $connection -> query($sql_replies);

?>

<html>
	<head>
		<title>view replies</title>
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
							<td onclick='location.href="lecturer_profile.php"'> Your Profile </td>
						</tr>
					</table>
				</div>

				<div class="body_content">

					<b> Available Replies </b>
					<hr>
					
					<table id="software" class="display" width="100%" cellspacing="0" border="1px">
						<thead>
							<td style='display:none;'> No </td>
							<td>ID</td>
							<td>ADMINID </td>
							<td>ADMIN FIRSTNAME</td>
							<td>DEVICENAME</td>
							<td>STATUS</td>
							<td>COMMENT</td>
							
						</thead>
						<?php
							while($row = $query_replies -> fetch_array()){
								echo "
									<tr>
									
										<td style='display:none;'>".$row['id']."</td>
										<td>".$row['id']."</td>
										<td>".$row['adminid']."</td>
										<td>".$row['adminfirstname']."</td>
										<td>".$row['devicename']."</td>
										<td>".$row['status']."</td>
										<td>".$row['admincomment']."</td>
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
            var t = $('#replies').DataTable( {
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