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
    <h2>Modifier un compte</h2>
    <!-- Formulaire pour mettre à jour les informations d'un compte -->
    <form action="?action=maj-compte" method="POST">
        <!-- Champ caché pour transmettre l'ID du compte à mettre à jour -->
        <input type="hidden" name="id_compte" value="<?= htmlspecialchars($compte['id_compte']) ?>">
        
        <div class="mb-3">
            <label for="rib" class="form-label">RIB :</label>
            <!-- Champ texte pour le RIB du compte, pré-rempli avec la valeur actuelle -->
            <input type="text" class="form-control" id="rib" name="rib" value="<?= htmlspecialchars($compte['rib']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="solde" class="form-label">Solde :</label>
            <!-- Champ texte pour le solde du compte, pré-rempli avec la valeur actuelle -->
            <input type="number" step="0.01" class="form-control" id="solde" name="solde" value="<?= htmlspecialchars($compte['solde']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="id_client" class="form-label">ID Client :</label>
            <!-- Champ texte pour l'ID client associé au compte, pré-rempli avec la valeur actuelle -->
            <input type="number" class="form-control" id="id_client" name="id_client" value="<?= htmlspecialchars($compte['id_client']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type :</label>
            <!-- Champ texte pour le type du compte, pré-rempli avec la valeur actuelle -->
            <select class="form-control" id="type" name="type" required>
                <option value="Compte courant" <?= $compte['type'] == 'Compte courant' ? 'selected' : '' ?>>Compte courant</option>
                <option value="Compte épargne" <?= $compte['type'] == 'Compte épargne' ? 'selected' : '' ?>>Compte épargne</option>
            </select>
        </div>
        <!-- Bouton pour soumettre les modifications -->
        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
    <!-- Bouton pour annuler les modifications et revenir aux détails du compte -->
    <a href="?id_compte=<?= htmlspecialchars($compte['id_compte']) ?>&action=voir-compte" class="btn btn-secondary mt-3">Annuler</a>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
