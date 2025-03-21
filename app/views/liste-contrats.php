<?php require_once __DIR__ . '/templates/header.php'; ?>

<?php if (!empty($contrats)): ?>

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
                <?php foreach ($contrats as $contrat): ?>
                    <tr>
                        <td><?= htmlspecialchars($contrat['type']) ?></td>
                        <td><?= htmlspecialchars($contrat['montant']) ?></td>
                        <td><?= htmlspecialchars($contrat['duree']) ?> mois</td>
                        <td><?= htmlspecialchars($contrat['id_client']) ?></td>
                        <td>
                            <a href="?id_contrat=<?= $contrat['id_contrat'] ?>&action=voir-contrat" class="btn btn-info btn-sm">Voir</a>
                            <a href="?id_contrat=<?= $contrat['id_contrat'] ?>&action=modifier-contrat" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="?id_contrat=<?= $contrat['id_contrat'] ?>&action=supprimer-contrat" class="btn btn-danger btn-sm" 
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contrat ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php else: ?>
    <p style="text-align: center;">Aucun contrat trouvé.</p>
<?php endif; ?>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
