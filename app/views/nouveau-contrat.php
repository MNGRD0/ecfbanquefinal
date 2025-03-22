<?php require_once __DIR__ . '/templates/header.php'; ?>

    <style>
        th {
            background: linear-gradient(to right, rgb(35, 96, 156), rgb(154, 204, 255));
            color: white;
            border: 2px solid black;
        }

        table, td {
            background: rgb(240, 240, 240);
            border: 2px solid black;
        }

        .divTout {
            background-color: rgb(235, 235, 235);
            padding: 40px;
            margin-left: 60px;
            margin-right: 60px;
            margin-top: -16px;
            padding-bottom: 300px;
        }

        .divTabComptes {
            display: flex;
            justify-content: center;
        }

        table {
            width: 100%;
        }

        th {
            color: white;
            padding-top: 10px;
        }
    </style>

    <div class="divTout">
    <h2>Ajouter un nouveau contrat</h2>
    <!-- Formulaire pour envoyer les données d’un nouveau contrat -->
    <form action="?action=creer-contrat" method="POST">
        <label for="type" class="form-label">Type :</label>
        <!-- Champ de sélection du type de contrat -->
        <select id="type" name="type" class="form-control" required>
            <option value="Assurance Vie">Assurance Vie</option>
            <option value="Assurance Habitation">Assurance Habitation</option>
            <option value="Crédit Immobilier">Crédit Immobilier</option>
            <option value="Crédit à la consommation">Crédit à la consommation</option>
            <option value="Compte Epargne Logement">Compte Epargne Logement</option>
        </select>

        <label for="montant" class="form-label">Montant :</label>
        <!-- Champ pour entrer le montant (valeur décimale) -->
        <input type="number" step="0.01" class="form-control" id="montant" name="montant" required>

        <label for="duree" class="form-label">Durée (en mois) :</label>
        <!-- Champ pour entrer la durée du contrat en nombre de mois -->
        <input type="number" class="form-control" id="duree" name="duree" required>

        <label for="id_client" class="form-label">ID du Client :</label>
        <!-- Champ pour entrer l'ID du client lié au contrat -->
        <input type="number" class="form-control" id="id_client" name="id_client" required>

        <!-- Bouton pour soumettre le formulaire -->
        <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
    </form>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
