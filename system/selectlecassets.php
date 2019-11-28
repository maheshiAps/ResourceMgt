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
                    <?php $as=mysqli_query($con,"SELECT SUM(Qty) AS chaqty ,Qty FROM asset WHERE Loc='1' AND AsType='1' ");
                          $totch=mysqli_fetch_object($as);
// var_dump($totch); die; 
                      ?>

                    <td><?php echo $totch->chaqty; ?></td>
                 
                     <?php $asss=mysqli_query($con,"SELECT * FROM asset WHERE Loc='1' AND AsType='5' ");
                      
                     if($asss){

                      ?>

                    <td><span class="badge badge-warning"><?php echo 'Avaliable'; ?></span></td>
                      
                     <?php
                    }
                         else{

                          ?>



                     <td><?php echo 'no'; ?></td>
                     
                    <?php
                         }  

                      ?>
                    <td><!-- <?php echo 'yes'; ?> --></td>
                    <?php } ?>
                    
                  </tr>
             
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