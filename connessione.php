<?php
    
    function connessione(){
        //impostiamo i parametri che servono per connetterci al giusto database
        $server = 'localhost';
        $user = 'root';
        $password = '';
        $db = "sito_cucina";
    
        $connessione = mysqli_connect($server, $user, $password, $db )
        or die("errore di connessione");
  
        return $connessione; //restituisce la variabile
    }

?>