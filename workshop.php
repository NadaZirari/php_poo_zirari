<?php

class Utilisateur {
    protected $nom;
    protected $prenom;
    protected $type_utilisateur;

    public function __construct($nom, $prenom, $type_utilisateur) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->type_utilisateur = $type_utilisateur;
    }

    public function afficherNomComplet() {
        return $this->prenom . " " . $this->nom;
    }

    public function changerNom($nouveauNom) {
        $this->nom = $nouveauNom;
    }

    public function changerPrenom($nouveauPrenom) {
        $this->prenom = $nouveauPrenom;
    }
}


class Patient extends Utilisateur {
    private $rendez_vous = [];

    public function prendreRendezVous($date) {
        $this->rendez_vous[] = $date;
    }

    public function afficherRendezVous() {
        return $this->rendez_vous;
    }
}


class Medecin extends Utilisateur {
    private $specialite;

    public function __construct($nom, $prenom, $type_utilisateur, $specialite) {
        parent::__construct($nom, $prenom, $type_utilisateur);
        $this->specialite = $specialite;
    }

    public function consulterPatient($patient) {
        return "Le Dr. " . $this->afficherNomComplet() . " consulte " . $patient->afficherNomComplet();
    }
}


$patient = new Patient("Doe", "John", "Patient");
$medecin = new Medecin("Smith", "Anna", "Medecin", "Cardiologie");

$patient->prendreRendezVous("2024-12-25");
echo $medecin->consulterPatient($patient);
?>
