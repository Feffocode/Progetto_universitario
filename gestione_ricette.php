<?php
session_start();
include("connessione.php");
$conn = connessione();

//controllo per verificare se lo username dell'utente è salvato in sessione, se non lo è l'utente viene reindirizzato alla pagina di login
if (!isset($_SESSION["username"])) {
    header("Location: Index.php");
    exit;
}

//controllo che reindirizza l'utente non-amministratore alla pagina delle ricette, il quale non può accedere al servizio di aggiunta di esse
if ($_SESSION['ruolo'] == "utente normale") {
    $_SESSION['error_message'] = "Non sei un amministratore";
    header("Location: stampa_ricette.php");
    exit;
}

if (isset($_POST['azione']) && isset($_POST['ricetta'])) { //qui "azione" fa riferimento ai pulsanti elimina e modifica del form della pagina delle ricette 
    $azione = $_POST['azione'];
    $id = mysqli_real_escape_string($conn, $_POST['ricetta']); //questa funzione esegue l'escape dei caratteri speciali nel dato fornito dall'utente.

    if ($azione == 'elimina') {
        $query = "DELETE FROM servizi WHERE id = '$id'";
        if (mysqli_query($conn, $query)) {
            $_SESSION['success_message'] = "Ricetta eliminata con successo.";
        } else {
            $_SESSION['error_message'] = "Errore nell'eliminazione della ricetta.";
        }
    } elseif ($azione == 'modifica') {
        $_SESSION["ricetta"] = $id;
        header("Location: modifica_ricetta.php");
        exit;
    }else{
        $_SESSION['error_message'] = "Nessuna ricetta selezionata.";
    }
}

header("Location: stampa_ricette.php");
exit;
?>
