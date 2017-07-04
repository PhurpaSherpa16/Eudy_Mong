<?php
	include('../php/config.php');

	$details="select * from partyadd";
	$de=$connect->query($details);
	$data=$de->fetch_assoc();

	$imag=$data['photo'];
	$imag1='party_'."$imag";
	echo $imag1;
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<img src="../usertype/admin/partyimg/<?php echo $imag1;?>"/>
</body>
</html>