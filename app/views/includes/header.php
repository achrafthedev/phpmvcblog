<!--Navbar-->

<nav class="navbar navbar-expand-lg navbar-dark primary-color sticky-top">
<div class="container">
    <a class="navbar-brand" href="<?php echo URL; ?>">PHPMVC</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse ">

        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                <a class="nav-link" href=<?php echo URL; ?>>Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URL.'postscontroller/index' ?>">Posts</a>
            </li>
            
            <?php if(isset($_SESSION['user_name'])): ?>
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL.'userscontroller/index'; ?>">profile</a>
                    </li>         

                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL.'postscontroller/dashboard'; ?>">Dashboard</a>
                    </li>                            

                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user_name']; ?></a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?php echo URL.'userscontroller/logout'; ?>">Logout</a>
                    </div>
                    </li>
            <?php endif; ?>  

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL.'pagescontroller/about' ?>">About</a>
                    </li>  

        </ul>
    </div>
</div>
</nav>
