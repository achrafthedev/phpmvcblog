<?php require_once APPROOT.'/views/includes/header.php'; ?>
<?php require_once APPROOT.'/views/includes/alert.php'; ?>

<h3 class="text-center m-sm-4">Edit Post</h3>

 <?php if(isset($data['title_err']) && isset($data['body_err']) ): ?>

        <div class="text-center" style="color: red;">
                <p><?php echo $data['title_err'];  ?></p>
                <p><?php echo $data['body_err'];  ?></p>
        </div>
           
  <?php endif; ?>


<div class="row">
	<div class="col-sm-6 mx-auto">
		
			<!-- Material form contact -->
			<form class="mb-sm-3" action="<?php echo URL.'postscontroller/postedit/'.$data['post_id']; ?>" method="post">
			    
			    
			    <!-- Material input subject -->
			    <div class="md-form">
			        <i class="fa fa-tag prefix grey-text"></i>
			        <input type="text" name="title" class="form-control " value="<?php echo $data['title']; ?>" >
			        <label for="title">Title</label>
			    </div>
			    
			    <!-- Material textarea message -->
			    <div class="md-form">
			        <i class="fa fa-pencil prefix grey-text"></i>
			        <textarea type="text" name="body" class="form-control md-textarea" rows="6" ><?php echo $data['body']; ?></textarea>
			        <label for="body">Content</label>
			    </div>

			    <div class="text-center mt-4">
			        <button class="btn btn-success" type="submit">Save<i class="fa fa-save ml-2"></i></button>
			    </div>
			</form>
			<!-- Material form contact -->
                      
	</div>
</div>
