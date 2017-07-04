<?php
include('../../php/config.php');
	

if (isset($_POST['partyupdate'])) {
	$pid=$_POST['partyId'];
	echo $pid;
	$pn=$_POST['pn'];
	$desc=$_POST['desc'];
	$cost=$_POST['cost'];
	$time=$_POST['time'];
	$max=$_POST['max'];
	$service=$_POST['service'];
	

	$imageFileType = pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION);
		$imgname=$pn.".".$imageFileType;
		$upload= "partyimg/party_".$imgname;
	move_uploaded_file($_FILES["image"]["tmp_name"],$upload);
	$update="update partyadd set partyname='$pn', description='$desc', cost='$cost', length='$time', number='$max', service='$service', photo='$imgname' where id='$pid'";
	$connect->query($update);
	header("location:adminportal.php");

}


if (isset($_POST['partydelete'])) {
			$id=$_POST['partyId'];
			$delet="delete from partyadd where id='$id' ";
			$connect->query($delet);
			header("location:adminportal.php");
		}
?>