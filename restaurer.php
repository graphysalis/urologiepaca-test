<?php
session_start();

if (!isset($_SESSION['connecte']) || $_SESSION['connecte'] !== true) {
 http_response_code(403);
 echo "Non autorisé.";
 exit;
}

$page = basename($_SERVER['HTTP_REFERER'], ".php") ?: "index";

$source = __DIR__ . '/data/contenu_default.json';
$destination = __DIR__ . '/data/contenu.json';

if (!file_exists($source)) {
 http_response_code(404);
 echo "Fichier original introuvable.";
 exit;
}

$default = json_decode(file_get_contents($source), true);
$contenu = json_decode(file_get_contents($destination), true);

if (!isset($default[$page])) {
 http_response_code(404);
 echo "Page non trouvée dans les contenus par défaut.";
 exit;
}

$contenu[$page] = $default[$page];
file_put_contents($destination, json_encode($contenu, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

echo "Contenu de la page restauré avec succès.";
