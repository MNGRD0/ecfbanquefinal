<?php

require_once __DIR__ . '/../dao/connexion.php';

class Compte
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getConnexion();
    }

    // Récupérer tous les comptes
    public function recupererTousLesComptes()
    {
        $sql = "SELECT * FROM compte";
        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(); // Retourne tous les comptes
    }

    // Supprimer un compte
    public function supprimerCompte($id_compte)
    {
        $sqlDelete = "DELETE FROM compte WHERE id_compte = :id_compte";
        $stmt = $this->pdo->prepare($sqlDelete);
        $stmt->bindParam(':id_compte', $id_compte, PDO::PARAM_INT);
        $stmt->execute();
    }

    // Récupérer un compte spécifique
    public function recupererCompte($id_compte)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM compte WHERE id_compte = :id_compte");
        $stmt->bindParam(':id_compte', $id_compte, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(); // Retourne les détails d'un compte
    }

    // Créer un nouveau compte
    public function creer(string $rib, float $solde, int $id_client, string $type)
    {
        $stmt = $this->pdo->prepare("INSERT INTO compte (rib, solde, id_client, type) VALUES (:rib, :solde, :id_client, :type)");
        $stmt->bindParam(':rib', $rib);
        $stmt->bindParam(':solde', $solde);
        $stmt->bindParam(':id_client', $id_client, PDO::PARAM_INT);
        $stmt->bindParam(':type', $type);
        
        return $stmt->execute(); // Retourne true si l'insertion a réussi
    }

    // Mettre à jour un compte existant
    public function maj(string $id_compte, string $rib, float $solde, int $id_client, string $type)
    {
        $stmt = $this->pdo->prepare("UPDATE compte 
                    SET rib = :rib, solde = :solde, id_client = :id_client, type = :type 
                    WHERE id_compte = :id_compte");
        $stmt->bindParam(':rib', $rib);
        $stmt->bindParam(':solde', $solde);
        $stmt->bindParam(':id_client', $id_client, PDO::PARAM_INT);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':id_compte', $id_compte, PDO::PARAM_INT);
        
        return $stmt->execute(); // Retourne true si la mise à jour a réussi
    }
}
