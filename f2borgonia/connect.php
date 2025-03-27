<?php 
	$connection = new mysqli('localhost', 'root','','dbf2borgonia');
	
	if (!$connection){
		die (mysqli_error($mysqli));
	}
		
?>