<?php
include("../../php/config.php");
session_start();
if (!isset($_SESSION['uid'])) {
	header('location:../../index.html');
}
	$id=$_SESSION['uid'];
	$select="select * from register where id='$id'";
	$select_check=$connect->query($select);
	$all=$select_check->fetch_assoc();

	$s="selct * from partyadd";
	$d=$connect->query($s);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Portal</title>
	<script type="text/javascript" src="../../js.js"></script>
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>	
<div class="main">
			<!--Header Part-->
		<div class="header" style="position: relative; width: 100%; height: 100px;">
			<div class="img">
				<img src="../../image/Log.png" height="100px" width="300px">
			</div>
			<div class="nav" style="height: 30px; width: 100%; background-color: #79f27d;">
				<button type="button" id="home">Home</button>
				<button type="button" id="gallery">Gallery</button>
				<button type="button" id="add">Parties Add</button>
				<button type="button" id="update">Update Parties</button>
				<button type="button" id="profile">Profile Edit</button>
			</div>

		</div>
		

		<!--Body Part-->
			
		<div class="body" style=" top: 130px; background-color: #b7e7f7">
		
			<form action="party.php" enctype="multipart/form-data" method="post">

				<div class="partyadd" id="partyadd" style="display: none;">
					<div class="party1">
					 	
					 	<fieldset style="height: 370px; margin-top: 40px;"><legend>Party Addding Form:</legend>
					 	<div class="input">
					 		<div class="pname" style="height: 15%; width: 100%; background-color: ;">
					 			<label>Party Name</label><input type="text" name="pname" id="pname" placeholder="Enter your party name" required="required">
					 		</div>
					 		<div class="desc" style="height: 40%; width: 100%; background-color: ;">
					 			<label>Party Description</label><textarea
					 			rows="10" cols="50" name="desc" id="desc" placeholder="Description of Party" required="required"></textarea>
					 		</div>
					 		<div class="Cost" style="height: 15%; width: 100%; background-color: ;" >
					 			
					 			<div class="cost" style="height:100%; width: 25%; float: left;">
					 				<label>Cost</label><input type="text" name="cost" id="cost" placeholder="cost per child" required="required">
					 			</div>

					 			<div class="time" style="height:100%; width: 40%;  float: left;">
					 				<label>Length of party</label><input type="text" name="time" id="time" placeholder="e.g:60,90,120" required="required">
					 			</div>

					 			<div class="max" style="height:100%; width: 35%;  float: left;">
					 				<label>Maxium Children</label><input type="text" name="max" id="max" placeholder="Max child in no." required="required">
					 			</div>
					 		</div>

					 		<div class="service" style="height: 25%; width: 100%; background-color: ;">
					 			<label>Party Service</label><textarea rows="10" cols="50" name="service" id="service" placeholder="Service You provide" required="required"></textarea>
					 		</div>
					 	</div>
					 	</fieldset>
					</div>

					<div class="party2">
						<fieldset style="height: 363px; margin-top: 48px;">
						<div class="upimage" style="height: 70%; width:90%; background-color: ; margin: auto; margin-top: 20px; ">
							<input type="file" name="image" id="image" required="required">
						<div style="height: 80%; width: 60%; background-color: grey; float: right; margin-right: 100px;">
								<img src=" <?php 
									$image=$_POST['image'];
									echo "$image";
								 ?> ">
								
						</div>

						</div>

						<div class="but" style="height: 20%; width: 20%; background-color: ; margin:auto; margin-bottom: 0px;">
						<input type="submit" name="submit" id="submit" value="Add Party">
						</div>
					</div>
						</fieldset>
				</div>

				<div class="partyupdate" id="partyupdate" style="display:none;">
					<div class="party1">
					 	
					 	<fieldset style="height: 370px; margin-top: 40px;"><legend>Party Update Form:</legend>
					 	<div class="input">
					 		<div class="pname" style="height: 15%; width: 100%; background-color: ;">
					 			<label>Party Name</label>
					 					<select class="pname" id="pname">
											<?php
												include("../php/config.php");
												$query= "select partyname from partyadd";
												$result=$connect->query($query);
												while ($row=$result->fetch_assoc()) {
												echo "<option>".$row['partyname']."</option>";
													}
												?>	
										</select>

					 		</div>
					 		<div class="desc" style="height: 40%; width: 100%; background-color: ;">
					 			<label>Party Description</label><textarea
					 			rows="10" cols="50" name="desc" id="desc" placeholder="Description of Party" required="required"></textarea>
					 		</div>
					 		<div class="Cost" style="height: 15%; width: 100%; background-color: ;" >
					 			
					 			<div class="cost" style="height:100%; width: 25%; float: left;">
					 				<label>Cost</label><input type="text" name="cost" id="cost" placeholder="cost per child" required="required">
					 			</div>

					 			<div class="time" style="height:100%; width: 40%;  float: left;">
					 				<label>Length of party</label><input type="text" name="time" id="time" placeholder="e.g:60,90,120" required="required">
					 			</div>

					 			<div class="max" style="height:100%; width: 35%;  float: left;">
					 				<label>Maxium Children</label><input type="text" name="max" id="max" placeholder="Max child in no." required="required">
					 			</div>
					 		</div>

					 		<div class="service" style="height: 25%; width: 100%; background-color: ;">
					 			<label>Party Service</label><textarea rows="10" cols="50" name="service" id="service" placeholder="Service You provide" required="required"></textarea>
					 		</div>
					 	</div>
					 	</fieldset>
					</div>

					<div class="party2">
						<fieldset style="height: 363px; margin-top: 48px;">
						<div class="upimage" style="height: 70%; width:90%; background-color: ; margin: auto; margin-top: 20px; ">
							<input type="file" name="image" id="image" required="required">
						<div style="height: 80%; width: 60%; background-color: grey; float: right; margin-right: 100px;">
							
						</div>

						</div>

						<div class="but" style="height: 20%; width: 20%; background-color: ; margin:auto; margin-bottom: 0px;">
						<input type="submit" name="submit" id="submit" value="Add Party">
						</div>
					</div>
						</fieldset>
				</div>



			</form>
		</div>
		<script>
				$("#add").click(function(){
				//alert("cick");
					$("#partyadd").show();
					$("#partyupdate").hide();
				})

			</script>


		<script>
				$("#update").click(function(){
					//alert("cick");
					$("#partyadd").hide();
					$("#partyupdate").show();
				})

			</script>

			<!--Footer Part-->



<div class="footer" style="position: fixed; bottom: 0px; " >
			<div class="address">
					<div class="add" style="height: 80%; width: 70%; background-color: #eba8f1; margin: auto;
					margin-top: 3%; border-right: 1px solid black; ">
						<label style="font-size: 15px; text-align: center;">
						<span>Mr XXXX XXXXX<br></span>
						<span>S031 4NG<br></span>
						<span>3 Low Street, SouthAmption<br></span>
						</label>
						
					</div>
			</div>
			<div class="contact">
					<div class="con" style="height: 80%; width: 95%; background-color: #eba8f1; margin: 3%; border-right: 1px solid black;">
						<label style="font-size: 15px;">
						<span>Ph.no:0000-0000-0000<br></span>
						<span>Fax:(070) 4** ****<br></span>
						<span>email: <a href="https://accounts.google.com">Rajinda@gmail.com</a><br></span>
						</label>
					</div>
			</div>
			<div class="social">
				<div class="fb">
					<a href="https://www.facebook.com" target="_blank"><img src="../../image/fb.png" title="facebook" height="100%" width="100%"></a>
				</div>
				<div class="instagram">
					<a href="https://www.instragram.com" target="_blank"><img src="../../image/instagram.png" title="instragram" height="100%" width="100%"></a>
				</div>
				<div class="twitter">
					<a href="https://www.twitter.com" target="_blank"><img src="../../image/twitter.png" title="twitter" height="100%" width="100%"></a>
				</div>
				<div class="playstore">
					<a href="https://www.playstore.com" target="_blank"><img src="../../image/play.png" title="playstore" height="100%" width="100%"></a>
				</div>
				<div class="google">
					<a href="https://www.plus.google.com" target="_blank"><img src="../../image/google.png" title="Google+" height="100%" width="100%"></a>
				</div>

				<div style="height: 15px; width: 60%; float: right; margin-top: 8px;">
					<p style="margin: 0px; padding: 0px; text-align: center;">&copy Rajinda Children Party House from 2017</p>
					
				</div>
				
			</div>

		</div>
		



</div>	
</body>
</html>