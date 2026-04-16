<?php
require_once 'db_config.php';
include 'header.php'; 
@include 'security.php';
$settings = $pdo->query("SELECT * FROM az_settings WHERE az_id = 1")->fetch();
$rules = $pdo->query("SELECT * FROM az_rules ORDER BY az_id ASC")->fetchAll();
$keys = $pdo->query("SELECT * FROM az_keys ORDER BY az_id ASC")->fetchAll();
$metiers = $pdo->query("SELECT * FROM az_jobs WHERE az_is_active = 1")->fetchAll();
// Si le fichier security.php est supprimé, $AZ_ACCESS_GRANTED n'existera pas
if (!isset($AZ_ACCESS_GRANTED) || $AZ_ACCESS_GRANTED !== true || !function_exists('az_check_license')) {
    die("<div style='background:#000; color:white; padding:50px; text-align:center;'>
            <h1>ERREUR SYSTEME : Fichier de sécurité manquant.</h1>
            <p>Le fichier 'security.php' est requis pour le fonctionnement du site.</p>
         </div>");
}
/* LICENCE CHECK */ eval(base64_decode('aWYgKCFpc3NldCgkQVpfQUNDRVNTX0dSQU5URUQpIHx8ICRBWl9BQ0NFU1NfR1JBTlRFRCAhPT0gdHJ1ZSB8fCAhZnVuY3Rpb25fZXhpc3RzKCdhel9jaGVja19saWNlbnNlJykpIHsKICAgIGRpZSgiPGRpdiBzdHlsZT0nYmFja2dyb3VuZDojMDAwOyBjb2xvcjp3aGl0ZTsgcGFkZGluZzo1MHB4OyB0ZXh0LWFsaWduOmNlbnRlcjsnPgogICAgICAgICAgICA8aDE+RVJSRVVSIFNZU1RFTUUgOiBGaWNoaWVyIGRlIHPDqWN1cml0w6kgbWFucXVhbnQuPC9oMT4KICAgICAgICAgICAgPHA+TGUgZmljaGllciAnc2VjdXJpdHkucGhwJyBlc3QgcmVxdWlzIHBvdXIgbGUgZm9uY3Rpb25uZW1lbnQgZHUgc2l0ZS48L3A+CiAgICAgICAgIDwvZGl2PiIpOwp9')); ?>
?>
<!DOCTYPE html>
<html lang="fr">
<head>
 <meta charset="UTF-8">
    <title><?= $settings['az_server_name'] ?> | Accueil</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .hero { background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.8)), url('<?= $settings['az_hero_image'] ?>') no-repeat center center/cover !important; }
    </style>
</head>
<body>

    <header class="hero">
        <div class="hero-content">
            <span class="top-tag">BIENVENUE SUR</span>
            <h1><?= strtoupper($settings['az_server_name']) ?></h1>
            <p>L'immersion à son paroxysme. Découvrez une ville aux opportunités infinies.</p>
            <div class="hero-actions">
                <a href="#metiers" class="btn-main">Découvrir les Métiers</a>
                <a href="<?= $settings['az_discord_url'] ?>" target="_blank" class="btn-discord-magique">
    <i class="fab fa-discord"></i> 
    <span>Rejoindre le Discord</span>
</a>
            </div>
        </div>
    </header>

    <section id="rules" class="section">
        <div class="section-title">
            <h2>Règlement du Serveur</h2>
            <div class="bar"></div>
        </div>
        <div class="rules-container">
            <?php foreach($rules as $r): ?>
            <details class="rule-box">
                <summary><?= htmlspecialchars($r['az_title']) ?></summary>
                <div class="rule-content"><?= htmlspecialchars($r['az_content']) ?></div>
            </details>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="metiers" class="section dark">
        <div class="section-title">
            <h2>Nos Métiers Recrutent</h2>
            <p>Choisissez votre camp et commencez votre carrière</p>
        </div>
        
        <div class="jobs-premium-grid">
            
            <?php foreach($metiers as $m): ?>
            <div class="job-card-premium" style="background-image: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.9)), url('<?= $m['az_image_url'] ?>');">
                <div class="job-card-content">
                    <span class="job-status">Recrutement Ouvert</span>
                    <h3><?= htmlspecialchars($m['az_label']) ?></h3>
                    <p><?= substr(htmlspecialchars($m['az_description']), 0, 80) ?>...</p>
                    <a href="job_view.php?name=<?= $m['az_job_name'] ?>" class="btn-apply-premium">Postuler maintenant</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

<section id="keys" class="az-keys-section">
    <div class="container">
        <div class="az-section-header">
            <span class="az-subtitle">Contrôles</span>
            <h2 class="az-title">Guide des Touches</h2>
            <div class="az-separator"></div>
        </div>

        <div class="az-keys-grid">
            <?php 
            $keys = $pdo->query("SELECT * FROM az_keys ORDER BY az_id ASC")->fetchAll();
            foreach($keys as $k): 
            ?>
            <div class="az-key-card">
                <div class="az-key-wrapper">
                    <kbd class="az-kbd"><?= htmlspecialchars($k['az_key_name']) ?></kbd>
                </div>
                <div class="az-key-info">
                    <span class="az-key-action"><?= htmlspecialchars($k['az_key_desc']) ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

    <?php include 'footer.php'; ?>

</body>
</html>