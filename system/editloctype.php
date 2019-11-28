<?php include 'header.php'; ?>
       <div class="container-fluid">
          <div class="animated fadeIn">
          
            <div class="card">
              <div class="card-body">
                <div class="row">
                   <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    
                     <h2> Location Management</h2>

                    <a href="addloctype.php" class="btn btn-danger btn-sm fa fa-eye">Views</a>
                  </div>


<?php include 'dbcon.php';
$eid=$_GET['id'];
$request=mysqli_query($con,"SELECT * FROM locationtype WHERE Id='$eid'");
  while($row=mysqli_fetch_array($request)){
        $locnm=$row['LocationType'];
        $id=$row['Id'];
      }

 ?> 
                  <div class="card-body">
                    <form class="form-horizontal" action="" method="post">
                      <h4>Location Type :-</h4>
                      <div class="form-group row">
                        <div class="col-4">
                          <lable>
                          <input class="form-control" type="text" placeholder="" name="loctype" required value="<?php echo $locnm; ?>"></lable>
                        
                        </div>
                          <div class="form-actions">
                        
                        <button class="btn btn-warning btn-sm" name="submit" type="submit">Update</button>
                        <button class="btn btn-danger btn-sm"  name="cancel" type="button">Cancel</button>
                         </div>

                         <?php 
      if(isset($_POST['submit'])){
       
        $loctype=$_POST['loctype'];
        //concatenate password and key then encrypted so decryption is more difficult, echo to check
       
        $insert=mysqli_query($con,"UPDATE locationtype SET LocationType='$loctype' WHERE Id='$eid' ");//database connection opened
        echo "<script>alert('Role Updated successfully');
        window.location.href='addloctype.php';

      </script>";
      
      if(!$insert){
          echo 'Data Updation Failed'.mysqli_error();
          
        }
      mysqli_close($con);//database connection closed but automatically closed by mysqli  
      }
     ?> 

 </form>  
                       
                        <div class="col-6">
    <?php 

    include ('dbcon.php');
    $request=mysqli_query($con,"SELECT * FROM locationtype");

     
    ?>
             
        <div class="tab-content" id="myTab1Content">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                
                    <table  id ="myTable"class="table table-responsive-sm table-striped">
              <thead class="table-dark">
                  <tr  >
                    <th>Id</th>
                    <th>Location Type</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
<?php 

  while($row=mysqli_fetch_array($request)){
        $lonm=$row['LocationType'];
        $id=$row['Id'];
       
        ?>
                  <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $lonm; ?></td>
                    
                    
                  </tr>
        <?php } ?>
                </tbody>
          </table>
                       </div>
                      </div>
                      </div>  


                  </div>
                </div>
              </div>
                </div>
                <!-- /.row-->
                
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
  </body>
</html>
