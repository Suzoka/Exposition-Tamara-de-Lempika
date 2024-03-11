<?php

include './database.php';

function getAllReservedFormulesNotArchived()
{
    global $db;
    $stmt = $db->prepare("select r.date, r.id_ticket, u.nom, u.prenom, f.nom_formule, u.mail, r.quantite, (f.tarif*r.quantite) as prix from `reservations` r inner join `utilisateurs` u on r.ext_id_user = u.id_user inner join `formules` f on r.ext_id_formule = f.id_formule where r.date>NOW() GROUP BY u.id_user, r.date, r.ext_id_formule order by r.date;");
    $stmt->execute();
    return $stmt;
}

function searchReservedFormulesNotArchived($search)
{
    global $db;
    $search = "%" . $search . "%";
    $stmt = $db->prepare("select r.date, r.id_ticket, u.nom, u.prenom, f.nom_formule, u.mail, r.quantite, (f.tarif*r.quantite) as prix from `reservations` r inner join `utilisateurs` u on r.ext_id_user = u.id_user inner join `formules` f on r.ext_id_formule = f.id_formule WHERE r.date>NOW() AND (u.username LIKE :search OR u.mail like :search OR r.id_ticket like :search OR u.nom like :search OR u.prenom like :search) GROUP BY u.id_user, r.date, r.ext_id_formule order by r.date;");
    $stmt->bindParam(':search', $search, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
}
function getAllArchives()
{
    global $db;
    $stmt = $db->prepare("select r.date, r.id_ticket, u.nom, u.prenom, f.nom_formule, u.mail, r.quantite, (f.tarif*r.quantite) as prix from `reservations` r inner join `utilisateurs` u on r.ext_id_user = u.id_user inner join `formules` f on r.ext_id_formule = f.id_formule where r.date<NOW() GROUP BY u.id_user, r.date, r.ext_id_formule order by r.date desc;");
    $stmt->execute();
    return $stmt;
}

function searchArchives($search)
{
    global $db;
    $search = "%" . $search . "%";
    $stmt = $db->prepare("select r.date, r.id_ticket, u.nom, u.prenom, f.nom_formule, u.mail, r.quantite, (f.tarif*r.quantite) as prix from `reservations` r inner join `utilisateurs` u on r.ext_id_user = u.id_user inner join `formules` f on r.ext_id_formule = f.id_formule WHERE r.date<NOW() AND (u.username LIKE :search OR u.mail like :search OR r.id_ticket like :search OR u.nom like :search OR u.prenom like :search) GROUP BY u.id_user, r.date, r.ext_id_formule order by r.date desc;");
    $stmt->bindParam(':search', $search, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
}

function deleteReservation($id)
{
    global $db;
    $stmt = $db->prepare("DELETE FROM `reservations` WHERE id_ticket = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function connexionAdmin($login, $password)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM `utilisateurs` WHERE username = :login");
    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
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
?>