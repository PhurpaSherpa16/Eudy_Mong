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

	$update_table=" update register set fname='$fname', lname='$lname', email='$email', uname='$username', address='$address', gender='$gender', phone='$phone', password='$pass' where id='$id' ";
	if ($connect->query($update_table)===TRUE) {
		header('location:normalportal.php');
	}
	else{
		echo "Erro in Upddate".$connect->error;
	}
?>