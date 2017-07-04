<?php
include("../../php/config.php");
session_start();
$id=$_SESSION['uid'];
$select="select * from register where id='$id'";
$data=$connect->query($select);
$result=$data->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile Edit</title>
	<link rel="stylesheet" type="text/css" href="profile.css">
</head>
<body>
	<div class="main">

		<div class="form">
			<form action="profileEdit.php" method="post">
					<div style="background-color:  ; height: 450px; width: 95%; margin:auto; margin-top: -10px;">
							<div style="height: 40px; width: 100%; background-color: ; float: left;">
								<div style="margin:auto; background-color: ; height: 70%; width: 100px; padding: 1px;"></div>
							</div>
							<fieldset>
								<legend style="color: White; font-family: Kristen ITC ">Profile Edit</legend>
						<div class="input1" style="width: 92%; height: 90%; float: left;margin-left: 33px; background-color: ;">
							<div class="sname" style="height: 50px; width: 100%; background-color: ">
								<div class="fname" style="float: left;">
									<label>First Name</label><input type="text" name="fname" placeholder="Enter Your First Name" value="<?php echo $result['fname']; ?>" id="fname" required="required">
								</div>
								<div class="lname" style="float: left;">
									<label>Last Name</label>
									<input type="text" name="lname" placeholder="Enter Your Last Name" value="<?php echo $result['lname']; ?>" id="lname">
								</div>
							</div>
								<div class="email" style="height: 50px; width: 100%;">
									<label>Email</label><input type="email" name="email" placeholder="Enter Your Email Name" value="<?php echo $result['email']; ?>" id="email">
								</div>
								<div class="username" style="height: 50px; width: 100%;">
									<label>User Name</label><input type="text" name="username" placeholder="Enter Your User Name" value="<?php echo $result['uname']; ?>" id="username">
								</div>
								<div class="address1" style="height: 50px; width: 100%; background-color:">
									<label>Address</label><input type="text" name="address1" placeholder="Enter Your Address" value="<?php echo $result['address']; ?>" id="address1">
								</div>
							<div class="gender" style="height: 50px; width: 100%;">
								<div class="gender">
									<label id="gender" style="font-family: Kristen ITC;">Gender
										<input type="radio" name="gender" value="Female"
											<?php 
												if (isset($result['gender']) && $result['gender'] == "Female") {
													echo "checked='checked'";
												}
											?>
										>Female
										<input type="radio" name="gender" value="Male"
											<?php 
												if (isset($result['gender']) && $result['gender'] == "Male") {
													echo "checked='checked'";
												}
											?>
										>Male
										<input type="radio" name="gender" value="Others"
											<?php 
												if (isset($result['gender']) && $result['gender'] == "Others") {
													echo "checked='checked'";
												}
											?>
										 >Others
									</label>
								</div>
								<div class="phone">
									<label>Phone</label><input type="text" name="phone" placeholder="Enter Your Phone Number" value="<?php echo $result['phone']; ?>" id="phone">
								</div>
							</div>
							<div class="password" style="height: 50px; width: 100%; background-color: ;">
								<label>Password</label><input type="password" name="password" placeholder="Enter Your Password " value="<?php echo $result['password']; ?>" id="password">
							</div>
							<div class="b" style="height: 50px; width: 100%; background-color: ; margin-top: 50px;">
								<div class="submit1" style="margin-left: 200px; width: 60%; height: 90%; background-color:;">
									<button type="submit" name="submit1" id="submit1" value="Submit">Update</button>
								</div>
							</div>
						</div>
						</fieldset>
					</div>
			</form>
		</div>

		<div style="height: 450px; width: 500px;background-color: #C63D0F; float: left;margin-top: 30px; margin-left: 50px;border-radius: 7px;border:1px solid #C63D0F;box-shadow: -16px 9px 37px 6px rgba(0,0,0,0.81);">
				<div style="background-color: ; padding: 10px; margin: 10px;">

				<?php
					if(isset($_POST['upchild'])){
						$id=$_SESSION['uid'];
						$cname=$_POST['cname'];
						$date=$_POST['date'];
						$cname1=$_POST['cname1'];
						$date1=$_POST['date1'];
						$cname2=$_POST['cname2'];
						$date2=$_POST['date2'];
						$cname3=$_POST['cname3'];
						$date3=$_POST['date3'];
						$insert="";
						if (empty($cname1) && empty($cname2) && empty($cname3)) {
							$insert="insert into children values(null,'$cname','$date',$id)";
						}elseif (empty($cname2) && empty($cname3)) {
							$insert="insert into children values(null,'$cname','$date',$id),(null,'$cname1','$date1',$id) ";
						}
						elseif (empty($cname3)) {
							$insert="insert into children values(null,'$cname','$date',$id),(null,'$cname1','$date1',$id), (null,'$cname2','$date2',$id)";
						}
						else{
							$insert="insert into children values(null,'$cname','$date',$id),(null,'$cname1','$date1',$id), (null,'$cname2','$date2',$id),(null,'$cname3','$date3',$id)";
						}
						$insertchildren=$connect->query($insert);
						
					}
				?>
					<form method="post">
				<fieldset style="height: 400px;">
					<legend style="color: White; font-family: Kristen ITC ">Profile Edit</legend>
						<div class="sname" style="height: 50px; width: 100%; background-color: ">

								<div style="width: 100%; height: 80%; background-color: ;">
									<label style="width: 150px; float: left;font-family: Kristen ITC;">Children Name</label><input type="text" name="cname" placeholder="Enter Your children Name" id="cname" required="required">
								</div>
								<div style="width: 100%; height: 80%">
									<label style="width: 150px; float:left; font-family: Kristen ITC;">Date of Birth</label><input type="date" name="date" id="date" required="required" style="width:233px; ">
								</div>
								<div style="width: 100%; height: 80%; background-color: ;">
									<label style="width: 150px; float: left;font-family: Kristen ITC;">Children Name</label><input type="text" name="cname1" placeholder="Enter Your children Name"  id="cname1">
								</div>
								<div style="width: 100%; height: 80%">
									<label style="width: 150px; float:left; font-family: Kristen ITC;">Date of Birth</label><input type="date" name="date1"  id="date1" style="width:233px;">
								</div>
								<div style="width: 100%; height: 80%; background-color: ;">
									<label style="width: 150px; float: left;font-family: Kristen ITC;">Children Name</label><input type="text" name="cname2" placeholder="Enter Your children Name"  id="cname2">
								</div>
								<div style="width: 100%; height: 80%">
									<label style="width: 150px; float:left; font-family: Kristen ITC;">Date of Birth</label><input type="date" name="date2"  id="date" style="width:233px;" >
								</div>
								<div style="width: 100%; height: 80%; background-color: ;">
									<label style="width: 150px; float: left;font-family: Kristen ITC;">Children Name</label><input type="text" name="cname3" placeholder="Enter Your children Name"  id="cname">
								</div>
								<div style="width: 100%; height: 80%">
									<label style="width: 150px; float:left; font-family: Kristen ITC;">Date of Birth</label><input type="date" name="date3"  id="date" style="width:233px;">
								</div>
								<div style="width: 100%; height: 80%; background-color: ;">
									<input type="submit" name="upchild" value="Submit" id="upchild" style="height: 95%; width: 200px;font-family: Kristen ITC;background-color: #D9853B;border:none; ">
								</div>
							</div>
				</fieldset>
				</form>
				</div>
		</div>
	</div>
	<!--    Foooter Part  -->

	<div class="footer">
		<div class="footer1">
			<div style="height: 60%; width: 98%; background-color: #FDF3E7; margin:; margin-top: 10%; border-radius: 2px;">
				<a href="normalportal.php" ><img src="../../image/Logo.png" height="100%" width="100%"></a>
			</div>
		</div>
		<div class="footer2">
			<p><font size="5" face="Kristen ITC">Rajinda Party House.</font></p>
			<p>Manager:-Mr XXXX XXXXX</p>
			<p>Location:- S031-4NG-3,Low Street-SouthAmption UK</p>
			<p></p>
		</div>
		<div class="footer3">
			<p><font size="5" face="Kristen ITC">Contact Us:</font></p>
			<p>Ph.no:0000-0000-0000</p>
			<p>Fax:(070) 4** ****</p>
			<p class="email">Email:<a href="https://mail.google.com" target="_blank">Rajinda@gmail.com</a></p>

			
		</div>

		

		<div class="footer4">
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
					<a href="https://www.playstore.com" target="_blank"><img src="../../image/play.png" title="playstore" height="50px" width="100%">
				</div>
				<div class="google">
					<a href="https://www.plus.google.com" target="_blank"><img src="../../image/google.png" title="Google+" height="100%" width="100%"></a>
				</div>
		</div>

		<div class="bottom">
			<p style="line-height: 220%; color: white; text-align:center;">&copy & &reg of Rajinda Party House 2017</p>
		</div>	
	</div>

</body>
</html>