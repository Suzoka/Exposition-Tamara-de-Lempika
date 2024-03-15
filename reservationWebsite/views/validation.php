<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/css/datepicker.min.css">
        <link rel="stylesheet" href="../styles/style_h&f.css">
        <link rel="stylesheet" href="../styles/style_validation.css">
        <title>billetterie - Expo Tamara de Lempicka - Les années folles</title>
    </head>

    <body>
        <?php include 'components/header.php'; ?>
        <main>
                <h1>Merci ?? ?? pour votre réservation !</h1>
                <p>Elle a bien été prise en compte. Vous pouvez la retrouver dans votre espace "Mon compte".</p>
                <p>Vous verrez un récapitulatif des billets juste en dessous</p>
                <h2>Récapitulatif de votre réservation</h2>
                <div class="recap__billet">
                    <h3>Billet 1</h3>
                    <p>Date : 12/12/2020</p>
                    <p>Heure : 14h00</p>
                    <p>Type : Adulte</p>
                    <p>Prix : 12€</p>
                </div>

        </main>
        <?php include 'components/footer.php'; ?>
        
        <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/datepicker-full.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/locales/fr.js"></script>
        <script src="../scripts/formulaire.js" type="module"></script>
    </body>
</html>