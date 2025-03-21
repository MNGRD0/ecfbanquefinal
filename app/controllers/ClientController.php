<?php

require_once __DIR__ . '/../model/Client.php';

class ClientController 
{
    private $clientModel;
    
    public function __construct() 
    {
        $this->clientModel = new Client();
    }

    public function nouveauClient() 
    {
        require_once __DIR__ . '/../views/nouveau-client.php';
    }

    public function listeDeTousLesClients() 
    {
        $client = $this->clientModel->recupererTousLesClients();
        require_once __DIR__ . '/../views/liste-clients.php';
    }

    public function voirClient($id_client) 
    {
        $client = $this->clientModel->recupererClient($id_client);
        require_once __DIR__ . '/../views/view-client.php';
    }

    public function modifierClient($id_client) 
    {
        $client = $this->clientModel->recupererClient($id_client);
        require_once __DIR__ . '/../views/modifier-client.php';
    }

    public function supprimerClient($id_client) 
    {
        $this->clientModel->supprimerClient($id_client);
        header('Location: index.php');
    }

    public function creerClient(string $nom, string $prenom, string $email, string $telephone, string $adresse)
    {
        $this->clientModel->creer($nom, $prenom, $email, $telephone, $adresse);
        header('Location: index.php');
    }

    public function majClient(string $id_client, string $nom, string $prenom, string $email, string $telephone, string $adresse) 
    {
        $this->clientModel->maj($id_client, $nom, $prenom, $email, $telephone, $adresse);
        header('Location: index.php');
    }
}