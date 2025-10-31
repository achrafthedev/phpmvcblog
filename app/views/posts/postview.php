<?php require_once APPROOT.'/views/includes/header.php'; ?>

    <div class="row">
        <div class="col-sm-6 mx-auto mt-5">
           <?php if (!empty($data)): ?>
                 <!--Card-->
                    <div class="card">

                <!--Card image-->
                        <div class="view overlay">
                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%287%29.jpg" class="img-fluid" alt="">
                            <a href="#">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>

                        <!--Card content-->
                        <div class="card-body">
                            <!--Title-->
                            <h1 class="card-title"><?php echo $data->title; ?></h1>
                            <!--Text-->
                            <p class="card-text"><?php echo $data->body; ?></p>
                            <!-- <a href="#" class="btn btn-primary">Button</a> -->
                        </div>

                    </div>
                <!--/.Card-->

           <?php endif; ?>
        </div>
    </div>