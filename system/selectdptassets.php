<?php 
include ('dbcon.php');
if($_POST['id']){
  $dpt=$_POST['id'];


    
   ?>
 <table  id ="myTable"class="table table-responsive-sm table-striped">
              <thead class="table-dark">
                  <tr  >
                    
                    <th>Id</th>
                    <th>Location Type</th>
                    <th>Location Name</th>
                   
                   
                    
                    
                    
                  </tr>
                </thead>
                <tbody>
                  <?php 
$fi=mysqli_query($con,"SELECT * FROM location WHERE Department='$dpt'");  
  while($row1=mysqli_fetch_array($fi)){
        $did=$row1['Id'];
        $loctype=$row1['LocType'];
$f=mysqli_query($con,"SELECT LocationType FROM locationtype WHERE Id='$loctype'");
while( $locfind=mysqli_fetch_assoc($f)){
$nm=$locfind['LocationType'];
 }

        $loc=$row1['Location'];
      

      
        ?>
                  <tr>
                    
                    <td><?php echo $did; ?></td>
                    <td><?php echo $nm; ?></td>
                    <td><?php echo $loc; ?></td>
                    
                    
                  </tr>
                  <?php } ?>
                </tbody>
          </table>	

<?php



  }
 

include 'scripts.php';
 ?>
 <script>
   
$(document).ready( function () {
    $('#myTable').DataTable();
    
   
    } );
 

</script>