<h1>Page de gestion des droits utilisateurs</h1>
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
                        <select name="role" onchange="confirm('confirmez vous la modification ?')? submit() : document.location.reload();">
                            <option value="user">Utilisateur</option>
                            <option value="userVIP">Utilisateur V.I.P.</option>
                            <option value="admin">Administrateur</option>
                        </select>
                    </form>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </thead>
</table>