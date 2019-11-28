<?php include 'header.php'; ?>
       <div class="container-fluid">
          <div class="animated fadeIn">
          
            <div class="card">
              <div class="card-body">

<?php  

    include ('dbcon.php');
    $request=mysqli_query($con,"SELECT * FROM location WHERE status ='1'");

     
    ?>
    <div class="card-header">
                    <div class="form-group row">
                      <div class="col-6">
                        <h2>Location Management</h2>
                    <a href="addlocation.php" class="btn btn-danger btn-sm fa fa-plus">New</a>
                   
                  </div>
                 
                 </div>   
                </div> 
                <div class="card">
                  
                  <div class="tab-content" id="myTab1Content">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                
                    <table  id ="myTable"class="table table-responsive-sm table-striped">
              <thead class="table-dark">
                  <tr  >
                    <th>Faculty</th>
                    <th>Department</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th></th>
                    <th></th>
                   
                    
                  </tr>
                </thead>
                <tbody>
<?php 

  while($row=mysqli_fetch_array($request)){
       
        $dpt=$row['Department'];
        $loctype=$row['LocType'];
        $loc=$row['Location'];
        $id=$row['Id'];
         $fac=$row['Faculty'];
        $f1=mysqli_query($con,"SELECT * FROM faculty WHERE Id='$fac'");
        while($r=mysqli_fetch_array($f1)){
          $facnm=$r['FacultyName'];
        }

       
        $f2=mysqli_query($con,"SELECT * FROM deparment WHERE Id='$dpt'");
        while($r=mysqli_fetch_array($f2)){
          $deptnm=$r['DepartmentName'];
        }
       
       $f3=mysqli_query($con,"SELECT * FROM locationtype WHERE Id='$loctype'");
        while($r=mysqli_fetch_array($f3)){
          $locname=$r['LocationType'];
        }
       
       
        ?>
                  <tr>

                    <td><?php echo $facnm; ?></td>
                    <td><?php echo $deptnm; ?></td>
                    <td><?php echo $locname; ?></td>
                    <td><?php echo $loc; ?></td>
                    
                    
                    <td><a href="locedit.php?id=<?php echo $id; ?>" class="btn btn-dark btn-sm fa fa-edit">Edit</a></td>
                    <td><a href="locdelete.php?id=<?php echo $id; ?>" class="btn btn-danger btn-sm fa fa-trash">Delete</a></td>
                    
                  </tr>
        <?php } ?>
                </tbody>
          </table>
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
<?php include 'footer.php';
 include 'scripts.php';  ?>  
 <script>
        $(document).ready(function () {
    $('#myTable').DataTable();
   
    } );
  </script>
  </body>
</html>
