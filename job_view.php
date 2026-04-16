<?php
require_once 'db_config.php';

// On essaie de récupérer les réglages, sinon on met des valeurs par défaut
try {
    $settings_query = $pdo->query("SELECT * FROM az_settings WHERE az_id = 1");
    $settings = $settings_query->fetch();
} catch (Exception $e) {
    // Si la table n'existe pas encore, on définit des secours pour pas que le site crash
    $settings = [
        'az_server_name' => 'SERVEUR RP',
        'az_discord_url' => 'https://discord.gg/'
    ];
}

// Récupération du métier
$job_name = $_GET['name'] ?? '';
$stmt = $pdo->prepare("SELECT * FROM az_jobs WHERE az_job_name = ? AND az_is_active = 1");
$stmt->execute([$job_name]);
$job = $stmt->fetch();

if (!$job) { header("Location: index.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($job['az_label']) ?> | <?= htmlspecialchars($settings['az_server_name']) ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<?php include 'header.php'; include 'security.php';?>
    <nav class="top-nav">
        <div class="nav-container">
            <div class="server-brand">
                <i class="fas fa-shield-halved"></i> 
                <span><?= htmlspecialchars($settings['az_server_name']) ?></span>
            </div>
            <a href="index.php" class="btn-back"><i class="fas fa-home"></i> Retour à l'accueil</a>
        </div>
    </nav>

    <div class="job-container">
        <header class="job-header">
            <div class="job-badge">RECRUTEMENT OUVERT</div>
            <h1>Dossier de Candidature : <span><?= htmlspecialchars($job['az_label']) ?></span></h1>
            <p class="job-desc-full"><?= nl2br(htmlspecialchars($job['az_description'])) ?></p>
        </header>

        <div class="form-wrapper">
            <form action="submit_app.php" method="POST" class="gaming-form">
                <input type="hidden" name="az_job_target" value="<?= $job_name ?>">

                <div class="form-section">
                    <h3 class="section-title"><i class="fas fa-id-card"></i> Votre Identité Civile</h3>
                    <div class="form-row">
                        <div class="input-group">
                            <label>Nom & Prénom IRL</label>
                            <input type="text" name="az_nom_irl" placeholder="Ex: Jean Dupont" required>
                        </div>
                        <div class="input-group">
                            <label>Âge</label>
                            <input type="number" name="az_age_irl" placeholder="Ex: 22" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-group">
                            <label>Identifiant Discord</label>
                            <input type="text" name="az_discord_tag" placeholder="pseudo#0000" required>
                        </div>
                        <div class="input-group">
                            <label>Adresse Mail</label>
                            <input type="email" name="az_email" placeholder="votre@mail.com" required>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3 class="section-title"><i class="fas fa-user-ninja"></i> Informations Personnage</h3>
                    <div class="form-row">
                        <div class="input-group">
                            <label>Nom & Prénom (En Jeu)</label>
                            <input type="text" name="az_nom_rp" placeholder="Ex: Tony Montana" required>
                        </div>
                        <div class="input-group">
                            <label>Heures de vol (Expérience)</label>
                            <input type="text" name="az_temps_jeu" placeholder="Ex: 450h" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <label>Histoire de votre personnage</label>
                        <textarea name="az_histoire_rp" rows="6" placeholder="Rédigez ici votre backstory..." required></textarea>
                    </div>
                    <div class="input-group">
                        <label>Vos motivations pour rejoindre ce métier</label>
                        <textarea name="az_motivation" rows="4" placeholder="Pourquoi vous ?" required></textarea>
                    </div>
                </div>

                <div class="form-footer">
                    <p>En cliquant sur envoyer, vous certifiez avoir pris connaissance du règlement de l'entreprise.</p>
                    <button type="submit" class="btn-submit-glow">
                        <i class="fas fa-paper-plane"></i> ENVOYER MON DOSSIER
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .top-nav { background: rgba(0,0,0,0.8); backdrop-filter: blur(10px); padding: 15px 0; border-bottom: 1px solid var(--az-primary); position: sticky; top: 0; z-index: 100; }
        .nav-container { max-width: 1100px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 0 20px; }
        .server-brand { font-family: 'Rajdhani'; font-size: 1.5rem; color: #fff; font-weight: bold; display: flex; align-items: center; gap: 10px; }
        .server-brand i { color: var(--az-primary); }

        .job-container { max-width: 900px; margin: 40px auto; padding: 0 20px; }
        .job-header { text-align: center; margin-bottom: 50px; }
        .job-badge { background: var(--az-primary-glow); color: var(--az-primary); display: inline-block; padding: 5px 15px; border-radius: 50px; font-weight: bold; font-size: 0.8rem; margin-bottom: 15px; }
        .job-header h1 { font-size: 2.5rem; }
        .job-header h1 span { color: var(--az-primary); }
        .job-desc-full { color: var(--az-text-muted); font-size: 1.1rem; margin-top: 15px; }

        .form-wrapper { background: var(--az-bg-panel); padding: 40px; border-radius: 15px; border: 1px solid rgba(255,255,255,0.05); }
        .form-section { margin-bottom: 40px; }
        .section-title { color: var(--az-primary); border-bottom: 1px solid #333; padding-bottom: 10px; margin-bottom: 25px; font-size: 1.3rem; }
        
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px; }
        .input-group { margin-bottom: 20px; }
        .input-group label { display: block; color: #fff; margin-bottom: 8px; font-size: 0.9rem; font-weight: bold; opacity: 0.8; }
        
        .btn-submit-glow {
            width: 100%;
            background: var(--az-primary);
            color: #000;
            padding: 18px;
            font-size: 1.3rem;
            border: none;
            box-shadow: 0 0 20px var(--az-primary-glow);
            transition: 0.3s;
        }
        .btn-submit-glow:hover { transform: scale(1.02); box-shadow: 0 0 35px var(--az-primary); }
        
        .form-footer { text-align: center; margin-top: 20px; }
        .form-footer p { font-size: 0.8rem; color: #555; margin-bottom: 20px; }

        @media (max-width: 768px) { .form-row { grid-template-columns: 1fr; } }
    </style>
</body>
</html>