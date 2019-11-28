<?php 
include ('dbcon.php');

if($_POST['id']){
	$fac=$_POST['id'];
	
	$fac2=mysqli_query($con,"SELECT * FROM faculty WHERE Id='$fac'");
	while($row1=mysqli_fetch_array($fac2)){
		$s1=$row1['Id'];
		
		
	}
	$facc=mysqli_query($con,"SELECT * FROM deparment WHERE FacultyId='$s1'");
	while($row=mysqli_fetch_array($facc)){
		echo '<option value=""></option>';
		echo '<option value="'.$row['Id'].'">'.$row['DepartmentName'].'</option>';
		
		
	}

}

 ?>