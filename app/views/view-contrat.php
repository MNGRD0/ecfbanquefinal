<?php require_once __DIR__ . '/templates/header.php'; ?>

<style>
    .divTout {
        background-color: rgb(235, 235, 235);
        padding: 40px;
        margin-left: 60px;
        margin-right: 60px;
        margin-top: -16px;
    }
</style>

<div class="divTout">
    <h2>Détails du contrat</h2>
    <p><strong>Type :</strong> <?= htmlspecialchars($contrat['type']) ?></p>
    <p><strong>Montant :</strong> <?= htmlspecialchars($contrat['montant']) ?> €</p>
    <p><strong>Durée :</strong> <?= htmlspecialchars($contrat['duree']) ?> mois</p>
    <p><strong>ID Client :</strong> <?= htmlspecialchars($contrat['id_client']) ?></p>

    <a href="?id_contrat=<?= htmlspecialchars($contrat['id_contrat']) ?>&action=modifier-contrat" class="btn btn-warning">Modifier</a>
    <a href="?page=liste-contrats" class="btn btn-secondary">Retour à la liste</a>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
