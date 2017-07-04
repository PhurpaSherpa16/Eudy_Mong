<?php
	
	
	include('../../php/config.php');
	if (isset($_POST['submit'])) {

	$pname=$_POST['pname'];
	$desc=$_POST['desc'];
	$cost=$_POST['cost'];
	$length=$_POST['time'];
	$number=$_POST['max'];
	$product=$_POST['service'];



	$imageFileType = pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION);
		$imgname=$pname.".".$imageFileType;
		$upload= "partyimg/party_".$imgname;
	move_uploaded_file($_FILES["image"]["tmp_name"],$upload);

	
	$insert="insert into partyadd values(null,'$pname','$desc','$cost','$length','$number','$product','$imgname')";
	if($connect->query($insert)===TRUE){
		?>
	<script type="text/javascript">
		alert("Succesfully Inserted");
	</script>
	<?php
	header("location:adminportal.php");
	}
	else{
		echo"Error on loading".$connect->error;
	}
	}	
?>