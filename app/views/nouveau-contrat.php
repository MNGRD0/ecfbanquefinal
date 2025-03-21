<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="divTout">
    <h2>Ajouter un nouveau contrat</h2>
    <form action="?action=creer-contrat" method="POST">
        <label for="type" class="form-label">Type :</label>
        <select id="type" name="type" class="form-control" required>
            <option value="Assurance Vie">Assurance Vie</option>
            <option value="Assurance Habitation">Assurance Habitation</option>
            <option value="Crédit Immobilier">Crédit Immobilier</option>
            <option value="Crédit à la consommation">Crédit à la consommation</option>
            <option value="Compte Epargne Logement">Compte Epargne Logement</option>
        </select>

        <label for="montant" class="form-label">Montant :</label>
        <input type="number" step="0.01" class="form-control" id="montant" name="montant" required>

        <label for="duree" class="form-label">Durée (en mois) :</label>
        <input type="number" class="form-control" id="duree" name="duree" required>

        <label for="id_client" class="form-label">ID du Client :</label>
        <input type="number" class="form-control" id="id_client" name="id_client" required>

        <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
    </form>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
