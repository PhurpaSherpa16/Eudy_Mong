<?php
include("../../php/config.php");
session_start();
	$id=$_SESSION['uid'];
	$select="select * from partyadd";
	$select_check=$connect->query($select);
	function changeCurrency($amount, $from, $to)
 					 {
   					 $url  = "http://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
   					 $data = file_get_contents($url);
    					preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
   						$converted = preg_replace("/[^0-9.]/", "", $converted[1]);
   						return round($converted, 3);
 					}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Party Details
	</title>
	<link rel="stylesheet" type="text/css" href="partydetails.css">
</head>
<body style="padding: 0px; margin: 0px; background-color: #D9853B;">
	<div style="width: 100%; height: 80px; background-color: ;">
		<div style="width: 500px; background-color: ; float: right; margin-right: 10px; margin-top: 20px;">
			<form method="post">
				<label style="width:150px; float: left; font-family: Kristen ITC;">Currency Choose</label>
				<select name="currency" style="width: 200px; height: 30px;">
					<option style="font-family: IMPACt;" value="USD">UAS($)</option>
					<option style="font-family: IMPACt;" value="EUR">EURO(€)</option>
				</select>
				<input type="submit" name="cu" value="Change" id="cu" style="width: 80px;font-family: Kristen ITC;background-color: white;border:none; border-radius: 8px; ">
			</form>
				
		</div>
	</div>
	<div class="gall" id="gall" style="background-color: #D9853B ; height: 1145px; position: absolute;">
					<div style="background-color: #D9853B ; height: px; width: 100%;">
						<div style="background-color:#ECECEA; width: 100%; float: left; ">
								<?php
								while ($all=$select_check->fetch_assoc()) {
								echo '<div style="height:450px; width:400px; background-color:#C63D0F; float:left; margin:10px; box-shadow: -12px 16px 15px -8px rgba(0,0,0,0.81); margin-left:30px; border:1px solid #C63D0F; ">';
									$cost=$all['cost'];
								if(isset($_POST['currency'])){
											$to=$_POST['currency'];
											$cost=changeCurrency($cost,"GBP",$to);
										}
								$imag="party_"."$all[photo]";
									#echo  $imag ?>
						<div style=" height: 30px; width: 100%; background-color: ; margin-top: -5px;">
							<p align="center"><font face="Bell MT" size="5px"><?php echo $all['partyname'];?></font></p>
						</div>
						<div style="height: 130px; width: 100%; background-color: ;">
							<div style="height: 120px; width: 70%; margin-top: 5px; margin-left: 40px;box-shadow: 19px -18px 26px -8px rgba(0,0,0,0.47);">
								<img src="../admin/partyimg/<?php echo $imag;?>" width='100%' height='100%'/>
							</div>
						</div>
						<div style="height: 260px; width: 90%;  border:1px solid white; margin: auto;">
							<div style="height: 90px; width: 100%; background-color: ;border-bottom:1px dotted #C63D0F;">
								<label style="width: 100px; float:">Description:</label>
								<div style="float: right; height: 100%; border-left: 1px solid #C63D0F; width: 70%; background-color: ; overflow: auto;">
								<?php echo $all['description'];?>
								</div>
							</div>
							<div style="height: 30px; width: 100%; background-color: ; border-bottom:1px dotted #C63D0F;">
								<div style="height: 30px; width: 48%; background-color: ; float: left; border-right: 1px solid #C63D0F"">
									<label style="width: 50px; float:">Cost/Child:</label>
									<div style="float: right; height: 100%; width: 30%; background-color: ;">
									<?php echo $cost;?>

									</div>
								</div>
								<div style="height: 30px; width: 50%; background-color: ; float: left;">
									<label style="width: 50px; float:">Length(min):</label>
									<div style="float: right; height: 100%; width: 30%; background-color: ;">
									<?php echo $all['length'];?>
									</div>
								</div>
							</div>
							<div style="height: 30px; width: 100%; background-color: ; border-bottom:1px dotted #C63D0F;">
									<label style="width: 50px; float:">Number of children:</label>
									<div style="float: right; height: 100%; width: 45%; background-color: ;">
									<?php echo $all['number'];?>
									</div>
							</div>
							<div style="height: 100px; width: 100%; background-color: ; border-bottom:1px dotted #C63D0F;">
								<label style="width: 100px; float:">Service:</label>
								<div style="float: right; border-left: 1px solid #C63D0F; height: 100%; width: 70%; background-color: ; overflow: auto;">
									<?php echo $all['service'];?>
								</div>
							</div>
						</div>
					
					</div>
						<?php
								}
								?>
					</div>
				</div>

<!--    Footer -->
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