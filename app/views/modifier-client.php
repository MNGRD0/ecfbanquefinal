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
    <h2>Modifier un client</h2>
    <form action="?action=maj" method="POST">
        <input type="hidden" name="id_client" value="<?= htmlspecialchars($client['id_client']) ?>">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($client['nom']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prenom :</label>
            <input class="form-control" id="prenom" name="prenom" rows="3" required value="<?= htmlspecialchars($client['prenom']) ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="text" class="form-control" id="email" name="email" value="<?= htmlspecialchars($client['email']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label">Telephone :</label>
            <input type="text" class="form-control" id="telephone" name="telephone" value="<?= htmlspecialchars($client['telephone']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse :</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="<?= htmlspecialchars($client['adresse']) ?>">
        </div>
        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
    <a href="?id_client=<?= htmlspecialchars($client['id_client']) ?>&action=voir" class="btn btn-secondary mt-3">Annuler</a>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
