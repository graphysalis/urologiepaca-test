<?php
session_start();
$isAdmin = isset($_SESSION['connecte']) && $_SESSION['connecte'] === true;
$_SESSION['previous_page'] = basename($_SERVER['REQUEST_URI']);
?>


<!DOCTYPE html>
<html lang="fr">

<head>
 <meta charset="UTF-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <meta name="keywords" content="" />
 <meta name="description" content="" />
 <title>Dr Stefan Jeglinschi | Chirurgien urologue | Robotique</title>
 <link rel="icon" type="image/png" sizes="96x96" href="./assets/images/logo02blue.png" />
 <link rel="stylesheet" href="./assets/robotoFont.css" />
 <link rel="stylesheet" href="./assets/style.css" />
 <link rel="stylesheet" href="./assets/robotique.css" />
 <link rel="stylesheet" href="./assets/anim.css" />
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
     <a class="menu-link" href="index.php" aria-label="Accueil">Accueil</a>
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
     <a class="menu-link active" href="robotique.php" aria-label="La chirurgie robotique">Robotique</a>
    </li>
   </ul>
  </nav>
 </div>
 <section class="robo">
  <h1>Chirurgie robot-assistée</h1>
  <div class="sectionContent">
   <div class="roboImage"></div>
   <div class="textContainer">
    <h2>Histoire et origines</h2>
    <p>Le <span style="font-weight: bold;">Da Vinci Surgical System</span> est développé par Intuitive Surgical, une
     entreprise américaine issue, en partie, de
     recherches de la NASA.<br>
     La FDA américaine autorise son utilisation dès juillet 2000 pour des interventions telles que la cholécystectomie
     ou la prostatectomie.<br>
     La première prostatectomie robot-assistée mondiale a lieu dès 2000 en France, à l’hôpital Henri‑Mondor, dirigée par
     le Professeur Abbou.
    </p>
    <h2>Fonctionnement et principes techniques</h2>
    <p>Le système comporte une console où le chirurgien pilote le robot, un chariot patient avec 3 à 4 bras robotisés et
     une caméra 3D haute définition.<br>
     Il offre une vision grossie jusqu’à 10×, un filtrage des tremblements, une amplitude de mouvement supérieure
     (jusqu’à 540°) et une précision millimétrique.
    </p>
   </div>
  </div>
  <div class="sectionText">
   <h2>Évolutions du système</h2>
   <p>Plusieurs générations ont vu le jour :<br>
    Modèles <span style="font-weight: bold;">Da Vinci S (2003)</span> et <span style="font-weight: bold;">Si</span> ,
    offrant une meilleure vision et sécurité.<br>
    Modèle <span style="font-weight: bold;">Xi</span>, introduit en 2014–2015 avec des avantages ergonomiques et de
    performance largement supérieurs.<br>
    Le <span style="font-weight: bold;">Da Vinci SP (Single Port)</span>, une version à incision unique introduite
    récemment pour réaliser des actes via un
    seul orifice ou incision de 2,5 cm.
   </p>
   <h2>Utilisations médicales</h2>
   <p>Le robot Da Vinci intervient dans de nombreuses disciplines :
   </p>
   <ul>
    <li><span style="font-weight: bold;">Urologie</span><br>prostatectomie, néphrectomie, cystectomie, réimplantation
     urétrale.</li>
    <li><span style="font-weight: bold;">Gynécologie</span><br>hystérectomie, myomectomie, sacrocolpopexie, cancers de
     l’utérus ou de l’ovaire.</li>
    <li><span style="font-weight: bold;">Chirurgie digestive</span><br>colectomie, chirurgie bariatrique, hernies, etc.
    </li>
    <li><span style="font-weight: bold;">Chirurgie thoracique</span>, cardiothoracique et ORL, notamment pour cancers
     de la tête et du cou</li>
   </ul>
   <h2>Principaux atouts</h2>
   <p><span style="font-weight: bold;">Moins invasive</span> → incisions réduites, moins de pertes sanguines,
    récupération plus rapide.<br>
    <span style="font-weight: bold;">Moins de douleurs post-opératoires</span>, durée d’hospitalisation raccourcie,
    risque d’infection diminué.<br>
    Pour le chirurgien : <span style="font-weight: bold;">vision 3D, dextérité accrue, ergonomie améliorée,
     suppression des tremblements.</span>
   </p>
  </div>

 </section>
 <footer>
  <div class="contactUs">
   <a href="tel:+33493623889" aria-label="appeler le secrétariat" class="btn btn-call">Appeler le secrétariat</a>
   <a href="https://www.doctolib.fr/chirurgien-urologue/nice/stefan-jeglinschi" target="_blank"
    aria-label="Prendre rendez-vous sur Doctolib" class="btn btn-doctolib">Prendre RDV sur Doctolib</a>
  </div>
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
 <script src="script.js"></script>
 <script src="js/contentLoader.js"></script>
 <?php if ($isAdmin): ?>
  <script src="js/adminbar.js"></script>
 <?php endif; ?>

 <script>
  // Si appareil tactile sans souris
  if (navigator.maxTouchPoints > 0 && !window.matchMedia("(pointer: fine)").matches) {
   var adminBtn = document.getElementById('adminBtn');
   if (adminBtn) {
    adminAccess.style.display = 'none';
   }
  }
 </script>
</body>

</html>