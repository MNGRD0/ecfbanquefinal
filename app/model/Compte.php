<?php

require_once __DIR__ . '/../dao/connexion.php';

// Définit une classe pour gérer toutes les interactions avec la table compte
class Compte
{
    // Attribut pour stocker la connexion à la base de données
    private $pdo;

    // Constructeur : initialise une connexion à la base de données dès que cette classe est utilisée
    public function __construct()
    {
        $this->pdo = getConnexion(); // Utilise la fonction `getConnexion` pour se connecter à la base
    }

    // Récupère tous les comptes depuis la table compte
    public function recupererTousLesComptes()
    {
        // SQL : sélectionne tous les comptes enregistrés
        $sql = "SELECT * FROM compte";
        $stmt = $this->pdo->query($sql); // Exécute la requête SQL

        return $stmt->fetchAll(); // Retourne tous les comptes sous forme de tableau
    }

    // Supprime un compte selon son ID
    public function supprimerCompte($id_compte)
    {
        // SQL : supprime le compte avec l'ID donné
        $sqlDelete = "DELETE FROM compte WHERE id_compte = :id_compte";
        $stmt = $this->pdo->prepare($sqlDelete); // Prépare la requête SQL
        $stmt->bindParam(':id_compte', $id_compte, PDO::PARAM_INT); // Lie l'ID du compte pour la requête
        $stmt->execute(); // Exécute la requête pour supprimer le compte
    }

    // Récupère les informations d'un compte selon son ID
    public function recupererCompte($id_compte)
    {
        // SQL : sélectionne les informations d'un compte avec l'ID donné
        $stmt = $this->pdo->prepare("SELECT * FROM compte WHERE id_compte = :id_compte");
        $stmt->bindParam(':id_compte', $id_compte, PDO::PARAM_INT); // Lie l'ID du compte pour la requête
        $stmt->execute(); // Exécute la requête

        return $stmt->fetch(); // Retourne une seule ligne contenant les détails du compte
    }

    // Ajoute un nouveau compte dans la base de données
    public function creer(string $rib, float $solde, int $id_client, string $type)
    {
        // SQL : insère un nouveau compte avec ses informations
        $stmt = $this->pdo->prepare("INSERT INTO compte (rib, solde, id_client, type) VALUES (:rib, :solde, :id_client, :type)");
        $stmt->bindParam(':rib', $rib); // Lie le RIB
        $stmt->bindParam(':solde', $solde); // Lie le solde
        $stmt->bindParam(':id_client', $id_client, PDO::PARAM_INT); // Lie l'ID du client associé au compte
        $stmt->bindParam(':type', $type); // Lie le type de compte (exemple : compte épargne)

        return $stmt->execute(); // Retourne vrai si le compte est ajouté avec succès
    }

    // Met à jour les informations d'un compte existant
    public function maj(string $id_compte, string $rib, float $solde, int $id_client, string $type)
    {
        // SQL : met à jour les informations du compte avec son ID
        $stmt = $this->pdo->prepare("UPDATE compte 
                    SET rib = :rib, solde = :solde, id_client = :id_client, type = :type 
                    WHERE id_compte = :id_compte");
        $stmt->bindParam(':rib', $rib); // Lie le RIB
        $stmt->bindParam(':solde', $solde); // Lie le solde
        $stmt->bindParam(':id_client', $id_client, PDO::PARAM_INT); // Lie l'ID du client associé au compte
        $stmt->bindParam(':type', $type); // Lie le type de compte
        $stmt->bindParam(':id_compte', $id_compte, PDO::PARAM_INT); // Lie l'ID du compte pour identifier celui à mettre à jour

        return $stmt->execute(); // Retourne vrai si la mise à jour est réussie
    }
}
