							<body>
							<form method="post">
								<label>Party Name</label>

					 					<select name="pname">
											<?php
											include('../php/config.php');
												$query= "select id, partyname from partyadd";
												$result=$connect->query($query);
												while ($row=$result->fetch_assoc()) {
												echo "<option value='".$row['id']."'>".$row['partyname']."</option>";
													}

												?>	
										</select>
										<button name="choose" value="Choose"> Choose</button>
								</form>
							</body>
							
							<?php 
							
								if (isset($_POST['choose'])) {
									$id=$_POST['pname'];
									echo $id;
									$sel="select * from partyadd where id='$id'";
									$re=$connect->query($sel);
									$da=$re->fetch_array();
								}

								?>