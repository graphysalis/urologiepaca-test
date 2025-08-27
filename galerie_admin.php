<?php
session_start();
$isAdmin = isset($_SESSION['connecte']) && $_SESSION['connecte'] === true;

if (!$isAdmin) {
  http_response_code(403);
  exit("Accès refusé.");
}

$dir = __DIR__ . "/uploaded_img/";
$webPath = "uploaded_img/";

$images = array_filter(glob($dir . "*.{jpg,jpeg,png,webp,gif}", GLOB_BRACE), 'is_file');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
 <meta charset="UTF-8">
 <style>
 body {
  font-family: sans-serif;
  margin: 0;
  padding: 10px;
  background: #f3f3f3;
 }

 span {
  color: #0f4b73;
 }

 .grid {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
 }

 .thumb {
  position: relative;
  width: 100px;
  height: 100px;
  overflow: hidden;
  border: 1px solid #ccc;
 }

 .thumb img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  cursor: grab;
 }

 .thumb button {
  position: absolute;
  top: 2px;
  right: 2px;
  background: rgba(255, 0, 0, 0.7);
  border: none;
  color: white;
  font-weight: bold;
  cursor: pointer;
 }
 </style>
</head>

<body>
 <?php if (!empty($images)): ?>
 <div class="grid">
  <?php foreach ($images as $img):
        $filename = basename($img); ?>
  <div class="thumb" data-file="<?= $filename ?>">
   <img src="<?= $webPath . $filename ?>" alt="<?= $filename ?>">
   <button onclick="deleteImage('<?= $filename ?>')">✖</button>
  </div>
  <?php endforeach; ?>
 </div>
 <?php else: ?>
 <span>La GALERIE D'IMAGES est vide!</span>
 <?php endif; ?>

 </div>

 <script>
 function deleteImage(filename) {
  if (!confirm(
    " ⚠ Cette action entrainera la suppression définitive de l'image. Supprimer cette image de la GALERIE ?"))
   return;

  fetch("delete_image.php", {
    method: "POST",
    headers: {
     "Content-Type": "application/json",
    },
    body: JSON.stringify({
     file: filename
    }),
   })
   .then((res) => res.text())
   .then((response) => {
    if (response === "OK") {
     document.querySelector('[data-file="' + filename + '"]').remove();
     location.reload();
    } else {
     alert("Erreur : " + response);
    }
   });
 }
 </script>
</body>

</html>