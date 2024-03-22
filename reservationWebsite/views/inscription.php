<!DOCTYPE html>
<html lang="<?php echo $_SESSION["lang"] == "fr" ? "fr" : "en" ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_h&f.css">
    <link rel="stylesheet" href="../styles/style_connexion.css">
    <title><?php echo $_SESSION["lang"] == "fr" ? "Inscription - Expo Tamara de Lempicka - Les années folles" : "Sign up - Exhibition Tamara de Lempicka - The Roaring Twenties" ?></title>
</head>

<body>
    <a href="#content" class="skip-link"><?php echo $_SESSION["lang"] == "fr" ? "Aller au contenu" : "Go to content" ?></a>
    <?php include './views/components/header.php'; ?>
    <main id="content">
        <h1><?php echo $_SESSION["lang"] == "fr" ? "Inscription" : "Sign up" ?></h1>
        <p><?php echo $_SESSION["lang"] == "fr" ? "Veuillez renseignez vos informations pour créer un compte" : "Please provide your information to create an account" ?><br>
            <?php echo $_SESSION["lang"] == "fr" ? "Les champs précédés d’un astérisque " : "The fields preceded by an asterisk " ?><span class="required">*</span><?php echo $_SESSION["lang"] == "fr" ? " doivent être remplis." : " must be filled in." ?></p>
        <form action="./checkInscription" method="POST">
            <div class="formulaire">
                <div class="relative">
                    <label for="login"><span class="required">*</span> Login</label><input type="text" name="login"
                        id="login" value="<?php echo isset($_SESSION['form_values']['login']) ? $_SESSION['form_values']['login'] : ''; ?>" required>
                    <?php if (isset ($_GET['error'])) {
                        echo "<p class=\"error\">".($_SESSION["lang"]=="fr" ? "Ce nom d'utilisateur est déjà utilisé" : "This username is already in use")."</p>";
                    } ?>
                </div>
                <div class="relative">
                    <label for="password"><span class="required">*</span> <?php echo $_SESSION["lang"] == "fr" ? "Mot de passe" : "Password" ?></label>
                    <input type="password" name="password" id="password" value="<?php echo isset($_SESSION['form_values']['password']) ? $_SESSION['form_values']['password'] : ''; ?>" required>
                    <button class="hide-show" type="button"><span class="sr-only"><?php echo $_SESSION["lang"] == "fr" ? "Afficher le mot de passe" : "Show password" ?></span></button>
                </div>
                <div class="relative">
                    <label for="passwordCheck"><span class="required">*</span> <?php echo $_SESSION["lang"] == "fr" ? "Vérifier le mot de passe" : "Verify the password" ?></label>
                    <input type="password" name="passwordCheck" id="passwordCheck" value="<?php echo isset($_SESSION['form_values']['passwordCheck']) ? $_SESSION['form_values']['passwordCheck'] : ''; ?>" required>
                    <button class="hide-show" type="button"><span class="sr-only"><?php echo $_SESSION["lang"] == "fr" ? "Afficher le mot de passe" : "Show password" ?></span></button>
                    <p class="error hidden"><?php echo $_SESSION["lang"] == "fr" ? "Veillez rentrer deux mot de passe identiques" : "Please enter two identical passwords" ?></p>
                </div>
                <div class="relative">
                    <label for="mail"><span class="required">*</span> <?php echo $_SESSION["lang"] == "fr" ? "Adresse mail" : "Email" ?></label><input type="email"
                        name="mail" id="mail" value="<?php echo isset($_SESSION['form_values']['mail']) ? $_SESSION['form_values']['mail'] : ''; ?>" required>
                </div>
                <div class="relative">
                    <label for="nom"><span class="required">*</span> <?php echo $_SESSION["lang"] == "fr" ? "Nom" : "Last Name" ?></label><input type="text" name="nom" id="nom" value="<?php echo isset($_SESSION['form_values']['nom']) ? $_SESSION['form_values']['nom'] : ''; ?>" required>
                </div>
                <div class="relative">
                    <label for="prenom"><span class="required">*</span> <?php echo $_SESSION["lang"] == "fr" ? "Prénom" : "First name" ?></label><input type="text" name="prenom"
                        id="prenom" value="<?php echo isset($_SESSION['form_values']['prenom']) ? $_SESSION['form_values']['prenom'] : ''; ?>" required>
                </div>
                <a href="./connexion"><?php echo $_SESSION["lang"] == "fr" ? "Vous avez déjà un compte ? Se connecter" : "Already have an account? Log in" ?></a>
            </div>
            <input type="submit" value="<?php echo $_SESSION["lang"] == "fr" ? "S'inscrire" : "Sign up" ?>">
        </form>
    </main>
    <?php include './views/components/footer.php'; ?>

    <script src="../scripts/inscription.js" type="module"></script>
    <script src="../scripts/showPassword.js"></script>
</body>

</html>