<?php
// On récupère les réglages si ce n'est pas déjà fait dans la page parente
if (!isset($settings)) {
    $stmt_set = $pdo->query("SELECT * FROM az_settings WHERE az_id = 1");
    $settings = $stmt_set->fetch();
}
?>
<head>
<?php if(!empty($settings['az_logo_url'])): ?>
    <link rel="icon" type="image/png" href="<?= htmlspecialchars($settings['az_logo_url']) ?>">
    <link rel="apple-touch-icon" href="<?= htmlspecialchars($settings['az_logo_url']) ?>">
<?php else: ?>
    <link rel="icon" type="image/png" href="assets/img/default-icon.png">
<?php endif; ?>
</head>
<nav class="az-navbar">
    <div class="nav-container">
        <a href="index.php" class="nav-logo">
            <?php if(!empty($settings['az_logo_url'])): ?>
                <img src="<?= htmlspecialchars($settings['az_logo_url']) ?>" alt="Logo" class="nav-logo-img">
            <?php else: ?>
                <i class="fas fa-gamepad"></i> 
            <?php endif; ?>
            
            <span><?= htmlspecialchars($settings['az_server_name']) ?></span>
        </a>

        <input type="checkbox" id="nav-check">
        <div class="nav-btn">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>

        <ul class="nav-links">
            <li><a href="index.php"><i class="fas fa-home"></i> Accueil</a></li>
            <li><a href="index.php#rules"><i class="fas fa-book"></i> Règlement</a></li>
            <li><a href="index.php#metiers"><i class="fas fa-briefcase"></i> Recrutements</a></li>
            <li><a href="index.php#keys"><i class="fas fa-keyboard"></i> Touches</a></li>
            <li><a href="patch_notes.php"><i class="fas fa-keyboard"></i> Patch notes</a></li>
            
            <li>
                <a href="<?= htmlspecialchars($settings['az_discord_url']) ?>" target="_blank" class="nav-discord">
                    <i class="fab fa-discord"></i> DISCORD
                </a>
            </li>
            
            <li class="admin-link">
                <a href="admin/index.php" title="Administration">
                    <i class="fas fa-user-cog"></i>
                </a>
            </li>
        </ul>
    </div>
    <?php
// Si cette ligne est supprimée ou modifiée, les autres pages bloqueront
define('AZ_AUTHOR_SIGNATURE', 'MDEV_STUDIO'); 
?>
</nav>

<style>
/* Style pour que le logo s'intègre parfaitement dans la navbar */
.nav-logo {
    display: flex;
    align-items: center;
    gap: 12px;
}

.nav-logo-img {
    height: 40px; /* Ajuste la taille selon tes besoins */
    width: auto;
    object-fit: contain;
    filter: drop-shadow(0 0 5px rgba(255,255,255,0.2));
}

/* On s'assure que le texte du logo reste bien aligné */
.nav-logo span {
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
}
</style>