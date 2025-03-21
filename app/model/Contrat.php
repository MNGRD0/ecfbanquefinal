<?php

require_once __DIR__ . '/../dao/connexion.php';

class Contrat
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getConnexion();
    }

    // Récupérer tous les contrats
    public function recupererTousLesContrats()
    {
        $sql = "SELECT * FROM contrat";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    // Supprimer un contrat
    public function supprimerContrat($id_contrat)
    {
        $sql = "DELETE FROM contrat WHERE id_contrat = :id_contrat";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_contrat', $id_contrat, PDO::PARAM_INT);
        $stmt->execute();
    }

    // Récupérer un contrat spécifique
    public function recupererContrat($id_contrat)
    {
        $sql = "SELECT * FROM contrat WHERE id_contrat = :id_contrat";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_contrat', $id_contrat, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Créer un nouveau contrat
    public function creer(string $type, float $montant, int $duree, int $id_client)
    {
        $sql = "INSERT INTO contrat (type, montant, duree, id_client) VALUES (:type, :montant, :duree, :id_client)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':montant', $montant);
        $stmt->bindParam(':duree', $duree, PDO::PARAM_INT);
        $stmt->bindParam(':id_client', $id_client, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Mettre à jour un contrat
    public function maj(int $id_contrat, string $type, float $montant, int $duree, int $id_client)
    {
        $sql = "UPDATE contrat SET type = :type, montant = :montant, duree = :duree, id_client = :id_client WHERE id_contrat = :id_contrat";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_contrat', $id_contrat, PDO::PARAM_INT);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':montant', $montant);
        $stmt->bindParam(':duree', $duree, PDO::PARAM_INT);
        $stmt->bindParam(':id_client', $id_client, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
