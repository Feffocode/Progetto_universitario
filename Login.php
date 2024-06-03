<?php
session_start();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <title>Login - La mia pagina di cucina</title>
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
    <h1>Login</h1>

    <?php
        if(isset($_SESSION["username"])){ //hai gia fatto il login precedentemente
            header("Location: profilo.php");
            exit;
        }

        if (isset($_SESSION['error_message'])) {
            echo "<p style='color:red;'>" . $_SESSION['error_message'] . "</p>";
            unset($_SESSION['error_message']);
        }
    ?>

    <form action="verifica_login.php" method="post">
        <label>Username:</label>
        <input type="text" name="username" ><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
    <p>Non hai un account? <a href="Registrazione.php">Registrati</a></p>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer>
        <p>Seguimi su <a class="link_footer" href="https://www.instagram.com/danielerossichef/?hl=it" target="_blank" aria-label="Profilo Instagram di Daniele Rossi Chef">Instagram</a> per altre delizie!</p>
        <p>&copy; 2023 Daniele Rossi Chef. All rights reserved.</p>
    </footer>
</body>
</html>
