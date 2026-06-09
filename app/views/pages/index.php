<?php require APPROOT . '/views/includes/head.php'; ?>
<?php require APPROOT . '/views/includes/navigation.php'; ?>
<?php require APPROOT . '/views/includes/alert.php'; ?>

<section id="section-landing">
    <div class="wrapper-landing">
        <h1><?php echo $data['title']; ?></h1>
        <p><?php echo $data['message']; ?></p>
        <div class="cta-group">
            <?php if (isLoggedIn()) : ?>
                <a href="<?php echo URLROOT; ?>/posts/dashboard" class="btn btn-primary"><i class="fa-solid fa-gauge"></i> Go to Dashboard</a>
                <a href="<?php echo URLROOT; ?>/posts" class="btn btn-secondary"><i class="fa-solid fa-book-open"></i> Explore Blog</a>
            <?php else : ?>
                <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-primary"><i class="fa-solid fa-right-to-bracket"></i> Sign In</a>
                <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-secondary"><i class="fa-solid fa-user-plus"></i> Join Now</a>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/includes/footer.php'; ?>
