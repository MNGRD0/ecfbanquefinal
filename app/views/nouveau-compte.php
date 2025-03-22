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
    <h2>Ajouter un nouveau compte</h2>
    <!-- Formulaire pour envoyer les données du compte à créer -->
    <form action="?action=creer-compte" method="POST">

        <label for="rib" class="form-label">RIB :</label>
        <!-- Champ texte pour entrer le RIB (obligatoire) -->
        <input type="text" class="form-control" id="rib" name="rib" required>

        <label for="solde" class="form-label">Solde :</label>
        <!-- Champ numérique pour entrer le solde du compte (obligatoire) -->
        <input type="number" step="0.01" class="form-control" id="solde" name="solde" required>

        <label for="id_client" class="form-label">ID du Client :</label>
        <!-- Champ numérique pour entrer l'ID du client associé au compte (obligatoire) -->
        <input type="number" class="form-control" id="id_client" name="id_client" required>

        <label for="type" class="form-label">Type de Compte :</label>
        <!-- Liste déroulante pour choisir le type de compte (obligatoire) -->
        <select class="form-control" id="type" name="type" required>
            <option value="Compte courant">Compte courant</option>
            <option value="Compte épargne">Compte épargne</option>
        </select>

        <!-- Bouton pour soumettre le formulaire et créer un nouveau compte -->
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
