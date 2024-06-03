<?php

include("connessione.php");
    session_start();
    $conn = connessione();

$mail = $_POST['mail'];

    //Creiamo la query di inserimento dei dati
    $query = "INSERT INTO newsletter (mail) VALUES ('$mail')";

    //Eseguiamo la query:
    if (mysqli_query($conn, $query)) { //funzione per eseguire la query con due parametri
        echo "<h1>Dati inseriti nel database con successo.</h1>";} 
    else {
        echo "Errore nell'esecuzione della query: " . mysqli_error($conn);}

    
    echo "<br><h2><a href= \"Index.php\">Torna alla Home page!</a><h2>";

mysqli_close($conn);

?>

