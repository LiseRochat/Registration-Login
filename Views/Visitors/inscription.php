<div class="card">
    <h1>Inscription</h1>
    <form method="post" action="validationInscription">
        <label for="firstname">Prenom</label>
        <input type="text" name="firstname" placeholder="votre prénom" id="firstname" required maxlength=30 pattern="^[A-Za-z '-]+$">
        <label for="lastname">Nom</label>
        <input type="text" name="lastname" placeholder="votre nom" id="lastname" required maxlength=30 pattern="^[A-Za-z '-]+$">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="email" id="email" required maxlength=254 pattern="^[A-Za-z]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$">
        <label for="password">Mot de Passe</label>
        <input type="password" name="password" placeholder="password" id="password" required minlenght=6 maxlength=255>
        <input class="submit" type="submit" value="S'Inscrire">
    </form>
</div>
