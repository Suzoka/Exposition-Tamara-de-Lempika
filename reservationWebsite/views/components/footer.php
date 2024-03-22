<footer>
    <div class="test">
        <a href="./accueil"><img class="logo" src="../img/fond_noir-colore_expo.png" width="128" alt="Accueil site de l'Exposition Tamara de Lempicka: Les années folles"></a>
        <div class="adress">
            <p>IUT de Marne-la-Vallée
                <br>2 rue Albert Einstein, 77420 Champs-sur-Marne</p>
            <p>sinyart@gmail.com
                <br>+33 (0)6 00 01 02 03</p>

        </div>
    </div>
    <nav class="apropos">
        <h3><?php echo $_session["lang"] == "fr" ? "A propos" : "About us" ?></h3>
        <a href="https://sinyart.fr/"><?php echo $_session["lang"] == "fr" ? "🔗 Agence" : "🔗 Agency" ?></a>
        <a href="./accueil"><?php echo $_session["lang"] == "fr" ? "Exposition" : "Exhibition" ?></a>
        <a href=""><?php echo $_session["lang"] == "fr" ? "Mentions légales" : "GCU" ?></a>
    </nav>
    <nav class="planSite">
        <h3><?php echo $_session["lang"] == "fr" ? "Plan du site" : "Site map" ?></h3>
        <a href="./accueil"><?php echo $_session["lang"] == "fr" ? "Accueil" : "Homepage" ?></a>
        <a href="./billetterie"><?php echo $_session["lang"] == "fr" ? "Billetterie" : "Ticketing" ?></a>
        <a href="./connexion"><?php echo $_session["lang"] == "fr" ? "Se connecter" : "Log in" ?></a>
        <a href="./inscription"><?php echo $_session["lang"] == "fr" ? "S'inscrire" : "Sign up" ?></a>
        <a href="./compte"><?php echo $_session["lang"] == "fr" ? "Mon compte" : "My account" ?></a>
    </nav>
    <nav class="reseaux">
        <a href="https://www.instagram.com/sinyart_off?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><img src="../img/icons/insta.png" alt="Instagram"></a>
        <a href="https://x.com/SinyArt_Off?t=dGRRfIjYQe2ObBzVnyOgPQ&s=09"><img src="../img/icons/twitter.png" alt="Twitter"></a>
        <a href="https://www.linkedin.com/in/agence-sinyart?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><img src="../img/icons/linkedin.png" alt="LinkedIn"></a>
        <a href="https://www.youtube.com/@SinyArt_Off"><img src="../img/icons/youtube.png" alt="Youtube"></a>
    </nav>
</footer>