<?php

session_start();

require_once __DIR__ . '/app/controllers/ClientController.php';
require_once __DIR__ . '/app/controllers/CompteController.php';
require_once __DIR__ . '/app/controllers/ContratController.php';
require_once __DIR__ . '/app/controllers/AdminController.php';

$clientController = new ClientController();
$compteController = new CompteController();
$contratController = new ContratController();
$adminController = new AdminController();

// Vérification de la session utilisateur
if (!isset($_SESSION['username'])) {
    $adminController->index();
    
}

// Gestion des actions et pages pour les clients
if (isset($_GET['action']) && $_GET['action'] == 'creer' && isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['telephone']) && !empty($_POST['telephone']) && isset($_POST['adresse']) && !empty($_POST['adresse'])) {
    $clientController->creerClient($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['telephone'], $_POST['adresse']);
}

elseif (isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['telephone']) && !empty($_POST['telephone']) && isset($_POST['adresse']) && !empty($_POST['adresse'])) {
    $clientController->majClient($_POST['id_client'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['telephone'], $_POST['adresse']);
}

elseif (isset($_GET['action']) && isset($_GET['id_client']) && $_GET['action'] === 'supprimer') {
    if (!empty($_GET['id_client'])) {
        $clientController->supprimerClient($_GET['id_client']);
    } else {
        echo "Erreur : ID du client manquant.";
    }
}

elseif (isset($_GET['action']) && $_GET['action'] == 'voir' && isset($_GET['id_client']) && !empty($_GET['id_client'])) {
    $clientController->voirClient($_GET['id_client']);
}

elseif (isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_GET['id_client']) && !empty($_GET['id_client'])) {
    $clientController->modifierClient($_GET['id_client']);
}

// Gestion des actions et pages pour les comptes
elseif (isset($_GET['action']) && $_GET['action'] == 'creer-compte' && isset($_POST['rib']) && !empty($_POST['rib']) && isset($_POST['solde']) && isset($_POST['id_client']) && !empty($_POST['id_client']) && isset($_POST['type']) && !empty($_POST['type'])) {
    $compteController->creerCompte($_POST['rib'], $_POST['solde'], $_POST['id_client'], $_POST['type']);
}

elseif (isset($_GET['action']) && $_GET['action'] == 'supprimer-compte' && isset($_GET['id_compte']) && !empty($_GET['id_compte'])) {
    $compteController->supprimerCompte($_GET['id_compte']);
}

elseif (isset($_GET['action']) && $_GET['action'] == 'voir-compte' && isset($_GET['id_compte']) && !empty($_GET['id_compte'])) {
    $compteController->voirCompte($_GET['id_compte']);
}

elseif (isset($_GET['action']) && $_GET['action'] == 'modifier-compte' && isset($_GET['id_compte']) && !empty($_GET['id_compte'])) {
    $compteController->modifierCompte($_GET['id_compte']);
}

// Gestion des actions et pages pour les contrats
elseif (isset($_GET['action']) && $_GET['action'] == 'creer-contrat' && isset($_POST['type']) && !empty($_POST['type']) && isset($_POST['montant']) && isset($_POST['duree']) && !empty($_POST['duree']) && isset($_POST['id_client']) && !empty($_POST['id_client'])) {
    $contratController->creerContrat($_POST['type'], $_POST['montant'], $_POST['duree'], $_POST['id_client']);
}

elseif (isset($_GET['action']) && $_GET['action'] == 'supprimer-contrat' && isset($_GET['id_contrat']) && !empty($_GET['id_contrat'])) {
    $contratController->supprimerContrat($_GET['id_contrat']);
}

elseif (isset($_GET['action']) && $_GET['action'] == 'voir-contrat' && isset($_GET['id_contrat']) && !empty($_GET['id_contrat'])) {
    $contratController->voirContrat($_GET['id_contrat']);
}

elseif (isset($_GET['action']) && $_GET['action'] == 'modifier-contrat' && isset($_GET['id_contrat']) && !empty($_GET['id_contrat'])) {
    $contratController->modifierContrat($_GET['id_contrat']);
}

// Gestion des pages
elseif (isset($_GET['page']) && $_GET['page'] === 'nouveau-client') {
    $clientController->nouveauClient();
}

elseif (isset($_GET['page']) && $_GET['page'] === 'nouveau-compte') {
    $compteController->nouveauCompte();
}

elseif (isset($_GET['page']) && $_GET['page'] === 'liste-comptes') {
    $compteController->listeDeTousLesComptes();
}

elseif (isset($_GET['page']) && $_GET['page'] === 'nouveau-contrat') {
    $contratController->nouveauContrat();
}

elseif (isset($_GET['page']) && $_GET['page'] === 'liste-contrats') {
    $contratController->listeDeTousLesContrats();
}

// Gestion de la connexion/déconnexion
elseif (isset($_GET['page']) && $_GET['page'] === 'login') {
    $adminController->index();
}

elseif (isset($_GET['action']) && $_GET['action'] === 'connexion' && isset($_POST['username']) && isset($_POST['password'])) {
    $adminController->connect($_POST['username'], $_POST['password']);
}

elseif (isset($_GET['action']) && $_GET['action'] === 'disconnect') {
    $adminController->disconnect();
}

else {
    $clientController->listeDeTousLesClients();
}
