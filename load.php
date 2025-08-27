<?php
header('Content-Type: application/json');

$page = basename($_SERVER['REQUEST_URI'], ".php") ?: "index";

$contenu = [];

if (file_exists('data/contenu.json')) {
 $json = json_decode(file_get_contents('data/contenu.json'), true);
 if (isset($json[$page])) {
  $contenu = $json[$page];
 }
}

echo json_encode($contenu);
