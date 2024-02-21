<?php
// Recupero il valore dal form
$password_length = $_GET['length'] ?? '';

// Funzione per generare password casuale
function get_random_password ($password_length) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+[]{}|;:,.<>?';
    $random_string ='';

    for($i = 0; $i < $password_length; $i++){
        $random_string .= $characters[rand(0, mb_strlen($characters) -1)];
    }

    return $random_string;
};

$random_password=get_random_password($password_length);

var_dump($random_password);

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
                    <input type="number" class="form-control w-50" id="password" name="length" min="5">
                </div>

                <div class="buttons mt-5">
                    <button type="submit" class="btn btn-primary">Genera</button>
                    <button type="reset" class="btn btn-secondary">Annulla</button>
                </div>

            </form>
        </div>
    </main>
</body>

</html>