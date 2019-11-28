<?php include 'header.php'; ?>
       <div class="container-fluid">
          <div class="animated fadeIn">
          
            <div class="card">
              <div class="card-body">
                <div class="card-header">
                    <h2>Non-academic Staff Managements</h2>
                    <div class="form-group row">
                      <div class="col-4">
                                         <?php  
    $vid=$_GET['id'];
    include ('dbcon.php');
    $request=mysqli_query($con,"SELECT * FROM nonacademic WHERE Username ='$vid'");
   
    

 
    ?>
                      <a href="nonacaviews.php" class="btn btn-danger btn-sm fa fa-eye">Views</a>
                      </div>
                      <div class="col-4"></div>
                      <div class="col-4"><a href="nonempedit.php?id=<?php echo $vid; ?>" class="btn btn-success btn-sm fa fa-edit">Edit</a></div>

                 </div>
                   </div>
                <div class="card">
 
                  <div class="tab-content" id="myTab1Content">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <table id= "myTable" class="table table-responsive-sm table-striped">
              <thead class="table-dark">
                  <tr  >
                    <th colspan="2"> Details:</th>
                    
                  </tr>
                </thead>
                <tbody>

<?php 

  while($row=mysqli_fetch_array($request)){
        $fnm=$row['FullName'];
        $prf=$row['Profession'];
        $username=$row['Username'];
        $fac=$row['Faculty'];
       $f1=mysqli_query($con,"SELECT * FROM faculty WHERE Id='$fac'");
        while($r=mysqli_fetch_array($f1)){
          $facnm=$r['FacultyName'];
        }
        $dpt=$row['Department'];
         $f2=mysqli_query($con,"SELECT * FROM deparment WHERE Id='$dpt'");
        while($r=mysqli_fetch_array($f2)){
          $deptnm=$r['DepartmentName'];
        }
        $role=$row['Role'];
        
        $regno=$row['RegNo'];
        $regdate=$row['RegDate'];
        $quli=$row['Qualification'];
       
        
?>
                  <tr>
                    <td>Full Name : </td>
                    <td><?php echo $prf.$fnm ; ?></td>
                  
                  </tr>
                  <tr>
                    <td>Emp Code: </td>
                    <td><?php echo $username; ?></td>
                  
                  </tr>
                  <tr>
                    <td>Faculty : </td>
                    <td><?php echo $facnm; ?></td>
                  
                  </tr>
                  <tr>
                    <td>Department : </td>
                    <td><?php echo $deptnm; ?></td>
                  
                  </tr>
                  <tr>
                    <td>Role : </td>
                    <td><?php echo $role; ?></td>
                  
                  </tr>
                  <tr>
                    <td>Registered Date : </td>
                    <td><?php echo $regdate; ?></td>
                  
                  </tr>


                </tbody>
                <thead class="table-dark">
                  <tr  >
                    <th colspan="2">Qulification Details</th>
                    
                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <td>Details : </td>
                    <td><?php echo $quli; ?></td>
                  
                  </tr>
                  
                  </tbody>
                
               
                
                <?php                 
}
?>
          </table>
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
  </body>
</html>
