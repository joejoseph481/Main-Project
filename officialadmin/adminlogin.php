<html>
    <head>
        <link rel="stylesheet" href="login.css">
        <style>
            body {
              background-image: url('3.jpg');
              background-repeat: no-repeat;
              background-attachment: fixed;
              background-size: cover;
			}
			.err{
				font-size: 14px;
				position: relative;
				float: right;
				right: 3px;
				top:-25px;
				color:rgba(255, 0, 0, 0.664);
			}
            </style>
	  </head>
	  <script src=validation.js></script>
	  <script>
		  function del(){
			document.getElementById('err').style.cssText="visibility: hidden;"
		  }


		function sub(id)
		{
			var us_name=document.getElementById('user')
			var pass=document.getElementById('pass')
			if(us_name.value!="" && pass.value!="" ){
				document.getElementById(id).submit();
			}
			if(us_name.value==""){
				us_name.style.cssText="border:2px solid red";
			}
			else if(us_name.value!=""){
				us_name.style.cssText="border:none";
			}
			if(pass.value==""){
				pass.style.cssText="border:2px solid red";
			}
			else if(pass.value!=""){
				pass.style.cssText="border:none";
			}

		}

	</script>
<body>
	<form id='log' form; method="post" action="adminloginaction.php">
<div class="login-wrap">
	<div class="login-html">
	<label style="font-size:260%;font-family:Helvetica Neue, sans-serif; color: #adadad"><center> ADMIN LOGIN </center></label>
	<br><br>
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
      <?php
			if(isset($_GET['errormessage'])=='WRONGPASSWORD'){
				?>
					<p id='err' class="err">Invalid Username or Password</p>
				<?php
				}

      elseif(isset($_GET['errormessage'])=='NOTACTIVE')
      {
        ?>
          <p id='err' class="err">Account Disabled</p>
        <?php
        }
      ?>

			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Email</label>
					<input id="user" name="email" type="text" onclick="del()" class="input" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" name="pass" type="password" onclick="del()" required class="input" data-type="password">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<!-- <label for="check"><span class="icon"></span> Keep me Signed in</label> -->
				</div>
				<div class="group">
					<input type="button" value="Submit" class="button" onclick="sub('log')" >
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
			</div>
			</form>
			<form id='reg' form; method="post" action="reg.php">
			<div class="sign-up-htm">
				<div class="group">
					<label for="name" class="label" >Name</label>
					<input name="name" id="name" type="text" required class="input" onblur="full_name(this.id)">
                </div>
                <!-- <div class="group">
					<label for="gender" class="label">Gender</label>
					<input type="radio" id="male" name="gender" value="male" checked>
					<label for="male">Male</label>
					<input type="radio" id="female" name="gender" value="female">
					<label for="female">Female</label>
					<input type="radio" id="other" name="gender" value="other">
					<label for="other">Other</label>
				</div> -->
                <div class="group">
					<label for="phone" class="label">Phone</label>
					<input name="phno" id="phno" onblur="phone_no(this.id)" type="text" class="input" required>
                </div>
                <div class="group">
					<label for="email" class="label">Email</label>
					<input name ="email" onblur="email_id(this.id)" id="email" type="text" class="input"  required >
                </div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input name="passw" id="passww" onblur="pass(this.id)" type="password" class="input" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input name="pass1" id="pass1" onblur="con_pass(this.id)" type="password" class="input" data-type="password" required>
                </div>
				<div class="group">
					<input type="button" onclick="val('reg')" class="button" value="Sign Up">
				</div>
				<br>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>
</body>
</html>
