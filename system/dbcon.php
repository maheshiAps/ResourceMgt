<?php 
	$con = mysqli_connect("localhost","root","","res");
	if(!$con){
		echo "Database Connection Failed".mysqli_error();
	} 
//DB Connection
 ?>