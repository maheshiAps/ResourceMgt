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
                    <a href="addassetrequest.php" class="btn btn-danger btn-sm fa fa-plus">Add</a>
                     
                  </div>


<?php include 'dbcon.php';
  
 $select1=mysqli_query($con,"SELECT * FROM reservation WHERE status='1' AND Accept='0' ");
     $rows=mysqli_num_rows($select1);

     $select2=mysqli_query($con,"SELECT * FROM reservation WHERE status='1' AND Accept='1'");
     $rowse=mysqli_num_rows($select2);

      $select3=mysqli_query($con,"SELECT * FROM reservation WHERE status='0' AND Accept='0' ");
     $rowss=mysqli_num_rows($select3);

 ?> 


                  <div class="card-body">
                    <form class="form-horizontal needs-validation" novalidate method="post" action="" id="reg">
                      
                      <div class="form-group row">
                      <div class="col-12">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home4" role="tab" aria-controls="home">
                      <i class="icon-calculator"></i> Pending Reservation
                      <span class="badge badge-pill badge-info"><?php echo $rows; ?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile">
                      <i class="icon-basket-loaded"></i> Accepted Reservation
                      <span class="badge badge-pill badge-warning"><?php echo $rowse; ?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#messages4" role="tab" aria-controls="messages">
                      <i class="icon-pie-chart"></i> Cancelled Reservation
                       <span class="badge badge-pill badge-success"><?php echo $rowss; ?></span>
                    </a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="home4" role="tabpanel">
                    <table class="table table-responsive-sm table-striped">
                      <thead class="table-dark">
                        <tr >
                          
                          <th>Request Code</th>
                          <th>Location</th>
                          <th>Date</th>
                          <th>Description</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php 
                         $select1=mysqli_query($con,"SELECT * FROM reservation WHERE status='1' AND Accept='0' ");
                         while($pen=mysqli_fetch_array($select1)){

                              $pid=$pen['Id'];
                              $asset=$pen['Asset'];
                              $date=$pen['Datee'];
                              $des=$pen['Des'];
                              $rcode=$pen['ReservationCode']; ?>
                         
                        <tr>
                          
                          <td><?php echo $rcode ; ?></td>
                          <td><?php echo $asset ; ?></td>
                          <td><?php echo $date ; ?></td>
                          <td><?php echo $des ; ?></td>
                          <td>
                           <a href="requestview.php?id=<?php echo $pid; ?>" class="btn btn-warning btn-sm fa fa-eye">Detail</a>
                          </td>
                        </tr>
                            <?php
                          } ?>
                      </tbody>
                    </table>


                  </div>
                  <div class="tab-pane" id="profile4" role="tabpanel"><table class="table table-responsive-sm table-striped">
                      <thead class="table-dark">
                        <tr >
                          
                          <th>Request Code</th>
                          <th>Location</th>
                          <th>Date</th>
                          <th>Description</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php 
                         $select1=mysqli_query($con,"SELECT * FROM reservation WHERE status='1' AND Accept='1' ");
                         while($pen=mysqli_fetch_array($select1)){

                              $pid=$pen['Id'];
                              $asset=$pen['Asset'];
                              $date=$pen['Datee'];
                              $des=$pen['Des'];
                              $rcode=$pen['ReservationCode']; ?>
                         
                        <tr>
                          
                          <td><?php echo $rcode ; ?></td>
                          <td><?php echo $asset ; ?></td>
                          <td><?php echo $date ; ?></td>
                          <td><?php echo $des ; ?></td>
                          <td>
                           <a href="requestview.php?id=<?php echo $pid; ?>" class="btn btn-warning btn-sm fa fa-eye">Detail</a>
                          </td>
                        </tr>
                            <?php
                          } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane" id="messages4" role="tabpanel"><table class="table table-responsive-sm table-striped">
                      <thead class="table-dark">
                        <tr >
                          
                          <th>Request Code</th>
                          <th>Location</th>
                          <th>Date</th>
                          <th>Description</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php 
                         $select1=mysqli_query($con,"SELECT * FROM reservation WHERE status='0' AND Accept='0' ");
                         while($pen=mysqli_fetch_array($select1)){

                              $pid=$pen['Id'];
                              $asset=$pen['Asset'];
                              $date=$pen['Datee'];
                              $des=$pen['Des'];
                              $rcode=$pen['ReservationCode']; ?>
                         
                        <tr>
                          
                          <td><?php echo $rcode ; ?></td>
                          <td><?php echo $asset ; ?></td>
                          <td><?php echo $date ; ?></td>
                          <td><?php echo $des ; ?></td>
                          <td>
                           <a href="requestview.php?id=<?php echo $pid; ?>" class="btn btn-warning btn-sm fa fa-eye">Detail</a>
                          </td>
                        </tr>
                            <?php
                          } ?>
                      </tbody>
                    </table>
</div>
                </div>
              </div>
                      </div>

                    
                    </form>
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
<script src="../build/js/zebra_datepicker.min.js"></script>
<script>
   
    $('#date').Zebra_DatePicker({

      // direction:[1,7],
      // // /disable_dates: ['*,*,*,0,6']
    });
  </script>
  </body>
</html>
