<?php
    include("connessione.php");
    session_start();
    $conn = connessione();

    if (!isset($_SESSION["username"])) {
        header("Location: Login.php");
        exit;
    }

    //errori
    if (isset($_SESSION['error_message'])) {
        echo "<p style='color:red;'>" . $_SESSION['error_message'] . "</p>";
        unset($_SESSION['error_message']);
    }

    //conferme
    if (isset($_SESSION['success_message'])) {
        echo "<p style='color:green;'>" . $_SESSION['success_message'] . "</p>";
        unset($_SESSION['success_message']);
    }

    $username = $_SESSION["username"];
    $amministratore = $_SESSION["ruolo"];

    if ($amministratore == 1) { //se l'utente è amministratore
        $ruolo = "amministratore";
    } else {
        $ruolo = "utente normale"; //se l'utente non è amministratore
    }

    $sql = "SELECT * FROM utenti WHERE username = '$username'";
    $risultato = mysqli_query($conn, $sql) or die("<a href='Index.html'>Errore! Torna alla pagina di login</a>");
    $user = mysqli_fetch_assoc($risultato);

    mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Profilo - La mia pagina di cucina</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
    <header>
        <nav>
            <a href="Index.php"><img id="logo" src="Immagini/Logo.png" alt="Logo Daniele Rossi Chef"></a>
            <a href="Storia.php">La mia storia</a>
            <a href="Cucina.php">La mia cucina</a>
            <a href="stampa_ricette.php">Le mie ricette</a>
            <a href="Contatti.php">Contatti</a>
            <?php if(isset($_SESSION["username"])){ ?>
            <a href="logout.php"style='color:red;'>Effettua il Logout</a>
            <?php } ?>            
            <a href="profilo.php" class="profile-link"><img id="profile-icon" src="Immagini/user.png" alt="Profilo"></a>
        </nav>
    </header>

    
    <br>

    <!-- Stampo i dati dell'utente -->
    <h2>Area personale</h2>
    <b>Nome:</b> <?php echo $user["nome"]; ?><br><br>
    <b>Cognome:</b> <?php echo $user["cognome"]; ?><br><br>
    <b>Username:</b> <?php echo $user["username"]; ?><br><br>
    <b>Email:</b> <?php echo $user["mail"]; ?><br><br>
    <b>Ruolo:</b> <?php echo $ruolo?><br><br>
    <?php
    
    if($amministratore == 1){
        echo "<button onclick=\"window.location.href='gestione_utenti.php'\">Gestisci utenti</button>";
        }
    ?>

    <!-- Modulo per aggiornare i dati -->
    <br><br>
    <h2>Modifica i tuoi dati</h2>
    <h4>Compila tutti i campi</h4>
    <form action="modifica_profilo.php" method="post">
        <label >Username:</label>
        <input type="text" name="new_name" required><br><br>

        <label >Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label >Cognome:</label>
        <input type="text" name="cognome" required><br><br>

        <label >Mail:</label>
        <input type="text" name="mail" required><br><br>

        <input type="submit" value="Aggiorna">
    </form>

    <br>
    <h2>Modifica la password</h2>
    <form action="modifica_password.php" method="post">
        
        <label >Password attuale:</label>
        <input type="password" name="old_pwd" ><br><br>

        <label >Nuova password:</label>
        <input type="password" name="new_pwd" ><br><br>

        <input type="submit" value="Aggiorna"><br>

    </form>
    <br><br>
    <footer>
        <p>Seguimi su <a class="link_footer" href="https://www.instagram.com/danielerossichef/?hl=it" target="_blank" aria-label="Profilo Instagram di Daniele Rossi Chef">Instagram</a> per altre delizie!</p>
        <p>&copy; 2023 Daniele Rossi Chef. All rights reserved.</p>
    </footer>

</body>
</html>

