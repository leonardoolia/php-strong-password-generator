<?php

//? FUNZIONE
require __DIR__ . '/includes/functions/password.php';

//? SVOLGIMENTO

// Recupero il valore dal form e lo trasformo in numero
$password_length = isset($_GET['length']) ? intval($_GET['length']) : '';

// Controllo per l'alert

$alert_class = '';
$alert_message = '';

if ($password_length !== '') {
    $alert_class = $password_length >= 5? 'alert-success' : 'alert-danger';
    $alert_message = $password_length >= 5? 'Password generata con successo' : 'Attenzione, non hai inserito parametri validi';
}

// Funzione per password casuale
$result = get_random_password($password_length);

// Restituisco la random password
session_start();
$random_password = $result[0];
$_SESSION['password'] = $random_password; 



// Restituisco il numero dei caratteri per poi calcolare la lunghezza massima
$characters = $result[1];



// Riavvio della pagina se viene cliccato il reset button
if (isset($_GET['reset'])) {      
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
};


// Sezione di reindirizzamento
if (!isset($password_length)) {
    header('Location: ./includes/templates/printpassword.php');    
}

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

            <!-- Alert -->
            <div class="alert <?= $alert_class ?> mb-5" role="alert">
                <?= $alert_message ?>
            </div>

            <!-- Form -->
            <form method="GET" action="">

                <div class="mb-3 d-flex justify-content-between">
                    <label for="password" class="form-label fs-2">Lunghezza password (minimo 5 caratteri):</label>
                    <input type="number" class="form-control w-50" id="password" name="length" min="5"
                        max="<?= $characters ? strlen($characters) : '' ?>" value="<?= $password_length ?>">
                </div>

                <div class="buttons mt-5">
                    <button type="submit" class="btn btn-primary">Genera</button>
                    <button type="submit" class="btn btn-secondary" name="reset">Annulla</button>
                </div>

            </form>

            
        </div>
    </main>
</body>

</html>