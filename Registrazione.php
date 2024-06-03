<?php
session_start();
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

    <br>
    <h1>Registrazione</h1>
    <?php
    if (isset($_SESSION['error_message'])) {
        echo "<p style='color:red;'>" . $_SESSION['error_message'] . "</p>";
        unset($_SESSION['error_message']);
    }
    
    ?>

    <br>
    <form action="salva.php" method="post">
        
        <!-- con l'attributo required rendiamo obbligatora la compilazione di tutti i campi-->
        <label>Username:</label>
        <input type="text"  name="username" required><br><br>

        <label>Nome:</label>
        <input type="text"  name="nome" required><br><br>   

        <label>Cognome:</label>
        <input type="text"  name="cognome" required><br><br> 

        <label>Email:</label>
        <input type="email"  name="email" required><br><br> 

        <label>Password:</label>
        <input type="password"  name="password" required><br><br>  

        <label>Conferma password:</label>
        <input type="password"  name="conferma_p" required><br><br>  

        <label>Sei un amministratore:</label>
        <input type="radio" name="amministratore" value="1"> Si
        <input type="radio" name="amministratore" value="0"> No<br><br>

        <input type="submit" value="Registrati!">
    </form>

    <br><br><br><br><br><br><br><br><br><br>
    <footer>
        <p>Seguimi su <a class="link_footer" href="https://www.instagram.com/danielerossichef/?hl=it" target="_blank" aria-label="Profilo Instagram di Daniele Rossi Chef">Instagram</a> per altre delizie!</p>
        <p>&copy; 2023 Daniele Rossi Chef. All rights reserved.</p>
    </footer>
</body>
</html>
