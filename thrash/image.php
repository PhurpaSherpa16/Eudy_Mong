<form method="post" enctype="multipart/form-data">
	<input type="file" name="image" id="image" required="required">
		<?php
		if(isset($_POST['image']))
		$image=$_POST['image'];
		echo "<img src=".$image.">";
		?>

</form>
<?image
	

?>