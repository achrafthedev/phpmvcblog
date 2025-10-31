<?php require_once APPROOT.'/views/includes/header.php'; ?>

<?php require_once APPROOT.'/views/includes/alert.php'; ?>

<?php if (isset($_SESSION['user_name'])) {?>

<div class="row">
	<div class="col-sm-6 w-75 mx-auto">
			<!--Card-->
	<div class="card">

	    <!--Card image-->
	    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">

	    <!--Card content-->
	    <div class="card-body">
	        <!--Title-->
	        <h4 class="User Info"></h4>
	        <!--Text-->
	        <p>NAME: <?php echo $_SESSION['user_name'] ?></p>
	        <p>EMAIL: <?php echo $_SESSION['user_email'] ?></p>
	        <a class="btn btn-success" href="<?php echo URL.'userscontroller/edit'; ?>">Update</a>
	    </div>

	</div>
	<!--/.Card-->
	</div>
</div>

<?php }else {
	die('error');
} ?>