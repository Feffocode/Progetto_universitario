<?php
    session_start();
    include("connessione.php");
    $conn = connessione();

    if (!isset($_SESSION["username"])) {
        header("Location: Login.php");
        exit;
    }

    if ($_SESSION['ruolo'] == "utente normale") {
        $_SESSION['error_message'] = "Non sei un amministratore";
        header("Location: Login.php");
        exit;
    }

    if (!isset($_SESSION["ricetta"])) {
        $_SESSION['error_message'] = "Nessuna ricetta selezionata";
        header("Location: stampa_ricette.php");
        exit;
    }



    $id = $_SESSION["ricetta"];
    $sql = "SELECT * FROM servizi WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['error_message'] = "Ricetta non trovata.";
        header("Location: stampa_ricette.php");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $link = mysqli_real_escape_string($conn, $_POST['link']);
        $vegana = mysqli_real_escape_string($conn, $_POST['vegana']);
        $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
        
        $query = "UPDATE servizi SET nome='$nome', link='$link', vegana='$vegana', salato='$tipo' WHERE id='$id'";
        
        if (mysqli_query($conn, $query)) {
            $_SESSION['success_message'] = "Ricetta aggiornata con successo.";
            header("Location: stampa_ricette.php");
            exit;
        } else {
            $_SESSION['error_message'] = "Errore durante l'aggiornamento della ricetta.";
        }
    }

    ?>

    <!DOCTYPE html>
    <html lang="it">
    <head>
        <meta charset="UTF-8">
        <title>Modifica Ricetta</title>
        <meta name="keywords" content="cucina, influencer, ricette, html" />
        <meta name="description" content="Ricetta del Risotto al Tartufo" />
        <meta name="author" content="Federico Boccardo and Daniel Giordano" />
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
            <a href="logout.php"style='color:red;'>Effettua il Logout</a>
            <a href="profilo.php" class="profile-link"><img id="profile-icon" src="Immagini/user.png" alt="Profilo"></a>        
        </nav>
    </header>

        <h1>Modifica Ricetta</h1>

        <form method="POST" action="modifica_ricetta.php">
    
            <label>Nome:</label>
            <input type="text" name="nome"  required><br><br>
    
            <label>Link:</label>
            <input type="text" name="link" required><br><br>
    
            <label>Vegano:</label>
            <select name="vegana">
                <option value="Si" >Vegana</option>
                <option value="No">Non Vegana</option>
            </select><br><br>
    
            <label>Tipo:</label>
            <select name="tipo">
                <option value="No" >Dolce</option>
                <option value="Si" >Salato</option>
            </select><br>
    
            <br><button type="submit">Aggiorna Ricetta</button>
        </form>
    
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <footer>
           <p>Seguimi su <a class="link_footer" href="https://www.instagram.com/danielerossichef/?hl=it" target="_blank" aria-label="Profilo Instagram di Daniele Rossi Chef">Instagram</a> per altre delizie!</p>
          <p>&copy; 2023 Daniele Rossi Chef. All rights reserved.</p>
        </footer>    
    </body>
    </html>
    
    <?php
    mysqli_close($conn);
    ?>
