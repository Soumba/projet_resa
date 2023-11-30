<?php

session_start();

if (!isset($_SESSION['id']))
header('Location: ../index.php');
exit;


require "../handf/header.php";

require "./allfunction.php";

?>

<br>
<div class="container">
    <div class="col-sm-12 section-title text-center mb-2">
        <h3>Mes réservations</h3>
    </div>
</div>
<hr>

<div class="container">

<?php



    // Usage
    $database = new Databasec();
    // $connection = $database->connect();  for all data from table
    $userDetails = $database->getUserDetails($_SESSION['id']); // for data where id=$_SESSION id

    if ($userDetails) {

        echo "<table class='table'>";
        echo "<thead class='thead-dark'>";
        echo "<tr><th>N° réservation</th><th>Date d'arivé</th><th>Date de départ</th><th>Status</th><th>Nombre d'adultes</th><th>Nombre d'enfant</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($userDetails as $user) {
            echo "<tr>";
            echo "<td>" . $reservation['id'] . "</td>";
            echo "<td>" . $reservation['startDate'] . "</td>";
            echo "<td>" . $reservation['endDate'] . "</td>";
            echo "<td>" . $reservation['status'] . "</td>";
            echo "<td>" . $reservation['numberOfAdults'] . "</td>";
            echo "<td>" . $reservation['numberOfChildren'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "User not found or .";
    }

        // Disconnect when done
        $database->disconnect();
    
    ?>
    </div>

        
        <!-- <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Numéro de réservation</th>
                    <th scope="col">Date de début</th>
                    <th scope="col">Date de fin</th>
                    <th scope="col">Nombre d'adultes</th>
                    <th scope="col">Nombre d'enfants</th>
                    <th scope="col">Chambre réservée</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>30/11/2023</td>
                    <td>01/11/2024</td>
                    <td>2</td>
                    <td>1</td>
                    <td>standard</td>
                    <td>Réservé</td>
                </tr>
            </tbody>
        </table> -->

<?php


require "../handf/footer.php";

?>