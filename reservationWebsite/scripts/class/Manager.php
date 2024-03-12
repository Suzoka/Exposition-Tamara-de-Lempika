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
        $stmt = $this->db->prepare("SELECT * FROM `formules`");
        $stmt->execute();
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $listeFormules[] = new Formule($data);
        }
        return $listeFormules;
    }

    public function createReservation($datas)
    {
        $date = $datas['datePicker'] . " " . $datas['heure'];

        foreach ($datas as $key => $value) {
            if (strpos($key, 'formule') !== false) {
                $id_formule = substr($key, 7);
                $idUser = $_SESSION['user']->getId_user();

                $stmt = $this->db->prepare("INSERT INTO `reservations` (`ext_id_user`, `ext_id_formule`, `date`, `quantite`) VALUES (:ext_id_user, :ext_id_formule, :date, :quantite)");
                $stmt->bindParam(':ext_id_user', $idUser, PDO::PARAM_INT);
                $stmt->bindParam(':ext_id_formule', $id_formule, PDO::PARAM_INT);
                $stmt->bindParam(':date', $date, PDO::PARAM_STR);
                $stmt->bindParam(':quantite', $value, PDO::PARAM_INT);
                $stmt->execute();
            }
        }
    }

    public function connectUser($username, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM `utilisateurs` WHERE `username` = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() == 1) {
            $usr = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $usr['password'])) {
                $_SESSION['user'] = new User($usr);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function createUser($datas)
    {
        $stmt = $this->db->prepare("select * from `utilisateurs` where `username` = :username");
        $stmt->bindParam(':username', $datas['username'], PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            $password = password_hash($datas['password'], PASSWORD_DEFAULT);

            $stmt = $this->db->prepare("INSERT INTO `utilisateurs` (`username`, `mail`, `password`, `role`, `nom`, `prenom`) VALUES (:username, :mail, :password, :role, :nom, :prenom)");
            $stmt->bindParam(':username', $datas['username'], PDO::PARAM_STR);
            $stmt->bindParam(':mail', $datas['mail'], PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->bindParam(':role', $datas['role'], PDO::PARAM_STR);
            $stmt->bindParam(':nom', $datas['nom'], PDO::PARAM_STR);
            $stmt->bindParam(':prenom', $datas['prenom'], PDO::PARAM_STR);
            $stmt->execute();

            $stmt = $this->db->prepare("SELECT * FROM `utilisateurs` WHERE `username` = :username");
            $stmt->bindParam(':username', $datas['username'], PDO::PARAM_INT);
            $stmt->execute();
            $_SESSION['user'] = new User($stmt->fetch(PDO::FETCH_ASSOC));
            return true;
        } else {
            return false;
        }
    }

    public function disconnection(){
        $_SESSION = array();
        session_destroy();
    }
}

?>