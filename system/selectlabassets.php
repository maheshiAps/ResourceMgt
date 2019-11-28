<?php 
include ('dbcon.php');
if($_POST['id']){
  $dpt=$_POST['id'];


    
   ?>
 <table  id ="myTable"class="table table-responsive-sm table-striped">
              <thead class="table-dark">
                  <tr  >
                    
                    <th>Id</th>
                    <th>Department</th>
                    <th>Location Name</th>
                    <th>#chairs</th>
                    <th>Projector</th>
                    <th></th>
                   
                   
                    
                    
                    
                  </tr>
                </thead>
                <tbody>
                  <?php 
$fi=mysqli_query($con,"SELECT * FROM location WHERE Department='$dpt' AND LocType='2'");  
  while($row1=mysqli_fetch_array($fi)){
        $did=$row1['Id'];
        $dpt=$row1['Department'];
$f=mysqli_query($con,"SELECT * FROM Deparment WHERE Id='$dpt'");
while( $locfind=mysqli_fetch_assoc($f)){
$nm=$locfind['DepartmentName'];
 }

        $loc=$row1['Location'];
      

      
        ?>
                  <tr>
                    
                    <td><?php echo $did; ?></td>
                    <td><?php echo $nm; ?></td>
                    <td><?php echo $loc; ?></td>
                    <td><?php echo '40'; ?></td>
                    <td><?php echo 'yes'; ?></td>
                    <td><!-- <?php echo 'yes'; ?> --></td>
                    
                    
                  </tr>
                  <?php } ?>
                </tbody>
          </table>	

<?php



  }
 


 ?>