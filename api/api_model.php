<?php

include './database.php';

function getAllReservedFormulesNotArchived()
{
    global $db;
    $stmt = $db->prepare("select r.date, r.id_ticket, r.nom, r.prenom, f.nom_formule_fr, r.mail, r.quantite, (f.tarif*r.quantite) as prix from `reservations` r inner join `utilisateurs` u on r.ext_id_user = u.id_user inner join `formules` f on r.ext_id_formule = f.id_formule where r.date>NOW() GROUP BY u.id_user, r.date, r.ext_id_formule order by r.date, r.nom, r.prenom, f.id_formule;");
    $stmt->execute();
    return $stmt;
}

function searchReservedFormulesNotArchived($search)
{
    global $db;
    $stmt = $db->prepare("select r.date, r.id_ticket, r.nom, r.prenom, f.nom_formule_fr, r.mail, r.quantite, (f.tarif*r.quantite) as prix from `reservations` r inner join `utilisateurs` u on r.ext_id_user = u.id_user inner join `formules` f on r.ext_id_formule = f.id_formule WHERE r.date>NOW() AND (u.username LIKE :search OR u.mail like :search OR r.id_ticket like :search OR u.nom like :search OR u.prenom like :search OR r.nom like :search OR r.prenom like :search OR r.mail like :search) GROUP BY u.id_user, r.date, r.ext_id_formule order by r.date, r.nom, r.prenom, f.id_formule;");
    $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
}
function getAllArchives()
{
    global $db;
    $stmt = $db->prepare("select r.date, r.id_ticket, r.nom, r.prenom, f.nom_formule_fr, r.mail, r.quantite, (f.tarif*r.quantite) as prix from `reservations` r inner join `utilisateurs` u on r.ext_id_user = u.id_user inner join `formules` f on r.ext_id_formule = f.id_formule where r.date<NOW() GROUP BY u.id_user, r.date, r.ext_id_formule order by r.date desc, r.nom, r.prenom, f.id_formule;");
    $stmt->execute();
    return $stmt;
}

function searchArchives($search)
{
    global $db;
    $stmt = $db->prepare("select r.date, r.id_ticket, r.nom, r.prenom, f.nom_formule_fr, r.mail, r.quantite, (f.tarif*r.quantite) as prix from `reservations` r inner join `utilisateurs` u on r.ext_id_user = u.id_user inner join `formules` f on r.ext_id_formule = f.id_formule WHERE r.date<NOW() AND (u.username LIKE :search OR u.mail like :search OR r.id_ticket like :search OR u.nom like :search OR u.prenom like :search OR r.nom like :search OR r.prenom like :search OR r.mail like :search) GROUP BY u.id_user, r.date, r.ext_id_formule order by r.date desc, r.nom, r.prenom, f.id_formule;");
    $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
}

function deleteReservation($id)
{
    global $db;
    $stmt = $db->prepare("select * from `reservations` where id_ticket = :id AND date>NOW()");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        $stmt = $db->prepare("DELETE FROM `reservations` WHERE id_ticket = :id AND date>NOW()");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    } else {
        return false;
    }
}

function connexionAdmin($login, $password)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM `utilisateurs` WHERE username = :login");
    $stmt->bindValue(':login', $login, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user['role'] == 1 && password_verify($password, $user['password'])) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function checkId($id)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM `reservations` WHERE id_ticket = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        return true;
    } else {
        return false;
    }
}

function updateDate($id, $date)
{
    global $db;
    $stmt = $db->prepare("UPDATE `reservations` SET date = :date WHERE id_ticket = :id");
    $stmt->bindValue(':date', $date, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function updateQuantite($id, $quantite)
{
    global $db;
    $stmt = $db->prepare("UPDATE `reservations` SET quantite = :quantite WHERE id_ticket = :id");
    $stmt->bindValue(':quantite', $quantite, PDO::PARAM_INT);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function updateNom($id, $nom)
{
    global $db;
    $stmt = $db->prepare("UPDATE `reservations` SET nom = :nom WHERE id_ticket = :id");
    $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function updatePrenom($id, $prenom)
{
    global $db;
    $stmt = $db->prepare("UPDATE `reservations` SET prenom = :prenom WHERE id_ticket = :id");
    $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function updateMail($id, $mail)
{
    global $db;
    $stmt = $db->prepare("UPDATE `reservations` SET mail = :mail WHERE id_ticket = :id");
    $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function updateExtIdFormule($id, $newId)
{
    global $db;
    $stmt = $db->prepare("UPDATE `reservations` SET ext_id_formule = :newType where id_ticket = :id");
    $stmt->bindValue(':newType', $newId, PDO::PARAM_INT);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function getReservationType($id)
{
    global $db;
    $stmt = $db->prepare("SELECT nom_formule_fr FROM `formules` WHERE id_formule = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn();
}

function sendMailReservations($id, $modifs)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM `reservations` WHERE id_ticket = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $reservation = $stmt->fetch(PDO::FETCH_ASSOC);

    $modifications = "";
    foreach ($modifs as $key => $value) {
        $modifications .= str_replace("%20", " ", "- " . $value . "\n");
    }

    $headers = "From: L'équipe Siny'art <exposition@sinyart.fr>\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    mail(
        $reservation['mail'],
        mb_encode_mimeheader("Des modifications ont été effectuées sur l'une de vos réservations", 'UTF-8', 'B', "\r\n"),
        "Bonjour " . $reservation['prenom'] . " " . $reservation['nom'] . ",\n\n" . "Certaines modifications ont été faites sur l'une de vos réservation pour notre exposition.\n\n Voici les informations qui ont été modifiées :\n" . $modifications . "\n\nCordialement,\nL'équipe de chez Siny'art",
        $headers
    );
}

function deletedReservationMail($id)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM `reservations` WHERE id_ticket = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $reservation = $stmt->fetch(PDO::FETCH_ASSOC);

    $formatter = new IntlDateFormatter('fr-FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);

    $headers = "From: L'équipe Siny'art <exposition@sinyart.fr>\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    mail(
        $reservation['mail'],
        mb_encode_mimeheader("Annulation de votre réservation", 'UTF-8', 'B', "\r\n"),
        "Bonjour " . $reservation['prenom'] . " " . $reservation['nom'] . ",\n\n" . "Nous vous informons que votre réservation du " . $formatter->format(new DateTime($reservation['date'])) . " pour notre exposition a été annulée.\n\nCordialement,\nL'équipe de chez Siny'art\n\nSi vous n'êtes pas à l'origine de cette annulation, veuillez nous contacter au plus vite.",
        $headers
    );
}
function getAllUsers()
{
    global $db;
    $stmt = $db->prepare("SELECT id_user, username, mail, nom, prenom, role FROM `utilisateurs` order by role asc , nom");
    $stmt->execute();
    return $stmt;
}

function searchUser($search)
{
    global $db;
    $stmt = $db->prepare("SELECT id_user, username, mail, nom, prenom, role FROM `utilisateurs` WHERE username LIKE :search OR mail like :search OR id_user like :search OR nom like :search OR prenom like :search order by id_user");
    $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
}

function deleteUser($id)
{
    global $db;
    $stmt = $db->prepare("DELETE FROM `utilisateurs` WHERE id_user = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute()) {
        return deleteAllTicketOfUser($id);
    } else {
        return false;
    }
}

function deleteAllTicketOfUser($id)
{
    global $db;
    $stmt = $db->prepare("DELETE FROM `reservations` WHERE ext_id_user = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function checkIdUser($id)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM `utilisateurs` WHERE id_user = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        return true;
    } else {
        return false;
    }
}

function updateUsername($id, $username)
{
    global $db;
    $stmt = $db->prepare("UPDATE `utilisateurs` SET username = :username WHERE id_user = :id");
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function updateUserMail($id, $mail)
{
    global $db;
    $stmt = $db->prepare("UPDATE `utilisateurs` SET mail = :mail WHERE id_user = :id");
    $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function updateUserNom($id, $nom)
{
    global $db;
    $stmt = $db->prepare("UPDATE `utilisateurs` SET nom = :nom WHERE id_user = :id");
    $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function updateUserPrenom($id, $prenom)
{
    global $db;
    $stmt = $db->prepare("UPDATE `utilisateurs` SET prenom = :prenom WHERE id_user = :id");
    $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function updateUserRole($id, $role)
{
    global $db;
    $stmt = $db->prepare("UPDATE `utilisateurs` SET role = :role WHERE id_user = :id");
    $stmt->bindValue(':role', $role, PDO::PARAM_INT);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function sendMailUser($id, $modifs)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM `utilisateurs` WHERE id_user = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $modifications = "";
    foreach ($modifs as $key => $value) {
        $modifications .= str_replace("%20", " ", "- " . $value . "\n");
    }

    $headers = "From: L'équipe Siny'art <exposition@sinyart.fr>\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    mail(
        $user['mail'],
        mb_encode_mimeheader("Des modifications ont été effectuées sur votre compte", 'UTF-8', 'B', "\r\n"),
        "Bonjour " . $user['prenom'] . " " . $user['nom'] . ",\n\n" . "Certaines modifications ont été faites sur votre compte utilisateur pour l'exposition \"Tamara de Lempika - Les années folles\".\n\n Voici les informations qui ont été modifiées :\n" . $modifications . "\n\nCordialement,\nL'équipe de chez Siny'art",
        $headers
    );
}

function deletedUserMail($id)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM `utilisateurs` WHERE id_user = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $headers = "From: L'équipe Siny'art <exposition@sinyart.fr>\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    mail(
        $user['mail'],
        mb_encode_mimeheader("Suppressions de votre compte utilisateur", 'UTF-8', 'B', "\r\n"),
        "Bonjour " . $user['prenom'] . " " . $user['nom'] . ",\n\n" . "Nous vous informons que votre compte utilisateur pour notre exposition a bien été supprimé.\n\nCordialement,\nL'équipe de chez Siny'art\n\nSi vous n'êtes pas à l'origine de cette annulation, veuillez nous contacter au plus vite.",
        $headers
    );
}

function getStats()
{
    global $db;

    $stmt = $db->prepare("SELECT f.nom_formule_fr, SUM(quantite) as count FROM reservations r inner join formules f on f.id_formule = r.ext_id_formule GROUP BY f.nom_formule_fr");
    $stmt->execute();
    $formuleCounts = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

    $stmt = $db->prepare("SELECT COUNT(*) FROM reservations");
    $stmt->execute();
    $nbBillet = $stmt->fetchColumn();

    $stmt = $db->prepare("SELECT SUM(quantite) FROM reservations");
    $stmt->execute();
    $nbReservation = $stmt->fetchColumn();

    $stmt = $db->prepare("SELECT DAYNAME(date), COUNT(*) as count FROM reservations GROUP BY DAYNAME(date)");
    $stmt->execute();
    $reservationsByDay = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

    $result = [
        "formule" => array_map(function ($count) {
            return $count ?? 0;
        }, $formuleCounts),
        "nbBillet" => $nbBillet,
        "nbReservation" => $nbReservation,
        "reservationsByDay" => [
            "Lundi" => $reservationsByDay['Monday'] ?? 0,
            "Mardi" => $reservationsByDay['Tuesday'] ?? 0,
            "Mercredi" => $reservationsByDay['Wednesday'] ?? 0,
            "Jeudi" => $reservationsByDay['Thursday'] ?? 0,
            "Vendredi" => $reservationsByDay['Friday'] ?? 0,
            "Samedi" => $reservationsByDay['Saturday'] ?? 0,
            "Dimanche" => $reservationsByDay['Sunday'] ?? 0
        ]
    ];

    return $result;
}
?>