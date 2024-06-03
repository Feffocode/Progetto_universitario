<?php 
session_start();
include("connessione.php");
$conn = connessione();

if (!isset($_SESSION["username"])) {
    header("Location: Login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <title>Risotto al tartufo</title>
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

    <img class="img_logo_ricetta" src="immagini/daniele_rossi.png" alt="Logo Daniele Rossi Chef">

    <section>
        <h1 class="titolo_ricetta">Ricetta di prova</h1>
        <div aria-labelledby="Ingredienti-ricetta">
            <br>
            <h2 id="Ingredienti-ricetta" class="padding_ricetta">Ingredienti:</h2>
            <ul> 
                <li>Ingrediente 1: </li> 
                <li>Ingrediente 2: </li> 
                <li>Ingrediente 3: </li> 
                <li>ecc...</li> 
            </ul> 
        </div>

        <br><br>

        <div aria-labelledby="Procedimento-ricetta">
            <h2 id="Procedimento-ricetta" class="padding_ricetta">Procedimento:</h2> 
            <ol> 
                <li>Passaggio 1: </li> 
                <li>Passaggio 2: </li>
                <li>Passaggio 3: </li> 
                <li>ecc...</li>
            </ol>
        </div>
    </section>

    <br><br>
    </section>

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
