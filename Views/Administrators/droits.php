<h1>Page de gestion des droits utilisateurs</h1>
<div class="admin">
    <table>
    <thead>
        <tr>
            <td>Email</td>
            <td>Validé</td>
            <td>Role</td>
        </tr>
        <?php foreach($users as $user) : ?>
        <tr>
            <td><?= $user['email']?></td>
            <td><?= (int)$user['isValid'] === 0? "non validé" : "validé"?></td>
            <td>
                <?php if($user['role'] === "admin") :?>
                    <?= $user['role'] ?>
                <?php else: ?>
                    <form method="POST" action="<?= URL ?>administration/validationModificationRole">
                        <input type="hidden" name="email" value="<?php echo $user['email']?>"/>
                        <select name="role" onchange="confirm('confirmez vous la modification ?')? submit() : document.location.reload();">
                            <option value="user" <?= $user['role'] === "user" ? "selected" : "" ?>>Utilisateur</option>
                            <option value="userVIP" <?= $user['role'] === "userVIP" ? "selected" : "" ?> >Utilisateur V.I.P.</option>
                            <option value="admin" <?= $user['role'] === "admin" ? "selected" : "" ?> >Administrateur</option>
                        </select>
                    </form>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </thead>
</table>
</div>
