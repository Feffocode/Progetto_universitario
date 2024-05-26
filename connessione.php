<?php
    
    function connessione(){
        $server = 'localhost';
        $user = 'root';
        $password = '';
        $db = "sito_cucina";
    
        //nome indirizzo id, nome utente, password
        $connessione = mysqli_connect($server, $user, $password, $db )
        or die("errore di connessione");
        //specificare il db su cui operare
  
        return $connessione;
    }

?>