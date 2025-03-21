<?php

require_once __DIR__ . '/../model/Contrat.php';

class ContratController
{
    private $contratModel;

    public function __construct()
    {
        $this->contratModel = new Contrat();
    }

    public function nouveauContrat()
    {
        require_once __DIR__ . '/../views/nouveau-contrat.php';
    }

    public function listeDeTousLesContrats()
    {
        $contrats = $this->contratModel->recupererTousLesContrats();
        require_once __DIR__ . '/../views/liste-contrats.php';
    }

    public function voirContrat($id_contrat)
    {
        $contrat = $this->contratModel->recupererContrat($id_contrat);
        require_once __DIR__ . '/../views/view-contrat.php';
    }

    public function supprimerContrat($id_contrat)
    {
        $this->contratModel->supprimerContrat($id_contrat);
        header('Location: index.php?page=liste-contrats');
        exit;
    }

    public function creerContrat(string $type, float $montant, int $duree, int $id_client)
    {
        $this->contratModel->creer($type, $montant, $duree, $id_client);
        header('Location: index.php?page=liste-contrats');
        exit;
    }

    public function majContrat(int $id_contrat, string $type, float $montant, int $duree, int $id_client)
    {
        $this->contratModel->maj($id_contrat, $type, $montant, $duree, $id_client);
        header('Location: index.php?page=liste-contrats');
        exit;
    }
}
