<?php 
$did=$_GET['id'];
include 'dbcon.php';
mysqli_query($con,"UPDATE location SET status=0 WHERE Id='$did'");
 echo "<script>alert('Location deleted successfully');
        window.location.href='locationviews.php';

      </script>";

 ?>