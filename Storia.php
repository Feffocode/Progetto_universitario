<?php 
session_start();
include("connessione.php");
$conn = connessione();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <title>La mia storia</title>
    <meta name="keywords" content="cucina, influencer, ricette, html" />
    <meta name="description" content="La mia storia" />
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
            <?php if(isset($_SESSION["username"])){ ?>
            <a href="logout.php"style='color:red;'>Effettua il Logout</a>
            <?php } ?>            
            <a href="profilo.php" class="profile-link"><img id="profile-icon" src="Immagini/user.png" alt="Profilo"></a>
        </nav>
    </header>


    <div>
        <img id="immagine_sfondo" src="Immagini/Sfondo.jpg" alt="Daniele Rossi con braccia incrociate">
        <div class="frase" aria-labelledby="frase-heading">
            <p id="frase-heading">"La cucina è per me espressione, è voler tirar fuori tutto ciò che di più intimo e complesso ho dentro"</p>
        </div>
    </div>


    <div class="box_storia">
        <img id="immagine_chef" src="Immagini/Chef_Storia.png" alt="Chef Rossi con utensili da cucina">
        <div class="Paragrafo" aria-labelledby="paragrafo-heading">
            <h2 id="paragrafo-heading">Chi è Daniele Rossi</h2>
            <p>"Sono Daniele Rossi, digital creator e chef consultant, un consulente che i 
                ristoranti chiamano per aggiornare, talvolta rivoluzionare, il proprio menu 
                e il proprio concept in generale. Sei anni fa ho aperto il mio profilo Instagram 
                e la mia popolarita' e' esplosa. Credo di aver sempre saputo che la cucina era la mia strada, 
                ed e' in famiglia che e' nata la mia voglia di cucinare: dai piatti semplici della tradizione 
                preparati con mia nonna e mia mamma, ai fine settimana passati ad aiutare i miei zii nelle 
                loro pasticcerie a Firenze. Poi sono arrivate la scuola alberghiera e i primi stage inizialmente 
                in Toscana, poi a New York, in Francia, in Spagna, a Budapest, a Vienna, in Ucraina, ad Istanbul… 
                cercando sempre di approfondire la cucina e la cultura dei vari paesi. Tornato in Italia, ho 
                trascorso tre anni in un ristorante con il quale abbiamo ottenuto una stella Michelin, per poi 
                dedicarmi sempre di piu' alle consulenze e alla creazione di contenuti per i social. 
                Tutti i giorni mi impegno per portare sui miei canali una grande varieta' di contenuti, 
                dove esploro il mondo della cucina a 360 gradi e posso dire con soddisfazione di essere riuscito 
                a creare una bellissima community, basata sulla condivisione, il rispetto e lo scambio di idee."</p>
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
