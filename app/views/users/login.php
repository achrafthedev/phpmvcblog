<?php require APPROOT . '/views/includes/head.php'; ?>
<?php require APPROOT . '/views/includes/navigation.php'; ?>
<?php require APPROOT . '/views/includes/alert.php'; ?>

<div class="auth-container">
    <div class="auth-card">
        <h2>Sign In</h2>
        <p class="subtitle">Access your personal blog space</p>
        
        <form action="<?php echo URLROOT; ?>/users/login" method="POST">
            <div class="form-group">
                <label for="username">Username or Email</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter username or email" value="<?php echo $data['username']; ?>" required>
                <?php if (!empty($data['usernameError'])) : ?>
                    <span class="invalid-feedback"><?php echo $data['usernameError']; ?></span>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
                <?php if (!empty($data['passwordError'])) : ?>
                    <span class="invalid-feedback"><?php echo $data['passwordError']; ?></span>
                <?php endif; ?>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
            
            <div class="form-footer">
                Not registered yet? <a href="<?php echo URLROOT; ?>/users/register">Create an account</a>
            </div>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>
