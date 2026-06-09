<?php require APPROOT . '/views/includes/head.php'; ?>
<?php require APPROOT . '/views/includes/navigation.php'; ?>

<div class="auth-container" style="min-height: auto; padding: 4rem 2rem;">
    <div class="auth-card" style="max-width: 680px; width: 100%;">
        <h2>Create Post</h2>
        <p class="subtitle">Publish your thoughts or details to the community</p>
        
        <form action="<?php echo URLROOT; ?>/posts/create" method="POST">
            <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Enter post title" value="<?php echo $data['title']; ?>" required>
                <?php if (!empty($data['titleError'])) : ?>
                    <span class="invalid-feedback"><?php echo $data['titleError']; ?></span>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="body">Post Body</label>
                <textarea id="body" name="body" class="form-control" placeholder="Write your post contents..." required><?php echo $data['body']; ?></textarea>
                <?php if (!empty($data['bodyError'])) : ?>
                    <span class="invalid-feedback"><?php echo $data['bodyError']; ?></span>
                <?php endif; ?>
            </div>
            
            <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                <a href="<?php echo URLROOT; ?>/posts/dashboard" class="btn btn-secondary" style="flex: 1;"><i class="fa-solid fa-arrow-left"></i> Cancel</a>
                <button type="submit" class="btn btn-primary" style="flex: 1;"><i class="fa-solid fa-cloud-arrow-up"></i> Publish</button>
            </div>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>