<nav>
    <ul>
        <li><a href="<?php echo URL; ?>accueil">Accueil</a></li>
        <?php if(!Security::isConnected()) :?>
        <li><a href="<?php echo URL; ?>login">Se connecter</a></li>
        <li><a href="<?php echo URL; ?>creerCompte">Créer un compte</a></li>
        <?php else : ?>
        <li><a href="<?php echo URL; ?>compte/profil">Mon Profil</a></li>
        <li><a href="<?php echo URL; ?>compte/deconnexion">Se déconnecter</a></li>
        <?php endif; ?>
        <?php if(Security::isConnected() && Security::isAdmin() ):?>
        <li><a href="<?php echo URL; ?>administration/droits">Gestion des droits</a></li>
        <?php endif; ?>
    </ul>
</nav>