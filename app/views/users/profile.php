<?php require APPROOT . '/views/includes/head.php'; ?>
<?php require APPROOT . '/views/includes/navigation.php'; ?>
<?php require APPROOT . '/views/includes/alert.php'; ?>

<div class="main-container">
    <div class="page-header">
        <h1>User Profile</h1>
        <p>Manage your personal details and publishing profile</p>
    </div>
    
    <div class="profile-card">
        <div class="profile-avatar-large">
            <?php echo strtoupper(substr($data['user']->username, 0, 1)); ?>
        </div>
        
        <h2 class="profile-name"><?php echo $data['user']->username; ?></h2>
        <p class="profile-email"><?php echo $data['user']->email; ?></p>
        
        <div class="profile-stats">
            <div>
                <div class="stat-num">#<?php echo $data['user']->id; ?></div>
                <div class="stat-label">User ID</div>
            </div>
            <div>
                <div class="stat-num">Writer</div>
                <div class="stat-label">Access Role</div>
            </div>
        </div>
        
        <div style="display: flex; gap: 1rem; justify-content: center;">
            <a href="<?php echo URLROOT; ?>/users/edit" class="btn btn-primary"><i class="fa-solid fa-user-pen"></i> Edit Profile</a>
            <a href="<?php echo URLROOT; ?>/posts/dashboard" class="btn btn-secondary"><i class="fa-solid fa-gauge"></i> My Dashboard</a>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>
