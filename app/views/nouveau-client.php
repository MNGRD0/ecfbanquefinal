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
    <h2>Ajouter un nouveau client</h2>
    <form action="?action=creer" method="POST">
        
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        
        
            <label for="prenom" class="form-label">Prénom :</label>
            <input type="text" class="form-control" id="prenom" name="prenom" rows="3" required>
        
            <label for="email" class="form-label">Email :</label>
            <input type="text" class="form-control" name="email" id="email">
                
        
            <label for="telephone" class="form-label">Téléphone :</label>
            <input type="text" class="form-control" name="telephone" id="telephone">
        
            
            <label for="adresse" class="form-label">Adresse :</label>
            <input type="text" class="form-control" name="adresse" id="adresse">
                
        
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
