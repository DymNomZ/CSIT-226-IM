<?php
	
	include 'connect.php';
	
	if (!$connection) {
	    die('Could not connect: ' . mysqli_connect_error());
	}
	
	$query = 'SELECT * from  tblproduct';
        $resultset = mysqli_query($connection, $query);
	
	// Product count
	$countQuery = 'SELECT COUNT(*) as total FROM tblproduct';
	$countResult = mysqli_query($connection, $countQuery);
	$countRow = mysqli_fetch_assoc($countResult);
	$totalProducts = $countRow['total'];

	//$querybsit = 'SELECT count(*) as total from  tblstudent where program = "BSIT"';
	//$resultset1 = mysqli_query($connection, $querybsit);
	//$count = mysqli_fetch_assoc($resultset1);	

?>