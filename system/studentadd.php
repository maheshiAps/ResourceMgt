<?php include 'header.php';
include 'dbcon.php'; ?>
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





                  <div class="card-body">
                    <form class="form-horizontal needs-validation" novalidate method="post" action="" id="reg">
                      <h4>PERSON ASSETS DETAILS :-</h4>
                      <div class="form-group row">
                        <div class="col-4">
                         <lable>Professional :</lable>
                          <select class="form-control" id="prf" size="" name="prf" required>
                            
                            <option value="">select.</option>
                           
                            <option value="mr.">Mr.</option>
                            <option value="mrs.">Mrs.</option>
                            <option value="ms.">Ms.</option>
                           
                          </select>
                      </div>
                      <div class="col-4">
                          <lable>Full Name :
                          <input class="form-control" type="text" placeholder="" name="fnm" id="fname" required>
                          <div class="valid-feedback">Valid</div>
                          <div class="invalid-feedback">Invalid</div>
                          <span id="txtFname"></span>
                        </div>
                          <div class="col-4">
                          <lable>Faculty :
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
                        <!--  <div class="col-4">
                          <lable>Department :
                          <select class="form-control" id="dpt" name="dpt" size="" value="">
                           <option value="">Select Department</option>


                          </select>
                        </div> -->
                       <!--  <div class="col-3">
                          <lable>Year :</lable>
                         <input list="birth_year"  name="year_born" class="form-control">
                         <datalist id="birth_year">
                           <?php 
                           $right_now=getdate();
                           $this_year=$right_now['year'];
                           $start_year=2000;
                           while($start_year<=$this_year){
                            echo "<option>{$start_year}</opton>";
                            $start_year++;
                           }
                            ?>
                         </datalist>
                       </input>

                        </div> -->
                        <div class="col-4">
                          <lable>Year :
                          <select class="form-control" id="btc" name="btc" size="" value="">
                           <option value="">Select Year</option>
                           <option value="1">1<sup>st</sup>   year</option>
                           <option value="2">2<sup>nd</sup> Year</option>
                           <option value="3">3<sup>rd</sup> Year</option>
                           <option value="4">4<sup>th</sup>  Year</option>


                          </select>
                        </div>
                         <div class="col-4">
                          <lable>Semester :
                          <select class="form-control" id="sem" name="sem" size="" value="">
                           <option value="">Select Smester</option>
                           <option value="1">1<sup>st</sup>   Semester</option>
                           <option value="2">2<sup>nd</sup> Semester</option>
                          


                          </select>
                        </div>
                        <div class="col-4">
                           <lable>Reg No :
                          <input class="form-control" type="text"  name="regno" id="regno" required>
                          
                          
                        </div>
                         <div class="col-4">
                         <lable>Role :</lable>
                         <input class="form-control" type="text"  name="role" id="role" required value="Student" readonly>
                      </div>
                       <div class="col-4">
                           <lable>Other :
                        <textarea name="quli" clos="5" rows="10" class="form-control"></textarea>
                          
                          
                        </div>
                      </div>

           

          <h4>OFFICIAL DETAILS :-</h4>
                      <div class="form-group row">
                        
                        <?php 
  
$select=mysqli_query($con,"SELECT * FROM student ORDER BY Id");
while($rows=mysqli_fetch_array($select)){
  $unm=$rows['Username'];
 
}
$unm++;
 ?> 
                        
                    <div class="col-4">
                          <lable>User Name :
                          <input class="form-control" name="uname" id="uname" type="text" maxlength="20" value="<?php echo $unm++; ?>" required readonly>
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
        $year=$_POST['year'];
        $sem=$_POST['sem'];
        $quli=$_POST['quli'];
        $uname=$_POST['uname'];
       
        $password=$_POST['pw'];
        $key='FNDN@@!#3442EININCxewfqfNISNNCEjdnfjdsFEFFEFSAEd2121121';//unique key
        $enp=hash('SHA256',$password.$key);
      
        $date=date('Y-m-d');
        $insert=mysqli_query($con,"INSERT INTO student(RegNo,FullName,Faculty,Department,Batch,Semester,Username,Password,status,Other,RegDate,Role,Professional) VALUES('$regno','$fnm','$fac','$dpt','$year','$sem','$uname','$enp',1,'$quli','$date','$role','$prf')");//database connection opened
         echo "<script>alert('Record added successfully');
                      window.location.href='studentviews.php';

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
<script>
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
  </script> 
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
      var year=1900;
      var till=2014;
      var option="";
       for(var y=year; y<=till; y++){
        option+="<option>"+ y +"</option>";
       }
       document.getElementById("year").innerHTML= options;
});


</script>
  </body>
</html>
