<?php


require_once __DIR__ . '/../model/Contrat.php';

// Définit une classe pour gérer toutes les actions liées aux contrats
class ContratController
{
    // Attribut pour stocker une instance de la classe Contrat
    private $contratModel;

    // Constructeur : crée un nouvel objet Contrat dès que ce contrôleur est appelé
    public function __construct()
    {
        $this->contratModel = new Contrat(); // Permet d'utiliser les fonctions de la classe `Contrat`
    }

    // Affiche le formulaire pour créer un nouveau contrat
    public function nouveauContrat()
    {
        // Charge la vue avec le formulaire d'ajout de contrat
        require_once __DIR__ . '/../views/nouveau-contrat.php';
    }

    // Affiche la liste de tous les contrats
    public function listeDeTousLesContrats()
    {
        // Récupère tous les contrats de la base de données via le modèle
        $contrats = $this->contratModel->recupererTousLesContrats();
        // Charge la vue pour afficher cette liste
        require_once __DIR__ . '/../views/liste-contrats.php';
    }

    // Prépare les données pour modifier un contrat
    public function modifierContrat($id_contrat) 
    {
        // Récupère les informations du contrat à modifier
        $contrat = $this->contratModel->recupererContrat($id_contrat);
        // Charge la vue contenant le formulaire pour modifier le contrat
        require_once __DIR__ . '/../views/modifier-contrat.php';
    }


    // Affiche les détails d'un contrat spécifique
    public function voirContrat($id_contrat)
    {
        // Récupère les informations d'un contrat selon son ID
        $contrat = $this->contratModel->recupererContrat($id_contrat);
        // Charge la vue pour afficher les détails du contrat
        require_once __DIR__ . '/../views/view-contrat.php';
    }

    // Supprime un contrat existant
    public function supprimerContrat($id_contrat)
    {
        // Demande au modèle de supprimer un contrat par son ID
        $this->contratModel->supprimerContrat($id_contrat);
        // Redirige vers la liste des contrats après suppression
        header('Location: index.php?page=liste-contrats');
        exit; // Arrête le script après la redirection pour éviter des erreurs
    }

    // Crée un nouveau contrat dans la base de données
    public function creerContrat(string $type, float $montant, int $duree, int $id_client)
    {
        // Envoie les données saisies au modèle pour insérer un nouveau contrat
        $this->contratModel->creer($type, $montant, $duree, $id_client);
        // Redirige vers la liste des contrats après la création
        header('Location: index.php?page=liste-contrats');
        exit; // Arrête le script après la redirection
    }

    // Met à jour les informations d'un contrat existant
    public function majContrat(int $id_contrat, string $type, float $montant, int $duree, int $id_client)
    {
        // Envoie les nouvelles informations au modèle pour mettre à jour le contrat
        $this->contratModel->maj($id_contrat, $type, $montant, $duree, $id_client);
        // Redirige vers la liste des contrats après la mise à jour
        header('Location: index.php?page=liste-contrats');
        exit; // Arrête le script après la redirection
    }
}
