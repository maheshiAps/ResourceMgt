<?php 
session_start(); //session starting
session_destroy(); //session destrying
session_start();
include 'dbcon.php'; //including connection
if(isset($_POST['login'])){

	$username=$_POST['uname'];
	$password=$_POST['pw'];
	$key='FNDN@@!#3442EININCxewfqfNISNNCEjdnfjdsFEFFEFSAEd2121121';//encrypting key
  	$enp=hash('SHA256',$password.$key); //encypting mechanism



//check username and password in customer table
  	$check1=mysqli_query($con,"SELECT * FROM academic WHERE Username='$username' AND Password='$enp' AND status='1'");



//check username and password in user table

  	$check2=mysqli_query($con,"SELECT * FROM nonacademic WHERE Username='$username' AND Password='$enp' AND status='1'");

  	$check2=mysqli_query($con,"SELECT * FROM student WHERE Username='$username' AND Password='$enp' AND status='1'");


  	$num_of_rows1=mysqli_num_rows($check1); //check # of rows
  	$num_of_rows2=mysqli_num_rows($check2);
  	$num_of_rows3=mysqli_num_rows($check3);



//when a customer login, redirect to the customer dashboard
  	if($num_of_rows1==1){

  		while($row1=mysqli_fetch_array($check1)){ 

  			$_SESSION['usernm']=$row1['Username'];
  			$_SESSION['user']=$row1['FullName'];
  			$_SESSION['role']=$row1['Role'];
  			

  			header('Location:index.php');//customer dashboard
  		
  			
  		}

  	}


  	//when a user login,redirect to the user dashboard
  	if($num_of_rows2==1){

  		while($row2=mysqli_fetch_array($check2)){

  			$_SESSION['user']=$row2['FullName'];
  			$_SESSION['usernm']=$row2['Username'];
  			$_SESSION['role']=$row2['Role'];
  			
header('Location:index.php');


  			
  				// header('Location:index.php');//user,employee dashboard
  			
  			
  			
  		}

  	}
  	  	//when a user login,redirect to the user dashboard
  	if($num_of_rows3==1){

  		while($row2=mysqli_fetch_array($check3)){

  			$_SESSION['user']=$row2['FullName'];
  			$_SESSION['usernm']=$row2['Username'];
  			$_SESSION['role']=$row2['Role'];
  			
header('Location:studentdashboard.php');


  			
  				// header('Location:index.php');//user,employee dashboard
  			
  			
  			
  		}

  	}
  	
}

if(isset($_POST['reset'])){
 header('Location:resetpw.php');
					

	}

?>
<link href="../build/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="../build/js/bootstrap.min.js"></script>
<script src="../build/js/jquery-3.4.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>SUSL Resource Mgt</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="../build/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
<link href="../build/vendors/css/font-awesome.min.css" rel="stylesheet">
    <link href="../build/vendors/css/simple-line-icons.css" rel="stylesheet">
	<link rel="stylesheet" href="../build/vendors/css/font-awesome/css/font-awesome.min.css">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="../build/css/login.css">
	<!-- *********************login.css inclde by me************************************************ -->
	
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				
			</div>
			<div class="card-body">
				<form action="" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="username" name="uname">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password" name="pw">
					</div>
					
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn" name="login">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					<!-- Don't have an account?<a href="">Sign Up</a> -->
				</div>
				<form action="" method="post">
					<div class="d-flex justify-content-center">
					<input type="submit" value="Forget Your Password" class="btn float-right btn-link" name="reset">
				</div>
				</form>
				
			</div>
		</div>
	</div>
</div>
</body>
</html>