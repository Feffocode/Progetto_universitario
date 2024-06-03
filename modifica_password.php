<?php
    session_start();
    include("connessione.php");
    $conn = connessione();

    if (!isset($_SESSION["username"])) {
        header("Location: Index.php");
        exit;
    }

    $username = $_SESSION["username"];
    $vecchia_p = $_POST["old_pwd"];
    $nuova_p = $_POST["new_pwd"];

    $sql = "SELECT password FROM utenti WHERE username = '$username'";
    $risultato = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($risultato);

    //verifico che la password coincida con la vecchia password
    if($vecchia_p == $user['password']){
        
        // Controllo lunghezza nuova password
        if (strlen($nuova_p) < 8) {
            $_SESSION['error_message'] = "La nuova password deve avere almeno 8 caratteri.";
            header("Location: profilo.php");
            exit;}
            else{
                // Aggiornamento password nel database
                $pw = $nuova_p;
                $sql = "UPDATE utenti SET password = '$pw' WHERE username = '$username'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $_SESSION['success_message'] = "Password aggiornata con successo.";
                    header("Location: profilo.php");
                    exit; 
                        }
                    }

    }else{
        $_SESSION['error_message'] = "La password è sbagliata.";
        header("Location: profilo.php");
        exit; 
    }

    mysqli_close($conn);
?>