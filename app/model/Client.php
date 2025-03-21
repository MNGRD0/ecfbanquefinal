<?php

require_once __DIR__ . '/../dao/connexion.php';

class Client
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getConnexion();
    }

    public function recupererTousLesClients()
    {
        $sql = "SELECT * FROM client";
        $stmt = $this->pdo->query($sql);
        
        return $stmt->fetchAll();
    }

    public function supprimerClient($id_client)
    {
        $sqlDelete = "DELETE FROM client WHERE id_client=:id_client";
        $stmt = $this->pdo->prepare($sqlDelete);
        $stmt->bindParam(':id_client', $id_client);
        $stmt->execute();
    }

    public function recupererClient($id_client) 
    {
        $stmt = $this->pdo->prepare("SELECT * FROM client WHERE id_client=:id_client");
        $stmt->bindParam(':id_client', $id_client);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function creer(string $nom, string $prenom, string $email, string $telephone, string $adresse)
    {
        $stmt = $this->pdo->prepare("INSERT INTO client (nom, prenom, email, telephone, adresse) VALUES (:nom, :prenom, :email, :telephone, :adresse);");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':adresse', $adresse);
        
        return $stmt->execute();
    }

    public function maj(string $id_client, string $nom, string $prenom, string $email, string $telephone, string $adresse) 
    {
        $stmt = $this->pdo->prepare("UPDATE client 
                    SET nom = :nom, prenom = :prenom, email = :email, telephone = :telephone, adresse = :adresse  
                    WHERE id_client=:id_client;");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':id_client', $id_client);
        
        return $stmt->execute();
    }
}