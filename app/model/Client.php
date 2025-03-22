<?php

require_once __DIR__ . '/../dao/connexion.php';

// Définit une classe pour gérer toutes les interactions liées aux clients dans la base de données
class Client
{
    // Attribut pour stocker la connexion à la base de données
    private $pdo;

    // Constructeur : crée une connexion dès que cette classe est utilisée
    public function __construct()
    {
        $this->pdo = getConnexion(); // Récupère la connexion à la base de données grâce à la fonction `getConnexion`
    }

    // Récupère tous les clients depuis la table client dans la base de données
    public function recupererTousLesClients()
    {
        // SQL : sélectionne toutes les colonnes de la table `client`
        $sql = "SELECT * FROM client";
        $stmt = $this->pdo->query($sql); // Exécute la requête SQL

        return $stmt->fetchAll(); // Retourne tous les résultats sous forme de tableau
    }

    // Supprime un client en fonction de son ID
    public function supprimerClient($id_client)
    {
        // SQL : supprime le client avec l'ID correspondant
        $sqlDelete = "DELETE FROM client WHERE id_client=:id_client";
        $stmt = $this->pdo->prepare($sqlDelete); // Prépare la requête SQL
        $stmt->bindParam(':id_client', $id_client); // Lie la valeur de l'ID du client
        $stmt->execute(); // Exécute la requête pour supprimer le client
    }

    // Récupère les informations d'un client selon son ID
    public function recupererClient($id_client) 
    {
        // SQL : sélectionne les informations d'un client avec l'ID donné
        $stmt = $this->pdo->prepare("SELECT * FROM client WHERE id_client=:id_client");
        $stmt->bindParam(':id_client', $id_client); // Lie la valeur de l'ID du client
        $stmt->execute(); // Exécute la requête pour récupérer les informations

        return $stmt->fetch(); // Retourne une seule ligne de données (le client)
    }

    // Ajoute un nouveau client dans la base de données
    public function creer(string $nom, string $prenom, string $email, string $telephone, string $adresse)
    {
        // SQL : insère un nouveau client avec ses informations
        $stmt = $this->pdo->prepare("INSERT INTO client (nom, prenom, email, telephone, adresse) VALUES (:nom, :prenom, :email, :telephone, :adresse);");
        $stmt->bindParam(':nom', $nom); // Lie le nom
        $stmt->bindParam(':prenom', $prenom); // Lie le prénom
        $stmt->bindParam(':email', $email); // Lie l'email
        $stmt->bindParam(':telephone', $telephone); // Lie le numéro de téléphone
        $stmt->bindParam(':adresse', $adresse); // Lie l'adresse

        return $stmt->execute(); // Exécute la requête pour ajouter le client et retourne vrai si réussi
    }

    // Met à jour les informations d'un client existant
    public function maj(string $id_client, string $nom, string $prenom, string $email, string $telephone, string $adresse) 
    {
        // SQL : met à jour un client avec ses nouvelles informations selon son ID
        $stmt = $this->pdo->prepare("UPDATE client 
                    SET nom = :nom, prenom = :prenom, email = :email, telephone = :telephone, adresse = :adresse  
                    WHERE id_client=:id_client;");
        $stmt->bindParam(':nom', $nom); // Lie le nom
        $stmt->bindParam(':prenom', $prenom); // Lie le prénom
        $stmt->bindParam(':email', $email); // Lie l'email
        $stmt->bindParam(':telephone', $telephone); // Lie le numéro de téléphone
        $stmt->bindParam(':adresse', $adresse); // Lie l'adresse
        $stmt->bindParam(':id_client', $id_client); // Lie l'ID du client

        return $stmt->execute(); // Exécute la requête pour mettre à jour le client et retourne vrai si réussi
    }
}
