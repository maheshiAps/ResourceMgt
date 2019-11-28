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
                     <a href="locationviews.php" class="btn btn-danger btn-sm fa fa-plus">Views</a>
                  </div>


<?php 
$eid=$_GET['id'];
include 'dbcon.php';
$request=mysqli_query($con,"SELECT * FROM location WHERE status ='1' AND Id='$eid'");
 while($row=mysqli_fetch_array($request)){
       
        $dpt=$row['Department'];
        $loctype=$row['LocType'];
        $loc=$row['Location'];
        $id=$row['Id'];
         $fac=$row['Faculty'];
        $f1=mysqli_query($con,"SELECT * FROM faculty WHERE Id='$fac'");
        while($r=mysqli_fetch_array($f1)){
          $facnm=$r['FacultyName'];
          $fid=$r['Id'];
        }

       
        $f2=mysqli_query($con,"SELECT * FROM deparment WHERE Id='$dpt'");
        while($r=mysqli_fetch_array($f2)){
          $deptnm=$r['DepartmentName'];
          $did=$r['Id'];
        }
       
       $f3=mysqli_query($con,"SELECT * FROM locationtype WHERE Id='$loctype'");
        while($r=mysqli_fetch_array($f3)){
          $locname=$r['LocationType'];
          $lid=$r['Id'];
        }
 ?> 
                  <div class="card-body">
                    <form class="form-horizontal" action="" method="post">
                     
                      <div class="form-group row">
                        <div class="col-4">
                          <lable>Faculty :</lable>
                          <select class="form-control" id="fac" name="fac" size="" value="">
                            <option value="<?php echo $fid; ?>"><?php echo $facnm; ?></option>
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
                         <div class="col-4">
                          <lable>Department :
                          <select class="form-control" id="dpt" name="dpt" size="" value="">
                           <option value="<?php echo $did; ?>"><?php echo $deptnm; ?></option>


                          </select>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-4">
                          <lable>Location Type :</lable>
                          <select class="form-control" id="loctype" name="loctype" size="" value="">
                            <option value="<?php echo $lid; ?>"><?php echo $locname; ?></option>
<!-- //including database connection   -->                          
<?php 
          $query=mysqli_query($con,"SELECT * FROM locationtype ");
          while($row=mysqli_fetch_array($query)){
            $id=$row['Id'];
            $loctype=$row['LocationType'];
            echo '<option value="'.$id.'">'.$loctype.'</option>';

}


           ?>
                            
                           
                          </select>
                        </div>

                        <div class="col-4" >
                         <lable>Location :</lable>
                          <input type="text" class="form-control" id="loc" name="loc" value=<?php echo $loc; ?>>
                        </div>
                       <!--  <div class="col-4"></div>
                        <br/> -->
                          <div class="form-actions col-6">
                        
                        <button class="btn btn-warning btn-sm " name="submit" type="submit">Update</button>
                        <button class="btn btn-danger btn-sm "  name="cancel" type="button">Cancel</button>
                         </div>
                         </form> 
                           <?php } ?>
                 <?php 
      if(isset($_POST['submit'])){
        include('dbcon.php');
        $fac=$_POST['fac'];
        $loc=$_POST['loc'];
        $loctype=$_POST['loctype'];
        $dpt=$_POST['dpt'];
        //concatenate password and key then encrypted so decryption is more difficult, echo to check
       
        $insert=mysqli_query($con,"UPDATE location SET Faculty='$fac',Department='$dpt',LocType='$loctype',Location='$loc' WHERE Id='$eid'");//database connection opened
        echo "<script>alert('Location edited successfully');
        window.location.href='locationviews.php';

      </script>";
      
      if(!$insert){
          echo 'Data Insertion Failed'.mysqli_error();
          
        }
      mysqli_close($con);//database connection closed but automatically closed by mysqli  
      }
     ?>  

  
                       


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
