<nav>
    <ul>
        <li><a href="<?php echo URL; ?>accueil">Accueil</a></li>
        <?php if (empty($_SESSION['profil'])) :?>
        <li><a href="<?php echo URL; ?>login">Se connecter</a></li>
        <?php else : ?>
        <li><a href="<?php echo URL; ?>compt/profil">Mon Profil</a></li>
        <?php endif; ?>
    </ul>
</nav>