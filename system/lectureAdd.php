<?php include 'header.php'; ?>
       <div class="container-fluid">
          <div class="animated fadeIn">
          
            <div class="card">
              <div class="card-body">
                <div class="row">
                 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h2>Academic Management</h2>
                    <a href="LectureViews.php" class="btn btn-danger btn-sm fa fa-eye">Views</a>
                     
                  </div>


<?php include 'dbcon.php';
  
$select=mysqli_query($con,"SELECT * FROM academic ORDER BY Id");
while($rows=mysqli_fetch_array($select)){
  $unm=$rows['Username'];
 
}
$unm++;
 ?> 


                  <div class="card-body">
                    <form class="form-horizontal needs-validation" novalidate method="post" action="" id="reg">
                      <h4>PERSON ASSETS DETAILS :-</h4>
                      <div class="form-group row">
                        <div class="col-4">
                         <lable>Professional :</lable>
                          <select class="form-control" id="prf" size="" name="prf" required>
                            
                            <option value="">select.</option>
                            <option value="pofe.">Prof.</option>
                            <option value="doc.">Doc.</option>
                            <option value="mr.">Mr.</option>
                            <option value="mrs.">Mrs.</option>
                            <option value="ms.">Ms.</option>
                           
                          </select>
                      </div>
                      <div class="col-4">
                          <lable>Full Name :</lable>
                          <input class="form-control" type="text" placeholder="" name="fnm" id="fname" required>
                          <div class="valid-feedback">Valid</div>
                          <div class="invalid-feedback">Invalid</div>
                          <span id="txtFname"></span>
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
                           <lable>Reg No :
                          <input class="form-control" type="text"  name="regno" id="regno" required>
                          
                          
                        </div>
                         <div class="col-4">
                         <lable>Role :</lable>
                          <select class="form-control" id="role" name="role" size="" value="">
                            <option value="">Select Role</option>
<!-- //including database connection   -->                          
<?php 
          $query1=mysqli_query($con,"SELECT * FROM role ");
          while($row=mysqli_fetch_array($query1)){
            $id=$row['Id'];
            $rolenm=$row['RoleName'];
            echo '<option value="'.$id.'">'.$rolenm.'</option>';

}


           ?>
                            
                           
                          </select>
                      </div>
                       <div class="col-4">
                         <lable>Role :</lable>
                          <select class="form-control" id="work" name="work">
                            <option value="">Working Time</option>
                            <option value="Full">Full Time</option>
                            <option value="Part">Part Time</option>

                            
                           
                          </select>
                      </div>
                       <div class="col-4">
                           <lable>Qualifications :
                        <textarea name="quli" clos="5" rows="10" class="form-control"></textarea>
                          
                          
                        </div>
                      </div>

           

          <h4>OFFICIAL DETAILS :-</h4>
                      <div class="form-group row">
                        
                        
                        
                    <div class="col-4">
                          <lable>User Name :
                          <input class="form-control" name="uname" id="uname" value="<?php echo $unm++; ?>" type="text" maxlength="20" value="" required readonly>
                        </div>
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
        $prf=$_POST['prf'];
        $fnm=$_POST['fnm'];
        $fac=$_POST['fac'];
        $dpt=$_POST['dpt'];

        $regno=$_POST['regno'];
        $role=$_POST['role'];
        $quli=$_POST['quli'];
        $uname=$_POST['uname'];
        $work=$_POST['work'];
       
        $password=$_POST['pw'];
        $key='FNDN@@!#3442EININCxewfqfNISNNCEjdnfjdsFEFFEFSAEd2121121';//unique key
        $enp=hash('SHA256',$password.$key);
      
        $date=date('Y-m-d');
        $insert=mysqli_query($con,"INSERT INTO academic(FullName,Profession,Faculty,Department,RegNo,Role,Qualification,Username,Password,status,RegDate,Work) VALUES('$fnm','$prf','$fac','$dpt','$regno','$role','$quli','$uname','$enp',1,'$date','$work')");//database connection opened
         echo "<script>alert('Record added successfully');
                      window.location.href='LectureViews.php';

                      </script>";
       
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
