<?php require APPROOT . '/views/includes/head.php'; ?>
<?php require APPROOT . '/views/includes/navigation.php'; ?>

<div class="post-detail-container">
    <div style="margin-bottom: 2rem;">
        <a href="<?php echo URLROOT; ?>/posts" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left"></i> Back to Feed</a>
    </div>
    
    <article class="post-card" style="backdrop-filter: blur(12px); box-shadow: var(--shadow-lg); overflow: hidden;">
        <div class="post-detail-header" style="padding: 2.5rem 2.5rem 1.5rem; margin-bottom: 0;">
            <div class="post-meta">
                <div class="post-author-avatar">
                    <?php echo strtoupper(substr($data['post']->username, 0, 1)); ?>
                </div>
                <div>
                    <strong><?php echo $data['post']->username; ?></strong>
                    <span style="color: var(--text-muted); margin: 0 0.25rem;">&bull;</span>
                    <span style="color: var(--text-muted);"><?php echo date('F j, Y \a\t g:i A', strtotime($data['post']->created_at)); ?></span>
                </div>
            </div>
            
            <h1 class="post-detail-title"><?php echo $data['post']->title; ?></h1>
        </div>
        
        <div class="post-content" style="padding: 2rem 2.5rem; border-top: 1px solid var(--border-color); background: rgba(0, 0, 0, 0.15);">
            <?php echo nl2br(htmlspecialchars($data['post']->body)); ?>
        </div>
        
        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data['post']->user_id) : ?>
            <div style="padding: 1.5rem 2.5rem; border-top: 1px solid var(--border-color); display: flex; justify-content: flex-end; gap: 1rem; background: rgba(0, 0, 0, 0.25);">
                <a href="<?php echo URLROOT . "/posts/update/" . $data['post']->id ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                <form action="<?php echo URLROOT . "/posts/delete/" . $data['post']->id ?>" method="POST" style="margin: 0;" onsubmit="return confirm('Are you sure you want to delete this article?');">
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                </form>
            </div>
        <?php endif; ?>
    </article>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>
