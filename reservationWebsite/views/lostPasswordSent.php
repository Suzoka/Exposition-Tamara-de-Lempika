<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_h&f.css">
    <link rel="stylesheet" href="../styles/style_connexion.css">
    <title><?php echo $_SESSION["lang"] == "fr" ? "Mot de passe oublié - Expo Tamara de Lempicka - Les années folles" : "Lost password - Exhibition Tamara de Lempicka - The Roaring Twenties" ?></title>
    <link rel="icon" type="image/png" href="../img/favicon.png">
</head>

<body>
    <a href="#content" class="skip-link"><?php echo $_SESSION["lang"] == "fr" ? "Aller au contenu" : "Go to content" ?></a>
    <?php include './views/components/header.php'; ?>
    <main id="content">
        <h1><?php echo $_SESSION["lang"] == "fr" ? "Mot de passe oublié" : "Lost password" ?></h1>
            <div class="formulaire">
                <p><?php echo $_SESSION["lang"] == "fr" ? "Un mail vous a été envoyé pour réinitialiser votre mot de passe." : "An email have been sent to reset your password" ?></p>
            </div>
            <a href="./connexion" class="leave"><?php echo $_SESSION["lang"] == "fr" ? "Me connecter" : "Sign-in"?></a>
    </main>
    <?php include './views/components/footer.php'; ?>
</body>

</html>