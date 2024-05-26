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
            <h2>Registrazione</h2>
        </nav>
    </header>

    <?php
    if (isset($_SESSION['error_message'])) {
        echo "<p style='color:red;'>" . $_SESSION['error_message'] . "</p>";
        unset($_SESSION['error_message']);
    }
    ?>

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

        <input type="submit" value="registrati">
    </form>
</body>
</html>
