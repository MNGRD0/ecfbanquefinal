<?php 

// Déclaration d'une classe pour gérer les actions administratives.
class AdminController 
{
    // Déclare une méthode pour afficher la page de connexion.
    public function index() 
    {
        // Inclut le fichier login.php situé dans le dossier views.
        // Ce fichier affiche la page de connexion pour l'utilisateur.
        require_once __DIR__ . '/../views/login.php';
    }

    // Déclare une méthode pour gérer la connexion d'un utilisateur.
    public function connect($username, $password)
    {
        // Définition des identifiants valides.
        $adminCredentials = [
            'username' => 'banquier', // Le nom d'utilisateur attendu.
            'password' => hash('sha256', '1234') // Le mot de passe est haché pour plus de sécurité.
        ];

        // Vérifie si l'utilisateur a saisi des identifiants qui correspondent à ceux définis.
        // Le mot de passe est également haché pour être comparé en toute sécurité.
        if ($username == $adminCredentials['username'] && hash('sha256', $password) == hash('sha256', '1234')) {
            // Si les identifiants sont corrects, le nom d'utilisateur est sauvegardé dans la session pour identifier l'utilisateur connecté.
            $_SESSION['username'] = $username;

            // Ajoute un message flash indiquant que la connexion a réussi.
            $_SESSION['message_flash'] = 'La connexion est un succès';

            // Redirige l'utilisateur vers la page d'accueil (index.php).
            header('Location: index.php');
        } else {
            // Si les identifiants sont incorrects, un message d'erreur est sauvegardé dans la session.
            $_SESSION['error_message'] = 'Les informations de connexion sont erronnées.';

            // Réaffiche la page de connexion pour permettre à l'utilisateur de réessayer.
            require_once __DIR__ . '/../views/login.php';
        }
    }

    // Déclare une méthode pour gérer la déconnexion d'un utilisateur.
    public function disconnect()
    {
        // Supprime la session associée à l'utilisateur connecté pour le déconnecter.
        unset($_SESSION['username']);

        // Redirige l'utilisateur vers la page d'accueil.
        header('Location: index.php');
    }
}
