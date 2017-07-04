
<?php
include("../../php/config.php");
session_start();
if (!isset($_SESSION['uid']) && !isset($_SESSION['utype'])) {
	header('location:../../index.php');
}
if ($_SESSION['utype'] != 'normal') {
	header('location:../../index.php');
}
$id = $_SESSION['uid'];
$select  = "select * from register where id='$id' ";
$select_check = $connect->query($select);
$all = $select_check->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Normal User Portal</title>
	<link rel="stylesheet" type="text/css" href="normal.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<style>
.mySlides {display:none}
.w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:13px;width:13px;padding:0}
</style>
<body>
	<div class="top">
		<div class="intop" style="height: 98%; width: 100%; background-color:; border-bottom:2px solid white; ">
			<div class="top1">
					<div style="height: 180px; width: 95%; background-color: ; margin: auto; margin-top: 10px; border-radius: 4px;">
					<img src="../../image/Logo.png" height="100%" width="100%">
					</div>
				<div style="height: 100px; width: 95%; border: 1px solid #C63D0F; margin-top: 5px; margin-left: 13px; border-radius: 4px;">
					<div style="height: 70%; width:95%; background-color: ; margin-left: 10px;">
						<p align="center" style="margin-top:22px; line-height: 50%">
						<font size="10" color="#3B3738" face="Fantasy">Welcome</font>
						</p>
						<p align="center" style="margin-top:15px; line-height: 150%">
						<font size="10" color="#3B3738" face="Fantasy" ><?php echo $all['fname']." ".$all['lname'];?> 
						</font>
						</p>
					</div>
				</div>
			</div>
			<div style="height: 40px; background-color: ; width: 100%; margin-top: 303px; position: absolute;">
				<div class="button">
					<ul>
						<li><a href="#" style="	border-top: 1px solid white;">Home</a></li>
						<li><a href="partydetails.php" style="	border-top: 1px solid white;">Party Details</a></li>
						<ul class="li" id="book">
						<li><a href="normalportal.php" style="	border-top: 1px solid white;">Booking</a></li>
							<ul class="list">
								<li><a href="booking.php" style="	border-top: 1px solid white;">Booking</a></li>
								<li><a href="bookingedit.php" style="	border-top: 1px solid white;">Booking Edit</a></li>
							</ul>
						</ul>	
					</ul>
				</div>
				<div class="button1">
					<ul class="li">
						<li><a href="normalportal.php" style="	border-top: 1px solid white;">Profile</a></li>
							<ul class="list">
								<li><a href="profile.php" style="	border-top: 1px solid white;">Profile Edit</a></li>
								<li><a href="logout.php" style="	border-top: 1px solid white;">Log Out</a></li>
							</ul>
					</ul>
				</div>
			</div>
		</div>
	</div>


	<div class="body">
			<div class="w3-container">
  <h2>Different Parties</h2>
  <p>Peopel celebrating different parties in different theme. Come and Join Us</p>
</div>

<div class="w3-content w3-display-container" style="max-width:1200px; box-shadow: -11px 7px 18px -4px rgba(0,0,0,0.75);">
  <img class="mySlides" src="image/logo.png" style="width:100%; height: 300px; background-color: #ECECEA;">
  <img class="mySlides" src="image/party1.jpg" style="width:100%;height: 300px;">
  <img class="mySlides" src="image/party2.jpg" style="width:100%; height: 300px;">
  <img class="mySlides" src="image/party3.jpg" style="width:100%; height: 300px;">
  <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
    <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
    <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
  </div>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
</script>

	</div>
	
	<!--       Footer Part       -->
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