<?php
require_once 'db_config.php';
include 'header.php';
include 'security.php'; // Ta sécurité MDEV
?>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&display=swap');

    body {
        background-color: #0a0a0c; /* Fond très sombre */
        margin: 0;
        padding: 0;
    }

    .patch-container {
        max-width: 1100px;
        margin: 60px auto;
        padding: 40px 20px;
        font-family: 'Rajdhani', sans-serif;
        color: white;
    }

    .patch-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .patch-header h1 {
        font-size: clamp(2rem, 5vw, 3.5rem);
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 4px;
        background: linear-gradient(to right, #fff, #5865F2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .patch-header p {
        color: #8b949e;
        font-size: 1.2rem;
        margin-top: 10px;
    }

    .patch-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }

    .patch-card {
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(255, 255, 255, 0.05);
        padding: 35px;
        border-radius: 20px;
        position: relative;
        transition: all 0.4s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .patch-card:hover {
        transform: translateY(-10px);
        background: rgba(88, 101, 242, 0.05);
        border-color: #5865F2;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    }

    .patch-icon {
        font-size: 2.5rem;
        color: #5865F2;
        margin-bottom: 20px;
    }

    .patch-card h3 {
        font-size: 1.5rem;
        margin: 0 0 15px 0;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .patch-card p {
        color: #8b949e;
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .badge-pro {
        position: absolute;
        top: 20px;
        right: 20px;
        background: linear-gradient(45deg, #f39c12, #e67e22);
        color: #fff;
        font-size: 11px;
        padding: 5px 12px;
        border-radius: 50px;
        font-weight: 700;
        box-shadow: 0 4px 10px rgba(230, 126, 34, 0.3);
    }

    .badge-soon {
        position: absolute;
        top: 20px;
        right: 20px;
        background: #333;
        color: #aaa;
        font-size: 11px;
        padding: 5px 12px;
        border-radius: 50px;
    }

    .patch-cta {
        margin-top: 80px;
        text-align: center;
        background: linear-gradient(135deg, rgba(88, 101, 242, 0.1) 0%, rgba(0,0,0,0) 100%);
        padding: 50px;
        border-radius: 25px;
        border: 1px dashed rgba(88, 101, 242, 0.4);
    }

    .btn-discord-patch {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-top: 25px;
        background: #5865F2;
        color: white;
        text-decoration: none;
        padding: 16px 40px;
        border-radius: 12px;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.9rem;
        transition: 0.3s;
    }

    .btn-discord-patch:hover {
        background: #4752c4;
        transform: scale(1.05);
        box-shadow: 0 0 25px rgba(88, 101, 242, 0.5);
    }

    @media (max-width: 768px) {
        .patch-header h1 { font-size: 2.5rem; }
        .patch-grid { grid-template-columns: 1fr; }
    }
</style>

<div class="patch-container">
    <div class="patch-header">
        <h1><i class="fas fa-rocket"></i> Roadmap & Prochaines MAJ</h1>
        <p>Découvrez les fonctionnalités exclusives de la <strong>Version Pro</strong> (MDEV Studio).</p>
    </div>

    <div class="patch-grid">
        <div class="patch-card">
            <span class="badge-pro">VERSION PRO</span>
            <div class="patch-icon"><i class="fas fa-comments"></i></div>
            <h3>Système d'Avis</h3>
            <p>Les joueurs pourront laisser des notes et des commentaires directement sur le site pour booster la réputation du serveur.</p>
        </div>

        <div class="patch-card">
            <span class="badge-pro">VERSION PRO</span>
            <div class="patch-icon"><i class="fab fa-discord"></i></div>
            <h3>Candidatures Webhooks</h3>
            <p>Réception automatique des candidatures staff/métiers directement dans vos salons Discord spécifiques.</p>
        </div>

        <div class="patch-card">
            <span class="badge-pro">VERSION PRO</span>
            <div class="patch-icon"><i class="fas fa-user-shield"></i></div>
            <h3>Gestion Staff Avancée</h3>
            <p>Comptes personnels pour vos modérateurs. Gérez les recrutements sans partager vos accès administrateur.</p>
        </div>

        <div class="patch-card">
            <span class="badge-pro">VERSION PRO</span>
            <div class="patch-icon"><i class="fas fa-ticket-alt"></i></div>
            <h3>Support par Tickets</h3>
            <p>Un système de support intégré directement sur le site internet pour répondre aux besoins des joueurs.</p>
        </div>

        <div class="patch-card">
            <span class="badge-pro">VERSION PRO</span>
            <div class="patch-icon"><i class="fas fa-camera"></i></div>
            <h3>Galerie Photo RP</h3>
            <p>Les joueurs pourront partager les clichés de leurs meilleures scènes RP sur une galerie communautaire dédiée.</p>
        </div>

        <div class="patch-card">
            <span class="badge-soon">EN DÉVELOPPEMENT</span>
            <div class="patch-icon"><i class="fas fa-plus-circle"></i></div>
            <h3>Et plus encore...</h3>
            <p>Boutique, statistiques joueurs en temps réel et logs avancés. Le futur du web RP est en marche.</p>
        </div>
    </div>

    <div class="patch-cta">
        <h3>Interessé par la Version Pro ?</h3>
        <p>Rejoignez notre Discord pour suivre l'avancement et obtenir votre licence dès la sortie.</p>
        <a href="https://discord.gg/bSk3zGzj7j" target="_blank" class="btn-discord-patch">
            <i class="fab fa-discord"></i> Rejoindre MDEV STUDIO
        </a>
    </div>
</div>

<?php include 'footer.php'; ?>