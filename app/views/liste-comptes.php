<?php require_once __DIR__ . '/templates/header.php'; ?>

<?php if (!empty($comptes)): ?>

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
        <h2>Liste des Comptes</h2>
        
        <div class="divTabComptes">
            <table>
                <thead>
                    <tr>
                        <th>RIB</th>
                        <th>Solde</th>
                        <th>ID Client</th>
                        <th>Type</th>
                        <th class="action">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($comptes as $compte): ?>
                        <tr>
                            <td><?= htmlspecialchars($compte['rib']) ?></td>
                            <td><?= htmlspecialchars($compte['solde']) ?></td>
                            <td><?= htmlspecialchars($compte['id_client']) ?></td>
                            <td><?= htmlspecialchars($compte['type']) ?></td>
                            <td>
                                <a href="?id_compte=<?= $compte['id_compte'] ?>&action=voir-compte" class="btn btn-info btn-sm">Voir</a>
                                <a href="?id_compte=<?= $compte['id_compte'] ?>&action=modifier-compte" class="btn btn-warning btn-sm">Modifier</a>
                                <a href="?id_compte=<?= $compte['id_compte'] ?>&action=supprimer-compte" class="btn btn-danger btn-sm"
                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce compte ?')">
                                    Supprimer
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php else: ?>
    <p style="text-align: center;">Aucun compte trouvé.</p>
<?php endif; ?>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
