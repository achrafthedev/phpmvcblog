<?php require APPROOT . '/views/includes/head.php'; ?>
<?php require APPROOT . '/views/includes/navigation.php'; ?>

<div class="main-container">
    <div class="page-header">
        <h1><?php echo $data['title']; ?></h1>
        <p><?php echo $data['message']; ?></p>
    </div>
    
    <div style="max-width: 600px; margin: 3rem auto 0; background: var(--bg-card); border: 1px solid var(--border-color); border-radius: 16px; padding: 2.5rem; backdrop-filter: blur(12px);">
        <h3 style="margin-bottom: 1.5rem; text-align: center; font-family: var(--font-heading); background: linear-gradient(135deg, var(--accent-indigo), var(--accent-violet)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"><i class="fa-solid fa-code"></i> Architecture & Tech Stack</h3>
        
        <ul style="list-style: none; display: flex; flex-direction: column; gap: 1.2rem; color: var(--text-secondary); padding: 0;">
            <li style="display: flex; align-items: flex-start; gap: 1rem;">
                <i class="fa-brands fa-php" style="color: #777bb4; font-size: 1.5rem; margin-top: 0.1rem;"></i>
                <span><strong>Core PHP (8.1+)</strong><br>Developed with pure PHP OOP for solid object-oriented structure.</span>
            </li>
            <li style="display: flex; align-items: flex-start; gap: 1rem;">
                <i class="fa-solid fa-network-wired" style="color: var(--accent-indigo); font-size: 1.25rem; margin-top: 0.2rem;"></i>
                <span><strong>Custom MVC Engine</strong><br>A bespoke Model-View-Controller architecture routing requests natively.</span>
            </li>
            <li style="display: flex; align-items: flex-start; gap: 1rem;">
                <i class="fa-solid fa-database" style="color: #00758f; font-size: 1.25rem; margin-top: 0.2rem;"></i>
                <span><strong>Secure PDO Wrappers</strong><br>Complete prepared SQL statements preventing SQL injection attacks.</span>
            </li>
            <li style="display: flex; align-items: flex-start; gap: 1rem;">
                <i class="fa-brands fa-docker" style="color: #0db7ed; font-size: 1.5rem; margin-top: 0.1rem;"></i>
                <span><strong>Docker Setup</strong><br>Fully containerized environment with separate Apache/PHP and MariaDB services.</span>
            </li>
            <li style="display: flex; align-items: flex-start; gap: 1rem;">
                <i class="fa-solid fa-palette" style="color: var(--accent-violet); font-size: 1.25rem; margin-top: 0.2rem;"></i>
                <span><strong>Premium Theme</strong><br>Custom Vanilla CSS variables, glassmorphic panels, and glowing card gradients.</span>
            </li>
        </ul>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>