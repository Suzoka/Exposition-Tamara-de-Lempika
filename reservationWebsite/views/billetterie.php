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
    <?php include 'components/header.php'; ?>
    <main>
        <section class="banniere">
            <h1>Exposition
                <br><span>Billetterie</span>
            </h1>
            <a href="#ariane" class="scroll">
                <img src="../img/icons/scroll.svg" alt="scroll">
            </a>
        </section>
        <section <?php if (!isset ($_SESSION['user'])) {
            echo 'class="notLoged"';
        } ?>>
            <div class="ariane" id="ariane">
                <button class="etat step1 active" data-goto="1">
                    <h3>1</h3>
                    <p>Etape 1 : Heure et date</p>
                </button>
                <button class="etat step2" data-goto="2">
                    <h3>2</h3>
                    <p>Etape 2 : Les formules</p>
                </button>
                <button class="etat step3" data-goto="3">
                    <h3>3</h3>
                    <p>Etape 3 : Coordonnées</p>
                </button>
                <button class="etat step4" data-goto="4">
                    <h3>4</h3>
                    <p>Etape 4 : Confirmation</p>
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
                <form action="./test.php" method="post">
                    <div id="step1" class="current">
                        <h2 class="title"><span>1</span>Etape 1 : Sélection de l’heure et la date </h2>
                        <div class="calendar">
                            <h3>Choisissez la date de votre visite</h3>
                            <div id="date"></div>
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
                                    </p>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="boutons">
                            <button class="retour" type="button" data-goto="1">Retour</button>
                            <button type="button" class="confirmer" data-goto="3">Suivant</button>
                        </div>
                    </div>
                    <div id="step3">
                        <h2 class="title"><span>3</span>Etape 3 : Entrez vos coordonnées</h2>
                        <div class="coordo">
                            <div class="firstname">
                                <label for="prenom"><img src="../img/icons/profil.svg" alt=""> Prénom</label>
                                <input type="text" name="prenom" id="prenom" required
                                    value="<?php echo $_SESSION["user"]->getPrenom() ?>">
                            </div>
                            <div class="name">
                                <label for="nom"><img src="../img/icons/profil.svg" alt=""> Nom</label>
                                <input type="text" name="nom" id="nom" required
                                    value="<?php echo $_SESSION["user"]->getNom() ?>">
                            </div>
                            <div class="mail">
                                <label for="mail"><img src="../img/icons/mail.svg" alt=""> Adresse mail</label>
                                <input type="email" name="mail" id="mail" required
                                    value="<?php echo $_SESSION["user"]->getMail() ?>">
                            </div>
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
                                    <button type="button" data-goto="1" class="edit"><img src="../img/icons/edit.svg"
                                            alt="">modifier</button>
                                </div>
                                <div class="resumeChamp">
                                    <p>Heure : <span class="heureResume"></span></p>
                                </div>
                            </div>

                            <h3>Vos formule</h3>
                            <div class="formulesResume">
                                <ul class="formuleResumeDynamique">
                                </ul>
                                <button type="button" data-goto="2" class="edit"><img src="../img/icons/edit.svg"
                                        alt="">modifier</button>
                            </div>


                            <h3>Vos coordonnées</h3>
                            <div class="resume">
                                <div class="resumeChamp">
                                    <p>Prénom : <span class="prenomResume"></span></p>
                                    <button type="button" data-goto="3" class="edit"><img src="../img/icons/edit.svg"
                                            alt="">modifier</button>
                                </div>

                                <div class="resumeChamp">
                                    <p>Nom : <span class="nomResume"></span></p>
                                </div>

                                <div class="resumeChamp">
                                    <p>Adresse mail : <span class="mailResume"></span></p>
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