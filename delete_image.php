<?php
session_start();
if (!isset($_SESSION['connecte']) || $_SESSION['connecte'] !== true) {
 http_response_code(403);
 exit("Accès refusé.");
}

$input = json_decode(file_get_contents("php://input"), true);
$filename = $input['file'] ?? '';

$fullPath = __DIR__ . "/uploaded_img/" . basename($filename);

if (file_exists($fullPath)) {
 unlink($fullPath);
 echo "OK";
} else {
 echo "Fichier introuvable";
}
