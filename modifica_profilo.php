<?php
session_start();
include("connessione.php");
$conn = connessione();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION["username"];
$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
$email = $_POST["email"];

// Aggiornamento dei dati nel database
$sql = "UPDATE utente SET nome = ?, cognome = ?, mail = ? WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nome, $cognome, $email, $username);

if ($stmt->execute()) {
    $_SESSION['success_message'] = "Dati aggiornati con successo.";
    header("Location: profilo.php");
} else {
    $_SESSION['error_message'] = "Errore nell'aggiornamento dei dati.";
    header("Location: profilo.php");
}

$stmt->close();
$conn->close();
?>
