<?php
header("Content-Type: application/json");

$uploadDir = __DIR__ . "/uploaded_img/";
$relativePath = "uploaded_img/";

if (!is_dir($uploadDir)) {
 mkdir($uploadDir, 0755, true);
}

if (!empty($_FILES)) {
 $file = reset($_FILES);

 if ($file["error"] === UPLOAD_ERR_OK) {
  $tmpPath = $file["tmp_name"];
  $originalName = basename($file["name"]);

  // Contenu binaire du fichier temporaire
  $tmpContent = file_get_contents($tmpPath);

  // Vérifie s'il existe déjà un fichier identique
  $existingFile = null;
  foreach (scandir($uploadDir) as $existing) {
   $existingPath = $uploadDir . $existing;

   if (is_file($existingPath) && filesize($existingPath) === filesize($tmpPath)) {
    if (file_get_contents($existingPath) === $tmpContent) {
     $existingFile = $existing;
     break;
    }
   }
  }

  if ($existingFile) {
   // Fichier déjà existant, on le réutilise
   echo json_encode([
    'result' => [[
     'url' => $relativePath . $existingFile,
     'name' => $existingFile,
     'size' => filesize($uploadDir . $existingFile)
    ]],
    'errorMessage' => '',
    'resultCode' => 'success'
   ]);
   exit;
  }

  // Fichier nouveau : on génère un nom basé sur son hash
  $fileHash = sha1($tmpContent);
  $fileName = $fileHash . "_" . $originalName;
  $destination = $uploadDir . $fileName;

  if (move_uploaded_file($tmpPath, $destination)) {
   echo json_encode([
    'result' => [[
     'url' => $relativePath . $fileName,
     'name' => $fileName,
     'size' => filesize($destination)
    ]],
    'errorMessage' => '',
    'resultCode' => 'success'
   ]);
   exit;
  }
 }
}

echo json_encode([
 'result' => [],
 'errorMessage' => 'Aucun fichier reçu ou erreur.',
 'resultCode' => 'error'
]);
