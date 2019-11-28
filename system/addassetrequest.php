<?php include 'header.php'; ?>
       <div class="container-fluid">
          <div class="animated fadeIn">
          
            <div class="card">
              <div class="card-body">
                <div class="row">
                 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h2>Reservation Management</h2>
                    <a href="assetrequest.php" class="btn btn-danger btn-sm fa fa-eye">Views</a>
                     
                  </div>


<?php include 'dbcon.php';
  
$select=mysqli_query($con,"SELECT ReservationCode FROM reservation ORDER BY Id");
while($rows=mysqli_fetch_array($select)){
  $rid=$rows['ReservationCode'];
 
}
$rid++;
 ?> 


                  <div class="card-body">
                    <form class="form-horizontal needs-validation" novalidate method="post" action="" id="reg">
                      
                      <div class="form-group row">
                         <div class="col-4">
                         <lable>Request Code :</lable>
                          <input class="form-control" type="text" id="rcode" name="rcode" readonly value="<?php echo $rid; ?>">
                           
                      </div>
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
                        <div class="col-4">
                           <lable>Location :
                          <input class="form-control" type="text"  name="loc" id="loc" required>
                          
                          
                        </div>
                         <div class="col-4">
                         <lable>Request Date :</lable>
                          <input class="form-control" type="text" id="date" name="date" >
                           
                      </div>
                       
                       <div class="col-4">
                           <lable>Description :</lable>
                        <textarea name="des" clos="5" rows="10" class="form-control"></textarea>
                          
                          
                        </div>
                      </div>

                      <div class="form-actions">
                        
                        <button class="btn btn-warning btn-sm" name="submit" type="submit">Submit</button>
                        <button class="btn btn-danger btn-sm"  name="Reset" type="Reset">Cancel</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div> 
                </div>
             
                
              </div>
              
            </div>

<?php 
      if(isset($_POST['submit'])){
        include('dbcon.php');
       
     
        $fac=$_POST['fac'];
        $dpt=$_POST['dpt'];

        $loc=$_POST['loc'];
        $rdate=$_POST['date'];
        $des=$_POST['des'];
        $rcode=$_POST['rcode'];
        $emp=$_SESSION['user'];
        
      
        $date=date('Y-m-d');
        $insert=mysqli_query($con,"INSERT INTO reservation(Faculty,Department,Asset,Datee,Des,Requester,ReservationCode,status,reqDate,Accept) VALUES('$fac','$dpt','$loc','$rdate','$des','$emp','$rcode',1,'$date','0')");//database connection opened
         // echo "<script>alert('Record added successfully');
         //              window.location.href='LectureViews.php';

         //              </script>";
       
      if(!$insert){
          echo 'Data Insertion Failed'.mysqli_error();
          
        }
      mysqli_close($con);//database connection closed but automatically closed by mysqli  
      }
     ?> 




          
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
<script src="../build/js/zebra_datepicker.min.js"></script>
<script>
   
    $('#date').Zebra_DatePicker({

      // direction:[1,7],
      // // /disable_dates: ['*,*,*,0,6']
    });
  </script>
  </body>
</html>
