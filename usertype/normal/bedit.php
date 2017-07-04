<?php
	include("../../php/config.php");
	session_start();
	$id=$_SESSION['uid'];
	$pid=$_GET['pid'];
	$select="select b.id, b.date,b.number_childern,b.cost,p.partyname from booking b, register r, partyadd p where b.customer_id=r.id and b.party_id=p.id and b.id='$pid'";
	$data=$connect->query($select);
	$partydata=$data->fetch_assoc();
	

	if (isset($_POST['submit'])) {
		$party=$_POST['party'];
		$date=$_POST['date'];
		$child=$_POST['child'];
		$total=$_POST['total'];
		$updateQuery="update booking set party_id=$party, number_childern=$child
  		, date='$date', cost=$total	WHERE id=$pid";
  		echo $updateQuery;
  		$updateQuery1=$connect->query($updateQuery);
  			
	}
	if (isset($_POST['cancel'])) {
		$DeleteQuery="delete from booking WHERE id=$pid";
  		$connect->query($DeleteQuery);
  		?>
  		<script>
		document.getElementById("me").innerHTML = "Book delete";
		</script>
  		<?php
  			
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Boking edit</title>
	<link rel="stylesheet" type="text/css" href="bookedit.css">
</head>
<body>
<div class="box">
			<div class="list">

	<form method="post">
		<p><label>Party Name</label>
		<input type="text" id="party" name="party" required="required" placeholder="Party Name" onkeyup="times()" value="<?php echo $partydata['partyname']; ?>" style="width: 100px; height: 30px;"></p>
		<label>Party Update</label>
		<select id="combobox" onchange="loadeCost()" name="party">
			<option>None</option>
			<?php
			$s="select * from partyadd";
			$d=$connect->query($s);
			while ($p=$d->fetch_assoc()) {
			?> <option value="<?php echo $p['id']; ?>" > <?php echo $p['partyname']; ?> </option>
			<?php
			}
			?>
				<script>
						function times(){
							
							var per=document.getElementById('cost').value;
							var child=document.getElementById('child').value;
							var total=per*child;
							document.getElementById('total').value=total;
						}
					
						function loadeCost(){
						var txt = document.getElementById('combobox').value;
						var req;
					if(window.XMLHttpRequest)
					{
					req = new XMLHttpRequest();
		
					}
				else req = new ActiveXObject("Microsoft.XMLHTTP");
				req.onreadystatechange = function()
				{
					if(req.readyState==4)
				{
				document.getElementById('cost').value = req.responseText; 
				}
				}
				req.open("GET", "cost.php?pid="+txt, true)
				req.send();
						}	
					</script>
					

		</select></br>
		<p><label>Date</label>
		<input type="text" name="cost" id="cost" style="display:none ;">
		<input type="date" name="date" required="required" placeholder="Enter Year" style="width: 240px; height: 30px;" value="<?php echo $partydata['date']; ?>"></p>
		<p><label>No Of Children</label>
		<input type="text" id="child" name="child" required="required" placeholder="Enter Child number" onkeyup="times()" value="<?php echo $partydata['number_childern']; ?>" style="width: 100px; height: 30px;"></p>
		<p><label>Total cost</label>
		<input type="text" id="total" name="total" required="required" placeholder="Total Amount" style="width: 100px; height: 30px;" value="<?php echo $partydata['cost']; ?>"></p>
		<input type="submit" name="submit" value="Submit">
		<input type="submit" name="cancel" value="Cancel">
		<p id="me"></p>	
		
	</form>

		
			</div>
		</div>

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
