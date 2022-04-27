<nav>
    <ul>
        <li><a href="<?php echo URL; ?>accueil">Accueil</a></li>
        <?php if (empty($_SESSION['profil'])) :?>
        <li><a href="<?php echo URL; ?>login">Se connecter</a></li>
        <?php else : ?>
        <li><a href="<?php echo URL; ?>compte/profil">Mon Profil</a></li>
        <li><a href="<?php echo URL; ?>compte/deconnexion">Se déconnecter</a></li>
        <?php endif; ?>
    </ul>
</nav>