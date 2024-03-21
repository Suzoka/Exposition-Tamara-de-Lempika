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
        <h1>inscription</h1>
        <p>Veuillez renseignez vos informations pour créer votre compte <br>
            Les champs précédés d’un astérisque <span class="required">*</span> doivent être remplis</p>
        <form action="./checkInscription" method="POST">
            <div class="formulaire">
                <div class="relative">
                    <label for="login"><span class="required">*</span> Login</label><input type="text" name="login"
                        id="login" required>
                    <?php if (isset ($_GET['error'])) {
                        echo "<p class=\"error\">Ce nom d'utilisateur est déjà utilisé</p>";
                    } ?>
                </div>
                <div class="relative">
                    <label for="password"><span class="required">*</span> Mot de passe</label>
                    <input type="password" name="password" id="password" required>
                    <button class="hide-show" type="button"><span class="sr-only">Afficher le mot de passe</span></button>
                </div>
                <div class="relative">
                    <label for="passwordCheck"><span class="required">*</span> Vérifier le mot de passe</label>
                    <input type="password" name="passwordCheck" id="passwordCheck" required>
                    <button class="hide-show" type="button"><span class="sr-only">Afficher le mot de passe</span></button>
                    <p class="error hidden">Veillez rentrer deux mot de passe identiques</p>
                </div>
                <div class="relative">
                    <label for="mail"><span class="required">*</span> Adresse mail</label><input type="email"
                        name="mail" id="mail" required>
                </div>
                <div class="relative">
                    <label for="nom"><span class="required">*</span> Nom</label><input type="text" name="nom" id="nom"
                        required>
                </div>
                <div class="relative">
                    <label for="prenom"><span class="required">*</span> Prenom</label><input type="text" name="prenom"
                        id="prenom" required>
                </div>
                <a href="./connexion">Vous avez déjà un compte ? Se connecter</a>
            </div>
            <input type="submit" value="S'inscrire">
        </form>
    </main>
    <?php include './views/components/footer.php'; ?>

    <script src="../scripts/inscription.js" type="module"></script>
    <script src="../scripts/swhoPassword.js"></script>
</body>

</html>