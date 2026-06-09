<?php require APPROOT . '/views/includes/head.php'; ?>
<?php require APPROOT . '/views/includes/navigation.php'; ?>
<?php require APPROOT . '/views/includes/alert.php'; ?>

<div class="main-container">
    <div class="page-header">
        <h1>Publisher Dashboard</h1>
        <p>Manage and update your published articles</p>
    </div>
    
    <div class="dashboard-actions">
        <h3 style="font-family: var(--font-heading); color: var(--text-primary); font-size: 1.25rem;"><i class="fa-solid fa-folder-open"></i> My Articles</h3>
        <a href="<?php echo URLROOT; ?>/posts/create" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Write New Post</a>
    </div>
    
    <?php if (empty($data['posts'])) : ?>
        <div style="text-align: center; background: var(--bg-card); border: 1px solid var(--border-color); border-radius: 16px; padding: 4rem 2rem;">
            <i class="fa-solid fa-pen-nib" style="font-size: 3rem; color: var(--text-muted); margin-bottom: 1.5rem;"></i>
            <h3>No articles written yet</h3>
            <p style="color: var(--text-secondary); margin-top: 0.5rem;">Share your knowledge with others by creating your first post.</p>
            <a href="<?php echo URLROOT; ?>/posts/create" class="btn btn-primary" style="margin-top: 1.5rem;"><i class="fa-solid fa-plus"></i> Write Your First Post</a>
        </div>
    <?php else : ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Article Title</th>
                        <th>Published Date</th>
                        <th>Excerpt Snippet</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['posts'] as $post) : ?>
                        <tr>
                            <td class="title-cell"><?php echo $post->title; ?></td>
                            <td><?php echo date('M j, Y, g:i A', strtotime($post->created_at)); ?></td>
                            <td>
                                <?php 
                                    $bodyText = strip_tags($post->body);
                                    echo strlen($bodyText) > 50 ? substr($bodyText, 0, 50) . '...' : $bodyText; 
                                ?>
                            </td>
                            <td style="text-align: right;">
                                <div style="display: inline-flex; gap: 0.5rem; justify-content: flex-end; width: 100%;">
                                    <a href="<?php echo URLROOT . "/posts/show/" . $post->id ?>" class="btn btn-secondary btn-sm"><i class="fa-solid fa-eye"></i> View</a>
                                    <a href="<?php echo URLROOT . "/posts/update/" . $post->id ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    <form action="<?php echo URLROOT . "/posts/delete/" . $post->id ?>" method="POST" style="margin: 0; display: inline;" onsubmit="return confirm('Are you sure you want to delete this article?');">
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>
