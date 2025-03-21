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
    <p><strong>Nom :</strong> <?= htmlspecialchars($client['nom']) ?></p>
    <p><strong>Prénom :</strong> <?= nl2br(htmlspecialchars($client['prenom'])) ?></p>
    <p><strong>Email :</strong> <?= htmlspecialchars($client['email']) ?></p>
    <p><strong>Téléphone :</strong> <?= nl2br(htmlspecialchars($client['telephone'])) ?></p>
    <p><strong>Adresse :</strong> <?= htmlspecialchars($client['adresse']) ?></p>


    <a href="?id=<?= htmlspecialchars($client['id_client']) ?>&action=modifier" class="btn btn-warning">Modifier</a>
    <a href="?" class="btn btn-secondary">Retour à la liste</a>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
