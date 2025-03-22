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
    <p><strong>Type :</strong> 
        <!-- Sécurise l'affichage du type du contrat avec htmlspecialchars pour éviter les failles XSS -->
        <?= htmlspecialchars($contrat['type']) ?>
    </p>
    <p><strong>Montant :</strong> 
        <!-- Sécurise l'affichage du montant du contrat -->
        <?= htmlspecialchars($contrat['montant']) ?> €
    </p>
    <p><strong>Durée :</strong> 
        <!-- Sécurise l'affichage de la durée du contrat -->
        <?= htmlspecialchars($contrat['duree']) ?> mois
    </p>
    <p><strong>ID Client :</strong> 
        <!-- Sécurise l'affichage de l'identifiant du client associé au contrat -->
        <?= htmlspecialchars($contrat['id_client']) ?>
    </p>

    <!-- Bouton pour modifier le contrat (redirige vers l'action "modifier-contrat") -->
    <a href="?id_contrat=<?= htmlspecialchars($contrat['id_contrat']) ?>&action=modifier-contrat" class="btn btn-warning">Modifier</a>
    <!-- Bouton pour retourner à la liste des contrats -->
    <a href="?page=liste-contrats" class="btn btn-secondary">Retour à la liste</a>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
