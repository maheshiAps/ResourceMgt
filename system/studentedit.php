<?php include 'header.php'; ?>
       <div class="container-fluid">
          <div class="animated fadeIn">
          
            <div class="card">
              <div class="card-body">
                <div class="row">
                 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h2>Student Management</h2>
                    <a href="studentviews.php" class="btn btn-danger btn-sm fa fa-eye">Views</a>
                     
                  </div>


<?php include 'dbcon.php';
    $vid=$_GET['id'];
    include ('dbcon.php');
    $request=mysqli_query($con,"SELECT * FROM student WHERE Username ='$vid'");
   
  

  while($row=mysqli_fetch_array($request)){
        $fnm=$row['FullName'];
        $empcode=$row['Username'];
        $fac=$row['Faculty'];
        $prf=$row['Professional'];
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
        
        $role=$row['Role'];
        $year=$row['Batch'];
        $sem=$row['Semester'];
       
        
       
      
 ?> 


                  <div class="card-body">
                    <form class="form-horizontal needs-validation" novalidate method="post" action="" id="reg">
                      <h4>PERSON ASSETS DETAILS :-</h4>
                      <div class="form-group row">
                        <div class="col-4">
                         <lable>Professional :</lable>
                          <select class="form-control" id="prf" size="" name="prf" required value="">
                            
                            <option value="<?php echo $prf ?>"></option>
                            
                            <option value="mr.">Mr.</option>
                            <option value="mrs.">Mrs.</option>
                            <option value="ms.">Ms.</option>
                           
                          </select>
                      </div>
                      <div class="col-4">
                          <lable>Full Name :
                          <input class="form-control" type="text" placeholder="" name="fnm" id="fname" required value="<?php echo $fnm; ?>">
                          <div class="valid-feedback">Valid</div>
                          <div class="invalid-feedback">Invalid</div>
                          <span id="txtFname"></span>
                        </div>
                          <div class="col-4">
                          <lable>Faculty :
                          <select class="form-control" id="fac" name="fac" size="" value="">
                            
<!-- //including database connection   -->   
<?php 
          $query=mysqli_query($con,"SELECT * FROM faculty WHERE Id='$fac' ");
          while($row=mysqli_fetch_array($query)){
            $id=$row['Id'];
            $facnm=$row['FacultyName'];
            echo '<option value="'.$id.'">'.$facnm.'</option>';

}


           ?>                       
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
                          
<?php 
          $query=mysqli_query($con,"SELECT * FROM deparment WHERE Id='$dpt' ");
          while($row=mysqli_fetch_array($query)){
            $id=$row['Id'];
            $dptpnm=$row['DepartmentName'];
            echo '<option value="'.$id.'">'.$dptnm.'</option>';

}


           ?> 

                          </select>
                        </div>
                        <div class="col-4">
                          <lable>Year :
                          <select class="form-control" id="btc" name="btc" size="" value="">
                           <option value=""><?php echo $year; ?></option>
                           <option value="1">1<sup>st</sup>   year</option>
                           <option value="2">2<sup>nd</sup> Year</option>
                           <option value="3">3<sup>rd</sup> Year</option>
                           <option value="4">4<sup>th</sup>  Year</option>


                          </select>
                        </div>
                         <div class="col-4">
                          <lable>Semester :
                          <select class="form-control" id="sem" name="sem" size="" value="">
                           <option value=""><?php  echo $sem; ?></option>
                           <option value="1">1<sup>st</sup>   Semester</option>
                           <option value="2">2<sup>nd</sup> Semester</option>
                          


                          </select>
                        </div>                         <div class="col-4">
                           <lable>Reg No :
                          <input class="form-control" type="text"  name="regno" id="regno" required value="<?php echo $regno; ?>">
                          
                          
                        </div>
                         <div class="col-4">
                         <lable>Role :</lable>
                          <input class="form-control" type="text"  name="role" id="role" required value="<?php echo $role; ?>" readonly>
                      </div>
                       <div class="col-4">
                           <lable>Qualifications :
                        <textarea name="quli" clos="5" rows="10" class="form-control" value="<?php echo $quli; ?>"></textarea>
                          
                          
                        </div>
                      </div>

           

          <h4>OFFICIAL DETAILS :-</h4>
                      <div class="form-group row">
                        
                        
                        
                    <div class="col-4">
                          <lable>User Name :
                          <input class="form-control" name="uname" id="uname" value="<?php echo $empcode; ?>" type="text" maxlength="20" value="" required readonly>
                        </div>

                      <?php } ?>
                        <div class="col-3">
                          <lable>Password :
                          <input class="form-control" type="password" id="pw" name="pw" required >
                          <span id="txtPw"></span>

                        </div>
                        <div class="col-3">
                          <lable>Confirm :
                          <input class="form-control" type="password" id="repw" name="repw" required >
                          <span id="txtRepw"></span>
                        </div>
                  </div>
                      <div class="form-actions">
                        
                        <button class="btn btn-warning btn-sm" name="submit" type="submit">Update</button>
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
        $prf=$_POST['prf'];
        $fnm=$_POST['fnm'];
        $fac=$_POST['fac'];
        $dpt=$_POST['dpt'];

        $regno=$_POST['regno'];
        $role=$_POST['role'];
        $year=$_POST['year'];
        $sem=$_POST['sem'];
        $quli=$_POST['quli'];
        $uname=$_POST['uname'];
       
        $password=$_POST['pw'];
        $key='FNDN@@!#3442EININCxewfqfNISNNCEjdnfjdsFEFFEFSAEd2121121';//unique key
        $enp=hash('SHA256',$password.$key);
      
        
        $insert=mysqli_query($con,"UPDATE academic SET FullName='$fnm',Profession='$prf',Faculty='$fac',Department='$dpt',RegNo='$regno',Role='$role',Qualification='$quli',Password='$enp' WHERE Username='$vid'");//database connection opened
         echo "<script>alert('Recode Updated successfully');
                      window.location.href='LectureViews.php';

                      </script>";
       
      if(!$insert){
          echo 'Data updation Failed'.mysqli_error();
          
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
<!-- <script>
    (function()
    {
      'use strict';
      window.addEventListener('load',function(){
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms,function(form){
          form.addEventListener('submit',function(event){
            if(form.checkValidity() === false){
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          },false);
        });
      },false);
    })();
  </script> --> 
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
