<?php 
//apriamo sessione, includiamo il file per aprire la connessione e connetterci al database
session_start();
include("connessione.php");
$conn = connessione();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <title>La mia cucina</title>
    <meta name="keywords" content="cucina, influencer, ricette, html" />
    <meta name="description" content="La mia cucina" />
    <meta name="author" content="Federico Boccardo and Daniel Giordano" />
    <link rel="stylesheet" type="text/css" href="style.css" />
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
            <?php } ?> <!-- controlliamo che l'utente abbia effetuato o meno il login, in base a ciò faremo comparire o meno il tasto di logout --> 
            <a href="profilo.php" class="profile-link"><img id="profile-icon" src="Immagini/user.png" alt="Profilo"></a>        
        </nav>
    </header>

    <div>
        <img class="img_superiore" src="immagini/carote.png" alt="Chef con due mazzi di carote in mano" />

        <div class="frase">
            <p>"Tradizione italiana, innovazione e sostenibilita' sono i punti cardine alla base del mio credo!"</p>
        </div>

        <div class="box_storia">
            <img id="img_cibo" src="Immagini/cibo.png" alt="Cibo gourmet" />

            <div id="paragrafo_cucina" aria-labelledby="paragrafo-heading">
                <h2 id="paragrafo-heading">La mia cucina: una continua sperimentazione tra passato e futuro</h2>
                <p>La mia tipologia di cucina e' improntata su uno stile moderno e raffinato,
                ma riprendendo e mai dimenticando il passato. Tradizione italiana, innovazione e sostenibilita' sono
                infatti i punti cardine alla base del mio credo. E' per me vitale sfruttare la materia al 100%, dando
                il giusto valore a cio' che sarebbe altrimenti considerato scarto.
                Cerco di trasmettere la mia cucina attraverso i miei occhi, le mie espressioni e sensazioni…
                </p>
            </div>
        </div>
    </div>

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

<?php
    mysqli_close($conn);
?>