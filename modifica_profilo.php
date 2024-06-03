<?php
    session_start();
    include("connessione.php");
    $conn = connessione();

    if (!isset($_SESSION["username"])) {
        header("Location: Index.php");
        exit;
    }

    $username = $_SESSION["username"];
    $new_user = $_POST["new_name"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $email = $_POST["mail"];



    // Aggiornamento dei dati nel database
    $sql = "UPDATE utenti SET username = '$new_user', nome = '$nome', cognome = '$cognome', mail = '$email' WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['username'] = $new_user;
        $_SESSION['success_message'] = "Dati aggiornati con successo.";
        header("Location: profilo.php");
        exit; 
    } else {
        $_SESSION['error_message'] = "Errore nell'aggiornamento dei dati.";
        header("Location: profilo.php");
        exit; 
    }

    mysqli_close($conn);

?>
