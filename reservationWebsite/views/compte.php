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
        <main>
            <h1>Mon compte</h1>
            <img id="compte" src="../img/compte.png" alt="">
            <h2>Lou-Anne Dubille</h2>
            <section class="change">
                <div class="boutons">
                    <a class="" href="./compte?page=infos">Mes informations</a>
                    <a class="active" href="./compte?page=reserv">Mes réservations</a>
                </div>
                <div class="infos">
                    <p>Nom : Dubille</p>
                    <p>Prénom : Lou-Anne</p>
                    <p>Adresse mail :kjbkhjcbd</p>
                </div>
                <div class="reservations">
                    <h3>Tamara de Lempicka - Les années folles</h3>
                    <div class="billets">
                        <div class="billet">
                            <div class="timeDates">
                                <div class="date">
                                    <p>le 28 Mars 2024</p>
                                </div>
                                <div class="time">
                                    <p>à 11h30</p>
                                </div>
                            </div>
                            <h4>Billet Adulte x2</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quod quo odio dolorum porro, est rem, nulla veritatis cum officia voluptatibus? Maxime ullam nihil autem nemo velit, veniam ipsa vel.</p>
                            <p class="price">Gratuit</p>
                        </div>
                        <div class="billet">
                            <div class="timeDates">
                                <div class="date">
                                    <p>le 28 Mars 2024</p>
                                </div>
                                <div class="time">
                                    <p>à 11h30</p>
                                </div>
                            </div>
                            <h4>Billet Jeune x1</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quod quo odio dolorum porro, est rem, nulla veritatis cum officia voluptatibus? Maxime ullam nihil autem nemo velit, veniam ipsa vel.</p>
                            <p class="price">Gratuit</p>
                        </div>
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
            </section>
            
        </main>
        <?php include 'components/footer.php'; ?>
    </body>
</html>