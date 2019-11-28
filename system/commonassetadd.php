<?php include 'header.php'; ?>
       <div class="container-fluid">
          <div class="animated fadeIn">
          
            <div class="card">
              <div class="card-body">
                <div class="row">
                   <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    
                     <h2> Common Location Management</h2>
                     <!-- <a href="addloctype.php" class="btn btn-danger btn-sm fa fa-plus">Location Type</a> -->
                  </div>


<?php include 'dbcon.php';


 ?> 
                  <div class="card-body">
                    <form class="form-horizontal" action="" method="post">
                     
                      <div class="form-group row">
                        <div class="col-4">
                          <lable>Faculty :</lable>
                          <select class="form-control" id="fac" name="fac" size="" value="">
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
                         <div class="col-4">
                          <lable>Department :
                          <select class="form-control" id="dpt" name="dpt" size="" value="">
                           <option value="">Select Department</option>


                          </select>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-4">
                          <lable>Location Type :</lable>
                          <?php $sel=mysqli_query($con,"SELECT Id,LocationType FROM locationtype WHERE Id='6'");
                          while($row=mysqli_fetch_assoc($sel)){

                            ?>

                         <input type="text" class="form-control" id="loctype" name="loctype" value="<?php echo $row['LocationType']; ?>" readonly>
                         </div>
                          <?php
                          } ?>
                        

                        <div class="col-4" >
                         <lable>Location :</lable>
                          <input type="text" class="form-control" id="loc" name="loc">
                        </div>
                       <!--  <div class="col-4"></div>
                        <br/> -->
                          <div class="form-actions col-6">
                        
                        <button class="btn btn-warning btn-sm " name="submit" type="submit">Submit</button>
                        <button class="btn btn-danger btn-sm "  name="cancel" type="button">Cancel</button>
                         </div>
                         </form> 
                 <?php 
      if(isset($_POST['submit'])){
        include('dbcon.php');
        $fac=$_POST['fac'];
        $loc=$_POST['loc'];
        $loctype=$_POST['loctype'];
        $dpt=$_POST['dpt'];
        //concatenate password and key then encrypted so decryption is more difficult, echo to check
       
        $insert=mysqli_query($con,"INSERT INTO location(Faculty,Department,LocType,Location,status) VALUES('$fac','$dpt','6','$loc',1)");//database connection opened
      //   echo "<script>alert('Location added successfully');
      //   window.location.href='locationviews.php';

      // </script>";
      
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
