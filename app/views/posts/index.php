<?php require APPROOT . '/views/includes/head.php'; ?>
<?php require APPROOT . '/views/includes/navigation.php'; ?>
<?php require APPROOT . '/views/includes/alert.php'; ?>

<div class="main-container">
    <div class="page-header">
        <h1>Latest Articles</h1>
        <p>Explore articles, stories, and thoughts written by our community</p>
    </div>
    
    <?php if (isLoggedIn()) : ?>
        <div style="margin-bottom: 2rem; display: flex; justify-content: flex-end;">
            <a href="<?php echo URLROOT; ?>/posts/create" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Write Post</a>
        </div>
    <?php endif; ?>
    
    <?php if (empty($data['posts'])) : ?>
        <div style="text-align: center; background: var(--bg-card); border: 1px solid var(--border-color); border-radius: 16px; padding: 4rem 2rem;">
            <i class="fa-solid fa-folder-open" style="font-size: 3rem; color: var(--text-muted); margin-bottom: 1.5rem;"></i>
            <h3>No posts found</h3>
            <p style="color: var(--text-secondary); margin-top: 0.5rem;">Be the first to create a post and share it with the world!</p>
            <?php if (isLoggedIn()) : ?>
                <a href="<?php echo URLROOT; ?>/posts/create" class="btn btn-primary" style="margin-top: 1.5rem;"><i class="fa-solid fa-plus"></i> Write Post</a>
            <?php else : ?>
                <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-primary" style="margin-top: 1.5rem;"><i class="fa-solid fa-right-to-bracket"></i> Login to Write</a>
            <?php endif; ?>
        </div>
    <?php else : ?>
        <div class="posts-grid">
            <?php foreach ($data['posts'] as $post) : ?>
                <div class="post-card">
                    <div class="post-card-body">
                        <div class="post-meta">
                            <div class="post-author-avatar">
                                <?php echo strtoupper(substr($post->username, 0, 1)); ?>
                            </div>
                            <div>
                                <strong><?php echo $post->username; ?></strong>
                                <span style="color: var(--text-muted); margin: 0 0.25rem;">&bull;</span>
                                <span style="color: var(--text-muted);"><?php echo date('M j, Y', strtotime($post->created_at)); ?></span>
                            </div>
                        </div>
                        
                        <h2 class="post-title"><?php echo $post->title; ?></h2>
                        
                        <p class="post-excerpt">
                            <?php 
                                $body = strip_tags($post->body);
                                echo strlen($body) > 130 ? substr($body, 0, 130) . '...' : $body; 
                            ?>
                        </p>
                    </div>
                    
                    <div class="post-card-footer">
                        <a href="<?php echo URLROOT . "/posts/show/" . $post->id ?>" class="btn btn-secondary btn-sm"><i class="fa-solid fa-book-open"></i> Read More</a>
                        
                        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post->user_id) : ?>
                            <div style="display: flex; gap: 0.5rem;">
                                <a href="<?php echo URLROOT . "/posts/update/" . $post->id ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-pen"></i></a>
                                <form action="<?php echo URLROOT . "/posts/delete/" . $post->id ?>" method="POST" style="margin: 0;" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>