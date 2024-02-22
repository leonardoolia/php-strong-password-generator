<?php
session_start();

?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Leonardo Olia">
    <title>Password generator</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body data-bs-theme="dark">
    <main>
        <div class="container">
        <?php if($_SESSION['password'] && !isset($_GET['reset'])) : ?>
    <div class="password-container mt-5">
        <h3>La tua password è:</h3>
        <p>
            <?= $_SESSION['password'] ?>
        </p>
    </div>
    <?php endif;?>  
        </div>
    </main>
</body>

</html>

