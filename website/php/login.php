<?php
	include('config.php');
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$check="SELECT * FROM register WHERE uname='$user' AND password='$pass'";
	$check_result=$connect->query($check);
	if ($check_result->num_rows===1) {
		if ($_COOKIE['check'] < 3 ) {
		session_start();
		$row=$check_result->fetch_assoc();
			$_SESSION['uid']=$row['id'];
			$_SESSION['utype']=$row['utype'];
			$user=$row['utype'];
			if($user=='admin'){
				header('location:../usertype/admin/adminportal.php');
			}
			else{
				header('location:../usertype/normal/normalportal.php');
			} }
		else{
				header('location:../index.php?error='.$_COOKIE['check']);
		}   }
			else{
				if(!isset($_COOKIE['check']))
				{
					setcookie('check',1,time()+15);
				}elseif($_COOKIE['check'] >3 ){
					header('location:../index.php?error='.$_COOKIE['check']);
				}
				else
				{
					$new_cookie=$_COOKIE['check']+1;
					setcookie('check',$new_cookie,time()+15);
									
				}
				header('location:../index.php?error='.$_COOKIE['check']);	
				
			}
?> 