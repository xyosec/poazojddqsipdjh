<?php
if ($_SERVER['HTTP_HOST'] === 'monlien.com' && $_SERVER['REQUEST_URI'] === '/') {
    header('Location: /Se-connecter.php');
    exit();
}
?>
<?php

/**
 * Récupère l'adresse IP du visiteur (en tenant compte de Cloudflare si nécessaire).
 *
 * @return string IP de l'utilisateur
 */
function getUserIP() {
    // Si Cloudflare est utilisé, on récupère l'IP réelle depuis "HTTP_CF_CONNECTING_IP"
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }

    $client  = $_SERVER['HTTP_CLIENT_IP']     ?? '';
    $forward = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? '';
    $remote  = $_SERVER['REMOTE_ADDR']          ?? '';

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        return $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        return $forward;
    } else {
        return $remote;
    }
}

/**
 * Interroge l'API IPinfo pour obtenir des informations sur l'IP fournie, avec un token.
 *
 * @param string $ip    L'adresse IP à vérifier
 * @param string $token Token IPinfo
 *
 * @return array|null Données JSON décodées ou NULL en cas d'échec
 */
function getIpInfo($ip, $token) {
    $url = "https://ipinfo.io/{$ip}/json?token={$token}";

    // Initialisation de la session cURL
    $ch = curl_init($url);

    // Options cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // Récupère la réponse sous forme de chaîne
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false); // Ne pas suivre les redirections
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);  // Vérifier le certificat SSL (recommandé)

    // Exécution de la requête
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Fermeture de la session cURL
    curl_close($ch);

    // Vérification du code de statut HTTP et de la réponse
    if ($httpCode !== 200 || $response === false) {
        return null;
    }

    // Décodage JSON
    $data = json_decode($response, true);

    // Vérification que la réponse JSON est valide
    if (!is_array($data)) {
        return null;
    }

    return $data;
}

// Liste des régions acceptées
$accepted_regions = [
    'Auvergne-Rhône-Alpes', 
    'Bourgogne-Franche-Comté', 
    'Brittany', 
    'Centre-Val de Loire',
    'Corsica', 
    'Grand Est', 
    'Hauts-de-France', 
    'Île-de-France', 
    'Normandy', 
    'New Aquitaine',
    'Occitanie', 
    'Pays de la Loire', 
    'Provence-Alpes-Côte d\'Azur'
];

// Récupération de l'IP de l'utilisateur
$ip = getUserIP();

// Liste de tokens IPinfo à tester (remplacez-les par vos propres tokens)
$tokens = ["d05712be011d42", "4f38a57cfa05ed"];

// Variable qui contiendra les informations IP
$ipinfo_data = null;

// On essaie chaque token jusqu'à ce qu'on obtienne une réponse valide
foreach ($tokens as $token) {
    $ipinfo_data = getIpInfo($ip, $token);
    if ($ipinfo_data !== null) {
        // On a eu une réponse valide, on sort de la boucle
        break;
    }
}

// Vérification du résultat
if ($ipinfo_data === null) {
    // Si on ne peut pas obtenir les infos de l'IP (tous les tokens ont échoué),
    // on bloque l'accès par mesure de sécurité.
    header('HTTP/1.0 403 Forbidden');
    echo "Notre site est actuellement en cours de maintenance afin d'améliorer votre expérience. Nous serons de retour très bientôt !";
    exit();
}

// Maintenant, on sait qu'on a des infos IP. On vérifie la région.
$user_region = $ipinfo_data['region'] ?? null;

// Si la région n'est pas définie ou pas dans la liste acceptée, on bloque.
if (!$user_region || !in_array($user_region, $accepted_regions)) {
    header('HTTP/1.0 403 Forbidden');
    echo "Notre site est actuellement en cours de maintenance afin d'améliorer votre expérience. Nous serons de retour très bientôt !";
    exit();
}

// Si on arrive ici, c'est que l'utilisateur est dans une région acceptée.
// Vous pouvez poursuivre avec le reste de votre code.
?>
