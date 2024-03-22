<?php
class Formule {
    private $id_formule;
    private $nom_formule_fr;
    private $nom_formule_en;
    private $explication_formule_fr;
    private $explication_formule_en;
    private $tarif;

    public function getId_formule()
    {
        return $this->id_formule;
    }

    public function setId_formule($id_formule)
    {
        $this->id_formule = $id_formule;
    }

    public function getNom_formule_fr()
    {
        return $this->nom_formule_fr;
    }

    public function setNom_formule_fr($nom_formule_fr)
    {
        $this->nom_formule_fr = $nom_formule_fr;
    }

    public function getNom_formule_en()
    {
        return $this->nom_formule_en;
    }

    public function setNom_formule_en($nom_formule_en)
    {
        $this->nom_formule_en = $nom_formule_en;
    }

    public function getExplication_formule_fr()
    {
        return $this->explication_formule_fr;
    }

    public function setExplication_formule_fr($explication_formule_fr)
    {
        $this->explication_formule_fr = $explication_formule_fr;
    }

    public function getExplication_formule_en()
    {
        return $this->explication_formule_en;
    }

    public function setExplication_formule_en($explication_formule_en)
    {
        $this->explication_formule_en = $explication_formule_en;
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