<?php
	include("../../php/config.php");
	session_start();
	$id=$_SESSION['uid'];
	$partyid=$_GET['pid'];
	$partydetails="select * from partyadd where id='$partyid'";
	$result=$connect->query($partydetails);
	$partydata=$result->fetch_assoc();
	if(isset($_POST['year1']) && isset($_POST['month1']))
	{
	$year=$_POST['year1']; //2018
	$month=$_POST['month1']; //04
	}
	else
	{
	$year=date('Y'); 
	$month=date('m'); 
	}
	$format_date = $year."-".$month;
	$query = "select * from booking where date like '$format_date%'";
	$result1 = $connect->query($query);
	$counter=0;
				while($data = $result1->fetch_array())
				{
				$date=strtotime($data['date']);
				$day=date('d',$date);
				$days[$counter]=$day;
				$counter++;
				} 

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
	<title></title>
	<link rel="stylesheet" type="text/css" href="bookform.css">
</head>
<body>
	<div style="height: ; width: 675px; background-color: ; margin-left: 20%; margin-top: 10px; position: relative;">
			<fieldset>
			<legend style="font-family: Kristen ITC; ">To see Un_Available Dates
			</legend>
			<form method="post">
				<div style="height: 130px; width: 30%; background-color: ;box-shadow: -1px 1px 23px 8px rgba(0,0,0,0.76); margin-top: 30px; margin-left: 50px; float: left;">
						<p class="year">
						<label style="font-family: Kristen ITC">Year</label>
						<select name="year1" class="year1">
						<option>None</option>
						<option>2017</option>
						<option>2018</option>
						<option>2019</option>
						<option>2020</option>
						</select>
						</p>
						<p class="month">
						<label style="font-family: Kristen ITC">Month</label>
						<select name="month1" class="month1">
						<option value="00">None</option>
						<option value="01">January</option>
						<option value="02">February</option>
						<option value="03">March</option>
						<option value="04">April</option>
						<option value="05">May</option>
						<option value="06">June</option>
						<option value="07">July</option>
						<option value="08">August</option>
						<option value="09">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
						</select></p>
						<input type="submit" name="submit" value="See Dates">
				</div>
			</form>
				<div style="height: 180px; width: 45%; background-color: ; margin-top: 10px; margin-left: 50px; float: left; box-shadow: -2px -1px 35px 6px rgba(0,0,0,0.76);">
					<p style="line-height: 00%; text-align: center; font-size: 15; font-family: Impact;">Booked Dates Down Below(Un-Available)</p>
						<?php
						if (!empty($days)) {
							echo "<label style='font-family:Impact; font-size:15px;'>".$year."-".$month.":   </label>";
							sort($days);
							foreach ($days as $key => $day) {
							echo "<label style='font-family:Impact; font-size:13px;'>".$day.", "."</font></label>";
								}
							}
							else
							{
							echo "<label style='font-family:Impact; font-size:15px;'>".$year."-".$month.": All Dates Are Available for this month </label>";
							}
							?>
				</div>
			</fieldset>
		</div>	

		<div style="width: 100%; height: 80px; background-color:;">
		<div style="width: 500px; background-color: ; float: right; margin-right: 400px; margin-top: 20px;">
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
		<?php
											$cost=$partydata['cost'];
											if(isset($_POST['currency'])){
											$to=$_POST['currency'];
											$cost=changeCurrency($cost,"GBP",$to);
										}
		?>

	<div class="bookform">
			<form method="post" action="bookquery.php">

				<input type="text" name="partyid" style="display:none ;" value="
					<?php 
					if (isset($partydata)) {echo $partydata['id'];} 
					?>
				">
				<input type="text" name="partyname" style="display:none ;" value="
					<?php 
					if (isset($partydata)) {echo $partydata['partyname'];} 
					?>
				">
				<input type="text" id="cost" name="cost" style="display:none ;"
				value="
					<?php 
						echo $cost;
						?>
				">
				<input type="text" name="childno" style="display:none ;"
				value="
					<?php 
					if (isset($partydata)) {echo $partydata['number'];} 
					?>
				">
			<fieldset style="box-shadow: -11px 7px 18px -4px rgba(0,0,0,0.75);">
			<legend style="font-family: Kristen ITC; ">Booking Form
			</legend>
			<div style="height: 10px; width: 100%; background-color: ;">	
			</div>
			<div class="date" style="height: 70px; width: 97%; background-color: ; margin-left:10px; float: left;">
				<div class="year" style="height: 70%; width: 100%; margin-left: ;">
					<label style="float: left; width: 120px;">Date</label>
					<input type="date" name="date" required="required" placeholder="Enter Year" style="width: 240px; height: 30px;">
				</div>
			</div>
			<div class="cost" style="height: 50px; width: 97%; background-color: ; margin-left:10px; float: left;">
				<div class="" style="height: 70%; width: 35%; float: left; background-color: ">
					<label style="float: left; width: 100px;" max="20" >NO. of Child</label><input type="number" id="child" name="child" required="required" max="<?php echo $partydata['number'] ?>" min="2" placeholder="Enter Child number" onkeyup="times()" style="width: 100px; height: 30px;">
				</div>
				<div class="" style="height: 70%; width:35%; float: left; background-color: ">
					<label style="float: left; width: 80px;">Total cost</label><input type="text" id="total" name="total" required="required" placeholder="Total Amount" style="width: 120px; height: 30px;">	
					<script>
						function times(){
							var per=document.getElementById('cost').value;
							var child=document.getElementById('child').value;
							var total=per*child;
							document.getElementById('total').value=total;
						}
					</script>
				</div>
			</div>
			<div class="button" style="height: 70px; width: 97%; background-color: ; margin-left:10px; float: left;">
				<div style="height: 50px; width: 40%; float: left; margin-top: 10px; margin-left:55px;">
					<input type="submit" name="submit" value="Submit" style="height: 100%; width: 100%; border:none;">
				</div>
				<div style="height: 50px; width: 40%; float: left;margin-top: 10px;">
					<input type="reset" name="reset" value="Reset" style="height: 100%; width: 100%; border:none;">
				</div>
			</div>
			</fieldset>
			</form>
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