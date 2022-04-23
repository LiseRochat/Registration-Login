<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $page_description; ?>">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="<?php echo URL ?>public/CSS/main.css">
    <?php if(!empty($page_css)) : ?>
        <?php foreach($page_css as $file_css) : ?>
            <link rel="stylesheet" href="<?php echo URL ?>public/CSS/<?php echo $file_css ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <?php require_once("Views/Common/header.php") ?>

    <?php if(!empty($_SESSION['alert'])) { 
            foreach($_SESSION['alert'] as $alert) {
                echo "<p>". $alert['message']."</p>";
            }
            unset($_SESSION['alert']);
        }
    ?>
    <?php echo $page_content; ?>
    <?php require_once("Views/Common/footer.php") ?>
    <?php if(!empty($page_js)) : ?>
        <?php foreach($page_js as $file_js) : ?>
            <script src="<?php echo URL ?>public/Javascript/<?php echo $file_js; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>