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
    <title>Gelato al latte di cocco</title>
    <meta name="keywords" content="cucina, influencer, ricette, html" />
    <meta name="description" content="Ricetta del gelato al latte di cocco" />
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
        <h1 class="titolo_ricetta">Ricetta: Gelato al latte di cocco</h1>
        <div aria-labelledby="Ingredienti-ricetta">
            <br>
            <h2 id="Ingredienti-ricetta" class="padding_ricetta">Ingredienti:</h2>
            <ul>
                <li>400 ml di latte di cocco (preferibilmente intero per una consistenza più cremosa)</li>
                <li>200 ml di latte di mandorla o altro latte vegetale</li>
                <li>150 g di zucchero di canna</li>
                <li>1 cucchiaino di estratto di vaniglia</li>
                <li>Un pizzico di sale</li>
            </ul>
            
        </div>
        <br>

        <div aria-labelledby="Procedimento-ricetta">
            <h2 id="Procedimento-ricetta" class="padding_ricetta">Procedimento:</h2>
            <ul>
                <li><strong>Preparazione della base del gelato:</strong></li>
                <ul>
                    <li>In una casseruola, unisci il latte di cocco, il latte di mandorla, lo zucchero di canna, l'estratto di vaniglia e un pizzico di sale.</li>
                    <li>Mescola bene gli ingredienti a fuoco medio fino a quando lo zucchero si è completamente sciolto. Non è necessario portare a ebollizione, basta riscaldare il composto fino a quando è ben amalgamato.</li>
                </ul>
                <li><strong>Raffreddamento:</strong></li>
                <ul>
                    <li>Rimuovi la casseruola dal fuoco e lascia raffreddare il composto a temperatura ambiente.</li>
                    <li>Una volta raffreddato, trasferisci il composto in un contenitore con coperchio e mettilo in frigorifero per almeno 4 ore, o preferibilmente per tutta la notte. Il composto deve essere ben freddo prima di passare alla fase successiva.</li>
                </ul>
                <li><strong>Mantecare il gelato:</strong></li>
                <ul>
                    <li>Versa il composto freddo nella gelatiera e segui le istruzioni del produttore per mantecare il gelato. Di solito, questo processo richiede circa 20-30 minuti.</li>
                </ul>
                <li><strong>Congelamento:</strong></li>
                <ul>
                    <li>Una volta che il gelato ha raggiunto una consistenza morbida e cremosa, trasferiscilo in un contenitore ermetico e mettilo nel congelatore per almeno 2-3 ore per farlo solidificare ulteriormente.</li>
                </ul>
                <li><strong>Servire:</strong></li>
                <ul>
                    <li>Prima di servire, lascia il gelato a temperatura ambiente per qualche minuto in modo che sia più facile da scooping. Puoi guarnirlo con scaglie di cocco, frutta fresca o cioccolato fondente grattugiato.</li>
                </ul>
            </ul>
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
