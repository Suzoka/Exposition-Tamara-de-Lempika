<?php 

include './database.php';

function getAllReservedFormules() {
    global $db;
    $stmt = $db->prepare("select r.date, u.id_user, u.username, f.nom_formule, u.mail, COUNT(*) as quantite, (f.tarif*COUNT(*)) as prix from `reservations` r inner join `utilisateurs` u on r.ext_id_user = u.id_user inner join `formules` f on r.ext_id_formule = f.id_formule GROUP BY u.id_user, r.ext_id_formule;");
    $stmt->execute();
    return $stmt;
}

function searchReservedFormules($search) {
    global $db;
    $search = "%".$search."%";
    $stmt = $db->prepare("select r.date, u.id_user, u.username, f.nom_formule, u.mail, COUNT(*) as quantite, (f.tarif*COUNT(*)) as prix from `reservations` r inner join `utilisateurs` u on r.ext_id_user = u.id_user inner join `formules` f on r.ext_id_formule = f.id_formule WHERE u.username LIKE :search OR u.mail like :search OR r.id_ticket like :search GROUP BY u.id_user, r.ext_id_formule;");
    $stmt->bindParam(':search', $search, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
}

?>