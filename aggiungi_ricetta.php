<?php
    session_start(); //si apre la sessione
    include("connessione.php"); //includiamo il file con la funzione di collegamento al database
    $conn = connessione(); //creiamo la variabile relativa alla connessione

    //controllo per verificare se lo username dell'utente è salvato in sessione, se non lo è l'utente viene reindirizzato alla pagina di login
    if (!isset($_SESSION["username"])) { 
        header("Location: Login.php");
        exit;
    }

    //controllo che reindirizza l'utente non-amministratore alla pagina delle ricette, il quale non può accedere al servizio di aggiunta di esse
    if ($_SESSION['ruolo'] == "utente normale") {
        $_SESSION['error_message'] = "Non sei un amministratore";
        header("Location: stampa_ricette.php");
        exit;
    }

    //qui sfruttiamo questa funzione per "purificare" il contenuto delle variabili, in modo da non incorrere in errori dati da caratteri speciali
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $link = mysqli_real_escape_string($conn, $_POST['link']);
    $vegana = mysqli_real_escape_string($conn, $_POST['vegana']);
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);

    //con una query inseriamo un record con i paramentri inseriti dall'utente; viene poi comunicato se l'operazione è andata a buon fine o meno
    $query = "INSERT INTO servizi (nome, link, vegana, salato) VALUES ('$nome', '$link', '$vegana', '$tipo')";
    if (mysqli_query($conn, $query)) {
        $_SESSION['success_message'] = "Ricetta aggiunta con successo.";
    } else {
        $_SESSION['error_message'] = "Errore nell'aggiunta della ricetta.";
    }

    //si viene reindirizzati alla pagina delle ricette
    header("Location: stampa_ricette.php");
    exit;
    
    //si chiude la connessione al database
    mysqli_close($conn);
?>
