<?php

require_once __DIR__ . '/../dao/connexion.php';

// Définit une classe pour gérer toutes les interactions avec la table `contrat`
class Contrat
{
    // Attribut pour stocker la connexion à la base de données
    private $pdo;

    // Constructeur : crée une connexion à la base dès que cette classe est utilisée
    public function __construct()
    {
        $this->pdo = getConnexion(); // Connecte à la base via la fonction getConnexion
    }

    // Récupère tous les contrats dans la table contrat
    public function recupererTousLesContrats()
    {
        // SQL : sélectionne toutes les colonnes de la table contrat
        $sql = "SELECT * FROM contrat";
        $stmt = $this->pdo->query($sql); // Exécute la requête SQL

        return $stmt->fetchAll(); // Retourne tous les contrats sous forme de tableau
    }

    // Supprime un contrat selon son ID
    public function supprimerContrat($id_contrat)
    {
        // SQL : supprime un contrat spécifique avec l'ID donné
        $sql = "DELETE FROM contrat WHERE id_contrat = :id_contrat";
        $stmt = $this->pdo->prepare($sql); // Prépare la requête SQL
        $stmt->bindParam(':id_contrat', $id_contrat, PDO::PARAM_INT); // Lie l'ID du contrat à supprimer
        $stmt->execute(); // Exécute la suppression
    }

    // Récupère les informations d'un contrat spécifique par son ID
    public function recupererContrat($id_contrat)
    {
        // SQL : sélectionne un contrat avec l'ID donné
        $sql = "SELECT * FROM contrat WHERE id_contrat = :id_contrat";
        $stmt = $this->pdo->prepare($sql); // Prépare la requête SQL
        $stmt->bindParam(':id_contrat', $id_contrat, PDO::PARAM_INT); // Lie l'ID du contrat
        $stmt->execute(); // Exécute la requête

        return $stmt->fetch(); // Retourne une seule ligne contenant les détails du contrat
    }

    // Ajoute un nouveau contrat dans la base de données
    public function creer(string $type, float $montant, int $duree, int $id_client)
    {
        // SQL : insère un nouveau contrat avec ses données
        $sql = "INSERT INTO contrat (type, montant, duree, id_client) VALUES (:type, :montant, :duree, :id_client)";
        $stmt = $this->pdo->prepare($sql); // Prépare la requête SQL
        $stmt->bindParam(':type', $type); // Lie le type de contrat
        $stmt->bindParam(':montant', $montant); // Lie le montant
        $stmt->bindParam(':duree', $duree, PDO::PARAM_INT); // Lie la durée
        $stmt->bindParam(':id_client', $id_client, PDO::PARAM_INT); // Lie l'ID du client associé

        return $stmt->execute(); // Retourne vrai si le contrat a été ajouté avec succès
    }

    // Met à jour les informations d'un contrat existant
    public function maj(int $id_contrat, string $type, float $montant, int $duree, int $id_client)
    {
        // SQL : met à jour un contrat avec ses nouvelles informations
        $sql = "UPDATE contrat SET type = :type, montant = :montant, duree = :duree, id_client = :id_client WHERE id_contrat = :id_contrat";
        $stmt = $this->pdo->prepare($sql); // Prépare la requête SQL
        $stmt->bindParam(':id_contrat', $id_contrat, PDO::PARAM_INT); // Lie l'ID du contrat à mettre à jour
        $stmt->bindParam(':type', $type); // Lie le type de contrat
        $stmt->bindParam(':montant', $montant); // Lie le montant
        $stmt->bindParam(':duree', $duree, PDO::PARAM_INT); // Lie la durée
        $stmt->bindParam(':id_client', $id_client, PDO::PARAM_INT); // Lie l'ID du client associé

        return $stmt->execute(); // Retourne vrai si la mise à jour a été réussie
    }
}
