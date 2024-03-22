<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/css/datepicker.min.css">
    <link rel="stylesheet" href="../styles/style_h&f.css">
    <link rel="stylesheet" href="../styles/style_billetterie.css">
    <title>billetterie - Expo Tamara de Lempicka - Les années folles</title>
</head>

<body>
    <a href="#content" class="skip-link">Aller au contenu</a>
    <?php include 'components/header.php'; ?>
    <main>
        <section class="banniere" id="content">
            <h1>Exposition
                <br><span>Billetterie</span>
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
                    <h3>Etape 1 : Heure et date</h3>
                </button>
                <button class="etat step2" data-goto="2">
                    <p>2</p>
                    <h3>Etape 2 : Les formules</h3>
                </button>
                <button class="etat step3" data-goto="3">
                    <p>3</p>
                    <h3>Etape 3 : Coordonnées</h3>
                </button>
                <button class="etat step4" data-goto="4">
                    <p>4</p>
                    <h3>Etape 4 : Confirmation</h3>
                </button>
            </div>
            <div class="etape">
                <?php if (!isset ($_SESSION['user'])) { ?>
                    <div class="popup">
                        <h2>Connectez-vous ou inscrivez-vous pour commander</h2>
                        <div class="link">
                            <a href="./connexion">Connexion</a>
                            <a href="./inscription">Inscription</a>
                        </div>
                    </div>
                <?php } ?>

                    <div class="popup erreur <?php if (!isset ($_GET['error'])) echo "hidden" ?>">
                        <h2>Une erreur est survenue au niveau du serveur.</h2>
                        <p>Veuillez réessayer plus tard, nous nous excusons pour le désagrément.</p>
                        <button type="button" class="closePopup">Fermer le popup</button>
                    </div>
                

                <form action="./newReservation" method="post">
                    <div id="step1" class="current">
                        <h2 class="title"><span>1</span>Etape 1 : Sélection de l’heure et la date </h2>
                        <div class="calendar">
                            <h3>Choisissez la date de votre visite</h3>
                            <div id="date"></div>
                            <p class="error hidden" id="errorDate">Veillez renseigner une date</p>
                        </div>
                        <div class="hour">
                            <h3>Choisissez votre horaire</h3>
                            <div class="heure">
                                <input type="radio" name="heure" value="10:00:00" id="h10"> <label for="h10"
                                    tabindex="0">10h00</label>
                                <input type="radio" name="heure" value="10:30:00" id="h1030"> <label for="h1030"
                                    tabindex="0">10h30</label>
                                <input type="radio" name="heure" value="11:00:00" id="h11"> <label for="h11"
                                    tabindex="0">11h00</label>
                                <input type="radio" name="heure" value="11:30:00" id="h1130"> <label for="h1130"
                                    tabindex="0">11h30</label>
                                <input type="radio" name="heure" value="12:00:00" id="h12"> <label for="h12"
                                    tabindex="0">12h00</label>
                                <input type="radio" name="heure" value="13:00:00" id="h13"> <label for="h13"
                                    tabindex="0">13h00</label>
                                <input type="radio" name="heure" value="13:30:00" id="h1330"> <label for="h1330"
                                    tabindex="0">13h30</label>
                                <input type="radio" name="heure" value="14:00:00" id="h14"> <label for="h14"
                                    tabindex="0">14h00</label>
                                <input type="radio" name="heure" value="14:30:00" id="h1430"> <label for="h1430"
                                    tabindex="0">14h30</label>
                                <input type="radio" name="heure" value="15:00:00" id="h15"> <label for="h15"
                                    tabindex="0">15h00</label>
                                <input type="radio" name="heure" value="15:30:00" id="h1530"> <label for="h1530"
                                    tabindex="0">15h30</label>
                                <input type="radio" name="heure" value="16:00:00" id="h16"> <label for="h16"
                                    tabindex="0">16h00</label>
                                <input type="radio" name="heure" value="16:30:00" id="h1630"> <label for="h1630"
                                    tabindex="0">16h30</label>
                                <input type="radio" name="heure" value="17:00:00" id="h17"> <label for="h17"
                                    tabindex="0">17h00</label>
                                <input type="radio" name="heure" value="17:30:00" id="h1730"> <label for="h1730"
                                    tabindex="0">17h30</label>
                            </div>
                            <p class="error hidden" id="errorHeure">Veillez renseigner une heure</p>
                        </div>
                        <div class="boutons"><button type="button" class="confirmer" data-goto="2">Suivant</button>
                        </div>
                    </div>
                    <div id="step2">
                        <h2 class="title"><span>2</span>Etape 2 :Choisissez vos formules</h2>
                        <div class="tickets">
                            <h3>Choisissez la quantité</h3>
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
                            <p class="error hidden" id="errorFormule">Veillez choisir au moins une formule</p>
                        </div>
                        <div class="boutons">
                            <button class="retour" type="button" data-goto="1">Retour</button>
                            <button type="button" class="confirmer" data-goto="3">Suivant</button>
                        </div>
                    </div>
                    <div id="step3">
                        <h2 class="title"><span>3</span>Etape 3 : Entrez vos coordonnées</h2>
                        <div class="coordo">
                            <?php if (isset($_SESSION['user'])) { ?>
                            <div class="firstname">
                                <label for="prenom"><img src="../img/icons/profil.svg" alt=""> Prénom</label>
                                <input type="text" name="prenom" id="prenom" required
                                    value="<?php echo $_SESSION["user"]->getPrenom() ?>">
                                    <p class="error hidden" id="errorPrenom">Veillez renseigner votre prénom</p>
                            </div>
                            <div class="name">
                                <label for="nom"><img src="../img/icons/profil.svg" alt=""> Nom</label>
                                <input type="text" name="nom" id="nom" required
                                    value="<?php echo $_SESSION["user"]->getNom() ?>">
                                    <p class="error hidden" id="errorNom">Veillez renseigner votre nom</p>
                            </div>
                            <div class="mail">
                                <label for="mail"><img src="../img/icons/mail.svg" alt=""> Adresse mail</label>
                                <input type="email" name="mail" id="mail" required
                                    value="<?php echo $_SESSION["user"]->getMail() ?>">
                                    <p class="error hidden" id="errorMail">Veillez renseigner un mail</p>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="boutons">
                            <button class="retour" type="button" data-goto="2">Retour</button>
                            <button type="button" class="confirmer resumeButton" data-goto="4">Suivant</button>
                        </div>
                    </div>
                    <div id="step4">
                        <h2 class="title"><span>4</span>Etape 4 : Confirmation</h2>
                        <div class="resumes">
                            <h3>Date et Heure</h3>
                            <div class="resume">
                                <div class="resumeChamp">
                                    <p>Date : <span class="dateResume"></span></p>
                                    <button id="buttonDate" type="button" data-goto="1" class="edit">
                                        <img class="noHover" src="../img/icons/editG.svg"
                                            alt="">
                                        <img class="Hover" src="../img/icons/editW.svg"
                                            alt="">
                                        modifier</button>
                                </div>
                                <div class="resumeChamp">
                                    <p>Heure : <span class="heureResume"></span></p>
                                    <button id="buttonHour" type="button" data-goto="3" class="edit">
                                        <img class="noHover" src="../img/icons/editG.svg"
                                            alt="">
                                        <img class="Hover" src="../img/icons/editW.svg"
                                            alt="">
                                        modifier</button>
                                </div>
                            </div>

                            <h3>Vos formule</h3>
                            <div class="formulesResume">
                                <ul class="formuleResumeDynamique">
                                </ul>
                                <button type="button" data-goto="2" class="edit">
                                    <img class="noHover" src="../img/icons/editG.svg"
                                            alt="">
                                    <img class="Hover" src="../img/icons/editW.svg"
                                            alt="">
                                    modifier</button>
                            </div>


                            <h3>Vos coordonnées</h3>
                            <div class="resume coordoResume">
                                <div class="resumeChamp rCp">
                                    <p>Prénom : <span class="prenomResume"></span></p>
                                    <button id="buttonName" type="button" data-goto="3" class="edit">
                                        <img class="noHover" src="../img/icons/editG.svg"
                                            alt="">
                                        <img class="Hover" src="../img/icons/editW.svg"
                                            alt="">
                                        modifier</button>
                                </div>

                                <div class="resumeChamp rCn">
                                    <p>Nom : <span class="nomResume"></span></p>
                                </div>

                                <div class="resumeChamp rCm">
                                    <p>Adresse mail : <span class="mailResume"></span></p>
                                    <button id="buttonMail" type="button" data-goto="3" class="edit">
                                        <img class="noHover" src="../img/icons/editG.svg"
                                            alt="">
                                        <img class="Hover" src="../img/icons/editW.svg"
                                            alt="">
                                        modifier</button>
                                </div>
                            </div>
                        </div>

                        <div class="boutons"><button class="retour" type="button" data-goto="3">Retour</button><input
                                type="submit" value="Confirmer"></div>
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