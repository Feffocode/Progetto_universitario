<?php
    include("connessione.php");
    session_start();
    $conn = connessione();

    if (!isset($_SESSION["username"])) {
        header("Location: Login.php");
        exit;
    }

    $username = $_SESSION["username"];
    $amministratore = $_SESSION["amministratore"];

    if ($amministratore == 1) { //se l'utente è amministratore
        $ruolo = "amministratore";
    } else {
        $ruolo = "utente normale"; //se l'utente non è amministratore
    }

    $sql = "SELECT * FROM utenti WHERE username = '$username'";
    $risultato = mysqli_query($conn, $sql) or die("<a href='index.php'>Errore! Torna alla pagina di login</a>");
    $user = mysqli_fetch_assoc($risultato);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Profilo - La mia pagina di cucina</title>
</head>
<body>
    <a href="Index.php">Home</a>
    <br>

    <!-- Stampo i dati dell'utente -->
    <h2>Area personale</h2>
    <b>Nome:</b> <?php echo $user["nome"]; ?><br><br>
    <b>Cognome:</b> <?php echo $user["cognome"]; ?><br><br>
    <b>Username:</b> <?php echo $user["username"]; ?><br><br>
    <b>Email:</b> <?php echo $user["mail"]; ?><br><br>
    <b>Ruolo:</b> <?php echo $ruolo; ?><br><br>

    <!-- Modulo per aggiornare i dati -->
    <h2>Modifica i tuoi dati</h2>
    <form action="update_profile.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $userData["nome"]; ?>" required><br><br>

        <label for="cognome">Cognome:</label>
        <input type="text" name="cognome" id="cognome" value="<?php echo $userData["cognome"]; ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $userData["mail"]; ?>" required><br><br>

        <input type="submit" value="Aggiorna">
    </form>
</body>
</html>
