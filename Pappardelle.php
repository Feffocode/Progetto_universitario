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
    <title>Pappardelle al ragù di cinghiale</title>
    <meta name="keywords" content="cucina, influencer, ricette, html" />
    <meta name="description" content="Ricetta delle pappardelle al ragù di cinghiale" />
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
        <h1 class="titolo_ricetta">Ricetta: Pappardelle al Ragù di Cinghiale</h1>
        <div aria-labelledby="Ingredienti-ricetta">
            <br>
            <h2 id="Ingredienti-ricetta" class="padding_ricetta">Ingredienti:</h2>
            <ul>
                <li>500g di pappardelle fresche</li>
                <li>400g di carne di cinghiale macinata</li>
                <li>1 cipolla, tritata</li>
                <li>2 carote, tritate</li>
                <li>2 gambi di sedano, tritati</li>
                <li>2 spicchi d'aglio, tritati</li>
                <li>1 lattina (400g) di pomodori pelati</li>
                <li>200ml di vino rosso</li>
                <li>200ml di brodo di carne</li>
                <li>2 cucchiai di concentrato di pomodoro</li>
                <li>Olio d'oliva extra vergine</li>
                <li>Sale e pepe nero q.b.</li>
                <li>Formaggio grattugiato per servire</li>
            </ul>
        </div>
        <br>

        <div aria-labelledby="Procedimento-ricetta">
            <h2 id="Procedimento-ricetta" class="padding_ricetta">Procedimento:</h2>
            <ol>
                <li>In una grande pentola, scaldare dell'olio d'oliva e rosolare la carne di cinghiale macinata fino a doratura.</li>
                <li>Aggiungere cipolla, carote, sedano e aglio tritati. Cuocere fino a che le verdure sono tenere.</li>
                <li>Versare il vino rosso e far evaporare l'alcol.</li>
                <li>Aggiungere i pomodori pelati schiacciati, il concentrato di pomodoro e il brodo di carne. Mescolare bene.</li>
                <li>Coprire e cuocere a fuoco lento per almeno 2 ore, mescolando di tanto in tanto.</li>
                <li>Cuocere le pappardelle in acqua salata seguendo le istruzioni sulla confezione.</li>
                <li>Condire le pappardelle con il ragù di cinghiale e servire con formaggio grattugiato.</li>
            </ol>
        </div>
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
