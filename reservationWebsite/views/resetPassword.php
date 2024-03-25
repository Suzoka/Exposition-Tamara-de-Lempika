<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_h&f.css">
    <link rel="stylesheet" href="../styles/style_connexion.css">
    <title>
        <?php echo $_SESSION["lang"] == "fr" ? "Réinitialisation du mot de passe - Expo Tamara de Lempicka - Les années folles" : "Password reset - Exhibition Tamara de Lempicka - The Roaring Twenties" ?>
    </title>
    <link rel="icon" type="image/png" href="../img/favicon.png">
</head>

<body>
    <a href="#content" class="skip-link">
        <?php echo $_SESSION["lang"] == "fr" ? "Aller au contenu" : "Go to content" ?>
    </a>
    <?php include './views/components/header.php'; ?>
    <main id="content">
        <h1>
            <?php echo $_SESSION["lang"] == "fr" ? "Réinitialisation du mot de passe" : "Password reset" ?>
        </h1>
        <p>
            <?php echo $_SESSION["lang"] == "fr" ? "Indiquez votre nouveau mot de passe" : "Please provide your new password" ?><br>
            <?php echo $_SESSION["lang"] == "fr" ? "Les champs précédés d’un astérisque " : "The fields preceded by an asterisk " ?><span
                class="required">*</span>
            <?php echo $_SESSION["lang"] == "fr" ? " doivent être remplis." : " must be filled in." ?>
        </p>
        <form action="./checkResetPassword?key=<?php echo $_GET["key"]?>" method="POST">
            <div class="formulaire">
                <div class="relative">
                    <label for="password"><span class="required">*</span>
                        <?php echo $_SESSION["lang"] == "fr" ? "Mot de passe" : "Password" ?>
                    </label>
                    <input type="password" name="password" id="password"
                        value="<?php echo isset ($_SESSION['form_values']['password']) ? $_SESSION['form_values']['password'] : ''; ?>"
                        required>
                    <button class="hide-show" type="button"><span class="sr-only">
                            <?php echo $_SESSION["lang"] == "fr" ? "Afficher le mot de passe" : "Show password" ?>
                        </span></button>
                </div>
                <div class="relative">
                    <label for="passwordCheck"><span class="required">*</span>
                        <?php echo $_SESSION["lang"] == "fr" ? "Vérifier le mot de passe" : "Verify the password" ?>
                    </label>
                    <input type="password" name="passwordCheck" id="passwordCheck"
                        value="<?php echo isset ($_SESSION['form_values']['passwordCheck']) ? $_SESSION['form_values']['passwordCheck'] : ''; ?>"
                        required>
                    <button class="hide-show" type="button"><span class="sr-only">
                            <?php echo $_SESSION["lang"] == "fr" ? "Afficher le mot de passe" : "Show password" ?>
                        </span></button>
                    <p class="error hidden">
                        <?php echo $_SESSION["lang"] == "fr" ? "Veillez rentrer deux mot de passe identiques" : "Please enter two identical passwords" ?>
                    </p>
                    <?php if (isset ($_GET['error'])) {
                    echo "<p class=\"error\">".($_SESSION["lang"]=="fr" ? "Le lien a expiré" : "The reset link has expired")."</p>";
                } ?>
                </div>
            </div>
            <input type="submit"
                value="<?php echo $_SESSION["lang"] == "fr" ? "Réinitialiser mon mot de passe" : "Reset my password" ?>">
        </form>
    </main>
    <?php include './views/components/footer.php'; ?>

    <script src="../scripts/showPassword.js"></script>
    <script>
        document.querySelector("form").addEventListener("submit", function (e) {
            e.preventDefault();
            if (document.querySelector("input[name='password']").value !== document.querySelector("input[name='passwordCheck']").value) {
                document.querySelector(".error.hidden").classList.remove("hidden");
                document.querySelector("input[name='passwordCheck").focus();
                return;
            }
            else {
                this.submit();
            }
        });
    </script>
</body>

</html>