<?php
		

		<div class="body" style=" top: 130px;">
			<div>
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
		</div>


?>