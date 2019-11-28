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
                    <a href="assetsviews.php" class="btn btn-danger btn-sm fa fa-eye">Views</a>
                     
                  </div>


<?php include 'dbcon.php';
  
// $select=mysqli_query($con,"SELECT * FROM academic ORDER BY Id");
// while($rows=mysqli_fetch_array($select)){
//   $unm=$rows['Username'];
 
// }
// $unm++;
 ?> 


                  <div class="card-body">
                    <form class="form-horizontal needs-validation" novalidate method="post" action="" id="reg">
                      <h4>DEPARTMENT ASSETS DETAILS :-</h4>
                      <div class="form-group row ">
                        
                      
                        
                         
                        <div class="col-6">
                        <div class="col-6">
                           <lable>Assets Name :</lable>
                          <input class="form-control" type="text"  name="asset" id="asset" required>
                          
                          
                        </div>
                        
                       <div class="col-6">
                         <lable>Assets Type :</lable>
                          <select class="form-control" id="astype" name="astype">
                            <option value="">Select Type</option>
                            <option value="fixed">Fixed </option>
                            <option value="nonfixed">Non-fixed</option>

                            
                           
                          </select>
                      </div><br>
                       <div class="form-action">
                        
                        <button class="btn btn-warning btn-sm" name="submit" type="submit">Submit</button>
                        <button class="btn btn-danger btn-sm"  name="Reset" type="Reset">Cancel</button>
                      </div>
                      </form>
                      </div>
<?php 
      if(isset($_POST['submit'])){
        include('dbcon.php');
        $asset=$_POST['asset'];
        $astype=$_POST['astype'];
       
        $insert=mysqli_query($con,"INSERT INTO assets(AssetName,AssetType,status) VALUES('$asset','$astype',1)");//database connection opened
         // echo "<script>alert('Record added successfully');
         //              window.location.href='LectureViews.php';

         //              </script>";
       
      if(!$insert){
          echo 'Data Insertion Failed'.mysqli_error();
          
        }
      mysqli_close($con);//database connection closed but automatically closed by mysqli  
      }
     ?> 
                      <div class="col-6">
                        
                       <div class="tab-content" id="myTab1Content">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                
                    <table  id ="myTable"class="table table-responsive-sm table-striped">
              <thead class="table-dark">
                  <tr  >
                    <?php $find=mysqli_query($con,"SELECT * FROM asset WHERE status=1") ?>
                    <th>Id</th>
                    <th>Asset Name</th>
                    
                   <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
<?php 

  while($row=mysqli_fetch_array($request)){
        $fnm=$row['FullName'];
        $empcode=$row['Username'];
        $fac=$row['Faculty'];
        $prf=$row['Profession'];
        $f1=mysqli_query($con,"SELECT * FROM faculty WHERE Id='$fac'");
        while($r=mysqli_fetch_array($f1)){
          $facnm=$r['FacultyName'];
        }

        $dpt=$row['Department'];
        $f2=mysqli_query($con,"SELECT * FROM deparment WHERE Id='$dpt'");
        while($r=mysqli_fetch_array($f2)){
          $deptnm=$r['DepartmentName'];
        }
        $regno=$row['RegNo'];
        $work=$row['Work'];
        
        $roleid=$row['Role'];
        $f3=mysqli_query($con,"SELECT * FROM role WHERE Id='$roleid'");
        while($r=mysqli_fetch_array($f3)){
          $rolenm=$r['RoleName'];
        }
       
       
        ?>
                  <tr>

                    <td><?php echo $prf.$fnm; ?></td>
                    <td><?php echo $facnm; ?></td>
                    <td><?php echo $deptnm; ?></td>
                    <td><?php echo $regno; ?></td>
                    <td><?php echo $rolenm; ?></td>
                    <td><?php echo $work; ?></td>
                    
                    <td><a href="LectureView.php?id=<?php echo $empcode; ?>" class="btn btn-success btn-sm fa fa-eye">View</a></td>
                    
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
                </div>
             
                
              </div>
              
            </div>






          
          </div>
        </div>
      </main>
     
    </div>
<?php include 'footer.php'; ?> 
<script src="../src/js/validate.js"></script>

  <script>
$(document).ready(function(){

      $('#fac').change(function(){
        var utype=$(this).val(); 
        var postid='id='+utype;//$(#utype).val()
        $.ajax({
          type:"POST",
          url:"selectDept.php",//path.filename
          data:postid,//assign utype into id-id:ut2, id2:ut3
          cache:false,
          success:function(rdata){ //return data
            $('#dpt').html(rdata);
          }
        });

     
  

      });
});


</script>
  </body>
</html>
