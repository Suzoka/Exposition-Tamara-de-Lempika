<?php

include './database.php';

function getAllReservedFormulesNotArchived()
{
    global $db;
    $stmt = $db->prepare("select r.date, r.id_ticket, r.nom, r.prenom, f.nom_formule, r.mail, r.quantite, (f.tarif*r.quantite) as prix from `reservations` r inner join `utilisateurs` u on r.ext_id_user = u.id_user inner join `formules` f on r.ext_id_formule = f.id_formule where r.date>NOW() GROUP BY u.id_user, r.date, r.ext_id_formule order by r.date;");
    $stmt->execute();
    return $stmt;
}

function searchReservedFormulesNotArchived($search)
{
    global $db;
    $stmt = $db->prepare("select r.date, r.id_ticket, r.nom, r.prenom, f.nom_formule, r.mail, r.quantite, (f.tarif*r.quantite) as prix from `reservations` r inner join `utilisateurs` u on r.ext_id_user = u.id_user inner join `formules` f on r.ext_id_formule = f.id_formule WHERE r.date>NOW() AND (u.username LIKE :search OR u.mail like :search OR r.id_ticket like :search OR u.nom like :search OR u.prenom like :search OR r.nom like :search OR r.prenom like :search OR r.mail like :search) GROUP BY u.id_user, r.date, r.ext_id_formule order by r.date;");
    $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
}
function getAllArchives()
{
    global $db;
    $stmt = $db->prepare("select r.date, r.id_ticket, r.nom, r.prenom, f.nom_formule, r.mail, r.quantite, (f.tarif*r.quantite) as prix from `reservations` r inner join `utilisateurs` u on r.ext_id_user = u.id_user inner join `formules` f on r.ext_id_formule = f.id_formule where r.date<NOW() GROUP BY u.id_user, r.date, r.ext_id_formule order by r.date desc;");
    $stmt->execute();
    return $stmt;
}

function searchArchives($search)
{
    global $db;
    $stmt = $db->prepare("select r.date, r.id_ticket, r.nom, r.prenom, f.nom_formule, r.mail, r.quantite, (f.tarif*r.quantite) as prix from `reservations` r inner join `utilisateurs` u on r.ext_id_user = u.id_user inner join `formules` f on r.ext_id_formule = f.id_formule WHERE r.date<NOW() AND (u.username LIKE :search OR u.mail like :search OR r.id_ticket like :search OR u.nom like :search OR u.prenom like :search OR r.nom like :search OR r.prenom like :search OR r.mail like :search) GROUP BY u.id_user, r.date, r.ext_id_formule order by r.date desc;");
    $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
}

function deleteReservation($id)
{
    global $db;
    $stmt = $db->prepare("DELETE FROM `reservations` WHERE id_ticket = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
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
?>