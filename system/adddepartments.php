<?php include 'header.php'; ?>
       <div class="container-fluid">
          <div class="animated fadeIn">
          
            <div class="card">
              <div class="card-body">
                <div class="row">
                   <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    
                     <h2> Department Management</h2>
                  </div>


<?php include 'dbcon.php';


 ?> 
                  <div class="card-body">
                    <form class="form-horizontal" action="" method="post">
                     
                      <div class="form-group row">
                        <div class="col-4">
                          <lable>Department Name :</lable>
                         
                          <input class="form-control" type="text" placeholder="" name="deptnm" required>
                        
                        </div>

                         <div class="col-4">
                          <lable>Faculty :
                          <select class="form-control" id="facnm" name="facnm" size="" value="">
                            <option value="">Select Faculty</option>
<!-- //including database connection   -->                          
<?php 
          $query=mysqli_query($con,"SELECT * FROM faculty ");
          while($row=mysqli_fetch_array($query)){
            $id=$row['Id'];
            $facnm=$row['FacultyName'];
            echo '<option value="'.$id.'">'.$facnm.'</option>';

}


           ?>
                            
                           
                          </select>
                        </div>
                          <div class="form-actions">
                        
                        <button class="btn btn-warning btn-sm" name="submit" type="submit">Submit</button>
                        <button class="btn btn-danger btn-sm"  name="cancel" type="button">Cancel</button>
                         </div>
                          </form>  

                         <?php 
      if(isset($_POST['submit'])){
        
        $deptnm=$_POST['deptnm'];
        $facnm=$_POST['facnm'];
        //concatenate password and key then encrypted so decryption is more difficult, echo to check
       
        $insert=mysqli_query($con,"INSERT INTO deparment(DepartmentName,FacultyId,status) VALUES('$deptnm','$facnm',1)");//database connection opened
        echo "<script>alert('Department added successfully');
       

      </script>";
      
      if(!$insert){
          echo 'Data Insertion Failed'.mysqli_error();
          
        }
      mysqli_close($con);//database connection closed but automatically closed by mysqli  
      }
     ?> 


             
                        <div class="col-6">
   <!--  <?php 

    include ('dbcon.php');
    $request=mysqli_query($con,"SELECT * FROM department WHERE status=1");

     
    ?>
             
        <div class="tab-content" id="myTab1Content">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                
                    <table  id ="myTable"class="table table-responsive-sm table-striped">
              <thead class="table-dark">
                  <tr  >
                    <th>Id</th>
                    <th>Role Name</th>
                    <th></th>
                    
                  </tr>
                </thead>
                <tbody>
<?php 

  while($row=mysqli_fetch_array($request)){
        $rolenm=$row['RoleName'];
        $id=$row['Id']
       
        ?>
                  <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $rolenm; ?></td>
                    
                    <td><a href="EditRole.php?id=<?php echo $id; ?>" class="btn btn-success btn-sm fa fa-edit">Edit</a></td>
                    
                  </tr>
        <?php } ?>
                </tbody>
          </table>
                       </div>
                      </div> -->
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
