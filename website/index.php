<!DOCTYPE html>
<html>
<head>
	<title>Rajinda Party House</title>
	<script type="text/javascript" src="js.js"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/css/font-awesome.css"></link>
</head>
<body>
<div class="main">
	<div class="box">
		
		<div class="h1">	
			<button type="button" id="login">Login in</button>
			<button type="button" id="signup">Sign up</button>
		</div>

		<div id="login1" class="login1">
			
			<div id="login2">
					<div class="space"></div>
						<h1 align="center" style="font-family: Broadway; color: black;">Welcome</h1>
					<div class="login3">
						<form method="post" action="php/login.php">
						<div class="user">
							<input type="text" name="user" placeholder="Enter Your User Name" id="user" autofocus="autofocus" required="required">
						</div>

						<div class="pass">
							<input type="password" name="pass" placeholder="Enter Your Password" id="pass">
						</div>

						<div class="b1">
							<input type="submit" name="b1" id="b1" value="Submit" style="background-color:#D9853B; border: none;">
						</div>

						<p align="center" name="mess" id="mess" align style="color: red; display: none">Wrong Username And Password!!</p>
						<span><?php if (isset($_GET['error'])) { echo "Wrong Username and Password!!.".$_GET['error']." attempt failed!";} ?></span>
						</form>
					</div>	
			</div>	


		</div>
		<form method="post" action="php/register.php">
		<div id="signup1" class="signup1" style="display: none;">
			<div id="signup2">
				<div style="height: 1px;"></div>
				<h1 align="center" style="font-family: Broadway; color: black;">Sign up for free!!</h1>

				<div class="sname" style="height: 50px; width: 100%;">
					<div class="fname">
						<input type="text" name="fname" placeholder="Enter Your First Name" id="fname" required="required">
					</div>
					<div class="lname">
						<input type="text" name="lname" placeholder="Enter Your Last Name" id="lname">
					</div>
				</div>

				<div class="email" style="height: 50px; width: 100%;">
					<input type="email" name="email" placeholder="Enter Your Email Name" id="email">
				</div>

				<div class="username" style="height: 50px; width: 60%;">
					<input type="text" name="username" placeholder="Enter Your User Name" id="username"><label id="u1" style="color: red;"></label>
				</div>

				<div class="address" style="height: 50px; width: 100%;">
					<input type="text" name="address" placeholder="Enter Your Address Name" id="address">
				</div>

				<div class="gender" style="height: 50px; width: 100%;">
					<div class="gender">
						<label id="gender">Gender
						<input type="radio" name="gender" Value="Female">Female
						<input type="radio" name="gender" Value="Male">Male
						<input type="radio" name="gender" Value="Others">Others
						</label>
					</div>

					<div class="phone">
						<input type="text" name="phone" placeholder="Enter Your Phone Number" id="phone">
					</div>

				</div>
						<div style="height: 50px; width: 100%;"></div>
				<div class="password" style="height: 50px; width: 100%;">
					<input type="password" name="password" placeholder="Enter Your Password " id="password">
				</div>

				<div class="button" style="height: 50px; width: 100%;">
					<div class="submit1">
						<input type="submit" name="submit1" id="submit1" value="Register" style="background-color:#D9853B; border: none;"></button>
						
					</div>
					<div class="reset">
						<button type="reset" name="reset" id="reset" value="Reset" style="background-color:#D9853B; border: none;">Reset</button>
					</div>

				</div>
			</div>

			</div>
			</form>
		<div class="l" style="width: 700px; height: 20px; background-color: ; position: fixed; bottom: 0px; margin-left: 20px;">      <span>3 Low Street, 	SouthAmption  </span>||<span>        Ph.no:0000-0000-0000     </span><span>||           Email-address: <a href="https://accounts.google.com" style="text-decoration: none;" target="_blank"><font color="red"> Rajinda@gmail.com</font></a></span></div>
	</div>

		<script>
				$("#signup").click(function(){
					$("#signup1").slideDown();
					$("#login1").hide();
					return false;
				})
				$("#login").click(function(){
					$("#login1").fadeIn();
					$("#signup1").hide();
					return false;
				})



		</script>


		
	
</body>
</html>