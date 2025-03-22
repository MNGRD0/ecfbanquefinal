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
    <h2>Modifier un contrat</h2>
    <!-- Formulaire pour mettre à jour les informations d'un contrat -->
    <form action="?action=maj-contrat" method="POST">
        <!-- Champ caché pour transmettre l'ID du contrat à mettre à jour -->
        <input type="hidden" name="id_contrat" value="<?= htmlspecialchars($contrat['id_contrat']) ?>">
        
        <div class="mb-3">
            <label for="type" class="form-label">Type :</label>
            <!-- Liste déroulante pour sélectionner le type de contrat -->
            <select class="form-control" id="type" name="type" required>
                <option value="Assurance Vie" <?= $contrat['type'] == 'Assurance Vie' ? 'selected' : '' ?>>Assurance Vie</option>
                <option value="Assurance Habitation" <?= $contrat['type'] == 'Assurance Habitation' ? 'selected' : '' ?>>Assurance Habitation</option>
                <option value="Crédit Immobilier" <?= $contrat['type'] == 'Crédit Immobilier' ? 'selected' : '' ?>>Crédit Immobilier</option>
                <option value="Crédit à la consommation" <?= $contrat['type'] == 'Crédit à la consommation' ? 'selected' : '' ?>>Crédit à la consommation</option>
                <option value="Compte Epargne Logement" <?= $contrat['type'] == 'Compte Epargne Logement' ? 'selected' : '' ?>>Compte Epargne Logement</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="montant" class="form-label">Montant :</label>
            <!-- Champ numérique pour le montant, pré-rempli avec la valeur actuelle -->
            <input type="number" step="0.01" class="form-control" id="montant" name="montant" value="<?= htmlspecialchars($contrat['montant']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="duree" class="form-label">Durée (en mois) :</label>
            <!-- Champ numérique pour la durée, pré-rempli avec la valeur actuelle -->
            <input type="number" class="form-control" id="duree" name="duree" value="<?= htmlspecialchars($contrat['duree']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="id_client" class="form-label">ID Client :</label>
            <!-- Champ texte pour l'ID du client associé au contrat, pré-rempli avec la valeur actuelle -->
            <input type="number" class="form-control" id="id_client" name="id_client" value="<?= htmlspecialchars($contrat['id_client']) ?>" required>
        </div>
        <!-- Bouton pour soumettre les modifications -->
        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
    <!-- Bouton pour annuler les modifications et revenir aux détails du contrat -->
    <a href="?id_contrat=<?= htmlspecialchars($contrat['id_contrat']) ?>&action=voir-contrat" class="btn btn-secondary mt-3">Annuler</a>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
