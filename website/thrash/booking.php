<?php
					//party name in combo box
						$party="select * from partyadd";
						$party1=$connect->query($party);
						while ($row=$party1->fetch_assoc()) {
							echo $row['partyname']."<button>Book</button></br>";
						}
					?>


<div class="bookform">
			
			<form method="post" action="bookquery.php">
			<fieldset style="box-shadow: -11px 7px 18px -4px rgba(0,0,0,0.75);">
			<legend style="font-family: Kristen ITC; ">Booking Form
			</legend>
			<div style="height: 10px; width: 100%; background-color: ;">	
			</div>
			<div class="partyname" style="height: 70px; width: 40%; background-color: ; margin-left: 10px; float: left;">
				<label style="float: left; width: 100px;">Party Name</label>
				<select style="width: 150px; height: 30px;">
					<option>None</option>
					<?php
					//party name in combo box
						$party="select * from partyadd";
						$party1=$connect->query($party);
						while ($row=$party1->fetch_assoc()) {
							echo "<option value='$row[id]'>".$row['partyname']."</option>";
						}
					?>
				</select>
			</div>
			<div class="children" style="height: 70px; width: 57%; background-color: ; margin-left:px; float: left;">
				<label style=" float:left; width: 120px;">Children Number</label><input type="text" name="children" required="required" placeholder="Enter Number of Children" style="width: 240px; height: 30px;">
			</div>
			<div class="date" style="height: 70px; width: 97%; background-color: ; margin-left:10px; float: left;">
				<div class="year" style="height: 70%; width: 30%; float: left">
					<label style="float: left; width: 50px;">Year</label>
					<input type="text" name="year" required="required" placeholder="Enter Year" style="width: 100px; height: 30px;">
				</div>
				<div class="month" style="height: 70%; width: 30%; float: left">
					<label style="float: left; width: 50px;">Month</label>
					<input type="text" name="month" required="required" placeholder="Enter Month"  style="width: 120px; height: 30px;">
				</div>
				<div class="day" style="height: 70%; width: 30%; float: left">
					<label style="float: left; width: 50px;">Day</label>
					<input type="text" name="day" required="required" placeholder="Enter Day" style="width: 100px; height: 30px;">
				</div>
			</div>
			<div class="cost" style="height: 50px; width: 97%; background-color: ; margin-left:10px; float: left;">
				<div class="" style="height: 70%; width: 50%; float: left">
					<label style="float: left; width: 120px;" >NO. of Child</label><input type="text" name="child" required="required" placeholder="Enter Child number" style="width: 100px; height: 30px;">
				</div>
				<div class="" style="height: 70%; width: 50%; float: left">
					<label style="float: left; width: 100px;">Total cost</label><input type="text" name="total" required="required" placeholder="Total Amount" style="width: 100px; height: 30px;">

				
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