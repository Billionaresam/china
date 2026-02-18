<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "allsidesrhoda@gmail.com";
    $subject = "New Importation Request - All Sides Import";

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $details = htmlspecialchars($_POST['details']);

    $services = "None selected";
    if (!empty($_POST['services'])) {
        $services = implode(", ", $_POST['services']);
    }

    $message = "
    New Importation Request

    Name: $name
    Email: $email
    Phone: $phone

    Services Requested:
    $services

    Project Details:
    $details
    ";

    $headers = "From: $email\r\nReply-To: $email";

    mail($to, $subject, $message, $headers);

    header("Location: quote.html?success=1");
    exit();
}
?>