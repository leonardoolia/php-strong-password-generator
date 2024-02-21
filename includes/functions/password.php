<?php 

// Funzione per generare password casuale
function get_random_password ($password_length) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+[]{}|;:,.<>?';
    $random_string ='';

    for($i = 0; $i < $password_length; $i++){
        $random_string .= $characters[rand(0, mb_strlen($characters) -1)];
    }

    return [$random_string, $characters];
    
};

?>