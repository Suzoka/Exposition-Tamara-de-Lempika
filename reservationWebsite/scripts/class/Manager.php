<?php
class Manager
{
    private $db;

    public function __construct($db)
    {
        $this->setDb($db);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
        try {
            foreach ($datas as $key => $value) {
                if (strpos($key, 'formule') !== false && $value != 0) {
                    $stmt = $this->db->prepare("INSERT INTO `reservations` (`ext_id_user`, `ext_id_formule`, `date`, `quantite`, `nom`, `prenom`, `mail`) VALUES (:ext_id_user, :ext_id_formule, :date, :quantite, :nom, :prenom, :mail)");
                    $stmt->bindValue(':ext_id_user', $_SESSION['user']->getId_user(), PDO::PARAM_INT);
                    $stmt->bindValue(':ext_id_formule', substr($key, 7), PDO::PARAM_INT);
                    $stmt->bindValue(':date', $datas['datePicker'] . " " . $datas['heure'], PDO::PARAM_STR);
                    $stmt->bindValue(':quantite', $value, PDO::PARAM_INT);
                    $stmt->bindValue(':nom', $datas['nom'], PDO::PARAM_STR);
                    $stmt->bindValue(':prenom', $datas['prenom'], PDO::PARAM_STR);
                    $stmt->bindValue(':mail', $datas['mail'], PDO::PARAM_STR);
                    $stmt->execute();
                }
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function connectUser($username, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM `utilisateurs` WHERE `username` = :username");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
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

    public function createUser(User $user)
    {
        $stmt = $this->db->prepare("select * from `utilisateurs` where `username` = :username");
        $stmt->bindValue(':username', $user->getUsername(), PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            $stmt = $this->db->prepare("INSERT INTO `utilisateurs` (`username`, `mail`, `password`, `role`, `nom`, `prenom`) VALUES (:username, :mail, :password, 0, :nom, :prenom)");
            $stmt->bindValue(':username', $user->getUsername(), PDO::PARAM_STR);
            $stmt->bindValue(':mail', $user->getMail(), PDO::PARAM_STR);
            $stmt->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
            $stmt->bindValue(':nom', $user->getNom(), PDO::PARAM_STR);
            $stmt->bindValue(':prenom', $user->getPrenom(), PDO::PARAM_STR);
            $stmt->execute();

            $stmt = $this->db->prepare("SELECT * FROM `utilisateurs` WHERE `username` = :username");
            $stmt->bindValue(':username', $user->getUsername(), PDO::PARAM_STR);
            $stmt->execute();
            $_SESSION['user'] = new User($stmt->fetch(PDO::FETCH_ASSOC));
            return true;
        } else {
            return false;
        }
    }

    public function disconnection()
    {
        $last = $_SESSION["from"];
        $_SESSION = [];
        session_destroy();
        session_start();
        $_SESSION["from"] = $last;
    }

    function getReservationsOfUser($id)
    {
        global $db;
        $stmt = $this->db->prepare("SELECT * FROM `reservations` r inner join `formules` f on r.ext_id_formule = f.id_formule WHERE `ext_id_user` = :id order by r.date");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    function editUserInfos($datas, $id)
    {
        global $db;
        $stmt = $this->db->prepare("UPDATE `utilisateurs` SET `nom` = :nom, `prenom` = :prenom, `mail` = :mail WHERE `id_user` = :id");
        $stmt->bindValue(':nom', $datas['nom'], PDO::PARAM_STR);
        $stmt->bindValue(':prenom', $datas['prenom'], PDO::PARAM_STR);
        $stmt->bindValue(':mail', $datas['mail'], PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    function updateSession($id)
    {
        global $db;
        $stmt = $this->db->prepare("SELECT * FROM `utilisateurs` WHERE `id_user` = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return new User($stmt->fetch(PDO::FETCH_ASSOC));
    }
}

?>