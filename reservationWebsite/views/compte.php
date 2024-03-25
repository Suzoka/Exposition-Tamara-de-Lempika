<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_h&f.css">
    <link rel="stylesheet" href="../styles/style_compte.css">
    <title>Mon compte - Expo Tamara de Lempicka - Les années folles</title>
    <title>
        <?php echo $_SESSION["lang"] == "fr" ? "Mon compte - Expo Tamara de Lempicka - Les années folles" : "My account - Exhibition Tamara de Lempicka - The Roaring Twenties" ?>
    </title>
    <link rel="icon" type="image/png" href="../img/favicon.png">
</head>

<body>
    <a href="#content" class="skip-link">
        <?php echo $_SESSION["lang"] == "fr" ? "Aller au contenu" : "Go to content" ?>
    </a>
    <?php include 'components/header.php'; ?>
    <main id="content" <?php if (!isset ($_SESSION['user'])) {
        echo 'class="notLoged"';
    } ?>>
        <?php if (!isset ($_SESSION['user'])) { ?>
            <div class="popup">
                <h2>
                    <?php echo $_SESSION["lang"] == "fr" ? "Connectez-vous ou inscrivez-vous pour accéder à votre compte" : "Log in or sign up to access your account" ?>
                </h2>
                <div class="link">
                    <a href="./connexion">
                        <?php echo $_SESSION["lang"] == "fr" ? "Connexion" : "Log in" ?>
                    </a>
                    <a href="./inscription">
                        <?php echo $_SESSION["lang"] == "fr" ? "Inscription" : "Sign up" ?>
                    </a>
                </div>
            </div>
        <?php } ?>
        <h1>
            <?php echo $_SESSION["lang"] == "fr" ? "Mon compte" : "My account" ?>
        </h1>
        <img id="compte" src="../img/compte.png" alt="">
        <?php if (isset ($_SESSION['user'])) { ?>
            <h2>
                <?php echo $_SESSION['user']->getPrenom() ?>
                <?php echo $_SESSION['user']->getNom() ?>
            </h2>
        <?php } ?>
        <section class="change">
            <div class="boutons">
                <a class="<?php if ($activePage == "infos" || $activePage == "edit") {
                    echo "active";
                } ?>" href="./compte?page=infos">
                    <?php echo $_SESSION["lang"] == "fr" ? "Mes
                    informations" : "My informations" ?>
                </a>
                <a class="<?php if ($activePage != "infos" && $activePage != "edit") {
                    echo "active";
                } ?>" href="./compte?page=reserv">
                    <?php echo $_SESSION["lang"] == "fr" ? "Mes
                    réservations" : "My reservations" ?>
                </a>
            </div>
            <?php if ($activePage == "infos" || $activePage == "edit") { ?>
                <div class="infos">
                    <?php if (isset ($_SESSION['user'])) {
                        if ($activePage == "infos") {
                            ?>
                            <p>
                                <?php echo $_SESSION["lang"] == "fr" ? "Prénom" : "First name" ?> :
                                <?php echo $_SESSION['user']->getPrenom() ?>
                            </p>
                            <p>
                                <?php echo $_SESSION["lang"] == "fr" ? "Nom" : "Last name" ?> :
                                <?php echo $_SESSION['user']->getNom() ?>
                            </p>
                            <p>
                                <?php echo $_SESSION["lang"] == "fr" ? "Adresse mail" : "E-mail adress" ?> :
                                <?php echo $_SESSION['user']->getMail() ?>
                            </p>
                            <a class="edit" href="./compte?page=edit">
                                <img class="noHover" src="../img/icons/editG.svg" alt="">
                                <img class="Hover" src="../img/icons/editW.svg" alt="">
                                <?php echo $_SESSION["lang"] == "fr" ? "Modifier mes informations" : "Edit my personnal informations" ?>
                            </a>
                            <a class="edit" href="./checkLostPassword">
                                <img class="noHover" src="../img/icons/editG.svg" alt="">
                                <img class="Hover" src="../img/icons/editW.svg" alt="">
                                <?php echo $_SESSION["lang"] == "fr" ? "Changer mon mot de passe" : "Reset my password" ?>
                            </a>
                            <a class="edit delete" href="./deleteCompte">
                                <img class="noHover" src="../img/icons/editG.svg" alt="">
                                <img class="Hover" src="../img/icons/editW.svg" alt="">
                                <?php echo $_SESSION["lang"] == "fr" ? "Supprimer mon compte" : "Delete my account" ?>
                            </a>
                        <?php } else { ?>
                            <form action="./editCompteInfos" method="POST">
                                <div class="formElement">
                                    <label for="prenom">
                                        <?php echo $_SESSION["lang"] == "fr" ? "Prénom" : "First name" ?> :
                                    </label>
                                    <input type="text" name="prenom" id="prenom"
                                        value="<?php echo $_SESSION['user']->getPrenom() ?>" required>
                                </div>
                                <div class="formElement">
                                    <label for="nom">
                                        <?php echo $_SESSION["lang"] == "fr" ? "Nom" : "Last name" ?> :
                                    </label>
                                    <input type="text" name="nom" id="nom" value="<?php echo $_SESSION['user']->getNom() ?>"
                                        required>
                                </div>
                                <div class="formElement">
                                    <label for="mail">
                                        <?php echo $_SESSION["lang"] == "fr" ? "Adresse mail" : "E-mail adress" ?> :
                                    </label>
                                    <input type="email" name="mail" id="mail" value="<?php echo $_SESSION['user']->getMail() ?>"
                                        required>
                                </div>
                                <?php if (isset ($_GET["error"])) {
                                    echo "<p class=\"error\">" . ($_SESSION["lang"] == "fr" ? "Une erreur s'est produite." : "An error has occurred") . "</p>";
                                } ?>
                                <label class="edit" for="save">
                                    <img class="noHover" src="../img/icons/saveG.svg" alt="">
                                    <img class="Hover" src="../img/icons/saveW.svg" alt="">
                                    <input type="submit"
                                        value="<?php echo $_SESSION["lang"] == "fr" ? "Enregistrer les modifications" : "Save changes" ?>"
                                        id="save"></label>
                            </form>
                        <?php }
                    } ?>
                </div>
            <?php } else { ?>
                <div class="reservations">
                    <h3>
                        <?php echo $_SESSION["lang"] == "fr" ? "Tamara de Lempicka - Les années folles" : "Tamara de Lempicka - The Roaring Twenties" ?>
                    </h3>
                    <div class="billets">

                        <?php
                        if (isset ($_SESSION['user'])) {
                            $tickets = $manager->getReservationsOfUser($_SESSION['user']->getId_user());
                            if ($tickets->rowCount() == 0) { ?>
                                <p>
                                    <?php echo $_SESSION["lang"] == "fr" ? "Vous n'avez pas encore de réservations" : "You don't have any reservations yet" ?>
                                </p>
                                <a id="reservation" href="./billetterie\">
                                    <img src="../img/icons/ticket.svg\" alt="">
                                    <p>
                                        <?php echo $_SESSION["lang"] == "fr" ? "Réserver maintenant" : "Book now" ?>
                                    </p>
                                </a>";
                            <?php } else {
                                foreach ($tickets->fetchAll(PDO::FETCH_ASSOC) as $key => $value) {
                                    ?>
                                    <div class="billet">
                                        <div class="timeDates">
                                            <div class="date">
                                                <p>
                                                    <?php if ($_SESSION["lang"] == "fr")
                                                        echo "le" ?>
                                                    <?php $date = new DateTime($value['date']);
                                                    $format = $_SESSION["lang"] == "fr" ? "fr_FR" : "en_EN";
                                                    $formatter = new IntlDateFormatter($format, IntlDateFormatter::LONG, IntlDateFormatter::NONE);
                                                    echo $formatter->format($date); ?>
                                                </p>
                                            </div>
                                            <div class="time">
                                                <p>
                                                    <?php echo $_SESSION["lang"] == "fr" ? "à" : "at" ?>
                                                    <?php echo $_SESSION['lang'] == "fr" ? str_replace(":", "h", $date->format('H:i')) : $date->format('h:i A') ?>
                                                </p>
                                            </div>
                                        </div>
                                        <h4>
                                            <?php if ($_SESSION['lang'] == "fr")
                                                echo "Billet" ?>
                                            <?php echo $value['nom_formule_' . $_SESSION['lang']] ?>
                                            <?php if ($_SESSION['lang'] == "en")
                                                echo "reservation" ?>
                                                x
                                            <?php echo $value['quantite'] ?>
                                        </h4>
                                        <p>
                                            <?php echo $value['explication_formule_' . $_SESSION['lang']] ?>
                                        </p>
                                        <p class="price">
                                            <?php echo $value['tarif'] == 0 ? ($_SESSION["lang"] == "fr" ? "Gratuit" : "Free") : $value['tarif'] * $value['quantite'] . "€" ?>
                                        </p>
                                    </div>

                                <?php }
                            }
                        } ?>


                    </div>
                    <div class="place">
                        <h3>
                            <?php echo $_SESSION["lang"] == "fr" ? "Localisation" : "Localization" ?>
                        </h3>
                        <div class="infosAccess">
                            <div class="infoAccess">
                                <img src="../img/icons/transport.svg" alt="Transport en commun">
                                <ul>
                                    <li>RER A - Noisy-Champs</li>
                                    <li>Bus 213 - Espace Descartes</li>
                                    <li>Bus 312 - Nobel</li>
                                </ul>
                            </div>
                            <div class="infoAccess">
                                <img src="../img/icons/voiture.svg" alt="Voiture">
                                <ul>
                                    <li>Via A4 </li>
                                    <li>Bd du Ru du Nesles N370</li>
                                    <li>Rue Albert Einstein</li>
                                </ul>
                            </div>
                            <div class="infoAccess">
                                <img src="../img/icons/velo.svg" alt="Vélo">
                                <ul>
                                    <li>Via Av. de Gravelle</li>
                                    <li>Via Av de Gravelle et D4</li>
                                    <li>Via D120</li>
                                </ul>
                            </div>
                            <div class="infoAccess">
                                <img src="../img/icons/pied.svg" alt="a pied">
                                <ul>
                                    <li>Via D120</li>
                                    <li>Via D143</li>
                                    <li>Via N302</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </section>

    </main>
    <?php include 'components/footer.php'; ?>

    <script src="../scripts/deleteConfirmation.js"></script>
</body>

</html>