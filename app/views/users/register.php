<?php require APPROOT . '/views/includes/head.php'; ?>
<?php require APPROOT . '/views/includes/navigation.php'; ?>

<div class="auth-container">
    <div class="auth-card">
        <h2>Register</h2>
        <p class="subtitle">Create your writer account today</p>
        
        <form action="<?php echo URLROOT; ?>/users/register" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Choose username" value="<?php echo $data['username']; ?>" required>
                <?php if (!empty($data['usernameError'])) : ?>
                    <span class="invalid-feedback"><?php echo $data['usernameError']; ?></span>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" value="<?php echo $data['email']; ?>" required>
                <?php if (!empty($data['emailError'])) : ?>
                    <span class="invalid-feedback"><?php echo $data['emailError']; ?></span>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Min. 6 characters" required>
                <?php if (!empty($data['passwordError'])) : ?>
                    <span class="invalid-feedback"><?php echo $data['passwordError']; ?></span>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirm password" required>
                <?php if (!empty($data['confirmPasswordError'])) : ?>
                    <span class="invalid-feedback"><?php echo $data['confirmPasswordError']; ?></span>
                <?php endif; ?>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-user-plus"></i> Register</button>
            
            <div class="form-footer">
                Already registered? <a href="<?php echo URLROOT; ?>/users/login">Sign in</a>
            </div>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>
