<?php
session_start();

if (!isset($_SESSION['connecte']) || $_SESSION['connecte'] !== true) {
 http_response_code(403);
 echo "Non autorisé";
 exit;
}

// Lecture et décodage des données envoyées
$data = json_decode(file_get_contents('php://input'), true);

if ($data === null || !isset($data['__page'])) {
 http_response_code(400);
 echo "Données invalides ou page non spécifiée";
 exit;
}

$page = $data['__page'];
unset($data['__page']); // Supprime la clé spéciale

$contenu = [];

// Lecture du fichier JSON existant
$contenuPath = __DIR__ . '/data/contenu.json';
if (file_exists($contenuPath)) {
 $jsonRaw = file_get_contents($contenuPath);
 $contenu = json_decode($jsonRaw, true);
 if (!is_array($contenu)) {
  $contenu = []; // Protection si JSON corrompu
 }
}

// Initialise la page si besoin
if (!isset($contenu[$page])) {
 $contenu[$page] = [];
}

// Mise à jour des champs
foreach ($data as $key => $value) {
 // Suppression explicite (depuis bouton delete-content)
 if (is_null($value)) {
  unset($contenu[$page][$key]);
  continue;
 }

 // Nettoyage du HTML vide
 $clean = trim($value);
 $cleanStripped = preg_replace('/\s|&nbsp;/', '', $clean);

 // Détection des balises vides
 if (preg_match('/^<(p|div|h[1-6])>(<br>|&nbsp;)?<\/\1>$/i', $cleanStripped)) {
  unset($contenu[$page][$key]); // considéré vide => suppression
 } else {
  $contenu[$page][$key] = $value; // sinon on sauvegarde
 }
}

// Sauvegarde
file_put_contents($contenuPath, json_encode($contenu, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
echo "OK";
