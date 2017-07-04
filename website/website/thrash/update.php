<div class="partyupdate" id="partyupdate" style="display:;">
					<div class="party1">
					 	
					 	<fieldset style="height: 370px; margin-top: 40px;"><legend>Party Update Form:</legend>
					 	<div class="input">
					 		<div class="pname" style="height: 15%; width: 100%; background-color: ;">
					 			<label>Party Name</label>

					 					<select class="pname" name="pname" id="pname" ?>">
											<?php
												$query= "select partyname from partyadd";
												$result=$connect->query($query);
												while ($row=$result->fetch_assoc()) {
												echo "<option>".$row['partyname']."</option>";
													}

												?>	
										</select>
										<button name="choose" value="Choose"> Choose</button>
							<?php 
								if (isset($_POST['choose'])) {
									$id=$_POST['pname'];
									echo $id;
									$sel="select * from partyadd where id='$id'";
									$re=$connect->query($sel);
									$da=$re->fetch_array();
								}
							?>
					 		</div>
					 		<div class="desc" style="height: 40%; width: 100%; background-color: ;">
					 			<label>Party Description</label><textarea
					 			rows="10" cols="50" name="desc" id="desc" placeholder="Description of Party" required="required" value=""><?php if (isset($da['description'])) {echo $da['description'];} ?></textarea>
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
						<div style="height: 80%; width: 60%; background-color: grey; float: right; margin-right: 100px;">
							
						</div>

						</div>

						<div class="but" style="height: 20%; width: 20%; background-color: ; margin:auto; margin-bottom: 0px;">
						<input type="submit" name="submit" id="submit" value="Add Party">
						</div>
						</fieldset>
					</div>	
				</div>
