<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fomrulaire d'Inscription | PHP POO</title>
    <meta name="description" content="Formulaire d'inscritpion en PHP POO sous le modèle MVC. Sauvegarde en Base de donnée.">
</head>
<body>
    <div class="card">
        <h1>Inscription</h1>
        <form method="post" action="../Controller/InitInscriptionController.php">
            <label for="firstname">Prenom</label>
            <input type="text" name="firstname" placeholder="votre prénom" id="firstname" required maxlength=30>
            <label for="lastname">Nom</label>
            <input type="text" name="lastname" placeholder="votre nom" id="lastname" required maxlength=30>
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="email" id="email" required maxlength=254>
            <label for="password">Mot de Passe</label>
            <input type="password" name="password" placeholder="password" id="password" required minlenght=6 maxlength=255>
            <input type="submit" value="S'Inscrire">
        </form>
    </div>
</body>
</html>