<footer class="az-footer-minimal">
    <div class="container-mini">
        <div class="mini-brand">
            <img src="<?= htmlspecialchars($settings['az_logo_url']) ?>" alt="Logo" class="mini-logo">
            
            <span>&copy; <?= date('Y') ?> <?= htmlspecialchars($settings['az_server_name']) ?></span>
            
            <?php 
            eval(base64_decode('ZWNobyAiPHNwYW4gc3R5bGU9J21hcmdpbi1sZWZ0OjVweDtvcGFjaXR5OjAuNSc+LSBEZXNpZ24gYnkgTURFVjwvc3Bhbj4iOw==')); 
            ?>
        </div>

        <div class="mini-socials">
            <a href="<?= htmlspecialchars($settings['az_discord_url']) ?>" target="_blank" title="Discord"><i class="fab fa-discord"></i></a>
            <a href="https://www.youtube.com/channel/UCFenccBVpOq4UA1je89c9LQ" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</footer>