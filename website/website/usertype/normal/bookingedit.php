<?php
include("../../php/config.php");
session_start();
$id = $_SESSION['uid'];
$select="select b.id,b.customer_id,b.date,b.cost,b.number_childern,p.partyname from booking b, register r, partyadd p where customer_id=$id and b.customer_id=r.id and b.party_id=p.id";
	$data=$connect->query($select);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Party Edit</title>
	<link rel="stylesheet" type="text/css" href="bookedit.css">
</head>
<body>
		<div class="box">
			<div class="list">
						<?php
						while ($result=$data->fetch_assoc()) {?>
							 <label style="width: 150px; float: left; line-height: 20px;">
							 <?php echo $result['partyname']; ?></label>
							 <a href="bedit.php?pid=<?php echo $result['id']; ?> "
							 style="background-color: ; line-height: 20px; text-decoration:none;">Edit</a></br>
							 
							<?php
								}
							?>

					
			</div>
		</div>
	

	<!--  fOOTER PART -->

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