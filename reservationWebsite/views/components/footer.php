<footer>
    <div class="test">
        <a href="./accueil"><img class="logo" src="../img/fond_noir-colore_expo.png" width="128" alt="Accueil site de l'Exposition Tamara de Lempicka: Les années folles"></a>
        <div class="adress">
            <p>IUT de Marne-la-Vallée
                <br>2 rue Albert Einstein, 77420 Champs-sur-Marne, France</p>
            <p><a href="mailto:sinyart@gmail.com">sinyart@gmail.com</a>
                <br><a href="tel:+33 6 00 01 02 03">+33 (0)6 00 01 02 03</a></p>

        </div>
    </div>
    <nav class="apropos">
        <h3><?php echo $_SESSION["lang"] == "fr" ? "A propos" : "About us" ?></h3>
        <ul>
            <li><a href="https://sinyart.fr/"><?php echo $_SESSION["lang"] == "fr" ? "🔗 Agence" : "🔗 Agency" ?></a></li>
            <li><a href="./accueil"><?php echo $_SESSION["lang"] == "fr" ? "Exposition" : "Exhibition" ?></a></li>
            <li><a href="./mentionsLegales"><?php echo $_SESSION["lang"] == "fr" ? "Mentions légales" : "GCU" ?></a></li>
        </ul>  
    </nav>
    <nav class="planSite">
        <h3><?php echo $_SESSION["lang"] == "fr" ? "Plan du site" : "Site map" ?></h3>
        <ul>
            <li><a href="./accueil"><?php echo $_SESSION["lang"] == "fr" ? "Accueil" : "Homepage" ?></a></li>
            <li><a href="./billetterie"><?php echo $_SESSION["lang"] == "fr" ? "Billetterie" : "Ticketing" ?></a></li>
            <li><a href="./connexion"><?php echo $_SESSION["lang"] == "fr" ? "Se connecter" : "Log in" ?></a></li>
            <li><a href="./inscription"><?php echo $_SESSION["lang"] == "fr" ? "S'inscrire" : "Sign up" ?></a></li>
            <li><a href="./compte"><?php echo $_SESSION["lang"] == "fr" ? "Mon compte" : "My account" ?></a></li>
        </ul>  
    </nav>
    <nav class="reseaux">
        <ul>
            <li><a href="https://www.instagram.com/sinyart_off?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><img src="../img/icons/insta.png" alt="Compte Instagram de l'agence - nouvelle page"></a></li>
            <li><a href="https://x.com/SinyArt_Off?t=dGRRfIjYQe2ObBzVnyOgPQ&s=09"><img src="../img/icons/twitter.png" alt="Compte Twitter de l'agence - nouvelle page"></a></li>
            <li><a href="https://www.linkedin.com/in/agence-sinyart?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><img src="../img/icons/linkedin.png" alt="Compte LinkedIn de l'agence - nouvelle page"></a></li>
            <li><a href="https://www.youtube.com/@SinyArt_Off"><img src="../img/icons/youtube.png" alt="Compte Youtube de l'agence - nouvelle page"></a></li>
        </ul> 
    </nav>
</footer>