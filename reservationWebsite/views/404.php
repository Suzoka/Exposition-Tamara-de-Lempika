<!DOCTYPE html>
<html lang="<?php echo $_SESSION["lang"] == "fr" ? "fr" : "en" ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_h&f.css">
    <link rel="stylesheet" href="../styles/style_404.css">
    <title><?php echo $_SESSION["lang"] == "fr" ? "Expo Tamara de Lempicka - Les années folles" : "Exhibition Tamara de Lempicka - The Roaring Twenties" ?></title>
</head>

<body>
    <a href="#content" class="skip-link"><?php echo $_SESSION["lang"] == "fr" ? "Aller au contenu" : "Go to content" ?></a>
    <?php include './views/components/header.php'; ?>
    <main id="content">
        <h1><?php echo $_SESSION["lang"] == "fr" ? "Erreur 404" : "Error 404" ?></h1>
        <p><?php echo $_SESSION["lang"] == "fr" ? "La page que vous cherchez n'existe pas." : "Page not found !" ?></p>
        <a class="edit" href="./accueil"><?php echo $_SESSION["lang"] == "fr" ? "Retour à l'accueil" : "Back to homepage" ?></a>
    </main>
    <?php include './views/components/footer.php'; ?>
</body>

</html>