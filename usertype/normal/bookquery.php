<?php
	include("../../php/config.php");
	session_start();
	$id=$_SESSION['uid'];
	$select="select * from register where id='$id'";
	$data=$connect->query($select);
	$result=$data->fetch_assoc();
	$ide=$result['id'];
	$username=$result['fname']." ".$result['lname'];
	$partyid=$_POST['partyid'];
	$partyname=$_POST['partyname'];
	$date=$_POST['date'];
	$child=$_POST['child'];
	$total=$_POST['total'];

	$count=0;
	$datecheck="select * from booking where date='$date'";
	$datecheck1=$connect->query($datecheck);
	$count=mysqli_num_rows($datecheck1);
	if($count>0){
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title></title>
		</head>
		<body style="background-color: #FDF3E7;">
			<p>Date is already booked please choose another date !! thank you</p>
		</body>
		</html>
		<?php
		
	}
	else{
		$insert="insert into booking values(null,'$ide','$partyid','$child','$date','$total')";
		$connect->query($insert);
		$to="madhu@gmail.com";
		$sub="Booking Info.";
		$msg=$partyname." Want to book";
		$headers="From: webmaster@example.com \r\n"."CC: ".$result['email'];
		mail($to, $sub, $msg,$headers);
	}
	


	


?>