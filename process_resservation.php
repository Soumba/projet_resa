<?php

require_once('résaroom.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $startDate = $_POST["start_date"];
    $endDate = $_POST["end_date"];
    $numberOfAdults = $_POST["adults"];
    $numberOfChildren = $_POST["children"];

    // Créer une instance de la classe Reservation
    $reservation = new Reservation($startDate, $endDate, $numberOfAdults, $numberOfChildren);

    // Vérifier la validité des données
    if ($reservation->isValid()) {
        // Les données sont valides, enregistrez la réservation dans la base de données
        $reservation->saveToDatabase();

        echo "Réservation réussie!";
    } else {
        // Les données ne sont pas valides, afficher un message d'erreur
        echo "Veuillez vérifier vos données de réservation.";
    }
}

?>