<div class="row">
	<div class="col-sm-6 mt-2 mb-1 mx-auto text-center" >
		<h3 class="" style="color: white; background-color: red;">

		<?php 
			if(isset($_SESSION['update_msg']) && !empty($_SESSION['update_msg'])){
				echo $_SESSION['update_msg'];
				unset($_SESSION['update_msg']);
			}
			
			if(isset($_SESSION['register_msg']) && !empty($_SESSION['register_msg'])){
				echo $_SESSION['register_msg'];
				unset($_SESSION['register_msg']);
			}

			if(isset($_SESSION['delete_msg']) && !empty($_SESSION['delete_msg'])){
				echo $_SESSION['delete_msg'];
				unset($_SESSION['delete_msg']);
			}

			if(isset($_SESSION['create_msg']) && !empty($_SESSION['create_msg'])){
				echo $_SESSION['create_msg'];
				unset($_SESSION['create_msg']);
			}
		 ?>
		 </h3>
	</div>
</div>