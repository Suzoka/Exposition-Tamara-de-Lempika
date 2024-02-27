<?php
class Formule {
    private $id_formule;
    private $nom_formule;
    private $tarif;

    public function getId_formule()
    {
        return $this->id_formule;
    }

    public function setId_formule($id_formule)
    {
        $this->id_formule = $id_formule;
    }

    public function getNom_formule()
    {
        return $this->nom_formule;
    }

    public function setNom_formule($nom_formule)
    {
        $this->nom_formule = $nom_formule;
    }

    public function getTarif()
    {
        return $this->tarif;
    }

    public function setTarif($tarif)
    {
        $this->tarif = $tarif;
    }

    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    public function __construct($data)
    {
        $this->hydrate($data);
    }
}
?>