<?php

$conn = new mysqli("localhost", "root", "", "phurpa_assignment");

$sql = "select * from partyadd where id=4";

$result = $conn->query($sql);
$data = $result->fetch_array();

$image_name = $data['name'];

	if (isset($_POST['btn'])) {
		$ext = pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);
		$img_name  = $_POST['name'].$ext;
		move_uploaded_file($_FILES["image"]["tmp_name"], $img_name);
		$sql = "insert into departments values (NULL, '$img_name')";

		$result = $conn->query($sql);
	}
 ?>
 <form method="post" enctype="multipart/form-data">
 	<label>Name: </label>
 	<input type="text" name="name">
 	<label>File: </label>
 	<input type="file" name="image"><br>
 	<input type="submit" name="btn" >
 </form>
<img src="<?php echo $img_name; ?>" width='500' height='500'>
