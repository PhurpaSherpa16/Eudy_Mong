<?php
	
	include('../php/config.php');
	$query= "select partyname from partyadd";
	$result=$connect->query($query);
		
	while ($row=$result->fetch_assoc()) {
		echo $row['partyname'];

		echo '<div style="height:100px; width:100px; background-color:red; float:left; margin:10px;"></div>';

			}

										

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div style="background-color: red;">
	

</div>
</body>
</html>	