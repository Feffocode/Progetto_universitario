<?php
//apriamo sessione, includiamo il file per aprire la connessione e connetterci al database
session_start();
include("connessione.php");
$conn = connessione();

if (!isset($_SESSION["username"])) {
    header("Location: Login.php");
    exit;
}


if ($_SESSION['ruolo'] == "utente normale") {
    $_SESSION['error_message'] = "Non sei un amministratore";
    header("Location: profilo.php");
    exit;
}


//gestisco le scelte dei filtri
if (isset($_GET['nome'])) {
    $nome = mysqli_real_escape_string($conn, $_GET['nome']);
} else {
    $nome = '';
}

if (isset($_GET['tipo'])) {
    $tipo = mysqli_real_escape_string($conn, $_GET['tipo']);
} else {
    $tipo = '';
}

if (isset($_GET['vegana'])) {
    $vegana = mysqli_real_escape_string($conn, $_GET['vegana']);
} else {
    $vegana = '';
}


// Costruzione della query in base ai filtri
if (!empty($nome) && !empty($tipo) && !empty($vegana)) {
    $query = "SELECT * FROM servizi WHERE nome LIKE '%$nome%' AND salato = '$tipo' AND vegana = '$vegana'";
} elseif (!empty($nome) && !empty($tipo)) {
    $query = "SELECT * FROM servizi WHERE nome LIKE '%$nome%' AND salato = '$tipo'";
} elseif (!empty($nome) && !empty($vegana)) {
    $query = "SELECT * FROM servizi WHERE nome LIKE '%$nome%' AND vegana = '$vegana'";
} elseif (!empty($tipo) && !empty($vegana)) {
    $query = "SELECT * FROM servizi WHERE salato = '$tipo' AND vegana = '$vegana'";
} elseif (!empty($nome)) {
    $query = "SELECT * FROM servizi WHERE nome LIKE '%$nome%'";
} elseif (!empty($tipo)) {
    $query = "SELECT * FROM servizi WHERE salato = '$tipo'";
} elseif (!empty($vegana)) {
    $query = "SELECT * FROM servizi WHERE vegana = '$vegana'";
} else {
    $query = "SELECT * FROM servizi";
}

$risultato = mysqli_query($conn, $query) or die("<a href='Login.php'>Errore: torna alla pagina di login!</a>");

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Visualizza ricette</title>
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
     
    <img class="img_superiore" src="immagini/servizi.png" alt="Chef all'opera">
        <p id="p_servizi">In questa sezione del sito vedremo tutte le mie ricette!</p>
        <br><br>

    <?php
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
    ?>
    
<div class="div_ricette">
    <h2>Seleziona i filtri</h2>

    <!--form per l'inserimento dei filtri-->
    <form method="GET" action="stampa_ricette.php">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $nome; ?>">

        <label>Vegano:</label>
        <select name="vegana">
            <option value="">Tutte</option>
            <option value="Si" >Vegane</option>
            <option value="No" >Non Vegane</option>
        </select>

        <label>Tipo:</label>
        <select name="tipo">
            <option value="">Tutti</option>
            <option value="No" >Dolce</option>
            <option value="Si" >Salato</option>
        </select>

        <button type="submit">Applica Filtri</button>
    </form><br><br>
</div>

    <!--Stampo le ricette in base in filtri in formato radiobox per gestire la modifica e l'eliminazione-->
    <form action="gestione_ricette.php" method="POST">
        <table border="1">
            <tr>
            <?php 
            $amministratore = $_SESSION["ruolo"];
            if($amministratore == 1){ ?><th>Seleziona</th> <?php } ?>
                <th>Nome</th>
                <th>Link</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($risultato)): ?>
            <tr>
               <?php if($amministratore == 1){ ?><td><input type="radio" name="ricetta" value="<?php echo $row['id']; ?>"></td> <?php } ?>
                <td><?php echo $row['nome']; ?></td>
               <td><a href="<?php echo $row['link']; ?>" class="btn">Apri Link</a></td>
            </tr>
            <?php endwhile; ?>
        </table><br>
        
        <?php 
            $amministratore = $_SESSION["ruolo"];
            if($amministratore == 1){ ?>
            <button type="submit" name="azione" value="elimina">Elimina Ricetta</button>
            <button type="submit" name="azione" value="modifica">Modifica Ricetta</button>
        <?php } ?>

    </form><br><br>

    <!--Form per inserire nuova ricetta-->
    <?php 
            if($amministratore == 1){ ?>
    <form method="POST" action="aggiungi_ricetta.php">
        <h2>Aggiungi Nuova Ricetta</h2>
        <label>Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label>Link:</label>
        <input type="text" name="link" required><br><br>

        <label>Vegano:</label>
        <select name="vegana">
            <option value="">Tutte</option>
            <option value="Si" >Vegane</option>
            <option value="No" >Non Vegane</option>
        </select>

        <label>Tipo:</label>
        <select name="tipo">
            <option value="">Tutti</option>
            <option value="No" >Dolce</option>
            <option value="Si" >Salato</option>
        </select>

        <br><br>
        <button type="submit">Aggiungi Ricetta</button>
    </form> <?php } ?>
    
        <?php// Se non esiste l'elemento cercato
            if (mysqli_num_rows($risultato) == 0) {
            echo "Nessun elemento presente!";};
        ?>
    
    <br><br>
    <section class="newsletter" aria-labelledby="newsletter-subscription">
        <h2 id="newsletter-subscription">Iscriviti alla Newsletter</h2>
        <form action="newsletter.php" method="POST">
            <label for="email">Indirizzo Email:</label>
            <input type="email" id="mail" name="mail" placeholder="Inserisci il tuo indirizzo email" required>
            <button type="submit">Iscriviti</button>
        </form>
    </section>

    <footer>
        <p>Seguimi su <a class="link_footer" href="https://www.instagram.com/danielerossichef/?hl=it" target="_blank" aria-label="Profilo Instagram di Daniele Rossi Chef">Instagram</a> per altre delizie!</p>
        <p>&copy; 2023 Daniele Rossi Chef. All rights reserved.</p>
    </footer>
</body>
</html>

<?php mysqli_close($conn); ?>
