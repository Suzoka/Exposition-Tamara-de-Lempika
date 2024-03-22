<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/css/datepicker.min.css">
    <link rel="stylesheet" href="../styles/style_h&f.css">
    <link rel="stylesheet" href="../styles/style_billetterie.css">
    <title><?php echo $_SESSION["lang"] == "fr" ? "Billetterie - Expo Tamara de Lempicka - Les années folles" : "Ticketing - Exhibition Tamara de Lempicka - The Roaring Twenties" ?></title>
</head>

<body>
    <a href="#content" class="skip-link"><?php echo $_SESSION["lang"] == "fr" ? "Aller au contenu" : "Go to content" ?></a>
    <?php include 'components/header.php'; ?>
    <main>
        <section class="banniere" id="content">
            <h1><?php echo $_SESSION["lang"] == "fr" ? "Exposition" : "Exhibition" ?>
                <br><span><?php echo $_SESSION["lang"] == "fr" ? "Billetterie" : "Ticketing" ?></span>
            </h1>
            <a href="#ariane" class="scroll">
                <img src="../img/icons/scroll.svg" alt="scroll">
            </a>
        </section>
        <section <?php if (!isset ($_SESSION['user'])) {
            echo 'class="notLoged"';
        } if (isset($_GET['error'])){
            echo 'class="serverError"';
        } ?>>
            <div class="ariane" id="ariane">
                <button class="etat step1 active" data-goto="1">
                    <p>1</p>
                    <h3><?php echo $_SESSION["lang"] == "fr" ? "Etape 1 : Heure et date" : "Step 1 : Time et date" ?></h3>
                </button>
                <button class="etat step2" data-goto="2">
                    <p>2</p>
                    <h3><?php echo $_SESSION["lang"] == "fr" ? "Etape 2 : Les formules" : "Step 2 : Options" ?></h3>
                </button>
                <button class="etat step3" data-goto="3">
                    <p>3</p>
                    <h3><?php echo $_SESSION["lang"] == "fr" ? "Etape 3 : Coordonnées" : "Step 3 : Personal Details" ?></h3>
                </button>
                <button class="etat step4" data-goto="4">
                    <p>4</p>
                    <h3><?php echo $_SESSION["lang"] == "fr" ? "Etape 4 : Confirmation" : "Step 4 : Validation" ?></h3>
                </button>
            </div>
            <div class="etape">
                <?php if (!isset ($_SESSION['user'])) { ?>
                    <div class="popup">
                        <h2><?php echo $_SESSION["lang"] == "fr" ? "Connectez-vous ou inscrivez-vous pour commander" : "Log in or register to order" ?></h2>
                        <div class="link">
                            <a href="./connexion"><?php echo $_SESSION["lang"] == "fr" ? "Connection" : "Log in" ?></a>
                            <a href="./inscription"><?php echo $_SESSION["lang"] == "fr" ? "Inscription" : "Sign up" ?></a>
                        </div>
                    </div>
                <?php } ?>

                    <div class="popup erreur <?php if (!isset ($_GET['error'])) echo "hidden" ?>">
                        <h2><?php echo $_SESSION["lang"] == "fr" ? "Une erreur est survenue au niveau du serveur." : "An error occurred at the server level." ?></h2>
                        <p><?php echo $_SESSION["lang"] == "fr" ? "Veuillez réessayer plus tard, nous nous excusons pour le désagrément." : "Please try again later, we apologize for the inconvenience." ?></p>
                        <button type="button" class="closePopup"><?php echo $_SESSION["lang"] == "fr" ? "Fermer le popup" : "Close popup" ?></button>
                    </div>
                

                <form action="./newReservation" method="post">
                    <div id="step1" class="current">
                        <h2 class="title"><span>1</span><?php echo $_SESSION["lang"] == "fr" ? "Etape 1 : Sélection de l'heure et la date" : "Step 1 : Selection of time and date" ?></h2>
                        <div class="calendar">
                            <h3><?php echo $_SESSION["lang"] == "fr" ? "Choisissez la date de votre visite" : "Please select the date of your visit." ?></h3>
                            <div id="date"></div>
                            <p class="error hidden" id="errorDate"><?php echo $_SESSION["lang"] == "fr" ? "Veillez renseigner une date" : "Please provide a date." ?></p>
                        </div>
                        <div class="hour">
                            <h3><?php echo $_SESSION["lang"] == "fr" ? "Choisissez votre horaire" : "Choose your time." ?></h3>
                            <div class="heure">
                                <input type="radio" name="heure" value="10:00:00" id="h10"> <label for="h10"
                                    tabindex="0"><?php echo $_SESSION["lang"] == "fr" ? "10h00" : "10:00AM" ?></label>
                                <input type="radio" name="heure" value="10:30:00" id="h1030"> <label for="h1030"
                                    tabindex="0"><?php echo $_SESSION["lang"] == "fr" ? "10h30" : "10:30AM" ?></label>
                                <input type="radio" name="heure" value="11:00:00" id="h11"> <label for="h11"
                                    tabindex="0"><?php echo $_SESSION["lang"] == "fr" ? "11h00" : "11:00AM" ?></label>
                                <input type="radio" name="heure" value="11:30:00" id="h1130"> <label for="h1130"
                                    tabindex="0"><?php echo $_SESSION["lang"] == "fr" ? "11h30" : "11:30AM" ?></label>
                                <input type="radio" name="heure" value="12:00:00" id="h12"> <label for="h12"
                                    tabindex="0"><?php echo $_SESSION["lang"] == "fr" ? "12h00" : "12:00AM" ?></label>
                                <input type="radio" name="heure" value="13:00:00" id="h13"> <label for="h13"
                                    tabindex="0"><?php echo $_SESSION["lang"] == "fr" ? "13h00" : "1:00PM" ?></label>
                                <input type="radio" name="heure" value="13:30:00" id="h1330"> <label for="h1330"
                                    tabindex="0"><?php echo $_SESSION["lang"] == "fr" ? "13h30" : "1:30PM" ?></label>
                                <input type="radio" name="heure" value="14:00:00" id="h14"> <label for="h14"
                                    tabindex="0"><?php echo $_SESSION["lang"] == "fr" ? "14h00" : "2:00PM" ?></label>
                                <input type="radio" name="heure" value="14:30:00" id="h1430"> <label for="h1430"
                                    tabindex="0"><?php echo $_SESSION["lang"] == "fr" ? "14h30" : "2:30PM" ?></label>
                                <input type="radio" name="heure" value="15:00:00" id="h15"> <label for="h15"
                                    tabindex="0"><?php echo $_SESSION["lang"] == "fr" ? "15h00" : "3:00PM" ?></label>
                                <input type="radio" name="heure" value="15:30:00" id="h1530"> <label for="h1530"
                                    tabindex="0"><?php echo $_SESSION["lang"] == "fr" ? "15h30" : "3:30PM" ?></label>
                                <input type="radio" name="heure" value="16:00:00" id="h16"> <label for="h16"
                                    tabindex="0"><?php echo $_SESSION["lang"] == "fr" ? "16h00" : "4:00PM" ?></label>
                                <input type="radio" name="heure" value="16:30:00" id="h1630"> <label for="h1630"
                                    tabindex="0"><?php echo $_SESSION["lang"] == "fr" ? "16h30" : "4:30PM" ?></label>
                                <input type="radio" name="heure" value="17:00:00" id="h17"> <label for="h17"
                                    tabindex="0"><?php echo $_SESSION["lang"] == "fr" ? "17h00" : "5:00PM" ?></label>
                                <input type="radio" name="heure" value="17:30:00" id="h1730"> <label for="h1730"
                                    tabindex="0"><?php echo $_SESSION["lang"] == "fr" ? "17h30" : "5:30PM" ?></label>
                            </div>
                            <p class="error hidden" id="errorHeure"><?php echo $_SESSION["lang"] == "fr" ? "Veillez renseigner une heure" : "Please provide a time." ?></p>
                        </div>
                        <div class="boutons"><button type="button" class="confirmer" data-goto="2"><?php echo $_SESSION["lang"] == "fr" ? "Suivant" : "Next" ?></button>
                        </div>
                    </div>
                    <div id="step2">
                        <h2 class="title"><span>2</span><?php echo $_SESSION["lang"] == "fr" ? "Etape 2 :Choisissez vos formules" : "Step 2 : Select your option" ?></h2>
                        <div class="tickets">
                            <h3><?php echo $_SESSION["lang"] == "fr" ? "Choisissez la quantité" : "Choose the quantity" ?></h3>
                            <?php
                            foreach ($manager->getAllFormules() as $key => $value) { ?>
                                <div class="ticket">
                                    <div class="info">
                                        <label for="formule<?php echo $value->getId_formule() ?>">
                                            <?php echo $value->getNom_formule() ?>
                                        </label>
                                        <p class="price">
                                            <?php echo $value->getTarif() == 0 ? "Gratuit" : $value->getTarif() . " €" ?>
                                        </p>
                                        <div class="quantity">
                                            <button class="minus" id="minus<?php echo $value->getId_formule() ?>"
                                                type="button"> - </button>
                                            <input type="number" min="0" max="10" step="1" value="0"
                                                name="formule<?php echo $value->getId_formule() ?>"
                                                id="formule<?php echo $value->getId_formule() ?>">
                                            <button class="plus" id="plus<?php echo $value->getId_formule() ?>"
                                                type="button"> + </button>
                                        </div>
                                    </div>
                                    <p class="description">
                                        <?php echo $value->getExplication_formule() ?>
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe atque minima ipsa deleniti possimus! Asperiores error, soluta est ab saepe maxime quisquam iste dignissimos ut illo ipsum, tempora excepturi incidunt.
                                    </p>
                                </div>
                            <?php } ?>
                            <p class="error hidden" id="errorFormule"><?php echo $_SESSION["lang"] == "fr" ? "Veillez choisir au moins une formule" : "Please choose at least one option." ?></p>
                        </div>
                        <div class="boutons">
                            <button class="retour" type="button" data-goto="1"><?php echo $_SESSION["lang"] == "fr" ? "Retour" : "Go back" ?></button>
                            <button type="button" class="confirmer" data-goto="3"><?php echo $_SESSION["lang"] == "fr" ? "Suivant" : "Next" ?></button>
                        </div>
                    </div>
                    <div id="step3">
                        <h2 class="title"><span>3</span><?php echo $_SESSION["lang"] == "fr" ? "Etape 3 : Entrez vos coordonnées" : "Step 3 : Enter your contact information" ?></h2>
                        <div class="coordo">
                            <?php if (isset($_SESSION['user'])) { ?>
                            <div class="firstname">
                                <label for="prenom"><img src="../img/icons/profil.svg" alt=""><?php echo $_SESSION["lang"] == "fr" ? "Prénom" : "First Name" ?></label>
                                <input type="text" name="prenom" id="prenom" required
                                    value="<?php echo $_SESSION["user"]->getPrenom() ?>">
                                    <p class="error hidden" id="errorPrenom"><?php echo $_SESSION["lang"] == "fr" ? "Veillez renseigner votre prénom" : "Please provide your first name" ?></p>
                            </div>
                            <div class="name">
                                <label for="nom"><img src="../img/icons/profil.svg" alt=""> <?php echo $_SESSION["lang"] == "fr" ? "Nom" : "Last Name" ?></label>
                                <input type="text" name="nom" id="nom" required
                                    value="<?php echo $_SESSION["user"]->getNom() ?>">
                                    <p class="error hidden" id="errorNom"><?php echo $_SESSION["lang"] == "fr" ? "Veillez renseigner votre nom" : "Please provide your last name" ?></p>
                            </div>
                            <div class="mail">
                                <label for="mail"><img src="../img/icons/mail.svg" alt=""> <?php echo $_SESSION["lang"] == "fr" ? "Mail" : "Email" ?></label>
                                <input type="email" name="mail" id="mail" required
                                    value="<?php echo $_SESSION["user"]->getMail() ?>">
                                    <p class="error hidden" id="errorMail"><?php echo $_SESSION["lang"] == "fr" ? "Veillez renseigner une adresse mail" : "Please provide an email" ?></p>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="boutons">
                            <button class="retour" type="button" data-goto="2"><?php echo $_SESSION["lang"] == "fr" ? "Retour" : "Go back" ?></button>
                            <button type="button" class="confirmer resumeButton" data-goto="4"><?php echo $_SESSION["lang"] == "fr" ? "Suivant" : "Next" ?></button>
                        </div>
                    </div>
                    <div id="step4">
                        <h2 class="title"><span>4</span><?php echo $_SESSION["lang"] == "fr" ? "Etape 4 : Confirmation" : "Step 4 : Validation" ?></h2>
                        <div class="resumes">
                            <h3><?php echo $_SESSION["lang"] == "fr" ? "Date et Heure" : "Date and Time" ?></h3>
                            <div class="resume">
                                <div class="resumeChamp">
                                    <p><?php echo $_SESSION["lang"] == "fr" ? "Date : " : "Date : " ?><span class="dateResume"></span></p>
                                    <button id="buttonDate" type="button" data-goto="1" class="edit">
                                        <img class="noHover" src="../img/icons/editG.svg"
                                            alt="">
                                        <img class="Hover" src="../img/icons/editW.svg"
                                            alt="">
                                            <?php echo $_SESSION["lang"] == "fr" ? "Modifier" : "Edit" ?>
                                    </button>
                                </div>
                                <div class="resumeChamp">
                                    <p><?php echo $_SESSION["lang"] == "fr" ? "Heure : " : "Hour : " ?> <span class="heureResume"></span></p>
                                    <button id="buttonHour" type="button" data-goto="3" class="edit">
                                        <img class="noHover" src="../img/icons/editG.svg"
                                            alt="">
                                        <img class="Hover" src="../img/icons/editW.svg"
                                            alt="">
                                            <?php echo $_SESSION["lang"] == "fr" ? "Modifier" : "Edit" ?>
                                    </button>
                                </div>
                            </div>

                            <h3><?php echo $_SESSION["lang"] == "fr" ? "Vos formules" : "Your options" ?></h3>
                            <div class="formulesResume">
                                <ul class="formuleResumeDynamique">
                                </ul>
                                <button type="button" data-goto="2" class="edit">
                                    <img class="noHover" src="../img/icons/editG.svg"
                                            alt="">
                                    <img class="Hover" src="../img/icons/editW.svg"
                                            alt="">
                                    <?php echo $_SESSION["lang"] == "fr" ? "Modifier" : "Edit" ?>
                                </button>
                            </div>


                            <h3><?php echo $_SESSION["lang"] == "fr" ? "Vos coordonnées" : "Your contact information" ?></h3>
                            <div class="resume coordoResume">
                                <div class="resumeChamp rCp">
                                    <p><?php echo $_SESSION["lang"] == "fr" ? "Prénom : " : "First Name : " ?> <span class="prenomResume"></span></p>
                                    <button id="buttonName" type="button" data-goto="3" class="edit">
                                        <img class="noHover" src="../img/icons/editG.svg"
                                            alt="">
                                        <img class="Hover" src="../img/icons/editW.svg"
                                            alt="">
                                        <?php echo $_SESSION["lang"] == "fr" ? "Modifier" : "Edit" ?>
                                    </button>
                                </div>

                                <div class="resumeChamp rCn">
                                    <p><?php echo $_SESSION["lang"] == "fr" ? "Nom" : "Last Name" ?> : <span class="nomResume"></span></p>
                                </div>

                                <div class="resumeChamp rCm">
                                    <p><?php echo $_SESSION["lang"] == "fr" ? "Mail" : "Email" ?> : <span class="mailResume"></span></p>
                                    <button id="buttonMail" type="button" data-goto="3" class="edit">
                                        <img class="noHover" src="../img/icons/editG.svg"
                                            alt="">
                                        <img class="Hover" src="../img/icons/editW.svg"
                                            alt="">
                                        <?php echo $_SESSION["lang"] == "fr" ? "Modifier" : "Edit" ?>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="boutons"><button class="retour" type="button" data-goto="3"><?php echo $_SESSION["lang"] == "fr" ? "Retour" : "Go back" ?></button><input
                                type="submit" value="<?php echo $_SESSION["lang"] == "fr" ? "Confirmer" : "Confirm" ?>"></div>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <?php include 'components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/datepicker-full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/locales/fr.js"></script>
    <script src="../scripts/formulaire.js" type="module"></script>
</body>

</html>