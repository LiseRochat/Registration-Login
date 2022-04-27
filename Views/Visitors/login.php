<div class="card">
    <h1>Connexion</h1>
    <form method="POST" action="<?= URL;?>validationLogin">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="email" id="email" required>
        <label for="password">Mot de Passe</label>
        <input type="password" name="password" placeholder="password" id="password" required>
        <input class="submit" type="submit" value="Connexion">
    </form>
</div> 
