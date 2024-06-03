<?php
    session_start();
    session_unset();    //elimina tutte le variabili di sessione attualmente registrate
    session_destroy();  // distrugge tutti i dati associati alla sessione corrente

    header("Location: Index.php");
?>