


<select>
					<?php
						include("../php/config.php");
					$query= "select partyname from partyadd";
						$result=$connect->query($query);
						while ($row=$result->fetch_assoc()) {
							echo "<option>".$row['partyname']."</option>";
						}
					?>	
</select>






//thrash
		<div id="party" style="display: none;">
				<form method="post" enctype="multipart/form-data" action="party.php">
					<p><input type="text" name="pname" placeholder="Enter Party Name" id="pname" required="required"></p>
					<p><input type="text" name="desc" placeholder="Enter  Party Description" id="desc" required="required"></p>
					<p><input type="text" name="cost" placeholder="Enter Cost" id="cost" required="required"></p>
					<p><input type="text" name="length" placeholder="Enter Length" id="length" required="required"></p>
					<p><input type="text" name="number" placeholder="Enter Number of children" id="number" required="required"></p>
					<p><input type="text" name="product" placeholder="Enter services" id="product" required="required"></p>
					<p><input type="file" name="image" id="image" required="required"></p>
					<input type="submit" name="submit" id="submit">
				</form>
			</div>


			<div id="partyupdate" background-color:;">
					<div>
					<p>
					<select>
					<?php
						include("../php/config.php");
					$query= "select partyname from partyadd";
						$result=$connect->query($query);
						while ($row=$result->fetch_assoc()) {
							echo "<option>".$row['partyname']."</option>";
						}
					?>	
					</select></p>
					</div>
				<form method="post" enctype="multipart/form-data" action="party.php">
					<p><input type="text" name="pname" placeholder="Enter Party Name" id="pname" required="required"></p>
					<p><input type="text" name="desc" placeholder="Enter  Party Description" id="desc" required="required"></p>
					<p><input type="text" name="cost" placeholder="Enter Cost" id="cost" required="required"></p>
					<p><input type="text" name="length" placeholder="Enter Length" id="length" required="required"></p>
					<p><input type="text" name="number" placeholder="Enter Number of children" id="number" required="required"></p>
					<p><input type="text" name="product" placeholder="Enter services" id="product" required="required"></p>
					<p><input type="file" name="image" id="image" required="required"></p>
					<input type="submit" name="submit" id="submit">
				</form>
			</div>
			




			<script>
				$("#add").click(function(){
					//alert("cick");
					$("#party").show();
					$("#pup").hide();
				})

			</script>


		<script>
				$("#update").click(function(){
					//alert("cick");
					$("#pup").show();
					$("#party").hide();
				})

			</script>