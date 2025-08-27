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
  <meta name="keywords" content="andrologie, calculs rénaux, cancer, laser de la prostate, vasectomie, prolapsus" />
  <meta name="description"
    content="Découvrez les domaines de compétences du Docteur Stefan Jeglinschi: l'endoscopie de la prostate et vessie, la chirurgie testiculaire, l'énucléation de la prostate au laser, en chirurgie laparoscopique, chirurgie robotique... Prenez rendez-vous facilement." />
  <title>Dr Stefan Jeglinschi | Chirurgien urologue | Expertise</title>
  <link rel="icon" type="image/png" sizes="96x96" href="./assets/images/logo02blue.png" />
  <link rel="stylesheet" href="./assets/robotoFont.css" />
  <link rel="stylesheet" href="./assets/style.css" />
  <link rel="stylesheet" href="./assets/expertise.css" />
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
          <a class="menu-link active" href="expertise.php" aria-label="Expertise">Expertise</a>
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
  <section class="exp">
    <h1>Expertise</h1>
    <div class="sectionContent">
      <div class="textContainer">
        <p>
          Le Docteur Jeglinschi bénéficie d’une solide expérience en urologie,
          tant sur le plan médical que chirurgical, acquise au sein de
          plusieurs centres hospitalo-universitaires reconnus.<br /><br />Son
          parcours l’a conduit à se former dans les services d’urologie de
          Paris, Reims, Nice et Strasbourg.<br>Titulaire d’un doctorat en
          médecine délivré par la faculté de médecine Paris Descartes, il a
          poursuivi sa spécialisation en chirurgie urologique lors de son
          internat au CHU de Reims, enrichi par un inter-CHU à Paris, au sein
          du service d’urologie de l’hôpital Diaconesses Croix Saint-Simon.<br>Il
          a ensuite exercé comme chirurgien assistant pendant trois années au
          CHU de Nice, avant d’être nommé chef de clinique pour une année au
          CHU de Strasbourg.
        </p>
      </div>
    </div>
    <h2>Domaines de compétence</h2>
    <div class="sectionContent">
      <div class="textContainer">
        <p>
          Le Docteur Jeglinschi prend en charge l’ensemble des pathologies
          urologiques, chez l’homme comme chez la femme, et propose une
          expertise approfondie dans les domaines suivants :
        </p>
        <ul>
          <li>
            <strong class="titre">Urologie masculine :</strong>
            <span class="description">adénome de la prostate, sténose de l’urètre, vessie
              neurologique.</span>
          </li>
          <li>
            <strong class="titre">Urologie féminine :</strong>
            <span class="description">incontinence urinaire, prolapsus uro-génital, infections
              urinaires récidivantes, hyperactivité vésicale.</span>
          </li>
          <li>
            <strong class="titre">Appareil urinaire supérieur :</strong>
            <span class="description">sténose de l’uretère, syndrome de la jonction
              pyélo-urétérale.</span>
          </li>
          <li>
            <strong class="titre">Oncologie urologique :</strong>
            <span class="description">cancers de la prostate, de la vessie, du testicule, du rein, de
              la surrénale et de l’uretère</span>
          </li>
          <li>
            <strong class="titre">Appareil génital masculin :</strong>
            <span class="description">dysfonction érectile, courbure de verge, troubles de
              l’éjaculation, infertilité, pathologies testiculaires,
              vasectomie.</span>
          </li>
          <li>
            <strong class="titre">Lithiase urinaire :</strong>
            <span class="description">prise en charge globale des calculs urinaires, incluant le
              traitement et la prévention des récidives</span>
          </li>
        </ul>
      </div>
    </div>
    <h2>Activité diagnostique et chirurgicale</h2>
    <div class="sectionContent">
      <div class="textContainer">
        <p>
          Le Docteur Jeglinschi exerce principalement à la Clinique
          Saint-Antoine, où il assure les examens diagnostiques suivants, si
          nécessaire :
        </p>
        <ul>
          <li><strong class="titre">Bilan urodynamique</strong></li>
          <li><strong class="titre">Cystoscopie</strong></li>
          <li><strong class="titre">Biopsies de prostate</strong></li>
        </ul>
        <p>Les interventions chirurgicales sont réalisées :</p>
        <ul>
          <li>
            <strong class="titre">à la Clinique Saint-Antoine :</strong>
            <span class="description">dans le cadre de la chirurgie ambulatoire</span>
          </li>
          <li>
            <strong class="titre">à la Clinique Saint-George :</strong>
            <span class="description">pour les actes de chirurgie robot-assistée.</span>
          </li>
        </ul>
      </div>
    </div>
    <h2>Compétences chirurgicales</h2>
    <div class="sectionContent">
      <div class="textContainer">
        <p>
          Fort de son expérience et des formations spécialisées suivies, le
          Docteur Jeglinschi maîtrise un large éventail de techniques
          chirurgicales, notamment :
        </p>
        <ul>
          <li>
            <strong class="titre">Endoscopie</strong> de la prostate et de la
            vessie
          </li>
          <li>
            <strong class="titre">&Eacute;nucléation laser</strong> de la
            prostate (HOLEP)
          </li>
          <li>
            <strong class="titre">Chirurgie de la verge et chirurgie testiculaire</strong>
          </li>
          <li>
            <strong class="titre">Urétéroscopie et lithotritie extracorporelle</strong>
          </li>
          <li>
            <strong class="titre">Chirurgie ouverte, coelioscopique (laparoscopique) et
              robotique,</strong>
            notamment pour les interventions sur la prostate, la vessie, les
            surrénales, les reins et les uretères.
          </li>
        </ul>
      </div>
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