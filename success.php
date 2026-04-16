<?php
require_once 'db_config.php';

// Récupération sécurisée du job
$az_job = $_GET['job'] ?? 'Service';

// Récupération des réglages (Discord)
$settings = $pdo->query("SELECT az_discord_url, az_server_name FROM az_settings WHERE az_id = 1")->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dossier Envoyé | <?= htmlspecialchars($settings['az_server_name'] ?? 'AZ-FiveM') ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Sécurité au cas où le style.css n'est pas chargé */
        :root {
            --az-success: #00fa9a;
            --az-text-muted: #888;
        }

        body {
            background: #0a0a0c; /* Fond sombre profond */
            font-family: 'Rajdhani', sans-serif;
        }

        .success-wrapper {
            animation: fadeIn 0.8s ease-out;
        }

        .success-icon i {
            filter: drop-shadow(0 0 15px var(--az-success));
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .btn-discord {
            background: #5865F2;
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            text-transform: uppercase;
            transition: 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="container success-wrapper" style="text-align: center; margin-top: 100px;">
        
        <div class="success-icon" style="font-size: 6rem; color: var(--az-success); margin-bottom: 20px;">
            <i class="fas fa-check-circle"></i>
        </div>
        
        <h1 style="color: var(--az-success); text-transform: uppercase; letter-spacing: 2px;">
            Dossier envoyé avec succès !
        </h1>
        
        <div class="message-box" style="background: rgba(255,255,255,0.05); padding: 40px; border-radius: 15px; border: 1px solid rgba(0, 250, 154, 0.3); margin: 30px auto; max-width: 650px; backdrop-filter: blur(5px);">
            <p style="font-size: 1.3rem; color: #fff; margin-bottom: 15px;">
                Ta candidature pour le service <strong><span style="color: var(--az-success);"><?= strtoupper(htmlspecialchars($az_job)) ?></span></strong> a été enregistrée.
            </p>
            <p style="color: var(--az-text-muted); line-height: 1.6;">
                Nos responsables vont analyser ton profil. Tu recevras une notification et une réponse sous <strong>24 à 48 heures</strong> directement sur ton compte Discord.
            </p>
        </div>

        <div class="action-buttons" style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; margin-top: 40px;">
            <a href="<?= htmlspecialchars($settings['az_discord_url']) ?>" target="_blank" class="btn-discord">
                <i class="fab fa-discord"></i> Rejoindre le Discord
            </a>

            <a href="index.php" class="btn-main" style="background: #333; color: #fff; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-weight: bold; text-transform: uppercase;">
                <i class="fas fa-home"></i> Accueil du site
            </a>
        </div>
    </div>
</body>
</html>