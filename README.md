# 🚀 MDEV STUDIO - Installation du Site Web

Merci d'avoir choisi cette ressource **MDEV Studio**. Ce document vous guidera étape par étape pour installer votre site internet de manière rapide et efficace.

---

## 🛠️ Pré-requis

Avant de commencer, assurez-vous d'avoir l'un des logiciels suivants si vous installez le site en local :

- **XAMPP** (Recommandé)
- **WAMP Server**
- **Laragon**

---

## 📂 Étape 1 : Téléchargement et Placement

1.  Téléchargez l'archive du projet.
2.  Extrayez les fichiers dans le dossier racine de votre serveur web :
    - Pour **XAMPP** : `C:/xampp/htdocs/votre_dossier`
    - Pour **WAMP** : `C:/wamp64/www/votre_dossier`

---

## 💾 Étape 2 : Importation de la Base de Données

1.  Ouvrez votre interface de gestion de base de données (ex: **phpMyAdmin**).
2.  Créez une nouvelle base de données (nommez-la comme vous le souhaitez, ex: `mdev_rp`).
3.  Cliquez sur l'onglet **Importer**.
4.  Sélectionnez le fichier `.sql` fourni dans le dossier du projet.
5.  Cliquez sur **Exécuter**.

---

## ⚙️ Étape 3 : Configuration (db_config.php)

Ouvrez le fichier `db_config.php` situé à la racine du site et modifiez les informations suivantes :

```php
// Informations de connexion
$az_host = "localhost";        // Laissez localhost en local
$az_db   = "votre_bdd";        // Le nom de la base de données créée à l'étape 2
$az_user = "root";             // Utilisateur par défaut en local
$az_pass = "";                 // Mot de passe (souvent vide par défaut en local)
```

⚠️ IMPORTANT : N'oubliez pas d'enregistrer le fichier après vos modifications.

## 🛡️ Étape 4 : Sécurité et Intégrité

Le bon fonctionnement du site repose sur des fichiers systèmes critiques :

NE JAMAIS SUPPRIMER le fichier security.php.

NE JAMAIS MODIFIER la signature de l'auteur dans header.php.

[!CAUTION]
Toute tentative de suppression ou de modification de ces fichiers entraînera un arrêt immédiat du site (Erreur de Licence) et rendra le script inutilisable.

🆘 Support & Contact
Si vous rencontrez un problème lors de l'installation, n'hésitez pas à nous rejoindre :

Discord : [Rejoindre MDEV STUDIO](https://discord.com/invite/bSk3zGzj7j)

© 2024 MDEV STUDIO - Tous droits réservés.

---

`az_email` admin@serveur.fr
`az_password` Admin123!
