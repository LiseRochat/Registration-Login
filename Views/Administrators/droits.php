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
            <td><?= $user['role']?></td>
        </tr>
        <?php endforeach; ?>
    </thead>
</table>