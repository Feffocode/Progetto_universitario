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
        <h1 class="titolo_ricetta">Ricetta: Risotto al tartufo</h1>
        <div aria-labelledby="Ingredienti-ricetta">
            <br>
            <h2 id="Ingredienti-ricetta" class="padding_ricetta">Ingredienti:</h2>
            <ul> 
                <li>250 g di riso (Arborio o Carnaroli)</li> 
                <li>500 ml di brodo di verdure</li> 
                <li>2 cipolle tritate</li> 
                <li>200 g di tartufo nero tagliato a cubetti</li> 
                <li>50 g di burro</li> 
                <li>50 g di parmigiano reggiano grattugiato</li> 
                <li>250 ml di crema di cocco (opzionale)</li> 
                <li>Pangrattato e prezzemolo tritato per la presentazione</li>
            </ul> 
        </div>

        <br><br>

        <div aria-labelledby="Procedimento-ricetta">
            <h2 id="Procedimento-ricetta" class="padding_ricetta">Procedimento:</h2> 
            <ol> 
                <li>Sciacquare il riso e versarlo in una padella. Aggiungere il burro e soffriggere a fuoco medio-basso fino a quando il riso inizia a gonfiarsi.</li> 
                <li>Aggiungere il cipollo tritato e cuocere per qualche minuto. In alternativa, è possibile aggiungere 2 cucchiai di farina al riso e soffriggere fino a ottenere una salsina dorata.</li> 
                <li>Versare il brodo in padella e cuocere a fuoco lento, mescolando spesso, fino a quando il riso sarà cotto al dente. Durante la cottura, aggiungere gradualmente il tartufo e continuare a cuocere.</li> 
                <li>Togliere la padella dal fuoco e aggiungere il parmigiano reggiano grattugiato, mescolando fino a ottenere una consistenza cremosa.</li> 
                <li>Se si desidera utilizzare la crema di cocco, aggiungerla ora e mescolare fino a raggiungere la consistenza desiderata.</li> 
                <li>Condire a piacere con sale e pepe.</li> 
                <li>Prima di servire, versare il risotto al tartufo su un piatto riscaldato e spolverare con prezzemolo tritato e pangrattato.</li>
                <li>E ora... godetevi il vostro cremoso risotto al tartufo!</li>
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
