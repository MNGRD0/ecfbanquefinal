<?php require_once __DIR__ . '/templates/header.php'; ?>

<?php 
// Vérifie si la variable $contrats contient une liste de contrats
if (!empty($contrats)): ?>

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
        <h2>Liste des Contrats</h2>
        <table>
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Montant</th>
                    <th>Durée</th>
                    <th>ID Client</th>
                    <th class="action">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Parcourt chaque contrat dans la liste $contrats pour les afficher
                foreach ($contrats as $contrat): ?>
                    <tr>
                        <!-- Affiche les informations du contrat tout en sécurisant les données avec htmlspecialchars -->
                        <td><?= htmlspecialchars($contrat['type']) ?></td>
                        <td><?= htmlspecialchars($contrat['montant']) ?></td>
                        <td><?= htmlspecialchars($contrat['duree']) ?> mois</td>
                        <td><?= htmlspecialchars($contrat['id_client']) ?></td>
                        <td>
                            <!-- Lien pour afficher les détails d'un contrat -->
                            <a href="?id_contrat=<?= $contrat['id_contrat'] ?>&action=voir-contrat" class="btn btn-info btn-sm">Voir</a>
                            <!-- Lien pour modifier un contrat -->
                            <a href="?id_contrat=<?= $contrat['id_contrat'] ?>&action=modifier-contrat" class="btn btn-warning btn-sm">Modifier</a>
                            <!-- Lien pour supprimer un contrat, avec confirmation -->
                            <a href="?id_contrat=<?= $contrat['id_contrat'] ?>&action=supprimer-contrat" class="btn btn-danger btn-sm" 
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contrat ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php 
// Si la variable $contrats est vide, affiche un message indiquant qu'aucun contrat n'a été trouvé
else: ?>
    <p style="text-align: center;">Aucun contrat trouvé.</p>
<?php endif; ?>

<?php require_once __DIR__ . '/templates/footer.php'; ?>