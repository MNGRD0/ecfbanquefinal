<?php

require_once __DIR__ . '/../model/Compte.php';

// Définit la classe contrôleur pour gérer les actions liées aux comptes
class CompteController 
{
    // Attribut pour stocker une instance de la classe Compte
    private $compteModel;

    // Constructeur : initialise un objet Compte dès que ce contrôleur est créé
    public function __construct() 
    {
        $this->compteModel = new Compte(); // Utilisé pour interagir avec les données des comptes
    }

    // Affiche le formulaire pour ajouter un nouveau compte
    public function nouveauCompte() 
    {
        // Charge la vue contenant le formulaire pour créer un compte
        require_once __DIR__ . '/../views/nouveau-compte.php';
    }

    // Affiche la liste de tous les comptes
    public function listeDeTousLesComptes() 
    {
        // Récupère tous les comptes depuis le modèle (base de données)
        $comptes = $this->compteModel->recupererTousLesComptes();
        // Charge la vue pour afficher la liste des comptes
        require_once __DIR__ . '/../views/liste-comptes.php';
    }

    // Affiche les détails d'un compte spécifique
    public function voirCompte($id_compte) 
    {
        // Récupère les informations d'un compte selon son ID
        $compte = $this->compteModel->recupererCompte($id_compte);
        // Charge la vue pour afficher les détails du compte
        require_once __DIR__ . '/../views/view-compte.php';
    }

    // Prépare les données pour modifier un compte
    public function modifierCompte($id_compte) 
    {
        // Récupère les informations du compte à modifier
        $compte = $this->compteModel->recupererCompte($id_compte);
        // Charge la vue contenant le formulaire pour modifier le compte
        require_once __DIR__ . '/../views/modifier-compte.php';
    }

    // Supprime un compte existant
    public function supprimerCompte($id_compte) 
    {
        // Demande au modèle de supprimer le compte par son ID
        $this->compteModel->supprimerCompte($id_compte);
        // Redirige vers la liste des comptes après la suppression
        header('Location: index.php');
        exit; // Arrête l'exécution après la redirection pour éviter les erreurs
    }

    // Crée un nouveau compte dans la base de données
    public function creerCompte(string $rib, float $solde, int $id_client, string $type)
    {
        // Envoie les données au modèle pour insérer un nouveau compte
        $this->compteModel->creer($rib, $solde, $id_client, $type);
        // Redirige vers la liste des comptes après la création
        header('Location: index.php');
        exit; // Arrête l'exécution après la redirection
    }

    // Met à jour les informations d'un compte existant
    public function majCompte(string $id_compte, string $rib, float $solde, int $id_client, string $type) 
    {
        // Envoie les nouvelles informations au modèle pour mettre à jour le compte
        $this->compteModel->maj($id_compte, $rib, $solde, $id_client, $type);
        // Redirige vers la liste des comptes après la mise à jour
        header('Location: index.php');
        exit; // Arrête l'exécution après la redirection
    }
}
