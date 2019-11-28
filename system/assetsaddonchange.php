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
                  </div>


<?php include 'dbcon.php';


 ?> 
                  <div class="card-body">
                    <form class="form-horizontal" action="" method="post">
                     
                      <div class="form-group row">
                       

                         <div class="col-4">
                          <lable>Location Type :</lable>
                          <select class="form-control" id="loc" name="loc" size="" value="">
                            <option value="">Select Type</option>
<!-- //including database connection   -->                          
<?php 
          $query=mysqli_query($con,"SELECT * FROM locationtype ");
          while($row=mysqli_fetch_array($query)){
            $id=$row['Id'];
            $locnm=$row['LocationType'];
            echo '<option value="'.$id.'">'.$locnm.'</option>';

}


           ?>
                            
                           
                          </select>
                        </div>
                          
                          </form>  <br> 

      
                        
<div class="col-12" id="dpt" name="dpt"></div>

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
<?php include 'footer.php'; 
include 'scripts.php'; ?>  
<script>
$(document).ready(function(){

      $('#loc').change(function(){
        var utype=$(this).val(); 
        var postid='id='+utype;//$(#utype).val()
        $.ajax({
          type:"POST",
          url:"selectasset.php",//path.filename
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
