<?php
// On vérifie si une session est déjà active avant de la démarrer
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Paramètres BDD
$az_host = 'localhost';
$az_db   = 'fivemaz';
$az_user = 'root';
$az_pass = '';

try {
    $pdo = new PDO("mysql:host=$az_host;dbname=$az_db;charset=utf8", $az_user, $az_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Plus pratique pour lire les données
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// --- SÉCURITÉ : DÉCONNEXION AUTOMATIQUE (1 heure) ---
if (isset($_SESSION['az_last_activity']) && (time() - $_SESSION['az_last_activity'] > 3600)) {
    session_unset();
    session_destroy();
    // On redirige vers la racine du site si la session expire
    header("Location: ../index.php?error=session_expired");
    exit();
}
$_SESSION['az_last_activity'] = time();

// --- FONCTION : PROTÉGER LES PAGES ADMIN ---
function check_az_admin() {
    // On s'assure encore que la session est bien là
    if (session_status() === PHP_SESSION_NONE) { 
        session_start(); 
    }
    
    if (!isset($_SESSION['az_admin_logged']) || $_SESSION['az_admin_logged'] !== true) {
        // Redirection vers login.php (assure-toi d'être dans le dossier /admin/)
        header("Location: login.php");
        exit();
    }
}
?>