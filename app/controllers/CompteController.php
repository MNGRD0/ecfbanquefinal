<?php

require_once __DIR__ . '/../model/Compte.php';

class CompteController 
{
    private $compteModel;

    public function __construct() 
    {
        $this->compteModel = new Compte();
    }

    // Afficher le formulaire pour créer un nouveau compte
    public function nouveauCompte() 
    {
        require_once __DIR__ . '/../views/nouveau-compte.php';
    }

    // Lister tous les comptes
    public function listeDeTousLesComptes() 
    {
        $comptes = $this->compteModel->recupererTousLesComptes();
        require_once __DIR__ . '/../views/liste-comptes.php';
    }

    // Voir les détails d'un compte spécifique
    public function voirCompte($id_compte) 
    {
        $compte = $this->compteModel->recupererCompte($id_compte);
        require_once __DIR__ . '/../views/view-compte.php';
    }

    // Modifier un compte spécifique
    public function modifierCompte($id_compte) 
    {
        $compte = $this->compteModel->recupererCompte($id_compte);
        require_once __DIR__ . '/../views/modifier-compte.php';
    }

    // Supprimer un compte
    public function supprimerCompte($id_compte) 
    {
        $this->compteModel->supprimerCompte($id_compte);
        header('Location: index.php');
        exit; // Important pour stopper l'exécution après la redirection
    }

    // Créer un nouveau compte
    public function creerCompte(string $rib, float $solde, int $id_client, string $type)
    {
        $this->compteModel->creer($rib, $solde, $id_client, $type);
        header('Location: index.php');
        exit;
    }

    // Mettre à jour un compte existant
    public function majCompte(string $id_compte, string $rib, float $solde, int $id_client, string $type) 
    {
        $this->compteModel->maj($id_compte, $rib, $solde, $id_client, $type);
        header('Location: index.php');
        exit;
    }
}
