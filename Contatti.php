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
        <title> Come contattarmi </title>
        <meta name="keywords" content="cucina, influencer, ricette, html" />
        <meta name="description" content="Come contattarmi" />
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
      <?php } ?> <!-- controlliamo che l'utente abbia effetuato o meno il login, in base a ciò faremo comparire o meno il tasto di logout -->
      <a href="profilo.php" class="profile-link"><img id="profile-icon" src="Immagini/user.png" alt="Profilo"></a>    
    </nav>
  </header>

    <div class="box_storia">
    
      <!-- <img id="img_contatti" src="Immagini/chef_contatti.png" alt="immagine dello chef"> -->
    
      <div id="paragrafo_contatti" aria-labelledby="titolo_contatto">
          <h2 id="titolo_contatto">Ecco come fare per contattarmi</h2>
            <p>Sei un’azienda, un ristorante o un appassionato di cucina e ti piacerebbe collaborare?
            Vieni a seguirmi sui miei canali social e scrivimi un messaggio in privato, io ed il mio team ti risponderemo il prima possibile!
            </p>
      </div>
    </div>
  
  <br><br>

  <section id="socials">
    <h2 id="h2_space">SEGUIMI SUI MIEI CANALI SOCIAL!</h2>
    <div id="socialBox">
      <img class="social" src="Immagini/tiktok.png" alt="logo tiktok">
      <a class="social_link" href="https://www.tiktok.com/@danielerossichef" target="_blank">Titkok</a>
      <br><br>
      
      <img class="social" src="Immagini/instagram.png" alt="logo instagram">
      <a class="social_link" href="https://www.instagram.com/danielerossichef/?hl=it" target="_blank">Instagram</a>
      <br><br>
      
      <img class="social" src="Immagini/facebook.png" alt="logo facebook">
      <a class="social_link" href="https://www.facebook.com/danielerossichef" target="_blank">Facebook</a>
      <br><br> 
    </div>
  </section>

  <br>
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
    mysqli_close($conn); //chiudiamo connessione
?>