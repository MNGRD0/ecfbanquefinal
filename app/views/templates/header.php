<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord "Gestion Bancaire"</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <img src="logo.png" alt="logo" width="150px" height="140px" class="logo">
    <style>
        body {
            background: linear-gradient(to right, rgb(35, 96, 156), rgb(154, 204, 255));
            font-family: Arial, sans-serif;
        }

        .logo {
            position: fixed;
            top: -3%;
            left: -2%;
        }

        .ulHeader {
            display: flex;
            list-style: none;
            justify-content: end;
            padding-right: 60px;
            padding-top: 70px;
            gap: 10px;
        }

        .boutonHeader {
            border: none;
            background: linear-gradient(to right, rgb(35, 96, 156), rgb(154, 204, 255));
            color: white;
            padding-left: 30px;
            padding-right: 30px;
            border: solid 1px rgb(235, 235, 235);
            padding-top: 7px;
            padding-bottom: 7px;
            border-radius: 4px 4px 0 0;
        }

        .boutonHeader:hover {
            background: linear-gradient(to right, rgb(94, 159, 224), rgb(197, 226, 255));
        }

        .divVousNaviguez {
            position: absolute;
            bottom: 0;
            margin-left: 60px;
            padding-bottom: -30px;
        }

        .pVousNaviguez {
            color: white;
            font-size: 11px;
        }
    </style>

    <nav>
        <div class="divHeader">
            <ul class="ulHeader">
                <li class="nav-item">
                    <a href="?"><button class="boutonHeader">Accueil</button></a>
                </li>
                <li>
                    <a href="?"><button class="boutonHeader">Liste des clients</button></a>
                </li>
                <li class="nav-item">
                    <a href="?page=nouveau-client"><button class="boutonHeader">Nouveau client</button></a>
                </li>
                <li>
                    <a href="?page=liste-comptes"><button class="boutonHeader">Liste des comptes</button></a>
                </li>
                <li>
                    <a href="?page=nouveau-compte"><button class="boutonHeader">Ajouter un compte</button></a>
                </li>
                <li>
                    <a href="?page=liste-contrats"><button class="boutonHeader">Liste des contrats</button></a>
                </li>
                <li>
                    <a href="?page=nouveau-contrat"><button class="boutonHeader">Ajouter un contrat</button></a>
                </li>
                <li class="nav-item">
                    <?php if (isset($_SESSION['username'])): ?>
                        <a href="?action=disconnect"><button class="boutonHeader">Déconnexion</button></a>
                    <?php else: ?>
                        <a href="?page=login"><button class="boutonHeader">Connexion</button></a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </nav>

    <?php if (isset($_SESSION['username'])): ?>
        <div class="divVousNaviguez">
            <p class="pVousNaviguez">Vous naviguez en tant que: <strong><?= $_SESSION['username'] ?></strong></p>
        </div>
    <?php endif; ?>
</body>
</html>
