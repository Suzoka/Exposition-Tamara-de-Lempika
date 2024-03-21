<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_h&f.css">
    <link rel="stylesheet" href="../styles/style_connexion.css">
    <title>Expo Tamara de Lempicka - Les années folles</title>
</head>

<body>
    <?php include './views/components/header.php'; ?>
    <main>
        <h1>Connexion</h1>
        <p>Veuillez renseignez vos informations de connexion <br>
            Les champs précédés d’un astérisque <span class="required">*</span> doivent être remplis</p>
        <form action="./checkConnection" method="POST">
            <div class="formulaire">
                <div class="relative">
                    <label for="login"><span class="required">*</span> Login</label>
                    <input type="text" name="login" id="login" required>
                </div>
                <div class="relative">
                    <label for="password"><span class="required">*</span> Mot de passe</label>
                    <input type="password" name="password" id="password" required>
                    <button class="hide-show" type="button"><span class="sr-only">Afficher le mot de passe</span></button>
                </div>
                <?php if (isset ($_GET['error'])) {
                    echo "<p class=\"error\">Login ou mot de passe incorrect</p>";
                } ?>
                <div class="link">
                    <a href="./lostPassword">Mot de passe oublié ?</a>
                    <a href="./inscription" class="signUp">Créer un compte</a>
                </div>
            </div>
            <input type="submit" value="Se connecter">
        </form>
    </main>
    <?php include './views/components/footer.php'; ?>

    <script src="../scripts/showPassword.js"></script>
</body>

</html>