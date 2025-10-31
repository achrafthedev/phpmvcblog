<?php 

	require_once APPROOT.'/views/includes/header.php';
 ?>


 	<div class="card text-center p-sm-4 mx-auto w-75 mt-5 p-sm-4 hoverable">
 		<p class="card-text">
 			<?php echo $data['message']; ?>
 		</p>
 	</div>

 	<div class="card text-center p-sm-4 mx-auto w-75 mt-5 p-sm-4 hoverable">
 		<p class="card-text">
 			<a class="btn btn-success mx-sm-auto m-2" href="<?php echo URL.'userscontroller/login'; ?>">LOGIN</a>
 			<a class="btn btn-info mx-sm-auto m-2" href="<?php echo URL.'userscontroller/register'; ?>">RESGISTER</a>
 		</p>
 	</div>


