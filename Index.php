<?php 
session_start();
include("connessione.php");
$conn = connessione();
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8" />
        <title> La mia pagina di cucina </title>
        <meta name="keywords" content="cucina, influencer, ricette, html" />
        <meta name="description" content="La mia pagina di cucina" />
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


    <div id="video-section">
        <video autoplay muted loop>
            <source src="Video/Sfondo.mp4" type="video/mp4">
            Il tuo browser non supporta la riproduzione di video.
        </video>

        <div class="frase">
            <p>"La cucina è per me espressione, è voler tirar fuori tutto ciò che di più intimo e complesso ho dentro"</p>
        </div>
    </div>


    <div id="sponsors">
        <div id="sponsorContainer">
            <img class="sponsor" src="Immagini/sponsor1.png" alt="Sponsor DeAgostini">
            <img class="sponsor" src="Immagini/sponsor2.png" alt="Sponsor La Repubblica">
            <img class="sponsor" src="Immagini/sponsor3.png" alt="Sponsor Sky">
            <img class="sponsor" src="Immagini/logo-corriere.png" alt="Sponsor Corriere della sera">
            <img class="sponsor" src="Immagini/logo-Forbes-1024x576.png" alt="Sponsor Forbes">
            <img class="sponsor" src="Immagini/Giallo-Zafferano.png" alt="Sponsor Giallo Zafferano">
        </div>
    </div>

        <div class="box_storia">
    
            <img id="img_chef_index" src="Immagini/Index1.png" alt="immagine chef Daniele Rossi con verdura">
          
            <aside class="Paragrafo" aria-labelledby="paragrafo1-heading">
                <h2 id="paragrafo1-heading">La mia passione in cucina</h2>
                    <p>Devo tutto il mio amore per la cucina e per i fornelli a 
                    mia nonna, grazie a lei da piccolo ho scoperto questo magico 
                    mondo, ho iniziato a giocare con i primi ingredienti e da lì 
                    non mi sono più fermato.
                
                    Tutto è nato come un gioco ma oggi la mia passione è diventata 
                    il mio lavoro e grazie ai social network cerco d’ispirare migliaia
                    di persone con le mie creazioni"
                </p>
            </aside>
        </div>

        <div class="box_storia">
            <aside class="Paragrafo" aria-labelledby="paragrafo2-heading">
                <h2 id="paragrafo2-heading">Dove ogni scarto è prezioso</h2>
                    <p>Tutte le mie creazioni in cucina nascono sempre da 
                    un’idea precisa che cerco di trasmettere a chiunque mi 
                    segua: di ogni ingrediente non si butta via nulla, 
                    perché da una semplice buccia possiamo ricavare una 
                    polvere che a sua volta può diventare il dettaglio 
                    vincente di un piatto unico e in più eliminiamo gli
                    sprechi rispettando la nostra amata terra."
                </p>
            </aside>
            
            <img id="img_piatto_index" src="Immagini/Index2.jpg" alt="immagine spaghetti al sugo gourmet">
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