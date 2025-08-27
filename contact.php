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
  <link rel="stylesheet" href="./assets/contact.css" />
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
          <a class="menu-link active" href="contact.php" aria-label="Contact">Contact</a>
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
  <section class="cont">
    <h1>Contact / Accès</h1>
    <div class="sectionContent">
      <div class="textContainer">
        <p>
          Lieux de consultations et
          d'interventions du Docteur Jeglinschi<br><br>
          Praticien conventionné secteur 2 - Carte Vitale acceptée
        </p>
      </div>
    </div>
    <h2>CABINET PASTORELLI</h2>
    <div class="sectionContent">
      <div class="textContainer">
        <p>
          38 rue Pastorelli, 06000 Nice<br>
          <span style="color:var(--color1); font-weight:bold">04 93 62 38 89</span>
        </p>
        <h3>Horaires d'ouverture</h3>
        <div class="schedules">Lundi :
          10h00 - 12h30 /
          14h00 - 17h00<br>
          Mardi :
          08h00 - 12h30 /
          14h00 - 17h00<br>
          Mercredi :
          08h00 - 12h30 /
          14h00 - 17h00<br>
          Jeudi :
          08h00 - 12h30 /
          14h00 - 17h00<br>
          Vendredi :
          10h00 - 12h30 /
          14h00 - 17h00</div>
        <div class="contactUs">
          <a href="tel:+33493623889" aria-label="appeler le secrétariat" class="btn btn-call">Prendre rendez-vous</a>
          <a href="https://www.doctolib.fr/chirurgien-urologue/nice/stefan-jeglinschi" target="_blank"
            aria-label="Prendre rendez-vous sur Doctolib" class="btn btn-doctolib">Prendre RDV sur Doctolib</a>
        </div>
      </div>
    </div>
    <div class="accessInfo">
      <h3>Moyens de transport</h3>
      <p>Tramway - Place Masséna (ligne 1)<br>
        Tramway - Jean Médecin (lignes 1 et 2)<br>
        Bus - J. Médecin / Pastorelli (lignes 27 et 07)</p>
      <h3>Parking public</h3>
      <p>Parking Nice Etoile<br>
        Rue Lamartine, 06000 Nice<br></p>
      <h3>Informations pratiques</h3>
      <p>2ème étage avec ascenseur</p>
    </div>

    <div class="external-service">
      <div class="mapTxt">Plan d'accès du Cabinet Pastorelli</div>
      <div class="mapLocation">
        <a href="https://maps.app.goo.gl/tjM5qgtuAGu9dgaC8" target="_blank" rel="noopener noreferrer">
          <div class="mapLink1"></div>
        </a>
      </div>
      <p class="external-note">
        En cliquant sur la carte, vous allez ouvrir une carte "Google Maps" dans
        une nouvelle fenêtre.<br />Ce service, fourni par Google, est
        susceptible d'utiliser des cookies.
      </p>
    </div>
    <h2>CLINIQUE Saint George</h2>
    <div class="sectionContent">
      <div class="textContainer">
        <p>
          2 Avenue de Rimiez, 06100 Nice
        </p>
      </div>
    </div>
    <div class="accessInfo">
      <h3>Moyens de transport</h3>
      <p>Bus - Rimiez Saint-George (lignes 25 et 15)<br>
        Bus - La Séréna (ligne 5)<br>
        Bus - La Batterie (lignes 25 et 15)</p>
    </div>
    <div class="external-service">
      <div class="mapTxt">Plan d'accès de la CLINIQUE Saint George</div>
      <div class="mapLocation">
        <a href="https://maps.app.goo.gl/z5mHQGwLKjHJdtmw6" target="_blank" rel="noopener noreferrer">
          <div class="mapLink2"></div>
        </a>
      </div>
      <p class="external-note">
        En cliquant sur la carte, vous allez ouvrir une carte "Google Maps" dans
        une nouvelle fenêtre.<br />Ce service, fourni par Google, est
        susceptible d'utiliser des cookies.
      </p>
    </div>
    <h2>CLINIQUE Saint Antoine KANTYS</h2>
    <div class="sectionContent">
      <div class="textContainer">
        <p>
          7 Avenue Durante, 06000 Nice
        </p>
      </div>
    </div>
    <div class="accessInfo">
      <h3>Moyens de transport</h3>
      <p>Tramway - Jean Médecin (lignes 1 et 2)<br>
        Tramway - Gare Thiers (ligne T1)<br>
        Bus - Poste Thiers (lignes 04, 12 et 71)</p>

      <h3>Parking public</h3>
      <p>Parking Louvre<br>
        20 Boulevard Victor Hugo, Nice</p>

    </div>
    <div class="external-service">
      <div class="mapTxt">Plan d'accès de la CLINIQUE Saint Antoine KANTYS</div>
      <div class="mapLocation">
        <a href="https://maps.app.goo.gl/EVUj1qKN6PEze53T9" target="_blank" rel="noopener noreferrer">
          <div class="mapLink3"></div>
        </a>
      </div>
      <p class="external-note">
        En cliquant sur la carte, vous allez ouvrir une carte "Google Maps" dans
        une nouvelle fenêtre.<br />Ce service, fourni par Google, est
        susceptible d'utiliser des cookies.
      </p>
    </div>
    <h2>POLYCLINIQUE Santa Maria</h2>
    <div class="sectionContent">
      <div class="textContainer">
        <p>
          57 Avenue de la Californie, 06200 Nice
        </p>
      </div>
    </div>
    <div class="accessInfo">
      <h3>Moyens de transport</h3>
      <p>Tramway - Lenval hôpital (lignes 2 et 3)<br>
        Tramway - Sainte-Hélène / Promenade (ligne A)<br>
        Bus - Lenval / Promenade (ligne 12+)</p>

      <h3>Parking public</h3>
      <p>Parking Indigo Nice Lenval<br>
        57 avenue de la Californie, 06200 Nice</p>

    </div>
    <div class="external-service">
      <div class="mapTxt">Plan d'accès de la POLYCLINIQUE Santa Maria</div>
      <div class="mapLocation">
        <a href="https://maps.app.goo.gl/SqLuzqtQdw7ov4nX8" target="_blank" rel="noopener noreferrer">
          <div class="mapLink4"></div>
        </a>
      </div>
      <p class="external-note">
        En cliquant sur la carte, vous allez ouvrir une carte "Google Maps" dans
        une nouvelle fenêtre.<br />Ce service, fourni par Google, est
        susceptible d'utiliser des cookies.
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