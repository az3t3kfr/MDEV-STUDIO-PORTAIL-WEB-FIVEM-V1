<?php
require_once 'db_config.php';

// On vérifie que le formulaire a bien été soumis en POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Récupération et nettoyage des données (on utilise ?? '' pour éviter les erreurs Undefined Index)
    $job_target   = $_POST['az_job_target'] ?? 'Inconnu';
    
    // Identité IRL
    $nom_irl      = trim($_POST['az_nom_irl'] ?? '');
    $age_irl      = intval($_POST['az_age_irl'] ?? 0);
    $discord_tag  = trim($_POST['az_discord_tag'] ?? '');
    $email        = trim($_POST['az_email'] ?? '');

    // Informations RP
    $nom_rp       = trim($_POST['az_nom_rp'] ?? '');
    $temps_jeu    = trim($_POST['az_temps_jeu'] ?? '');
    $histoire_rp  = trim($_POST['az_histoire_rp'] ?? '');
    $motivation   = trim($_POST['az_motivation'] ?? '');

    // 2. Vérification de sécurité simple
    if (empty($nom_irl) || empty($nom_rp) || empty($discord_tag)) {
        die("Erreur : Veuillez remplir tous les champs obligatoires.");
    }

    try {
        // 3. Préparation de la requête SQL
        // Note : Assure-toi que les noms de colonnes ci-dessous correspondent à ta table SQL
        $sql = "INSERT INTO az_applications (
                    az_job_target, 
                    az_nom_irl, 
                    az_age_irl, 
                    az_discord_tag, 
                    az_email, 
                    az_nom_rp, 
                    az_temps_jeu, 
                    az_histoire_rp, 
                    az_motivation, 
                    az_date_sub
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            $job_target,
            $nom_irl,
            $age_irl,
            $discord_tag,
            $email,
            $nom_rp,
            $temps_jeu,
            $histoire_rp,
            $motivation
        ]);

        // 4. Redirection vers une page de succès ou l'accueil
header("Location: success.php?job=" . urlencode($job_target));
exit();

    } catch (PDOException $e) {
        // En cas d'erreur (ex: colonne manquante en base de données)
        die("Erreur lors de l'envoi du dossier : " . $e->getMessage());
    }

} else {
    // Si on tente d'accéder au fichier directement sans formulaire
    header("Location: index.php");
    exit();
}