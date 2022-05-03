<h1>Modification du mot de passe - <?= $_SESSION['profil']['email'];?></h1>
<div class="card">
    <form method="POST" action="<?= URL;?>compte/validationModificationMotDePasse">
        <label for="password">Ancien Mot de Passe</label>
        <input type="text" name="password" placeholder="Mot de Passe" id="password" required>
        <label for="newPassword">Nouveau Mot de Passe</label>
        <input type="password" name="newPassword" placeholder="Nouveau Mot de Passe" id="newPassword" required>
        <label for="newPasswordConf">Confirmez votre Nouveau Mot de Passe</label>
        <input type="password" name="newPasswordConf" placeholder="Nouveau Mot de Passe" id="newPasswordConf" required>
        <div id="error" class="alert d-none">Les mots de passe ne correspondent pas.</div>
        <input id="btnValidation" class="submit" type="submit" value="Valider" disabled>
    </form>
</div> 
