 <?php
include ('dbcon.php');

if($_POST['id']){

  $stype=$_POST['id'];
  $find=mysqli_query($con,"SELECT * FROM location WHERE LocType='$stype'");
  while($r=mysqli_fetch_array($find)){
  	echo'<option value=""></option>';
  	    echo '<option value="'.$r['Id'].'">'.$r['Location'].'</option>';
  }
    
  }
 

      
  

?>

 