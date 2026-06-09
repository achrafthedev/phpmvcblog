<?php if (isset($_SESSION['update_msg']) || isset($_SESSION['register_msg']) || isset($_SESSION['delete_msg']) || isset($_SESSION['create_msg'])) : ?>
    <div class="alert-container">
        <?php if (isset($_SESSION['update_msg'])) : ?>
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check"></i> &nbsp; <?php echo $_SESSION['update_msg']; unset($_SESSION['update_msg']); ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['register_msg'])) : ?>
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check"></i> &nbsp; <?php echo $_SESSION['register_msg']; unset($_SESSION['register_msg']); ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['create_msg'])) : ?>
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check"></i> &nbsp; <?php echo $_SESSION['create_msg']; unset($_SESSION['create_msg']); ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['delete_msg'])) : ?>
            <div class="alert alert-danger">
                <i class="fa-solid fa-circle-exclamation"></i> &nbsp; <?php echo $_SESSION['delete_msg']; unset($_SESSION['delete_msg']); ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>