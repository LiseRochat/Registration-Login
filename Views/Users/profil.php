<h1>Profil de <?= $user['firstname']    ; ?></h1>
<div>
    <div>
        <img src="<?= URL; ?>public/assets/img<?= $user['avatar']?>" alt="image de profil" width="100px">
    </div>
    <form methode="POST" action=""></form>
</div>

<div id="mail">
    Mail : <?= $user['email']; ?>
    <button id="btnModificationMail">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon>
            <line x1="3" y1="22" x2="21" y2="22"></line>
        </svg>
    </button>
</div>
<div>
    <a href="<?= URL; ?>compte/modificationMotDePasse">Changer le mot de passe</a>
</div>
<div>
    <button id="btnDeleteAccount">Supprimer mon compte</button>
</div>
<div id="deleteAccount" class="d-none">
    Veuillez confirmez la suppression du compte
    <br>
    <a href="<?= URL; ?>compte/suppressionCompte">Supprimez le compte</a>
</div>
<div id="modificationMail" class="d-none">
    <form method="POST" action="<?= URL; ?>compte/validationMoficationMail">
        <label for="mail">Mail :</label>
        <input type="mail" name="mail" value="<?= $user['email']; ?>"/>
        <button type="submit" id="btnValidationModificationMail">Valider</button>
    </form>
</div>