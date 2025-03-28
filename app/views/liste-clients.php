<?php require_once __DIR__ . '/templates/header.php'; ?>

<?php 
// Vérifie si la variable $client contient des données (liste des clients)
if (!empty($client)):  ?>

    <style>
        th {
            background: linear-gradient(to right,rgb(35, 96, 156),rgb(154, 204, 255));
            color: white;
            border: 2px, solid, black;
        }

        table, td {
            background:rgb(240, 240, 240);
            border: 2px, solid, black;
        }

        .divTout {
        background-color:rgb(235, 235, 235);
        padding: 40px;
        margin-left: 60px;
        margin-right: 60px;
        margin-top: -16px;
        padding-bottom: 300px;
        
    }

    .divTabClients {
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
        <h2>Liste des Clients</h2>
        
        <div class="divTabClients"></div>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
                        <th class="action">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Parcourt chaque client dans la liste $client pour les afficher dans le tableau
                    foreach ($client as $clients): ?>
                        <tr>
                            <!-- Affiche les informations du client en utilisant htmlspecialchars pour sécuriser les données -->
                            <td><?= htmlspecialchars($clients['nom']) ?></td>
                            <td><?= htmlspecialchars($clients['prenom']) ?></td>
                            <td><?= htmlspecialchars($clients['email']) ?></td>
                            <td><?= htmlspecialchars($clients['telephone']) ?></td>
                            <td><?= htmlspecialchars($clients['adresse']) ?></td>

                            <td>
                                <!-- Bouton pour voir les détails du client -->
                                <a href="?id_client=<?= $clients['id_client'] ?>&action=voir" class="btn btn-info btn-sm">Voir</a>
                                <!-- Bouton pour modifier le client -->
                                <a href="?id_client=<?= $clients['id_client'] ?>&action=modifier" class="btn btn-warning btn-sm">Modifier</a>
                                <!-- Bouton pour supprimer le client, avec confirmation -->
                                <a href="?id_client=<?= $clients['id_client'] ?>&action=supprimer" class="btn btn-danger btn-sm"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')">
                                    Supprimer
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php 
// Si $client est vide, affiche un message indiquant qu'aucune donnée n'a été trouvée
else: ?>
    <p style="text-align: center;">Aucune tâche trouvée.</p>
<?php endif; ?>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
