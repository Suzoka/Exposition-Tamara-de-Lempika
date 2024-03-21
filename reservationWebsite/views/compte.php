<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_h&f.css">
    <link rel="stylesheet" href="../styles/style_compte.css">
    <title>Mon compte - Expo Tamara de Lempicka - Les années folles</title>
</head>

<body>
    <?php include 'components/header.php'; ?>
    <main <?php if (!isset ($_SESSION['user'])) {
        echo 'class="notLoged"';
    } ?>>
        <?php if (!isset ($_SESSION['user'])) { ?>
            <div class="popup">
                <h2>Connectez-vous ou inscrivez-vous pour accéder à votre compte</h2>
                <div class="link">
                    <a href="./connexion">Connexion</a>
                    <a href="./inscription">Inscription</a>
                </div>
            </div>
        <?php } ?>
        <h1>Mon compte</h1>
        <img id="compte" src="../img/compte.png" alt="">
        <?php if (isset ($_SESSION['user'])) { ?>
            <h2>
                <?php echo $_SESSION['user']->getPrenom() ?>
                <?php echo $_SESSION['user']->getNom() ?>
            </h2>
        <?php } ?>
        <section class="change">
            <div class="boutons">
                <a class="<?php if ($activePage == "infos") {
                    echo "active";
                } ?>" href="./compte?page=infos">Mes
                    informations</a>
                <a class="<?php if ($activePage == "reserv") {
                    echo "active";
                } ?>" href="./compte?page=reserv">Mes
                    réservations</a>
            </div>
            <?php if ($activePage == "infos") { ?>
                <div class="infos">
                    <?php if (isset ($_SESSION['user'])) { ?>
                        <p>Nom :
                            <?php echo $_SESSION['user']->getNom() ?>
                        </p>
                        <p>Prénom :
                            <?php echo $_SESSION['user']->getPrenom() ?>
                        </p>
                        <p>Adresse mail :
                            <?php echo $_SESSION['user']->getMail() ?>
                        </p>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="reservations">
                    <h3>Tamara de Lempicka - Les années folles</h3>
                    <div class="billets">

                        <?php
                        if (isset ($_SESSION['user'])) {
                            $tickets = $manager->getReservationsOfUser($_SESSION['user']->getId_user());
                            if ($tickets->rowCount() == 0) {
                                echo "<p>Vous n'avez pas encore de réservation</p>
                            <a id=\"reservation\" href=\"./billetterie\">
                            <img src=\"../img/icons/ticket.svg\" alt=\"\">
                            <p>Réserver maintenant</p>
                        </a>";
                            } else {
                                foreach ($tickets->fetchAll(PDO::FETCH_ASSOC) as $key => $value) {
                                    ?>
                                    <div class="billet">
                                        <div class="timeDates">
                                            <div class="date">
                                                <p>le
                                                    <?php $date = new DateTime($value['date']);
                                                    $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
                                                    echo $formatter->format($date); ?>
                                                </p>
                                            </div>
                                            <div class="time">
                                                <p>à
                                                    <?php echo str_replace(":", "h", $date->format('H:i')) ?>
                                                </p>
                                            </div>
                                        </div>
                                        <h4>Billet
                                            <?php echo $value['nom_formule'] ?>
                                            x
                                            <?php echo $value['quantite'] ?>
                                        </h4>
                                        <p>
                                            <?php echo $value['explication_formule'] ?>
                                        </p>
                                        <p class="price">
                                            <?php echo $value['tarif'] == 0 ? "Gratuit" : $value['tarif'] * $value['quantite'] ?>
                                        </p>
                                    </div>

                                <?php }
                            }
                        } ?>


                    </div>
                    <div class="place">
                        <h3>Localisation</h3>
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
</body>

</html>