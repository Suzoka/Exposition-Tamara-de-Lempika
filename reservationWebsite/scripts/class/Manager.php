<?php
class Manager
{
    private $db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function setDb(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllFormules()
    {
        $listeFormules = [];
        $stmt = $this->db->prepare("SELECT * FROM `formules` order by `nom_formule` asc");
        $stmt->execute();
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $listeFormules[] = new Formule($data);
        }
        return $listeFormules;
    }

    public function createReservation($datas)
    {
        $id = 1;
        $date = $datas['datePicker'] . " " . $datas['heure'];

        foreach ($datas as $key => $value) {
            if (strpos($key, 'formule') !== false) {
                $id_formule = substr($key, 7);

                for ($i = 0; $i < $value; $i++) {
                    $stmt = $this->db->prepare("INSERT INTO `reservations` (`ext_id_user`, `ext_id_formule`, `date`) VALUES (:ext_id_user, :ext_id_formule, :date)");

                    //Changer par l'id stocké en session
                    $stmt->bindParam(':ext_id_user', $id, PDO::PARAM_INT);

                    $stmt->bindParam(':ext_id_formule', $id_formule, PDO::PARAM_INT);
                    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
                    $stmt->execute();
                }
            }
        }
    }
}

?>