<?php


class Reservation {
    private $startDate;
    private $endDate;
    private $numberOfAdults;
    private $numberOfChildren;

    public function __construct($startDate, $endDate, $numberOfAdults, $numberOfChildren) {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->numberOfAdults = $numberOfAdults;
        $this->numberOfChildren = $numberOfChildren;
    }

    // Ajout getters et des setters 
    public function getStartDate() {
        return $this->startDate;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    public function getEndDate() {
        return $this->endDate;
    }

    public function setEndDate($endDate) {
        $this->endDate = $endDate;
    }

    public function getNumberOfAdults() {
        return $this->numberOfAdults;
    }

    public function setNumberOfAdults($numberOfAdults) {
        $this->numberOfAdults = $numberOfAdults;
    }

    public function getNumberOfChildren() {
        return $this->numberOfChildren;
    }

    public function setNumberOfChildren($numberOfChildren) {
        $this->numberOfChildren = $numberOfChildren;
    }

    public function isValid() {
        // Ajoutez des vérifications de validité des données
        //  la date de début est antérieure à la date de fin
        // Retournez true si les données sont valides, sinon false.
        // ...

        //  vérification : la date de début doit être antérieure à la date de fin
        return strtotime($this->startDate) < strtotime($this->endDate);
    }

    public function saveToDatabase() {
        // Ajoutez le code pour enregistrer la réservation dans la base de données

        // Remplacez les informations de connexion suivantes par celles de votre base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project_resa";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Utilisez les propriétés de la réservation pour créer la requête d'enregistrement
            $sql = "INSERT INTO reservation (startDate, endDate, numberOfAdults, numberOfChildren) VALUES (:startDate, :endDate, :numberOfAdults, :numberOfChildren)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':startDate', $this->startDate);
            $stmt->bindParam(':endDate', $this->endDate);
            $stmt->bindParam(':numberOfAdults', $this->numberOfAdults);
            $stmt->bindParam(':numberOfChildren', $this->numberOfChildren);

            // Exécutez la requête
            $stmt->execute();

            echo "Réservation enregistrée avec succès!";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }

        // Fermez la connexion
        $conn = null;
    }
}

?>
