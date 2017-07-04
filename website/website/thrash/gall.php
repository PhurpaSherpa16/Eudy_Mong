<div class="gall" id="gall" style="background-color: ; display: none;">
					<div style="background-color: ; height: px; width: 100%;">
						<div style="background-color: grey; width: 58%; height: 500px; float: left; overflow: auto;">
								<?php
								while ($row1=$result1->fetch_assoc()) {
								echo '<div style="height:395px; width:350px; background-color:red; float:left; margin:10px; overflow:auto;">'?>
								<?php
								$imag="party_"."$row1[photo]";
									#echo  $imag?>
						<div style=" height: 30px; width: 100%; background-color: ; margin-top: -5px;">
							<p align="center"><?php echo $row1['partyname'];?></p>
						</div>
						<div style="height: 130px; width: 100%; background-color: ;">
							<div style="height: 120px; width: 70%; background-color: ; margin-top: 5px; margin-left: 40px;">
								<img src="partyimg/<?php echo $imag;?>" width='100%' height='100%'/>
							</div>
						</div>
						<div style="height: 210px; width: 90%; background-color: ; margin: auto;">
							<div style="height: 80px; width: 100%; background-color: ;">
								<label style="width: 100px; float:">Description:</label>
								<div style="float: right; height: 100%; width: 70%; background-color: ; overflow: auto;">
								<?php echo $row1['description'];?>
								</div>
							</div>
							<div style="height: 30px; width: 100%; background-color: ;">
								<div style="height: 30px; width: 50%; background-color: ; float: left;">
									<label style="width: 50px; float:">Cost/Child(£):</label>
									<div style="float: right; height: 100%; width: 30%; background-color: ;">
									<?php echo $row1['cost'];?>
									</div>
								</div>
								<div style="height: 30px; width: 50%; background-color: ; float: left;">
									<label style="width: 50px; float:">Length(min):</label>
									<div style="float: right; height: 100%; width: 30%; background-color: ;">
									<?php echo $row1['length'];?>
									</div>
								</div>
							</div>
							<div style="height: 30px; width: 100%; background-color: ;">
									<label style="width: 50px; float:">Number of children:</label>
									<div style="float: right; height: 100%; width: 45%; background-color: ;">
									<?php echo $row1['number'];?>
									</div>
							</div>
							<div style="height: 80px; width: 100%; background-color: ;">
								<label style="width: 100px; float:">Service:</label>
								<div style="float: right; height: 100%; width: 70%; background-color: ; overflow: auto;">
									<?php echo $row1['service'];?>
								</div>
							</div>
						</div>
					
					</div>
						<?php
							}
							?>
					</div>
</div>