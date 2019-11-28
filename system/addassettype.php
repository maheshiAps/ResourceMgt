<?php include 'header.php'; ?>
       <div class="container-fluid">
          <div class="animated fadeIn">
          
            <div class="card">
              <div class="card-body">
                <div class="row">
                   <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    
                     <h2> Assets Management</h2>
                  </div>


<?php include 'dbcon.php';


 ?> 
                  <div class="card-body">
                    <form class="form-horizontal" action="" method="post">
                      <h4>Asset Type :-</h4>
                      <div class="form-group row">
                        <div class="col-4">
                          <lable>Asset Type</lable>
                           <select class="form-control" id="type" name="type" size="" value="">
                            <option value="">Select Type</option>
                            <option value="1">Fixed</option>
                            <option value="2">Non-Fixed</option>

                            
                           
                          </select>
                        
                        </div>
                        <div class="col-4">
                          <lable>Asset Name</lable>
                          <input class="form-control" type="text" placeholder="" name="astype" required>
                        
                        </div>
                          
                        <div class="form-action">
                        <button class="btn btn-warning btn-sm" name="submit" type="submit">Submit</button>
                        <button class="btn btn-danger btn-sm"  name="cancel" type="button">Cancel</button>
                         </div>
                         <?php 
      if(isset($_POST['submit'])){
        include('dbcon.php');
        $astype=$_POST['astype'];
        $type=$_POST['type'];
        //concatenate password and key then encrypted so decryption is more difficult, echo to check
       
        $insert=mysqli_query($con,"INSERT INTO itemtype(ItemName,Type) VALUES('$astype','$type')");//database connection opened
      //   echo "<script>alert('Asset Type added successfully');
      //   window.location.href='addroles.php';

      // </script>";
      
      if(!$insert){
          echo 'Data Insertion Failed'.mysqli_error();
          
        }
      mysqli_close($con);//database connection closed but automatically closed by mysqli  
      }
     ?> 
   </div>
<div class="col-2"></div>
 </form>  
                       
                        <div class="col-12">
    <?php 

    include ('dbcon.php');
    $request=mysqli_query($con,"SELECT * FROM itemtype");

     
    ?>
             
        <div class="tab-content" id="myTab1Content">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                
                    <table  id ="myTable"class="table table-responsive-sm table-striped">
              <thead class="table-dark">
                  <tr  >
                    <th>Id</th>
                    <th>Asset Type</th>
                    <th>Type</th>
                    <th></th>
                    
                  </tr>
                </thead>
                <tbody>
<?php 

  while($row=mysqli_fetch_array($request)){
        $astype=$row['ItemName'];
        $id=$row['Id'];
        $type=$row['Type'];

       
        ?>
                  <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $astype; ?></td>
                    <?php if($type=='1'){
                    ?>
                    
                    <td><?php echo 'Fixed' ; ?></td>
                    <?php  
                    } else { ?>
                     <td><?php echo 'Non-Fixed' ; ?></td>
                    <?php } ?>
                    <td><a href="EditRole.php?id=<?php echo $id; ?>" class="btn btn-success btn-sm fa fa-edit">Edit</a></td>
                    
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
