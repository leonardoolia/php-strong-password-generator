<?php
// Recupero il valore dal form
$password_length = $_GET['length'] ?? '';

include __DIR__ . '/includes/functions/password.php';


$result = get_random_password($password_length);

// Restituisco la random password
$random_password = $result[0];

// Restituisco il numero dei caratteri per poi calcolare la lunghezza massima
$characters = $result[1];

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
    <header>
        <div class="container d-flex justify-content-center align-items-center flex-column my-5">
            <h1>Strong Password Generator</h1>
            <h2>Genera una password sicura</h2>
        </div>
    </header>
    <main>
        <div class="container">
            <form method="GET" action="">

                <div class="mb-3 d-flex justify-content-between">
                    <label for="password" class="form-label fs-2">Lunghezza password (minimo 5 caratteri):</label>
                    <input type="number" class="form-control w-50" id="password" name="length" min="5" max="<?= $characters ? strlen($characters) : '' ?>" value="<?= $password_length ?>">
                </div>

                <div class="buttons mt-5">
                    <button type="submit" class="btn btn-primary">Genera</button>
                    <button type="reset" class="btn btn-secondary">Annulla</button>
                </div>

            </form>

            <?php if($random_password) : ?>
            <div class="password-container mt-5" >
                <h3>La tua password è:</h3>
                <p><?= $random_password ?></p>
            </div>
            <?php endif;?>
        </div>
    </main>
</body>

</html>