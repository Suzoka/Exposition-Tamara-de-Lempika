<?php
var_dump($_POST);

include("../scripts/database.php");
$manager->createReservation($_POST);

?>