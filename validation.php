<?php
include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style> 
    <br>
    <br>
    <br>

    <title>Fake Payment Form</title>
</head>
<body>
   

<?php
class FakePaymentProcessor {
    public function processPayment($cardNumber, $expirationDate, $cvv, $amount) {
        // Ici, vous pouvez simplement simuler le succès du paiement
        // Dans une vraie application, vous devriez effectuer des vérifications plus approfondies et utiliser une passerelle de paiement réelle

        // Simuler un paiement réussi
        return true;
    }
}

class PaymentForm {
    private $fakePaymentProcessor;

    public function __construct(FakePaymentProcessor $fakePaymentProcessor) {
        $this->fakePaymentProcessor = $fakePaymentProcessor;
    }
   
    public function displayForm() {
        // Affichez ici le formulaire de paiement
        echo "
        <form method='post' action=''>
            <label for='card_number'>Numéro de carte de crédit</label>
            <input type='text' name='card_number' required>
            <br>
            <label for='expiration_date'>Date d'expiration (MM/AA)</label>
            <input type='text' name='expiration_date' required>
            <br>
            <label for='cvv'>Code de sécurité (CVV)</label>
            <input type='text' name='cvv' required>
            <br>
            <button type='submit'>Payer</button>
        </form>";
    }

    public function processPayment($cardNumber, $expirationDate, $cvv, $amount) {
        // Traitez le paiement avec les informations de carte fournies
        $paymentResult = $this->fakePaymentProcessor->processPayment($cardNumber, $expirationDate, $cvv, $amount);

        if ($paymentResult) {
            // Le paiement a réussi
            echo "Paiement réussi! Montant payé : " . $amount . " €";
        } else {
            // Le paiement a échoué
            echo "Erreur de paiement. Veuillez réessayer.";
        }
    }
}

// Exemple d'utilisation
$fakePaymentProcessor = new FakePaymentProcessor();
$paymentForm = new PaymentForm($fakePaymentProcessor);

// Affichez le formulaire
$paymentForm->displayForm();

// Traitement du paiement (cette partie peut être dans un fichier séparé comme process_payment.php)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cardNumber = $_POST["card_number"];
    $expirationDate = $_POST["expiration_date"];
    $cvv = $_POST["cvv"];
    $amount = 1000; // Montant en centimes (10.00 €)

    // Traitez le paiement avec les informations de carte fournies
    $paymentForm->processPayment($cardNumber, $expirationDate, $cvv, $amount);
}

?>
