<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fomrulaire de Connexion | PHP POO</title>
    <meta name="description" content="Formulaire de connexion en PHP POO sous le modèle MVC. Sauvegarde en Base de donnée.">
    <link rel="stylesheet" href="View/style/style.css">
</head>
<body>
    <div class="card">
        <h1>Connexion</h1>
        <form method="post" action="../Controller/InitConnectionController.php">
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="email" id="email" required>
            <label for="password">Mot de Passe</label>
            <input type="password" name="password" placeholder="password" id="password" required>
            <input type="submit" value="Connexion">
        </form>
    </div> 
</body>
</html>