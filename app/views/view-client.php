<?php require_once __DIR__ . '/templates/header.php'; ?>

<style>

    .divTout {
            background-color:rgb(235, 235, 235);
            padding: 40px;
            margin-left: 60px;
            margin-right: 60px;
            margin-top: -16px;
            
        }
    
</style>
<div class="divTout">
    <h2>Détails de la tâche</h2>
    <p><strong>Nom :</strong> 
        <!-- Sécurise l'affichage du nom du client avec htmlspecialchars pour éviter les failles XSS -->
        <?= htmlspecialchars($client['nom']) ?>
    </p>
    <p><strong>Prénom :</strong> 
        <!-- Sécurise l'affichage du prénom du client et conserve les sauts de ligne grâce à nl2br -->
        <?= nl2br(htmlspecialchars($client['prenom'])) ?>
    </p>
    <p><strong>Email :</strong> 
        <!-- Sécurise l'affichage de l'email du client -->
        <?= htmlspecialchars($client['email']) ?>
    </p>
    <p><strong>Téléphone :</strong> 
        <!-- Sécurise l'affichage du téléphone du client et conserve les sauts de ligne -->
        <?= nl2br(htmlspecialchars($client['telephone'])) ?>
    </p>
    <p><strong>Adresse :</strong> 
        <!-- Sécurise l'affichage de l'adresse du client -->
        <?= htmlspecialchars($client['adresse']) ?>
    </p>

    <!-- Bouton pour modifier les informations de la tâche, redirige vers l'action "modifier" -->
    <a href="?id=<?= htmlspecialchars($client['id_client']) ?>&action=modifier" class="btn btn-warning">Modifier</a>
    <!-- Bouton pour retourner à la liste des tâches -->
    <a href="?" class="btn btn-secondary">Retour à la liste</a>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
