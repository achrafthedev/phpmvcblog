<?php require_once APPROOT.'/views/includes/header.php'; ?>
<?php require_once APPROOT.'/views/includes/alert.php'; ?>

<h1 class="text-muted m-sm-5">Dashboard</h1>

    <?php if(isset($_SESSION['title_err']) && isset($_SESSION['body_err']) ): ?>

        <div class="text-center" style="color: red;">
                <p><?php echo $_SESSION['title_err'];  ?></p>
                <p><?php echo $_SESSION['body_err'];  ?></p>
        </div>
            <?php 
            unset($_SESSION['title_err'] );
            unset($_SESSION['body_err'] );
             ?>
    <?php endif; ?>

<div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-post">
            create post
        </button>

        <!-- Button trigger modal -->
        <a href="<?php echo URL.'/userscontroller/profile'; ?>" class="btn btn-success">
            view profile
        </a>
                   
</div>



 <?php if(!empty($data)): ?>

        <!--Table-->
        <table class="table table-hover m-sm-3">

            <!--Table head-->
            <thead>
                <tr>
                    <th>#</th>
                    <th>Post Title</th>
                    <th>Content</th>
                    <th>craeted at</th>
                    <th> </th>
                </tr>
            </thead>
            <!--Table head-->

           

                <?php foreach ($data as $post): ?>
                    <!--Table body-->
                    <tbody>

                        <tr>
                            <th scope="row">#</th>
                            <td><?php echo $post->title; ?></td>
                            <td><a href="<?php echo URL.'postscontroller/postview/'.$post->id; ?>"><?php echo substr($post->body, 0,40).'....'; ?></a></td>
                            <td><?php echo $post->created_at ?></td>
                            <td>
                                <a href="<?php echo URL.'postscontroller/postedit/'.$post->id; ?>" class="btn btn-info">Edit</a>
                                <a href="<?php echo URL.'postscontroller/postdelete/'.$post->id; ?>"  class="btn btn-danger">Delete</a>

                            </td>
                        </tr>
                        
                    </tbody>
                    <!--Table body-->
                <?php endforeach; ?>       

        </table>
        <!--Table-->

<?php else: ?>

        <h1 class="card mx-sm-auto text-center hoverable p-5 m-5">You have no post</h1>        

<?php endif; ?> 

<div class="modal fade" id="create-post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!--Modal: crate-post form-->
    <div class="modal-dialog cascading-modal" role="document">

        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header primary-color white-text">
                <h4 class="title">
                    <i class="fa fa-pencil"></i> create post</h4>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">

               <form method="POST" action="<?php echo URL.'postscontroller/createpost'; ?>">
 
                    <!-- Material input subject -->
                    <div class="md-form form-sm">
                        <i class="fa fa-tag prefix"></i>
                        <input type="text" id="materialFormSubjectModalEx1" class="form-control form-control-sm" name="title">
                        <label for="materialFormSubjectModalEx1">Title</label>
                    </div>

                    <!-- Material textarea message -->
                    <div class="md-form form-sm">
                        <i class="fa fa-pencil prefix"></i>
                        <textarea type="text" id="materialFormMessageModalEx1" class="md-textarea form-control" name="body"></textarea>
                        <label for="materialFormMessageModalEx1">Your Content</label>
                    </div>

                    <div class="text-center mt-4 mb-2">
                        <button class="btn btn-primary" type="submit">Create
                            <i class="fa fa-save ml-2"></i>
                        </button>
                    </div>

               </form>
            </div>        
        </div>
        <!--/.Content-->
    </div>
    <!--/Modal: Contact form-->
</div>



