<?php require_once __DIR__ . '/templates/header.php'; ?>

<style>
    .divCo {
        background-color: white;
        padding: 70px;
        margin-left: 298px;
        margin-right: 298px;
        margin-top: 20px;
        border-radius: 4px;
        box-shadow: 2px 2px 5px rgba(49,49,49,0.6);
        margin-bottom: 20px;
    }

    .h2Co {
        display: flex;
        justify-content: center;
        margin-top: -30px;
        padding-bottom: 16px;
    }

    .boutonCo {
        background: linear-gradient(to right,rgb(35, 96, 156),rgb(154, 204, 255));
        border: none;
        border-radius: 4px;
        padding-bottom: 10px;
        padding-top: 10px;
        padding-left: 136px;
        padding-right: 136px;
        color: white;
        margin-top: 10px;
        white-space: nowrap;
        
    }

    .divBoutonCo {
        display: flex;
        justify-content: center;
        
    }

    .divTout {
        background-color:rgb(235, 235, 235);
        padding: 40px;
        margin-left: 60px;
        margin-right: 60px;
        margin-top: -16px;
        
    }
</style>

<div class="divTout">

    <div class="divCo">
        <h2 class="h2Co">Connexion</h2>

        <?php if (isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $_SESSION['error_message']; ?>
            </div>
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>

        <form action="index.php?action=connexion" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="divBoutonCo">
                <button type="submit" class="boutonCo">Se connecter</button>
            </div>
        </form>
    </div>

</div>
<?php require_once __DIR__ . '/templates/footer.php'; ?>