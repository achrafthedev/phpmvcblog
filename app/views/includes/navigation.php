<nav class="navbar">
    <div class="nav-container">
        <a href="<?php echo URLROOT; ?>" class="navbar-brand">
            <i class="fa-solid fa-feather-pointed"></i> PHPMVC
        </a>
        <div class="top-nav">
            <ul>
                <li><a href="<?php echo URLROOT; ?>"><i class="fa-solid fa-house"></i> Home</a></li>
                <li><a href="<?php echo URLROOT; ?>/posts"><i class="fa-solid fa-blog"></i> Blog</a></li>
                <li><a href="<?php echo URLROOT; ?>/pages/about"><i class="fa-solid fa-circle-info"></i> About</a></li>
                
                <?php if (isLoggedIn()) : ?>
                    <li><a href="<?php echo URLROOT; ?>/posts/dashboard"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
                    <li><a href="<?php echo URLROOT; ?>/users/profile"><i class="fa-solid fa-user"></i> <?php echo $_SESSION['username']; ?></a></li>
                    <li><a href="<?php echo URLROOT; ?>/users/logout" class="btn-nav-action"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                <?php else : ?>
                    <li><a href="<?php echo URLROOT; ?>/users/login"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
                    <li><a href="<?php echo URLROOT; ?>/users/register" class="btn-nav-action"><i class="fa-solid fa-user-plus"></i> Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<div class="main-content-area" style="flex-grow: 1;">
