<?php
session_start();
include 'connessione.php'; // File per connettersi al database

$conn = connessione();

$username = $_POST["username"];
$password = $_POST["password"];

// Controllo se l'utente esiste
$query = "SELECT * FROM utenti WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    //analizzo la riga come array associativo
    $user = mysqli_fetch_assoc($result);
    // Hash della password con md5
    $password_hash = md5($password);
    // Verifica della password
    if ($password_hash == $user['password']) {
        // Imposta la sessione
        $_SESSION['username'] = $user['username'];
        $_SESSION['amministratore'] = $user ['amministratore'];
        header("Location: profilo.php");
        exit;

    //password sbagliata
    } else {
        $_SESSION['error_message'] = "Password errata";
        header("Location: Login.php");
        exit;
    }
    //utente non ancora registrato
} else {
    $_SESSION['error_message'] = "Utente non trovato. Registrati prima.";
    header("Location: Registrazione.php");
    exit;
}
?>
