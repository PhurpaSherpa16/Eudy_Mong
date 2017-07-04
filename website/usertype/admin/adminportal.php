<?php
include("../../php/config.php");
session_start();
if (!isset($_SESSION['uid']) && !isset($_SESSION['utype'])) {
	header('location:../../index.php');
}
if ($_SESSION['utype'] != 'admin') {
	header('location:../../index.php');
}

	$id=$_SESSION['uid'];
	$select="select * from register where id='$id'";
	$select_check=$connect->query($select);
	$all=$select_check->fetch_assoc();

	$s="selct * from partyadd";
	$d=$connect->query($s);
	
	$query1= "select * from partyadd";
	$result1=$connect->query($query1);			
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Portal</title>
	<script type="text/javascript" src="../../js.js"></script>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>	
<div class="main">
			<!--Header Part-->
		<div class="header" style="position: relative; width: 100%; height: 100px;">
			<div class="img">
				<img src="../../image/Logo.png" height="100px" width="300px">
			</div>
			<div class="nav" style="height: 30px; width: 100%; background-color: #79f27d;">
				<button type="button" id="home">Home</button>
				<button type="button" id="details">Party Details</button>
				<button type="button" id="add">Parties Add</button>
				<button type="button" id="update">Update Parties</button>
				<button type="button" id="profile">Profile Edit</button>
			</div>

		</div>
		

		<!--Body Part-->
			
		<div class="body" style=" top: 130px; background-color: #ECECEA">
					

			
				<div class="homepage" id="homepage" style="height: px; width: 100%; background-color: ; display:;">
					<div class="header1" style="height: 100px; width: 100%; background-color: ;">
						<div style="text-align: center;">
  							<h1>Welcome <?php echo $all['fname']." ".$all['lname']; ?> to our admin Portal</h1>
  							<label>You can add, update your party as well as you can view our gallery.</label>
						</div>
					</div>
				</div>

				

				<div class="profileedit" id="profileedit" style="display:none;">
					<form action="profile.php" method="post">
					<div style="background-color: ; height: 430px; width: 70%; margin:auto; margin-top: -10px;">
						<div style="height: 40px; width: 100%; background-color: ; float: left;">
							<div style="margin:auto; background-color: ; height: 70%; width: 100px; padding: 1px;"></div>
							</div>
							<fieldset><legend>Profile Edit</legend>
						<div class="input1" style="width: 92%; height: 90%; float: left;margin-left: 33px; background-color: ;">

							<div class="sname" style="height: 50px; width: 100%; background-color: ">
								<div class="fname" style="float: left;">
									<label>First Name</label><input type="text" name="fname" placeholder="Enter Your First Name" value="<?php echo $all['fname']; ?>" id="fname" required="required">
								</div>
								<div class="lname" style="float: left;">
									<label>Last Name</label><input type="text" name="lname" placeholder="Enter Your Last Name" value="<?php echo $all['lname']; ?>" id="lname">
								</div>
							</div>

								<div class="email" style="height: 50px; width: 100%;">
									<label>Email</label><input type="email" name="email" placeholder="Enter Your Email Name" value="<?php echo $all['email']; ?>" id="email">
								</div>

								<div class="username" style="height: 50px; width: 100%;">
									<label>User Name</label><input type="text" name="username" placeholder="Enter Your User Name" value="<?php echo $all['uname']; ?>" id="username">
								</div>
								<div class="address1" style="height: 50px; width: 100%; background-color:">
									<label>Address</label><input type="text" name="address1" placeholder="Enter Your Address" value="<?php echo $all['address']; ?>" id="address1">
							
								</div>
						
							<div class="gender" style="height: 50px; width: 100%;">
								<div class="gender">
									<label id="gender">Gender
										<input type="radio" name="gender" value="Female"
											<?php 
												if (isset($all['gender']) && $all['gender'] == "Female") {
													echo "checked='checked'";
												}
											?>
										>Female
										<input type="radio" name="gender" value="Male"
											<?php 
												if (isset($all['gender']) && $all['gender'] == "Male") {
													echo "checked='checked'";
												}
											?>
										>Male
										<input type="radio" name="gender" value="Others"
											<?php 
												if (isset($all['gender']) && $all['gender'] == "Others") {
													echo "checked='checked'";
												}
											?>>Others
									</label>
								</div>

								<div class="phone">
									<label>Phone</label><input type="text" name="phone" placeholder="Enter Your Phone Number" value="<?php echo $all['phone']; ?>" id="phone">
								</div>

							</div>
					
							<div class="password" style="height: 50px; width: 100%; background-color: ;">
								<label>Password</label><input type="password" name="password" placeholder="Enter Your Password " value="<?php echo $all['password']; ?>" id="password">
							</div>

							<div class="b" style="height: 50px; width: 100%; background-color: ; margin-top: 50px;">
						
								<div class="submit1" style="margin-left: 180px; width: 60%; height: 90%; background-color: ;">
									<button type="submit" name="submit1" id="submit1" value="Submit">Update</button>
									<button type="submit" name="logout" id="logout" value="Logout">Logout</button>

								</div>
								
				
							</div>
						</div>
						</fieldset>
					</div>
					</form>	
				</div>
				
				<div class="partyadd" id="partyadd" style="display: none;">
					<form action="party.php" enctype="multipart/form-data" method="post">
					<div class="party1">
					 	
					 	<fieldset style="height: 370px; margin-top: 40px;"><legend>Party Addding Form:</legend>
					 	<div class="input">
					 		<div class="pname" style="height: 15%; width: 100%; background-color:; ;">
					 			<label>Party Name</label><input type="text" name="pname" id="pname" placeholder="Enter your party name" required="required">
					 		</div>
					 		<div class="desc" style="height: 38%; width: 100%; background-color: ;">
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
							<div>
									<img id="image1" src="#" alt="Party Image" height= "80%" width="60%" style="margin-top: 20px; margin-left: 100px;">
										
							</div>
						</div>

						<div class="but" style="height: 20%; width: 20%; background-color: ; margin:auto; margin-bottom: 0px;">
						<input type="submit" name="submit" id="submit" value="Add Party">
						</div>
						</fieldset>
					</div>
					</form>
				</div>
				

				<div class="partyupdate" id="partyupdate" style="display:none ;">
					<form class="select" method="post" enctype="multipart/form-data">

					<div class="combo" style="height: 50px; width: 40%; background-color: ; background-color: ; margin: auto; margin-top: 5px; ">
					 			<label>Party Name</label>

					 					<select class="pname" name="pname" id="pname" style="">
					 							<option>None</option>
											<?php
												$query= "select * from partyadd";
												$result=$connect->query($query);
												while ($row=$result->fetch_assoc()) {
												echo "<option value='".$row['id']."'>".$row['partyname']."</option>";
													}

												?>	
										</select>
										<button name="choose" value="Choose">Choose</button>
							<?php 
								$pid;
								if (isset($_POST['choose'])) {
									$pid=$_POST['pname'];
									//echo $id;
									$sel="select * from partyadd where id='$pid'";
									$re=$connect->query($sel);
									$da=$re->fetch_array();
								}
							?>
					</div>
					</form>	

					<form method="post" name="update1" action="update.php" enctype="multipart/form-data">
					<div class="party1">
						<input type="text" name="partyId" style="display: none;" value="<?php echo $da['id']; ?>">
					 	<fieldset style="height: 370px; margin-top: 40px;"><legend>Party Update Form:</legend>
					 	<div class="input">

					 		<div class="pn" style="height: 25%; width: 100%; background-color:  ;">
					 			<label>Party Name</label>
					 			<input type="text" name="pn" id="pn" required="required" placeholder="Enter Party Name"  value="<?php if (isset($da['partyname'])) {echo $da['partyname'];} ?>">
					 		</div>

					 		<div class="desc" style="height: 40%; width: 100%; background-color: ;">
					 			<label>Party Description</label><textarea
					 			rows="10" cols="50" name="desc" id="desc" placeholder="Description of Party" required="required" value=""><?php if (isset($da['description'])) {echo $da['description'];} ?></textarea>
					 		</div>
					 		<div class="Cost" style="height: 15%; width: 100%; background-color: ;" >
					 			
					 			<div class="cost" style="height:100%; width: 25%; float: left;">
					 				<label>Cost</label><input type="text" name="cost" id="cost" placeholder="cost per child" required="required" value="<?php if (isset($da['cost'])) {echo $da['cost'];} ?>">
					 			</div>

					 			<div class="time" style="height:100%; width: 40%;  float: left;">
					 				<label>Length of party</label><input type="text" name="time" id="time" placeholder="e.g:60,90,120" required="required" value="<?php if (isset($da['length'])) {echo $da['length'];} ?>">
					 			</div>

					 			<div class="max" style="height:100%; width: 35%;  float: left;">
					 				<label>Maxium Children</label><input type="text" name="max" id="max" placeholder="Max child in no." required="required" value="<?php if (isset($da['number'])) {echo $da['number'];} ?>">
					 			</div>
					 		</div>

					 		<div class="service" style="height: 25%; width: 100%; background-color: ;">
					 			<label>Party Service</label><textarea rows="10" cols="50" name="service" id="service" placeholder="Service You provide" required="required"><?php if (isset($da['service'])) {echo $da['service'];} ?></textarea>
					 		</div>
					 	</div>
					 	</fieldset>
					</div>

					<div class="party2">
						<fieldset style="height: 363px; margin-top: 48px;">
						<div class="upimage" style="height: 70%; width:90%; background-color: ; margin: auto; margin-top: 20px; ">
							<input type="file" name="image" id="image" value="">
								<div style="height: 80%; width: 60%; background-color: grey; float: right; margin-right: 100px;">
									
									
									<img src="partyimg/party_<?php if (isset($da['photo'])) {echo $da['photo'];} ?>" height="100%" width="100%"/>


								</div>
							</div>
							<div class="but" style="height: 20%; width: 50%; background-color: ; margin:auto; margin-bottom: 0px;">
								<input type="submit" name="partyupdate" id="partyupdate1" value="Update Party">
								<input type="submit" name="partydelete" id="partydelete" value="Delete Party">
							</div>
						</fieldset>
					</div>
					</form>	
				</div>

				<div class="gall" id="gall" style="background-color: ; display: none;">
					<div style="background-color: ; height: px; width: 100%;">
						<div style="background-color:#ECECEA; width: 100%; height: 500px; float: left; ">
								<?php
								while ($row1=$result1->fetch_assoc()) {
								echo '<div style="height:450px; width:400px; background-color:; float:left; margin:10px; box-shadow: -12px 16px 15px -8px rgba(0,0,0,0.81); border:1px solid #C63D0F; ">'
									?>

								<?php
								$imag="party_"."$row1[photo]";
									#echo  $imag ?>
						<div style=" height: 30px; width: 100%; background-color: ; margin-top: -5px;">
							<p align="center"><font face="Bell MT" size="5px"><?php echo $row1['partyname'];?></font></p>
						</div>
						<div style="height: 130px; width: 100%; background-color: ;">
							<div style="height: 120px; width: 70%; margin-top: 5px; margin-left: 40px;box-shadow: 19px -18px 26px -8px rgba(0,0,0,0.47);">
								<img src="partyimg/<?php echo $imag;?>" width='100%' height='100%'/>
							</div>
						</div>
						<div style="height: 260px; width: 90%;  border:1px solid #C63D0F; margin: auto;">
							<div style="height: 90px; width: 100%; background-color: ;border-bottom:1px dotted #C63D0F;">
								<label style="width: 100px; float:">Description:</label>
								<div style="float: right; height: 100%; border-left: 1px solid #C63D0F; width: 70%; background-color: ; overflow: auto;">
								<?php echo $row1['description'];?>
								</div>
							</div>
							<div style="height: 30px; width: 100%; background-color: ; border-bottom:1px dotted #C63D0F;">
								<div style="height: 30px; width: 48%; background-color: ; float: left; border-right: 1px solid #C63D0F"">
									<label style="width: 50px; float:">Cost/Child(£):</label>
									<div style="float: right; height: 100%; width: 30%; background-color: ;">
									<?php echo $row1['cost'];?>
									</div>
								</div>
								<div style="height: 30px; width: 50%; background-color: ; float: left;">
									<label style="width: 50px; float:">Length(min):</label>
									<div style="float: right; height: 100%; width: 30%; background-color: ;">
									<?php echo $row1['length'];?>
									</div>
								</div>
							</div>
							<div style="height: 30px; width: 100%; background-color: ; border-bottom:1px dotted #C63D0F;">
									<label style="width: 50px; float:">Number of children:</label>
									<div style="float: right; height: 100%; width: 45%; background-color: ;">
									<?php echo $row1['number'];?>
									</div>
							</div>
							<div style="height: 100px; width: 100%; background-color: ; border-bottom:1px dotted #C63D0F;">
								<label style="width: 100px; float:">Service:</label>
								<div style="float: right; border-left: 1px solid #C63D0F; height: 100%; width: 70%; background-color: ; overflow: auto;">
									<?php echo $row1['service'];?>
								</div>
							</div>
						</div>
					
					</div>
						<?php
								}
								?>
					</div>
				</div>


			
		<script>				
								$("#image").change(function(e) {
    							for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
       							 var file = e.originalEvent.srcElement.files[i];
      							   	var img=document.getElementById('image1');
      								var reader = new FileReader();
       								reader.onloadend = function() {
          							img.src = reader.result;
     							}
       								reader.readAsDataURL(file);
        							$("#image").after(img);
								  }
											});
									</script>


		<script type="text/javascript">

			$(document).onload(function(){
			 var id = document.getElementById('partyId').value;
			 alert("cick");
			 if (id !="") {
			 		$("#partyadd").hide();
					
					$("#profileedit").hide();
					$("#homepage").hide();
					$("#gall").hide();
					$("#partyupdate").show();

			 }
		})

		</script>

			<script>
				
			function dis(){
					document.getElementById('partyupdate').style.display="block";
					document.getElementById('homepage').style.display="none";
				}
			</script>

		<script>
				$("#add").click(function(){
				//alert("cick");
					$("#partyadd").show();
					$("#partyupdate").hide();
					$("#profileedit").hide();
					$("#homepage").hide();
					$("#gall").hide();
				})

			</script>


		<script>
				$("#update").click(function(){
					//alert("cick");
					$("#partyadd").hide();
					$("#partyupdate").show();
					$("#profileedit").hide();
					$("#homepage").hide();
					$("#gall").hide();
				})

			</script>

			<script>
				$("#choose").click(function(){
					//alert("cick");
					$("#partyadd").hide();
					$("#partyupdate").show();
					$("#profileedit").hide();
					$("#homepage").hide();
					$("#gall").hide();
				})

			</script>

		<script>
				$("#profile").click(function(){
					//alert("cick");
					$("#partyadd").hide();
					$("#gall").hide();
					$("#partyupdate").hide();
					$("#profileedit").show();
					$("#homepage").hide();
				})
			</script>

		<script >
				$("#home").click(function(){
					$("#homepage").show();
					$("#partyadd").hide();
					$("#partyupdate").hide();
					$("#profileedit").hide();
					$("#gall").hide();
				})

			</script>	

		<script >
				$("#details").click(function(){
					$("#gall").show();
					$("#homepage").hide();
					$("#partyadd").hide();
					$("#partyupdate").hide();
					$("#profileedit").hide();
				})

			</script>		
			</div>
			<!--Footer Part-->
		<div class="footer" style="position: fixed; bottom: 0px; display: block; " >
				<div class="address">
					<div class="add" style="height: 80%; width: 70%; background-color: #74AFAD; margin: auto;
					margin-top: 3%; border-right: 1px solid black; ">
						<label style="font-size: 15px; text-align: center;">
						<span>Mr XXXX XXXXX<br></span>
						<span>S031 4NG<br></span>
						<span>3 Low Street, SouthAmption<br></span>
						</label>
						
					</div>
				</div>
				<div class="contact">
					<div class="con" style="height: 80%; width: 95%; background-color: #74AFAD; margin: 3%; border-right: 1px solid black;">
						<label style="font-size: 15px;">
						<span>Ph.no:0000-0000-0000<br></span>
						<span>Fax:(070) 4** ****<br></span>
						<span>email: <a href="https://accounts.google.com" target="_blank">Rajinda@gmail.com</a><br></span>
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