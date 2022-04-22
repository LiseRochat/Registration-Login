<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- description spécifique à chaque page -->
    <meta name="description" content="<?php echo $page_description; ?>">
    <!-- Title spécifique à chaque page -->
    <title><?php echo $page_title; ?></title>
    <!-- Fichier css commun a toutes les pages -->
    <link rel="stylesheet" href="<?php echo URL ?>public/CSS/main.css">
    <!-- Fichier css spécifique à une page  -->
    <?php if(!empty($page_css)) : ?>
        <?php foreach($page_css as $file_css) : ?>
            <link rel="stylesheet" href="<?php echo URL ?>public/CSS/<?php echo $file_css ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <!-- Appel du menu : attention toutes les pages partent de notre fichier de routage qui est index.php d'ou un chemin d'appel depuis le dossier Views-->
    <?php require_once("Views/Common/header.php") ?>

    <?php if(!empty($_SESSION['alert'])) { 
            foreach($_SESSION['alert'] as $alert) {
                echo "<p>". $alert['message']."</p>";
            }
            unset($_SESSION['alert']);
        }
    ?>

    <!-- page_content : contenu des differentes pages -->
    <?php echo $page_content; ?>
    <?php require_once("Views/Common/footer.php") ?>
    <?php if(!empty($page_js)) : ?>
        <?php foreach($page_js as $file_js) : ?>
            <script src="<?php echo URL ?>public/Javascript/<?php echo $file_js; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>