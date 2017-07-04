<?php
	include('../../php/config.php');
	session_start();
	$id=$_SESSION['uid'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$address=$_POST['address1'];
	$gender=$_POST['gender'];
	$phone=$_POST['phone'];
	$pass=$_POST['password'];

	$update="update register set fname='$fname', lname='$lname', email='$email', uname='$username', address='$address', gender='$gender', phone='$phone', password='$pass' where id='$id'";
	if($connect->query($update)===TRUE){
		header('location:adminportal.php');
	}
	else{
		echo"Error on loading".$connect->error;
	}

	if(isset($_POST['logout'])){
		session_start();
		session_destroy();
		header("location:../../index.php");
	}

?>


