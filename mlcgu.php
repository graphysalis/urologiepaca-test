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
 <title>Dr Stefan Jeglinschi | Chirurgien urologue | Contact</title>
 <link rel="icon" type="image/png" sizes="96x96" href="./assets/images/logo02blue.png" />
 <link rel="stylesheet" href="./assets/robotoFont.css" />
 <link rel="stylesheet" href="./assets/style.css" />
 <link rel="stylesheet" href="./assets/mlcgu.css" />
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
     <a class="menu-link" href="robotique.php" aria-label="La chirurgie robotique">Robotique</a>
    </li>
   </ul>
  </nav>
 </div>
 <section class="mentions">
  <h1>Mentions légales / CGU</h1>

  <div class="sectionContent">

   <div class="textContainer">
    <h2>Mentions légales</h2>
    <p>Conformément aux dispositions des articles 6-III et 19 de la loi n°2004-575 du 21 juin 2004
     pour la confiance dans l'économie numérique, il est précisé aux utilisateurs du site [Nom du site] l'identité des
     différents intervenants dans le cadre de sa réalisation et de son suivi.</p>
    <h3>Éditeur du site</h3>
    <div class="mentionsContent" id="mention1">Dr Stefan JEGLINSCHI inscrit au tableau de l'Ordre des médecins sous le
     numéro [numéro d'inscription].</div>
    <h3>Numéro ADELI</h3>
    <div class="mentionsContent" id="mention2">[numéro ADELI]</div>
    <h3>SIRET</h3>
    <div class="mentionsContent" id="mention3">[numéro
     SIRET]</div>
    <h3>Adresse
     professionnelle</h3>
    <div class="mentionsContent" id="mention4">38 Rue Pastorelli, 06000 Nice</div>
    <h3>Téléphone</h3>
    <div class="mentionsContent" id="mention5">[numéro de téléphone]</div>
    <h3>E-mail</h3>
    <div class="mentionsContent" id="mention6">[adresse e-mail]</div>
    <h3>Directeur de la publication</h3>
    <div class="mentionsContent" id="mention7">Dr Stefan JEGLINSCHI.</div>
    <h3>Hébergeur</h3>
    <div class="mentionsContent" id="mention8">[Nom de l'hébergeur], [forme juridique], dont le siège social est situé à
     [adresse complète],
     téléphone
     : [numéro de téléphone].</div>
    <h3>Webmaster</h3>
    <div class="mentionsContent" id="mention9">Céline MAGNAN, 150 Avenue de Nice 06800 Cagnes-sur-mer</div>
   </div>

   <div class="textContainer">
    <h2>Conditions générales d'utilisation</h2>
    <h3>Article 1 – Objet</h3>
    <p>Les présentes conditions générales d'utilisation ont pour objet de définir les modalités de mise à disposition
     des services du site [Nom du site] et les conditions d'utilisation du service par l'utilisateur.</p>
    <h3>Article 2 – Accès au site</h3>
    <p>Le site est accessible gratuitement en tout lieu à tout utilisateur ayant un accès à Internet. Tous les frais
     supportés par l'utilisateur pour accéder au service (matériel informatique, logiciels, connexion Internet, etc.)
     sont à sa charge.</p>
    <h3>Article 3 – Propriété intellectuelle</h3>
    <p>Les marques, logos, signes ainsi que tous les contenus du site (textes, images, vidéos, etc.) font l'objet d'une
     protection par le Code de la propriété intellectuelle et plus particulièrement par le droit d'auteur.</p>
    <h3>Article 4 – Responsabilité</h3>
    <p>Les sources des informations diffusées sur le site sont réputées fiables. Toutefois, le site se réserve la
     faculté d'une non-garantie de la fiabilité des sources. Les informations données sur le site le sont à titre
     purement informatif.</p>
    <h3>Article 5 – Liens hypertextes</h3>
    <p>Le site peut contenir des liens hypertextes pointant vers des sites internet tiers (tels que Google Maps,
     Doctolib, YouTube, etc.). Ces liens sont mis à disposition pour faciliter l’accès à certaines informations ou
     services complémentaires.

     Tous les liens externes sont configurés pour s’ouvrir dans un nouvel onglet du navigateur, afin de ne pas
     interrompre la navigation sur le site [Nom du site].

     Le site [Nom du site] n’exerce aucun contrôle sur le contenu ou le fonctionnement de ces sites tiers, ni sur leur
     politique de confidentialité ou d’utilisation des cookies. En conséquence, l’éditeur du site décline toute
     responsabilité quant aux contenus, services, publicités, cookies ou collectes de données pouvant être réalisés lors
     de la visite de ces sites externes.

     Il est fortement recommandé à l’utilisateur de consulter les mentions légales et politiques de confidentialité
     propres à chaque site tiers avant toute navigation ou interaction.</p>
    <h3>Article 6 – Cookies</h3>
    <p>Le site peut être amené à utiliser des cookies pour améliorer l'expérience utilisateur. L'utilisateur est informé
     que lors de ses visites sur le site, des cookies peuvent s'installer automatiquement sur son logiciel de
     navigation.</p>
    <h3>Article 7 – Droit applicable et juridiction compétente</h3>
    <p>Les présentes conditions du site sont régies par les lois françaises et toute contestation ou litige qui pourrait
     naître de l'interprétation ou de l'exécution de celles-ci sera de la compétence exclusive des tribunaux dont dépend
     le siège social de l'éditeur.</p>
   </div>
  </div>
 </section>
 <footer>
  <div class="contactUs">
   <a href="tel:+33493623889" aria-label="a</p>ppeler le secrétariat" class="btn btn-call">Appeler le secrétariat</a>
   <a href="https://www.doctolib.fr/chirurgien-urologue/nice/stefan-jeglinschi" target="_blank"
    aria-label="Prendre rendez-vous sur Doctolib" class="btn btn-doctolib">Prendre RDV sur Doctolib</a>
  </div>
  <div class="infos">
   <ul>
    <li><a href="./contact.php">Contact</a></li>
    <li><a href="./mlcgu.php">Mentions légales</a></li>
   </ul>
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