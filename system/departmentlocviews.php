<?php include 'header.php'; ?>
       <div class="container-fluid">
          <div class="animated fadeIn">
          
            <div class="card">
              <div class="card-body">
                <div class="row">
                   <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    
                     <h2>Department Management</h2>
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
                        
                         </form> 
                         <div class="col-12" id="dptviews"></div>
                 

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
       $('#dpt').change(function(){
        var utype=$(this).val(); 
        var postid='id='+utype;//$(#utype).val()
        $.ajax({
          type:"POST",
          url:"selectdptassets.php",//path.filename
          data:postid,//assign utype into id-id:ut2, id2:ut3
          cache:false,
          success:function(rdata){ //return data
            $('#dptviews').html(rdata);
          }
        });

     
  

      });
});


</script>
  </body>
</html>
