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
            <label for="login"><span class="required">*</span>Login</label><input type="text" name="login" id="login"
                required><br>
            <label for="password"></label><span class="required">*</span>Mot de passe<input type="password"
                name="password" id="password" required><br>
                <a href="./lostPassword">Mot de passe oublié ?</a>
                <a href="./inscription">Créer un compte</a>
            <input type="submit" value="Se connecter">
        </form>
    </main>
    <?php include './views/components/footer.php'; ?>
</body>

</html>