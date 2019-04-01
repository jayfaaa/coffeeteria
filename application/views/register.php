<?php 
		session_destroy();
		?>
<center>
	<h4 style="margin-top: 2%;">  Register </h4>
	<div style="margin-top: 2%; width: 40%; background-color: rgb(49,49,49); color: rgb(235,235,235); padding: 2% 5% 2% 5%; border-radius: 5%;">
		<form action="<?php echo base_url('register_user');?>" method="POST">
		  <div class="form-group">
		    <label for="fname">First Name</label>
		    <input type="text" class="form-control" placeholder="Enter First Name" name="fname">
		  </div>
		  <div class="form-group">
		    <label for="lname">Last Name</label>
		    <input type="text" class="form-control" placeholder="Enter Last Name" name="lname">
		  </div>
		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
		  </div>
		  <input type="submit" class="btn btn-primary" placeholder="Register">
		</form>
	</div>
</center>
<br><br><br>
