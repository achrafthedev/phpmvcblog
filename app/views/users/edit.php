<?php require_once APPROOT.'/views/includes/header.php'; ?>


    <div class="text-center" style="color: red;">
            <p class="" style=""><?php echo $data['name_err'];  ?></p>
            <p><?php echo $data['email_err'];  ?></p>
            <p><?php echo $data['password_err'];  ?></p>
            <p><?php echo $data['confirm_password_err'];  ?></p>
    </div>

<div class="row">
	<div class="col-sm-6 mx-auto mt-5">

	<!--  form register -->
	<form method="post" action="<?php echo URL; ?>userscontroller/edit ">
	    <p class="h4 text-center mb-4">Update Profile</p>

	    <!--  input name -->
	    <label for="defaultFormRegisterNameEx" class="grey-text">Your name</label>
	    <input type="text" name="name" class="form-control" value="<?php echo $data['name'];  ?>">
	    
	    <br>

	    <!--  input email -->
	    <label for="defaultFormRegisterEmailEx" class="grey-text">Your email</label>
	    <input type="email" name="email" class="form-control" value="<?php echo $data['email'];  ?>" readonly>
	    
	    <br>

	    <!--  input password -->
	    <label for="defaultFormRegisterPasswordEx" class="grey-text">Your password</label>
	    <input type="password" name="password" class="form-control" value="<?php echo $data['password'];  ?>">

	    <br>

	    <!--  input password -->
	    <label for="defaultFormRegisterPasswordEx" class="grey-text">confirm password</label>
	    <input type="password" name="confirm_password" class="form-control" value="<?php echo $data['confirm_password'];  ?>">

	    <div class="text-center mt-4">
	        <button class="btn btn-unique" type="submit">Update</button>
	    </div>
	</form>
	<!--  form register -->


                      
	</div>
</div>