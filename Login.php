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
            <h2>Login</h2>
        </nav>
    </header>

    <?php
        /*if(isset($_SESSION["username"])){ //hai gia fatto il login precedentemente
            header("Location: profilo.php");
            exit;
        }*/ //commentato solo per test
        
        if (isset($_SESSION['error_message'])) {
            echo "<p style='color:red;'>" . $_SESSION['error_message'] . "</p>";
            unset($_SESSION['error_message']);
        }
    ?>

    <form action="verifica_login.php" method="post">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
    <p>Non hai un account? <a href="Registrazione.php">Registrati</a></p>
</body>
</html>
