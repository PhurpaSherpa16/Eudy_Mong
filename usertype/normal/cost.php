<?php
	include("../../php/config.php");
	$pid=$_GET['pid'];
	$select="SELECT * FROM partyadd where id=$pid";
	$data=$connect->query($select);
	$partydata=$data->fetch_assoc();
	echo $partydata['cost'];
	

?>