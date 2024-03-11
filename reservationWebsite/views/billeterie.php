<?php include '../scripts/database.php'  ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/css/datepicker.min.css">
        <link rel="stylesheet" href="../styles/style_h&f.css">
        <link rel="stylesheet" href="../styles/style_billeterie.css">
        <title>Billeterie - Expo Tamara de Lempicka - Les années folles</title>
    </head>

    <body>
        <?php include 'components/header.php'; ?>
        <main>
            <section class="banniere">
                <h1>Exposition 
                    <br><span>Billeterie</span>
                </h1>
            </section>
            <section>
                <div class="ariane">

                </div>
                <div class="etape">
                <form action="./test.php" method="post">
                    <div id="step1">

                        <h2 class="title"><span>1</span>Etape 1 : Sélection de l’heure et la date </h2>
                        <div class="calendar">
                            <p>Choisissez la date de votre visite</p>
                            <div id="date"></div>
                        </div>
                        <div class="hour">
                            <p>Choisissez votre horaire</p>
                            <div class="heure">
                            <input type="radio" name="heure" value="10:00:00" id="h10"> <label for="h10" tabindex="0">10h00</label>
                            <input type="radio" name="heure" value="10:30:00" id="h1030"> <label for="h1030" tabindex="0">10h30</label>
                            <input type="radio" name="heure" value="11:00:00" id="h11"> <label for="h11" tabindex="0">11h00</label>
                            <input type="radio" name="heure" value="11:30:00" id="h1130"> <label for="h1130" tabindex="0">11h30</label>
                            <input type="radio" name="heure" value="12:00:00" id="h12"> <label for="h12" tabindex="0">12h00</label>
                            <input type="radio" name="heure" value="13:00:00" id="h13"> <label for="h13" tabindex="0">13h00</label>
                            <input type="radio" name="heure" value="13:30:00" id="h1330"> <label for="h1330" tabindex="0">13h30</label>
                            <input type="radio" name="heure" value="14:00:00" id="h14"> <label for="h14" tabindex="0">14h00</label>
                            <input type="radio" name="heure" value="14:30:00" id="h1430"> <label for="h1430" tabindex="0">14h30</label>
                            <input type="radio" name="heure" value="15:00:00" id="h15"> <label for="h15" tabindex="0">15h00</label>
                            <input type="radio" name="heure" value="15:30:00" id="h1530"> <label for="h1530" tabindex="0">15h30</label>
                            <input type="radio" name="heure" value="16:00:00" id="h16"> <label for="h16" tabindex="0">16h00</label>
                            <input type="radio" name="heure" value="16:30:00" id="h1630"> <label for="h1630" tabindex="0">16h30</label>
                            <input type="radio" name="heure" value="17:00:00" id="h17"> <label for="h17" tabindex="0">17h00</label>
                            <input type="radio" name="heure" value="17:30:00" id="h1730"> <label for="h1730" tabindex="0">17h30</label>
                            </div>
                        </div>
                        <div class="boutons"><button type="button" class="confirmer" data-goto="2" data-from="1">Suivant</button>
                        </div>
                    </div>
                    <div id="step2">
                        <h2>Choisissez vos formules</h2>
                        <?php
                        foreach ($manager->getAllFormules() as $key => $value) { ?>
                            <label for="formule<?php echo $value->getId_formule() ?>">
                                <?php echo $value->getNom_formule() ?>
                            </label><input type="number" min="0" max="10" step="1" value="0"
                                name="formule<?php echo $value->getId_formule() ?>"
                                id="formule<?php echo $value->getId_formule() ?>"><br>
                        <?php } ?>
                        <div class="boutons"><button class="retour" type="button" data-goto="1" data-from="2">Retour</button><button type="button"
                                class="confirmer" data-goto="3" data-from="2">Suivant</button></div>
                    </div>
                    <div id="step3">
                        <h2>Vos coordonnées</h2>
                        <label for="prenom">Prenom</label><input type="text" name="prenom" id="prenom" required><br>
                        <label for="nom">Nom</label><input type="text" name="nom" id="nom" required><br>
                        <label for="mail">Adresse mail</label><input type="email" name="mail" id="mail" required>
                        <div class="boutons"><button class="retour" type="button" data-goto="2" data-from="3">Retour</button><button type="button"
                                class="confirmer resumeButton" data-goto="4" data-from="3">Suivant</button></div>
                    </div>
                    <div id="step4">
                        <h2>Date et Heure</h2>

                        <div class="resumeChamp">
                            <p>Date : <span class="dateResume"></span></p>
                            <button type="button" data-goto="1" data-from="4" class="edit">modifier</button>
                        </div>

                        <div class="resumeChamp">
                            <p>Heure : <span class="heureResume"></span></p>
                            <button type="button" data-goto="1" data-from="4" class="edit">modifier</button>
                        </div>


                        <h2>Votre commande</h2>

                        <div class="formulesResume">
                            <ul class="formuleResumeDynamique">
                            </ul>
                            <button type="button" data-goto="2" data-from="4" class="edit">modifier</button>
                        </div>


                        <h2>Vos coordonnées</h2>
                        <div class="resumeChamp">
                            <p>Prénom : <span class="prenomResume"></span></p>
                            <button type="button" data-goto="3" data-from="4" class="edit">modifier</button>
                        </div>

                        <div class="resumeChamp">
                            <p>Nom : <span class="nomResume"></span></p>
                            <button type="button" data-goto="3" data-from="4" class="edit">modifier</button>
                        </div>

                        <div class="resumeChamp">
                            <p>Adresse mail : <span class="mailResume"></span></p>
                            <button type="button" data-goto="3" data-from="4" class="edit">modifier</button>
                        </div>

                        <div class="boutons"><button class="retour" type="button" data-goto="3" data-from="4">Retour</button><input type="submit"></div>
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