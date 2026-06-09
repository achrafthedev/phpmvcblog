<?php require APPROOT . '/views/includes/head.php'; ?>
<?php require APPROOT . '/views/includes/navigation.php'; ?>

<div class="auth-container">
    <div class="auth-card">
        <h2>Update Profile</h2>
        <p class="subtitle">Change your writer details and credentials</p>
        
        <form action="<?php echo URLROOT; ?>/users/edit" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" value="<?php echo $data['username']; ?>" required>
                <?php if (!empty($data['usernameError'])) : ?>
                    <span class="invalid-feedback"><?php echo $data['usernameError']; ?></span>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="email">Email Address (Read-only)</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" readonly style="opacity: 0.6; cursor: not-allowed; background: rgba(0,0,0,0.2);">
            </div>
            
            <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 1.5rem 0;">
            <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 1rem; text-align: center;">Leave empty if you do not want to change your password</p>
            
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter new password">
                <?php if (!empty($data['passwordError'])) : ?>
                    <span class="invalid-feedback"><?php echo $data['passwordError']; ?></span>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="confirmPassword">Confirm New Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirm new password">
                <?php if (!empty($data['confirmPasswordError'])) : ?>
                    <span class="invalid-feedback"><?php echo $data['confirmPasswordError']; ?></span>
                <?php endif; ?>
            </div>
            
            <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                <a href="<?php echo URLROOT; ?>/users/profile" class="btn btn-secondary" style="flex: 1;"><i class="fa-solid fa-arrow-left"></i> Cancel</a>
                <button type="submit" class="btn btn-primary" style="flex: 1;"><i class="fa-solid fa-floppy-disk"></i> Save</button>
            </div>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>