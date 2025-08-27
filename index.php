<?php
session_start();
$isAdmin = isset($_SESSION['connecte']) && $_SESSION['connecte'] === true;
$_SESSION['previous_page'] = basename($_SERVER['REQUEST_URI']);

$page = basename($_SERVER['SCRIPT_NAME'], '.php');
$contenu = json_decode(file_get_contents(__DIR__ . '/data/contenu.json'), true);
$contenuPage = isset($contenu[$page]) ? $contenu[$page] : [];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
 <meta charset="UTF-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <meta name="keywords"
  content="chirurgien, urologue, consultation urologique, cancer, problèmes urinaires, prostate, Dr Jeglinschi" />
 <meta name="description"
  content="Découvrez le site du Docteur Stefan Jeglinschi, Chirurgien urologue à Nice, offrant des consultations spécialisées et des informations pratiques sur les soins urologiques. Prenez rendez-vous facilement." />
 <title>Dr Stefan Jeglinschi | Chirurgien urologue | Accueil</title>
 <link rel="icon" type="image/png" sizes="96x96" href="./assets/images/logo02blue.png" />
 <link rel="stylesheet" href="./assets/robotoFont.css" />
 <link rel="stylesheet" href="./assets/style.css" />
 <?php if (!$isAdmin): ?>
 <link rel="stylesheet" href="./assets/carousel.css" />
 <link rel="stylesheet" href="./assets/anim.css" />
 <?php endif; ?>

 <?php
  $hasEditableSection2 = !empty($contenuPage['accueil_section2_h2']) ||
    !empty($contenuPage['accueil_section2_img']) ||
    !empty($contenuPage['accueil_section2_p']) ||
    $isAdmin;

  $hasEditableSection3 = !empty($contenuPage['accueil_section3_h2']) ||
    !empty($contenuPage['accueil_section3_img']) ||
    !empty($contenuPage['accueil_section3_p']) ||
    $isAdmin;

  $hasEditableSection4 = !empty($contenuPage['accueil_section4_h2']) ||
    !empty($contenuPage['accueil_section4_img']) ||
    !empty($contenuPage['accueil_section4_p']) ||
    $isAdmin;
  ?>

 <?php if ($hasEditableSection2): ?>
 <link rel="stylesheet" href="./assets/editableContent-section2.css">
 <?php endif; ?>

 <?php if ($hasEditableSection3): ?>
 <link rel="stylesheet" href="./assets/editableContent-section3.css">
 <?php endif; ?>

 <?php if ($hasEditableSection4): ?>
 <link rel="stylesheet" href="./assets/editableContent-section4.css">
 <?php endif; ?>
 <link rel="stylesheet" href="./assets/media.css" />

 <?php if ($isAdmin): ?>
 <link rel="stylesheet" href="./js/suneditor/dist/css/suneditor.min.css">
 <script src="js/suneditor/dist/suneditor.min.js"></script>
 <script src="js/suneditor/src/lang/fr.js"></script>
 <link rel="stylesheet" href="./assets/adminMode.css">
 <?php endif; ?>
</head>

<body>
 <div id="adminBar" style="display: <?= $isAdmin ? 'block' : 'none' ?>;"></div>

 <?php if ($isAdmin): ?>
 <div class="galeryBtn">
  <div class="open-close">🖼️
   <br>GALERIE<br>D'IMAGES
  </div>
 </div>
 <iframe id="galeryFrame" src="galerie_admin.php" class="galeryFrame" width="100%" height="120"
  style="border:2px solid #0f4b73;"></iframe>
 <?php endif; ?>

 <div class="headerBg"></div>
 <header>
  <div class="headerTop">
   <div class="logoDrName">
    <div class="logoStem">
     <div class="logoKidney"></div>
    </div>
    <div class="DrName"></div>
    <div class="contactUs">
     <a href="contact.php" aria-label="vers la page contact" class="btn btn-rdv">Prendre rendez-vous</a>
    </div>
   </div>
   <div class="speciality">Chirurgien Urologue</div>
  </div>
 </header>
 <div class="headerNavBg">
  <div class="logo"></div>
  <div class="title">Dr Stefan Jeglinschi</div>
 </div>
 <div class="headerNav">
  <div class="titleAndBtn">
   <div class="btnMenu" id="menu">
    <div class="btnMenuTxt">Menu</div>
    <div class="btnMenuItem it1"></div>
    <div class="btnMenuItem it2"></div>
    <div class="btnMenuItem it3"></div>
   </div>
  </div>
  <nav>
   <ul class="navUl">
    <li>
     <a class="menu-link active" href="index.php" aria-label="Accueil">Accueil</a>
    </li>
    <li>
     <a class="menu-link" href="expertise.php" aria-label="Expertise">Expertise</a>
    </li>
    <li>
     <a class="menu-link" href="contact.php" aria-label="Contact">Contact</a>
    </li>
    <li>
     <a class="menu-link" href="travaux.php" aria-label="Travaux et publications">Travaux & publications</a>
    </li>
    <li>
     <a class="menu-link" href="robotique.php" aria-label="La chirurgie robotique">Robotique</a>
    </li>
   </ul>
  </nav>
 </div>
 <?php if ($isAdmin): ?>
 <div class="toggle-info-container1">
  CARROUSEL D'IMAGES
  <button class="toggle-info" data-target="carousel-infosText1">ℹ️ Voir les conditions de
   modifications du
   CARROUSEL</button>
 </div>
 <div class="carousel-infosText1" id="carousel-infosText1">
  <span class="close-info">✖️ Fermer</span>
  <p><u>CARROUSEL D'IMAGES</u> / Modifier le Carrousel</p>

  <p>✏️ Pour modifier un contenu, changez-le directement sur la page, puis cliquez sur :</p>
  <div class="infoSaveBtn">💾Enregistrer<br><i style="font-size: 0.7rem;">toutes les modifications</i></div>
  <p>en haut de page.</p><br>

  <p><b>Pour remplacer une image</b> :</p>
  <ol>
   <li>Cliquez sur l'icône "image"
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 15.75 15.77"
     style="vertical-align: middle;">
     <g>
      <path
       d="M8.77,8.72a.88.88,0,0,1-.61-.27.82.82,0,0,1-.25-.61.89.89,0,0,1,.25-.62A.82.82,0,0,1,8.77,7a.81.81,0,0,1,.61.25.83.83,0,0,1,.27.62.81.81,0,0,1-.25.61.91.91,0,0,1-.63.27Zm9.62-5a1.74,1.74,0,0,1,1.76,1.76V17.76a1.74,1.74,0,0,1-1.76,1.76H6.16A1.74,1.74,0,0,1,4.4,17.76V5.51A1.74,1.74,0,0,1,6.16,3.75H18.39Zm0,1.75H6.16v8L8.53,11.8a.94.94,0,0,1,.54-.17.86.86,0,0,1,.54.2L11.09,13l3.64-4.55a.78.78,0,0,1,.34-.25.85.85,0,0,1,.42-.07.89.89,0,0,1,.39.12.78.78,0,0,1,.28.29l2.24,3.67V5.51Zm0,12.24V15.6L15.3,10.53,11.89,14.8a.89.89,0,0,1-.59.32.82.82,0,0,1-.64-.18L9,13.62,6.16,15.74v2Z"
       transform="translate(-4.4 -3.75)" />
     </g>
    </svg>
   </li>
   <li>Dans la fenêtre qui s'ouvre, cliquez sur <b>"Choisir un fichier"</b> (depuis votre ordinateur).</li>
   <li>Renseignez le <b>texte alternatif</b><br>(très courte description de l'image, utile pour les malvoyants et le
    référencement).</li>
   <li>Cliquez sur <b>« Appliquer »</b>.</li>
  </ol>

  <p>L'image est alors insérée dans le contenu et automatiquement enregistrée dans la <b>GALERIE D'IMAGES</b><br>après
   avoir cliqué sur « Enregistrer » en haut de page.</p><br>

  <p><i>La police "Roboto" est utilisée par défaut. Pour des raisons de cohérence, elle ne peut pas être modifiée.</i>
  </p>

  <p><b>Outils de mise en forme disponibles :</b></p>
  <ul>
   <li><b>Changer la taille</b> : outil <b>Taille</b></li>
   <li><b>Changer la couleur</b> : outil <b><u>A</u></b></li>
   <li><b>Gras</b> : outil <b>B</b></li>
   <li><b>Italique</b> : outil <span style="font-family: serif;"><b><i>I</i></b></span></li>
   <li><b>Souligner</b> : outil <b><u>U</u></b></li>
  </ul><br>

  <p><b>Annuler ou rétablir une modification</b> :</p>
  <ul>
   <li>Annuler : <span class="clockWise">&#10226;</span></li>
   <li>Rétablir : <span class="clockWise">&#10227;</span></li>
  </ul><br>

  <p style="color: red;"><u><b>⚠ Note importante :</b></u></p>
  <ul>
   <li>Le carrousel contient exactement <b>4 slides</b> (1 image + 1 texte chacun).</li>
   <li>Seul le webmaster peut ajouter ou supprimer des slides.</li>
   <li><b>Vous pouvez uniquement modifier le contenu</b> (images et textes), pas la structure.</li>
   <li>Le texte de chaque slide doit être <b>court</b> (ex : description, adresse...)</li>
   <li>Utilisez de préférence des images <b>rectangulaires en format paysage</b>.</li>
   <li>Les images sont automatiquement ajustées : inutile de les redimensionner ou transformer dans l'éditeur.</li>
  </ul><br>

  <p><span style="color: red;">⚠</span> N'oubliez pas de sauvegarder vos modifications :</p>
  <div class="infoSaveBtn">💾Enregistrer<br><i style="font-size: 0.7rem;">toutes les modifications</i></div>

 </div>
 <?php endif; ?>
 <div class="carousel">
  <?php if (!$isAdmin): ?>
  <button class="btn" aria-label="Image précédente" id="prev">&#60;</button>
  <button class="btn" aria-label="Image suivante" id="next">&#62;</button>
  <?php endif; ?>

  <div class="<?= $isAdmin ? 'slide' : 'slide actifSlide' ?>" id="slide1">
   <?php if ($isAdmin): ?>
   <div class="btnsContainer">
    <div style="text-align: center;">SLIDE 1</div>
    <div class="adminInfos">✏️ Modifiez l'image &#8681;</div>
    <span class="alertInfo">Ne peut rester vide!</span>
   </div>
   <?php endif; ?>

   <div class="carouselImgContainer" id="carouselImg1_img" contenteditable="<?= $isAdmin ? 'true' : 'false' ?>">
    <?= $contenuPage['carouselImg1_img'] ?? '' ?>
   </div>
   <?php if ($isAdmin): ?>
   <div class="btnsContainer">
    <div class="adminInfos">✏️ Modifiez le texte &#8681;</div>
    <span class="alertInfo">Ne peut rester vide!</span>
   </div>
   <?php endif; ?>
   <div class="caption" id="carouselCaption1_pTxt" contenteditable="<?= $isAdmin ? 'true' : 'false' ?>">
    <?= $contenuPage['carouselCaption1_pTxt'] ?? '' ?>
   </div>
  </div>
  <div class="slide" id="slide2">
   <?php if ($isAdmin): ?>
   <div class="btnsContainer">
    <div style="text-align: center;">SLIDE 2</div>
    <div class="adminInfos">✏️ Modifiez l'image &#8681;</div>
    <span class="alertInfo">Ne peut rester vide!</span>
   </div>
   <?php endif; ?>
   <div class="carouselImgContainer" id="carouselImg2_img" contenteditable="<?= $isAdmin ? 'true' : 'false' ?>">
    <?= $contenuPage['carouselImg2_img'] ?? '' ?>
   </div>
   <?php if ($isAdmin): ?>
   <div class="btnsContainer">
    <div class="adminInfos">✏️ Modifiez le texte &#8681;</div>
    <span class="alertInfo">Ne peut rester vide!</span>
   </div>
   <?php endif; ?>
   <div class="caption" id="carouselCaption2_pTxt" contenteditable="<?= $isAdmin ? 'true' : 'false' ?>">
    <?= $contenuPage['carouselCaption2_pTxt'] ?? '' ?>
   </div>
  </div>
  <div class="slide" id="slide3">
   <?php if ($isAdmin): ?>
   <div class="btnsContainer">
    <div style="text-align: center;">SLIDE 3</div>
    <div class="adminInfos">✏️ Modifiez l'image &#8681;</div>
    <span class="alertInfo">Ne peut rester vide!</span>
   </div>
   <?php endif; ?>
   <div class="carouselImgContainer" id="carouselImg3_img" contenteditable="<?= $isAdmin ? 'true' : 'false' ?>">
    <?= $contenuPage['carouselImg3_img'] ?? '' ?>
   </div>
   <?php if ($isAdmin): ?>
   <div class="btnsContainer">
    <div class="adminInfos">✏️ Modifiez le texte &#8681;</div>
    <span class="alertInfo">Ne peut rester vide!</span>
   </div>
   <?php endif; ?>
   <div class="caption" id="carouselCaption3_pTxt" contenteditable="<?= $isAdmin ? 'true' : 'false' ?>">
    <?= $contenuPage['carouselCaption3_pTxt'] ?? '' ?>
   </div>
  </div>
  <div class="slide" id="slide4">
   <?php if ($isAdmin): ?>
   <div class="btnsContainer">
    <div style="text-align: center;">SLIDE 4</div>
    <div class="adminInfos">✏️ Modifiez l'image &#8681;</div>
    <span class="alertInfo">Ne peut rester vide!</span>
   </div>
   <?php endif; ?>
   <div class="carouselImgContainer" id="carouselImg4_img" contenteditable="<?= $isAdmin ? 'true' : 'false' ?>">
    <?= $contenuPage['carouselImg4_img'] ?? '' ?>
   </div>
   <?php if ($isAdmin): ?>
   <div class="btnsContainer">
    <div class="adminInfos">✏️ Modifiez le texte &#8681;</div>
    <span class="alertInfo">Ne peut rester vide!</span>
   </div>
   <?php endif; ?>
   <div class="caption" id="carouselCaption4_pTxt" contenteditable="<?= $isAdmin ? 'true' : 'false' ?>">
    <?= $contenuPage['carouselCaption4_pTxt'] ?? '' ?>
   </div>
  </div>
 </div>

 <div id="sectionsContainer">
  <!--  section 1-->
  <section class="section1 accueil">
   <?php if ($isAdmin): ?>
   <div class="toggle-info-container">
    SECTION PRINCIPALE
    <button class="toggle-info" data-target="infosText2">ℹ️ Voir les conditions de modifications le la SECTION
     PRINCIPALE</button>
   </div>
   <div class="infosText" id="infosText2">
    <span class="close-info">✖️ Fermer</span>
    <p><u style="padding-right: 10px;">SECTION PRINCIPALE</u> Modifier uniquement le contenu principal de la page
     (contenu minimum obligatoire).</p>

    <p>
     Cette section peut être modifiée, mais elle ne doit
     <b style="color: red;">en aucun cas être vide</b>.<br>Elle doit toujours contenir :
    </p>
    <ul>
     <li><b>UN TITRE PRINCIPAL</b></li>
     <li><b>UNE IMAGE</b></li>
     <li><b>UN PARAGRAPHE</b></li>
    </ul>

    <p>
     Pour modifier un élément :
    </p>
    <ol>
     <li>Utilisez les outils pour modifier le texte ou insérer une image.</li>
     <li>Une fois vos modifications terminées, cliquez sur :
      <div class="infoSaveBtn">💾Enregistrer<br><i style="font-size: 0.7rem;">toutes les modifications</i></div>
     </li>
    </ol>
    <br>
    <p><i>La police d’écriture "ROBOTO" est imposée pour garantir une cohérence visuelle.<br>Elle ne peut pas être
      modifiée.</i></p>

    <p>Vous pouvez toutefois :</p>
    <ul>
     <li><b>Changer la taille</b> : outil <b>Taille</b></li>
     <li><b>Changer la couleur</b> : outil <b><u>A</u></b></li>
     <li><b>Gras</b> : outil <b>B</b></li>
     <li><b>Italique</b> : outil <span style="font-family: serif;"><b><i>I</i></b></span></li>
     <li><b>Souligner</b> : outil <b><u>U</u></b></li>
    </ul><br>

    <p><b>Suppression de contenu :</b></p>
    <ul>
     <li>⚠️ <span style="color:red"><i>Ne vous contentez pas d’effacer une zone de texte !</i></span></li>
     <li>Utilisez le bouton : <span class="infoDeleteBtn">Supprimer... 🗑️</span> pour supprimer un élément. Cette
      action est automatiquement enregistrée.</li>
    </ul>

    <p><b>⚠ La SECTION PRINCIPALE ne doit jamais être vide !</b></p>
    <br>
    <p>Vous pouvez à tout moment :</p>
    <ul>
     <li>Annuler une action avec : <span class="clockWise">&#10226;</span></li>
     <li>Rétablir une action avec : <span class="clockWise">&#10227;</span></li>
    </ul>
    <br>
    <hr>

    <p><b>------ LA GALERIE D'IMAGES ------</b></p>

    <p>
     Toutes les images que vous insérez avec l’outil "image" sont automatiquement enregistrées dans la "GALERIE
     D'IMAGES".
    </p>

    <p>
     Vous pouvez afficher la galerie en cliquant sur le bouton <b>"GALERIE D'IMAGES"</b>.
    </p>
    <br>
    <p>
     Si vous supprimez une image avec <span class="infoDeleteBtn">Supprimer l’image 🗑️</span>, elle disparaît du site
     mais reste stockée dans la galerie.
    </p>

    <p>
     Pour supprimer définitivement une image de la galerie, cliquez sur la <span style="background-color: red; color:white; padding: 2px;
     ">✖</span>
     en haut à droite de
     l’image.
    </p>
    <br>
    <p style="color: blue;">
     <i>"Si vous rencontrez des difficultés lors de la saisie ou de l'enregistrement, ou si vous avez des questions,
      n'hésitez pas à contacter le webmaster."</i>
    </p>

   </div>
   <div class="btnsContainer">
    <div class="saveSuppBtns">
     <button class="delete-content" data-id="accueil_section1_h1">Supprimer le Titre 🗑️</button>
    </div>
    <div class="adminInfos">✏️ Ajoutez/Modifiez le Titre Principal &#8681;<span class="alertInfo">Ne peut rester
      vide!</span></div>
   </div>
   <?php endif; ?>

   <div class="mainTitleContainer" id="accueil_section1_h1" contenteditable="<?= $isAdmin ? 'true' : 'false' ?>">
    <?= $contenuPage['accueil_section1_h1'] ?? '' ?>
   </div>

   <?php if ($isAdmin): ?>
   <div class="imgPBtns">
    <div class="btnsContainer container1">
     <div class="saveSuppBtns">
      <button class="delete-content" data-id="accueil_section1_img">Supprimer l'image 🗑️</button>
     </div>
     <div class="adminInfos">✏️ Ajoutez/Modifiez l'image &#8681;<span class="alertInfo">Ne peut rester vide!</span>
     </div>
    </div>
    <div class="btnsContainer container2">
     <div class="saveSuppBtns">
      <button class="delete-content" data-id="accueil_section1_p">Supprimer le paragraphe 🗑️</button>
     </div>
     <div class="adminInfos">✏️ Ajoutez/Modifiez le paragraphe &#8681;<span class="alertInfo">Ne peut rester
       vide!</span></div>
    </div>
   </div>
   <?php endif; ?>

   <div class="section1Content">
    <div class="section1ImgContainer">
     <div class="section1Illustration" id="accueil_section1_img" contenteditable="<?= $isAdmin ? 'true' : 'false' ?>">
      <?= $contenuPage['accueil_section1_img'] ?? '' ?>
     </div>
    </div>
    <div class="section1TextContainer">
     <div class="section1Paragraphe" id="accueil_section1_p" contenteditable="<?= $isAdmin ? 'true' : 'false' ?>">
      <?= $contenuPage['accueil_section1_p'] ?? '' ?></div>
    </div>
   </div>

  </section>

  <!--  section 2-->
  <?php if ($hasEditableSection2): ?>
  <section class="section2 accueil">
   <?php if ($isAdmin): ?>
   <div class="toggle-info-container">
    SECTION 2
    <button class="toggle-info" data-target="infosText3">ℹ️ Voir les conditions de modifications des SECTIONS
     SECONDAIRES</button>
   </div>
   <div class="infosText" id="infosText3">
    <span class="close-info">✖️ Fermer</span>
    <p><u style="padding-right: 10px;">SECTION 2</u> Ajouter/Modifier/Supprimer<br>Cette section peut être
     ajoutée/modifiée/supprimée.<br>Elle peut
     contenir ces 3 éléments :<br> - UN TITRE
     SECONDAIRE<br> - UNE IMAGE<br> - UN PARAGRAPHE<br>OU <br> - UN TITRE
     SECONDAIRE<br> - UN PARAGRAPHE
     <br>OU <br> - SEULEMENT UNE IMAGE <br>
     <br>Pensez à enregistrer chaque modification avec le bouton
    <div class="infoSaveBtn">💾Enregistrer<br><i style="font-size: 0.7rem;">toutes les
      modifications</i>
    </div><br><br>
    🗑️ Pour supprimer un contenu existant, <span style="color:red"><i>il ne suffit pas d'effacer la zone de
      saisi</i></span>.<br>
    UTILISEZ LE BOUTON<span class="infoDeleteBtn">Supprimer...
     🗑️</span>, cette action est automatiquement enregistrée.
    </p>
   </div>
   <div class="btnsContainer">
    <div class="saveSuppBtns">
     <button class="delete-content" data-id="accueil_section2_h2">Supprimer le Titre 🗑️</button>
    </div>
    <div class="adminInfos">✏️ Ajoutez/Modifiez le Titre &#8681;</div>
   </div>
   <?php endif; ?>

   <?php if (!empty($contenuPage['accueil_section2_h2']) || $isAdmin): ?>
   <div class="mainTitleContainer" id="accueil_section2_h2" contenteditable="<?= $isAdmin ? 'true' : 'false' ?>">
    <?= $contenuPage['accueil_section2_h2'] ?? '' ?>
   </div>
   <?php endif; ?>

   <?php if ($isAdmin): ?>
   <div class="imgPBtns">
    <div class="btnsContainer container1">
     <div class="saveSuppBtns">
      <button class="delete-content" data-id="accueil_section2_img">Supprimer l'image 🗑️</button>
     </div>
     <div class="adminInfos">✏️ Ajoutez/Modifiez l'image &#8681;</div>
    </div>
    <div class="btnsContainer container2">
     <div class="saveSuppBtns">
      <button class="delete-content" data-id="accueil_section2_p">Supprimer le paragraphe 🗑️</button>
     </div>
     <div class="adminInfos">✏️ Ajoutez/Modifiez le paragraphe &#8681;</div>
    </div>
   </div>
   <?php endif; ?>

   <div class="section2Content">

    <?php if (!empty($contenuPage['accueil_section2_img']) || $isAdmin): ?>
    <div class="section2ImgContainer">
     <div class="section2Illustration" id="accueil_section2_img" contenteditable="<?= $isAdmin ? 'true' : 'false' ?>">
      <?= $contenuPage['accueil_section2_img'] ?? '' ?>
     </div>
    </div>
    <?php endif; ?>

    <?php if (!empty($contenuPage['accueil_section2_p']) || $isAdmin): ?>
    <div class="section2TextContainer">
     <div class="section2Paragraphe" id="accueil_section2_p" contenteditable="<?= $isAdmin ? 'true' : 'false' ?>">
      <?= $contenuPage['accueil_section2_p'] ?? '' ?></div>
    </div>
    <?php endif; ?>
   </div>
  </section>
  <?php endif; ?>


  <!--  section 3-->
  <?php if ($hasEditableSection3): ?>
  <section class="section3 accueil">
   <?php if ($isAdmin): ?>

   <div style="font-size: 1.2rem;">
    <p><u style="padding-right: 10px;">SECTION 3</u> Ajouter/Modifier/Supprimer
    </p>
   </div>
   <div class="btnsContainer">
    <div class="saveSuppBtns">
     <button class="delete-content" data-id="accueil_section3_h2">Supprimer le Titre 🗑️</button>
    </div>
    <div class="adminInfos">✏️ Ajoutez/Modifiez le Titre &#8681;</div>
   </div>
   <?php endif; ?>

   <?php if (!empty($contenuPage['accueil_section3_h2']) || $isAdmin): ?>
   <div class="mainTitleContainer" id="accueil_section3_h2" contenteditable="<?= $isAdmin ? 'true' : 'false' ?>">
    <?= $contenuPage['accueil_section3_h2'] ?? '' ?>
   </div>
   <?php endif; ?>

   <?php if ($isAdmin): ?>
   <div class="imgPBtns">
    <div class="btnsContainer container1">
     <div class="saveSuppBtns">
      <button class="delete-content" data-id="accueil_section3_img">Supprimer l'image 🗑️</button>
     </div>
     <div class="adminInfos">✏️ Ajoutez/Modifiez l'image &#8681;</div>
    </div>
    <div class="btnsContainer container2">
     <div class="saveSuppBtns">
      <button class="delete-content" data-id="accueil_section3_p">Supprimer le paragraphe 🗑️</button>
     </div>
     <div class="adminInfos">✏️ Ajoutez/Modifiez le paragraphe &#8681;</div>
    </div>
   </div>
   <?php endif; ?>

   <div class="section3Content">
    <?php if (!empty($contenuPage['accueil_section3_img']) || $isAdmin): ?>
    <div class="section3ImgContainer">
     <div class="section3Illustration" id="accueil_section3_img" contenteditable="<?= $isAdmin ? 'true' : 'false' ?>">
      <?= $contenuPage['accueil_section3_img'] ?? '' ?>
     </div>
    </div>
    <?php endif; ?>

    <?php if (!empty($contenuPage['accueil_section3_p']) || $isAdmin): ?>
    <div class="section3TextContainer">
     <div class="section3Paragraphe" id="accueil_section3_p" contenteditable="<?= $isAdmin ? 'true' : 'false' ?>">
      <?= $contenuPage['accueil_section3_p'] ?? '' ?></div>
    </div>
    <?php endif; ?>

   </div>
  </section>
  <?php endif; ?>

  <!--  section 4-->
  <?php if ($hasEditableSection4): ?>
  <section class="section4 accueil">

   <?php if ($isAdmin): ?>
   <div style="font-size: 1.2rem;">
    <p><u style="padding-right: 10px;">SECTION 4</u> Ajouter/Modifier/Supprimer
    </p>
   </div>
   <div class="btnsContainer">
    <div class="saveSuppBtns">
     <button class="delete-content" data-id="accueil_section4_h2">Supprimer le Titre 🗑️</button>
    </div>
    <div class="adminInfos">✏️ Ajoutez/Modifiez le Titre &#8681;</div>
   </div>
   <?php endif; ?>

   <?php if (!empty($contenuPage['accueil_section4_h2']) || $isAdmin): ?>
   <div class="mainTitleContainer" id="accueil_section4_h2" contenteditable="<?= $isAdmin ? 'true' : 'false' ?>">
    <?= $contenuPage['accueil_section4_h2'] ?? '' ?>
   </div>
   <?php endif; ?>

   <?php if ($isAdmin): ?>
   <div class="imgPBtns">
    <div class="btnsContainer container1">
     <div class="saveSuppBtns">
      <button class="delete-content" data-id="accueil_section4_img">Supprimer l'image 🗑️</button>
     </div>
     <div class="adminInfos">✏️ Ajoutez/Modifiez l'image &#8681;</div>
    </div>
    <div class="btnsContainer container2">
     <div class="saveSuppBtns">
      <button class="delete-content" data-id="accueil_section4_p">Supprimer le paragraphe 🗑️</button>
     </div>
     <div class="adminInfos">✏️ Ajoutez/Modifiez le paragraphe &#8681;</div>
    </div>
   </div>
   <?php endif; ?>

   <div class="section4Content">
    <?php if (!empty($contenuPage['accueil_section4_img']) || $isAdmin): ?>
    <div class="section4ImgContainer">
     <div class="section4Illustration" id="accueil_section4_img" contenteditable="<?= $isAdmin ? 'true' : 'false' ?>">
      <?= $contenuPage['accueil_section4_img'] ?? '' ?>
     </div>
    </div>
    <?php endif; ?>

    <?php if (!empty($contenuPage['accueil_section4_p']) || $isAdmin): ?>
    <div class="section4TextContainer">
     <div class="section4Paragraphe" id="accueil_section4_p" contenteditable="<?= $isAdmin ? 'true' : 'false' ?>">
      <?= $contenuPage['accueil_section4_p'] ?? '' ?></div>
    </div>
    <?php endif; ?>
   </div>
  </section>
  <?php endif; ?>
 </div>

 <div class="external-service">
  <?php
    $mapURL = $contenuPage['googleMap_link'] ?? "https://maps.app.goo.gl/tjM5qgtuAGu9dgaC8";
    ?>

  <?php if (!$isAdmin): ?>
  <div class="mapTxt">Plan d'accès du Cabinet Pastorelli</div>
  <div class="mapLocation">
   <a href="<?= htmlspecialchars($mapURL) ?>" target="_blank" rel="noopener noreferrer">
    <div class="mapLink"></div>
   </a>
  </div>
  <p class="external-note">
   En cliquant sur la carte, vous allez ouvrir une carte "Google Maps" dans
   une nouvelle fenêtre.<br />Ce service, fourni par Google, est
   susceptible d'utiliser des cookies.
  </p>
  <?php endif; ?>

  <?php if ($isAdmin): ?>
  <div class="urlContainer">
   <div class="mapTxt">Plan d'accès du Cabinet Pastorelli</div>
   <div class="mapLocation">
    <div class="mapLink" title="Accès désactivé en mode admin"></div>
    </a>
   </div>
   <div class="modifBloc_map">
    <div class="adminInfos">✏️ Modifiez l'URL de Google Map</div>
    <input type="text" id="googleMap_input" value="<?= htmlspecialchars($mapURL) ?>">
   </div>
  </div>
  <?php endif; ?>
 </div>

 <footer>
  <?php
    $tel = $contenuPage['contactTel_link'] ?? "04 93 62 38 89";

    $telHref = "tel:" . preg_replace("/\s+/", "", $tel);

    $doctoURL = $contenuPage['doctoLibLink_link'] ?? "https://www.doctolib.fr/chirurgien-urologue/nice/stefan-jeglinschi";
    ?>

  <?php if (!$isAdmin): ?>
  <div class="contactUs">
   <a href="<?= $telHref ?>" aria-label="appeler le secrétariat" class="btn btn-call" id="btn-call">
    Appeler le secrétariat
   </a>
   <a href="<?= htmlspecialchars($doctoURL) ?>" target="_blank" aria-label="Prendre rendez-vous sur Doctolib"
    class="btn btn-doctolib" id="btn-doctolib">
    Prendre RDV sur Doctolib
   </a>
  </div>
  <?php endif; ?>

  <?php if ($isAdmin): ?>
  <div class="contactUs">
   <div class="telContainer">
    <button type="button" class="btn btn-call" disabled title="Bouton désactivé en mode admin">
     Appeler le secrétariat
    </button>
    <div class="modifBloc">
     <div class="adminInfos">✏️ Modifiez le numéro du secrétariat<br>pour le bouton "Appeler le secrétariat"</div>
     <input type="text" id="contactTel_input" value="<?= htmlspecialchars($tel) ?>">
    </div>
   </div>
   <div class="urlContainer">
    <button type="button" class="btn btn-doctolib" disabled title="Bouton désactivé en mode admin">
     Prendre RDV sur Doctolib
    </button>
    <div class="modifBloc">
     <div class="adminInfos">✏️ Modifiez l'URL de Doctolib<br>pour le bouton "Prendre RDV sur Doctolib"</div>
     <input type="text" id="doctoLib_input" value="<?= htmlspecialchars($doctoURL) ?>">
    </div>
   </div>
  </div>
  <?php endif; ?>

  <div class="infos">
   <ul>
    <li><a href="./contact.php">Contact</a></li>
    <li><a href="./mlcgu.php">Mentions légales</a></li>
   </ul>
   <div class="convention">Praticien conventionné secteur 2 - Carte Vitale acceptée</div>
  </div>

  <?php if (!$isAdmin): ?>
  <!-- Bouton Admin visible seulement si NON connecté -->
  <div id="adminAccess">
   <a href="login.php" id="adminBtn">⚙️ Admin</a>
  </div>
  <?php endif; ?>
 </footer>
 <div class="back-to-top">
  <a href="#top" aria-label="Revenir en haut de la page">
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32" aria-hidden="true">
    <path d="M12 2L5 9h4v8h6V9h4z" />
   </svg>
  </a>
 </div>
 <script src="varfunc.js"></script>
 <script src="varfuncAccueil.js"></script>
 <script src="script.js"></script>
 <script src="js/contentLoader.js"></script>
 <?php if (!$isAdmin): ?>
 <script src="carousel.js"></script>
 <?php endif; ?>
 <?php if ($isAdmin): ?>
 <script src="js/adminbar.js"></script>
 <?php endif; ?>
</body>

</html>