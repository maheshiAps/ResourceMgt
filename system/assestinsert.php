<?php
session_start();
$user=$_SESSION['usernm'];

// $asid=$_SESSION['apcode']; 
$adate=date('Y-m-d');
$status='1';

$connect= new PDO("mysql:host=localhost;dbname=res","root","");
$insert="INSERT INTO asset(AssestNo,FacId,DptId,LocType,Loc,AsType,Asset,Type,Qty,UnitPrice,Emp,Datee,status) VALUES(:asid,:fac,:dpt,:loctype,:loc,:astype,:assetnm,:type,:qty,:unitprice,:emp,:status,:datee)";



for($count = 0; $count<count($_POST['hidden_astype']); $count++)
{
	$data = array(
		':asid'=>'1',
		':fac'	=>	$_POST['hidden_fac'][$count],
		':dpt'	=>	$_POST['hidden_dpt'][$count],
		':loctype'	=>	$_POST['hidden_loctype'][$count],
		':loc'	=>	$_POST['hidden_loc'][$count],
		':astype'	=>	$_POST['hidden_astype'][$count],
		':assetnm'	=>	$_POST['hidden_assestnm'][$count],
		
		':type'	=>	'1',
		':qty'	=>	$_POST['hidden_qty'][$count],
		':unitprice'	=>	$_POST['hidden_price'][$count],
		':emp'	=>	$user,
		':status'	=>	$status,
		':datee'	=>	$adate
		
	);
	$statement = $connect->prepare($insert);
	$statement->execute($data);
}

?>