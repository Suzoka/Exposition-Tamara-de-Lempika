<head>
    <meta name="description" content="Connectez-vous à votre compte pour récupérer vos billets pour l'exposition Tamara de Lempicka - les années folles. Venez explorer les œuvres uniques de l'artiste dans cette exposition immersive unique jusqu'au 28 Avril 2024.">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_h&f.css">
    <link rel="stylesheet" href="../styles/style_connexion.css">
    <title><?php echo $_SESSION["lang"] == "fr" ? "Connexion - Expo Tamara de Lempicka - Les années folles" : "Log in - Exhibition Tamara de Lempicka - The Roaring Twenties" ?></title>
    <link rel="icon" type="image/png" href="../img/favicon.png">
</head>

<body>
    <a href="#content" class="skip-link"><?php echo $_SESSION["lang"] == "fr" ? "Aller au contenu" : "Go to content" ?></a>
    <?php include './views/components/header.php'; ?>
    <main id="content">
        <h1><?php echo $_SESSION["lang"] == "fr" ? "Connexion" : "Log in" ?></h1>
        <p><?php echo $_SESSION["lang"] == "fr" ? "Veuillez renseignez vos informations de connexion" : "Please provide your login information" ?><br>
            <?php echo $_SESSION["lang"] == "fr" ? "Les champs précédés d’un astérisque " : "The fields preceded by an asterisk " ?><span class="required">*</span><?php echo $_SESSION["lang"] == "fr" ? " doivent être remplis." : " must be filled in." ?></p>
        <form action="./checkConnection" method="POST">
            <div class="formulaire">
                <div class="relative">
                    <label for="login"><span class="required">*</span> Login</label>
                    <input type="text" name="login" id="login" required>
                </div>
                <div class="relative">
                    <label for="password"><span class="required">*</span><?php echo $_SESSION["lang"] == "fr" ? "Mot de passe" : "Password" ?></label>
                    <input type="password" name="password" id="password" required>
                    <button class="hide-show" type="button"><span class="sr-only"><?php echo $_SESSION["lang"] == "fr" ? "Afficher le mot de passe" : "Show password" ?></span></button>
                </div>
                <?php if (isset ($_GET['error'])) {
                    echo "<p class=\"error\">".($_SESSION["lang"]=="fr" ? "Login ou mot de passe incorrect" : "Login or password incorrect")."</p>";
                } ?>
                <div class="link">
                    <a href="./lostPassword"><?php echo $_SESSION["lang"] == "fr" ? "Mot de passe oublié ?" : "Forgot your password?" ?></a>
                    <a href="./inscription" class="signUp"><?php echo $_SESSION["lang"] == "fr" ? "Créer un compte" : "Create an account" ?></a>
                </div>
            </div>
            <input type="submit" value="<?php echo $_SESSION["lang"] == "fr" ? "Se connecter" : "Log in" ?>">
        </form>
    </main>
    <?php include './views/components/footer.php'; ?>

    <script src="../scripts/showPassword.js"></script>
</body>

</html>