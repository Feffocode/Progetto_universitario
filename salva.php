<?php
session_start();
include 'connessione.php'; // File per connettersi al database

$conn = connessione();

$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$conf = $_POST["conferma_p"];
$amministratore = $_POST["amministratore"];

// Controllo se è presente un utente con lo stesso username
$query = "SELECT username FROM utenti WHERE username ='$username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $_SESSION["error_message"] = "Username già presente nel database";
    header("Location: Registrazione.php");
    exit; 
}
// Controllo lunghezza password
if (strlen($password) < 8) {
    $_SESSION['error_message'] = "La password deve avere almeno 8 caratteri.";
    header("Location: Registrazione.php");
    exit;
}
// Controllo password
if ($password == $conf) {
    // Hash della password
    $password_hash = md5($password);

    //Query di inserimento
    $sql = "INSERT INTO utenti (nome, cognome, username, mail, password, amministratore) 
            VALUES ('$nome', '$cognome', '$username', '$email', '$password_hash', '$amministratore')";
    $tmp = mysqli_query($conn, $sql);

    if ($tmp) {
        //imposto la sessione
        $_SESSION['username'] = $username;
        $_SESSION['ruolo'] = $amministratore;
        header("Location: profilo.php");
        exit;
    } else {
        $_SESSION['error_message'] = "Errore nella registrazione: " . mysqli_error($conn);
        header("Location: Registrazione.php");
        exit;
    }
} else {
    $_SESSION['error_message'] = "Le password non coincidono";
    header("Location: Registrazione.php");
    exit;
}
?>
