<?php
	include('config.php');
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$address=$_POST['address'];
	$gender=$_POST['gender'];
	$phone=$_POST['phone'];
	$pass=$_POST['password'];

	$count=0;
	$usernamecheck="select * from register where uname='$username'";
	$data=$connect->query($usernamecheck);
	$count=mysqli_num_rows($data);
	if($count>0){
		?>
		<script type="text/javascript">
			alert("Username already defined");
		</script>
		<?php
		header('location:../index.php');
	}
else{
	$register="insert into register values(null,'$fname','$lname','$email','$username','$address','$gender','$phone','$pass',
	'normal')";
	$connect->query($register);
	?>
	<script type="text/javascript">
		alert("Succesfully Inserted");
	</script>
	<?php
	header('location:../index.php');
}

	
?>