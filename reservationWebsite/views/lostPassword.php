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
        <p><?php echo $_SESSION["lang"] == "fr" ? "Veuillez renseignez votre nom d'utilisateur et votre mail" : "Please provide your username and your email adress" ?><br>
            <?php echo $_SESSION["lang"] == "fr" ? "Les champs précédés d’un astérisque " : "The fields preceded by an asterisk " ?><span class="required">*</span><?php echo $_SESSION["lang"] == "fr" ? " doivent être remplis." : " must be filled in." ?></p>
        <form action="./checkLostPassword" method="POST">
            <div class="formulaire">
                <div class="relative">
                    <label for="username"><span class="required">*</span><?php echo $_SESSION['lang']=="fr" ? "Nom d'utilisateur" : "Username" ?></label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="relative">
                    <label for="mail"><span class="required">*</span><?php echo $_SESSION["lang"] == "fr" ? "Mail" : "Email adress" ?></label>
                    <input type="email" name="mail" id="mail" required>
                </div>
                <?php if (isset ($_GET['error'])) {
                    echo "<p class=\"error\">".($_SESSION["lang"]=="fr" ? "Aucun compte avec ces informations n'a été trouvé" : "Any account found with theres informations")."</p>";
                } ?>
            </div>
            <input type="submit" value="<?php echo $_SESSION["lang"] == "fr" ? "Réinitialiser mon mot de passe" : "Reset my password" ?>">
        </form>
    </main>
    <?php include './views/components/footer.php'; ?>
</body>

</html>