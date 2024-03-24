<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_h&f.css">
    <link rel="stylesheet" href="../styles/style_validation.css">
    <title>
        <?php echo $_SESSION["lang"] == "fr" ? "Validation - Expo Tamara de Lempicka - Les années folles" : "Validation - Exhibition Tamara de Lempicka - The Roaring Twenties" ?>
    </title>
    <link rel="icon" type="image/png" href="../img/favicon.png">
</head>

<body>
    <a href="#content" class="skip-link">
        <?php echo $_SESSION["lang"] == "fr" ? "Aller au contenu" : "Go to content" ?>
    </a>
    <?php include 'components/header.php'; ?>
    <main id="content">
        <h1>
            <?php echo $_SESSION["lang"] == "fr" ? "Merci" : "Thank you very much for your reservation, " ?>
            <?php echo $_POST['prenom'] ?>
            <?php echo $_POST['nom'] ?>
            <?php echo $_SESSION["lang"] == "fr" ? "pour votre réservation" : "" ?> !
        </h1>
        <p>
            <?php echo $_SESSION["lang"] == "fr" ? "Elle a bien été prise en compte. Vous pouvez la retrouver dans votre espace <a href=\"./compte\">\"Mon compte\"</a>." : "It have correctly registered. You can find it in <a href=\"./compte\">\"My account\"</a> space." ?>
        </p>
        <img src="../img/validation.png" alt="">
        <a id="accueil" href="">
            <?php echo $_SESSION["lang"] == "fr" ? "Retour à l'accueil" : "Come back to homepage" ?>
        </a>
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>