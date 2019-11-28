<?php include 'header.php'; ?>
       <div class="container-fluid">
          <div class="animated fadeIn">
          
            <div class="card">
              <div class="card-body">
                <div class="card-header">
                    <h2>Reservation Managements</h2>
                    <div class="form-group row">
                      <div class="col-4">
                                         <?php  
    $rid=$_GET['id'];
    include ('dbcon.php');
    $request=mysqli_query($con,"SELECT * FROM reservation WHERE Id ='$rid'");
   
    

 
    ?>
                      <a href="requestassestsviews.php" class="btn btn-danger btn-sm fa fa-eye">Views</a>
                      </div>
                      <div class="col-4"></div>
                      <div class="col-4"><a href="requestedit.php?id=<?php echo $rid; ?>" class="btn btn-dark btn-sm fa fa-edit">Edit</a></div>

                 </div>
                   </div>
                <div class="card">
 
                  <div class="tab-content" id="myTab1Content">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <table id= "myTable" class="table table-responsive-sm table-striped">
              <thead class="table-dark">
                  <tr  >
                    <th colspan="2">Request Details:</th>
                    
                  </tr>
                </thead>
                <tbody>

<?php 

  while($row=mysqli_fetch_array($request)){
        $id=$row['Id'];
        $fac=$row['Faculty'];
        
        $asset=$row['Asset'];
        $rdate=$row['Datee'];
       $f1=mysqli_query($con,"SELECT * FROM faculty WHERE Id='$fac'");
        while($r=mysqli_fetch_array($f1)){
          $facnm=$r['FacultyName'];
        }
        $dpt=$row['Department'];
         $f2=mysqli_query($con,"SELECT * FROM deparment WHERE Id='$dpt'");
        while($r=mysqli_fetch_array($f2)){
          $deptnm=$r['DepartmentName'];
        }
       
        $des=$row['Des'];
        $requster=$row['Requester'];
        $rcode=$row['ReservationCode'];
        $reqdate=$row['reqDate'];
       
        
?>
                  <tr>
                    <td>Request Code : </td>
                    <td><?php echo $rcode ; ?></td>
                  
                  </tr>
                  <tr>
                    <td>Requester: </td>
                    <td><?php echo $requster; ?></td>
                  
                  </tr>
                  <tr>
                    <td>Faculty : </td>
                    <td><?php echo $facnm; ?></td>
                  
                  </tr>
                  <tr>
                    <td>Department : </td>
                    <td><?php echo $deptnm; ?></td>
                  
                  </tr>
                  <tr>
                    <td>Description : </td>
                    <td><?php echo $des; ?></td>
                  
                  </tr>
                  
                  <tr>
                    <td>Location : </td>
                    <td><?php echo $asset; ?></td>
                  
                  </tr>
                  <tr>
                    <td>Request Date : </td>
                    <td><?php echo $reqdate; ?></td>
                  
                  </tr>


                </tbody>
                
                
               
                
                <?php                 
}
?>
          </table>
          <form action="" method="post">
          <div class="col-4"><button class="btn btn-success btn-sm fa fa-check" name="approve" id="approve"  type="submit">Approve</button>
                        <button class="btn btn-warning btn-sm fa fa-times" name="cancel" id="cancel"  type="submit">Cancel</button></div>
          </form>
                       </div>
                      </div>
                </div>
                <!-- /.row-->
                <?php if(isset($_POST['approve'])){
                
                
               mysqli_query($con,"UPDATE reservation SET Accept='1' WHERE Id='$rid' ");
         

                // echo "<script>alert('Reservation approved successfully');
                //       window.location.href='requestassestsviews.php';

                //       </script>";
                

               
                  }       

                if(isset($_POST['cancel'])){
                  mysqli_query($con,"UPDATE reservation SET status='0' WHERE Id='$rid'" );
                  // echo "<script>alert('Reservation canceled.');
                  //     window.location.href='AppointmentsViews.php';

                  //     </script>";
                }

              ?>
              </div>
              
            </div>
            <!-- /.card-->
           
            <!-- /.row-->
           
            <!-- /.row-->
          </div>
        </div>
      </main>
     
    </div>
<?php include 'footer.php'; ?> 
<script> 
 $(document).on('click', '#cancel', function(){
        
        confirm("Are you sure you want to remove this row data?");
        
      
    });
 $(document).on('click', '#approve', function(){
        
        confirm("Are you sure you want to remove this row data?");
        
      
    });
  </script> 
  </body>
</html>
