<?php
    session_start();
    include("connessione.php");
    $conn = connessione();

    if (!isset($_SESSION["username"])) {
        header("Location: Index.php");
        exit;
    }

    if ($_SESSION['ruolo'] == "utente normale") {
        $_SESSION['error_message'] = "Non sei un amministratore";
        header("Location: profilo.php");
        exit;
    }

    // Funzione per eliminare utenti
    if (isset($_POST['delete_users'])) {
        $usernamesToDelete = $_POST['usernames'];
        foreach ($usernamesToDelete as $usernameToDelete) {
            // Sanitizzazione del dato per prevenire le iniezioni SQL 
            $usernameToDelete = mysqli_real_escape_string($conn, $usernameToDelete);
            $sql = "DELETE FROM utenti WHERE username = '$usernameToDelete'";
            if (mysqli_query($conn, $sql)) {
                $_SESSION['success_message'] = "Utente '$usernameToDelete' eliminato con successo.";
            } else {
                $_SESSION['error_message'] = "Errore nell'eliminazione dell'utente '$usernameToDelete': " . mysqli_error($conn);
            }
        }
    }

    // Recupera tutti gli utenti dal database
    $sql = "SELECT username, nome, cognome, mail FROM utenti";
    $result = mysqli_query($conn, $sql);
    ?>

    <!DOCTYPE html>
    <html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestione Utenti</title>
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

        <br><br>
        <h1>Gestione Utenti Registrati</h1>

        <?php
        if (isset($_SESSION['success_message'])) {
            echo "<p style='color:green'>" . $_SESSION['success_message'] . "</p>";
            unset($_SESSION['success_message']);
        }
        
        if (isset($_SESSION['error_message'])) {
            echo "<p style='color:red'>" . $_SESSION['error_message'] . "</p>";
            unset($_SESSION['error_message']);
        }
        ?>

        <form action="gestione_utenti.php" method="post">
            <table border="1">
                <tr>
                    <th>Seleziona</th>
                    <th>Username</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Email</th>
                </tr>

                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                <td><input type="checkbox" name="usernames[]" value="<?php echo $row['username']; ?>"></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['cognome']; ?></td>
                <td><?php echo $row['mail']; ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
            <br>
            <button type="submit" name="delete_users">Elimina Utenti Selezionati</button>
        </form>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <footer>
        <p>Seguimi su <a class="link_footer" href="https://www.instagram.com/danielerossichef/?hl=it" target="_blank" aria-label="Profilo Instagram di Daniele Rossi Chef">Instagram</a> per altre delizie!</p>
        <p>&copy; 2023 Daniele Rossi Chef. All rights reserved.</p>
    </footer>

    </body>
    </html>

<?php
    mysqli_close($conn);
?>
