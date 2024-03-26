<!DOCTYPE html>
<html lang="<?php echo $_SESSION["lang"] == "fr" ? "fr" : "en" ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_h&f.css">
    <link rel="stylesheet" href="../styles/style_mention.css">
    <title><?php echo $_SESSION["lang"] == "fr" ? "Mentions Légales - Expo Tamara de Lempicka - Les années folles" : "GCU - Exhibition Tamara de Lempicka - The Roaring Twenties" ?>
    </title>
</head>

<body>
    <a href="#content" class="skip-link">
        <?php echo $_SESSION["lang"] == "fr" ? "Aller au contenu" : "Go to content" ?>
    </a>
    <?php include 'components/header.php'; ?>
    <main id="content">
        <h1>
            <?php echo $_SESSION["lang"] == "fr" ? "Mentions Légales" : "GCU" ?>
        </h1>
        
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>