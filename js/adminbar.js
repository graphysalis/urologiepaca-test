// Création de la barre admin
const currentPage =
  window.location.pathname.split("/").pop().replace(".php", "") || "index";

const bar = document.getElementById("adminBar");
bar.innerHTML = `
    <div id="MA">Mode<br>Administrateur</div>
    <div id="btnCont"><button id="saveBtn"> 💾 Enregistrer<br><span id="spanBtn1"><i>toutes les modifications</i></span></button>
    <button id="logoutBtn"> &#10532; Déconnexion<br><span id="spanBtn2"><i>Retour vers la page d'accueil</i></span></button></div>
    <button id="restoreBtn"> ♻️ Restaurer le contenu d'origine</button>

`;
bar.style.position = "fixed";
bar.style.top = "0";
bar.style.left = "0";
bar.style.width = "100%";
bar.style.background = "#333";
bar.style.color = "#fff";
bar.style.paddingTop = "10px";
bar.style.paddingBottom = "10px";
bar.style.zIndex = "10000";
bar.style.display = "flex";
bar.style.justifyContent = "space-between";
bar.style.gap = "10px";
MA.style.paddingLeft = "10px";
btnCont.style.display = "flex";
saveBtn.style.padding = "5px";
logoutBtn.style.padding = "5px";
logoutBtn.style.marginLeft = "10px";
restoreBtn.style.marginRight = "10px";
spanBtn1.style.fontSize = "0.7rem";
spanBtn2.style.fontSize = "0.7rem";

// Fonction d'initialisation globale de SunEditor sur tous les blocs contenteditable
window.initSunEditors = function () {
  window.editors = window.editors || {};

  document.querySelectorAll('[contenteditable="true"]').forEach((el) => {
    // Si un éditeur existe déjà, le détruire d'abord proprement
    if (window.editors[el.id]) {
      window.editors[el.id].destroy();
    }

    let buttonList = [];
    let tag = "";
    let defaultStyle = "";

    const fontSizes = ["0.6", "0.7", "0.8", "1", "1.2", "1.3", "1.5", "2"];

    if (el.id.endsWith("_h1")) {
      buttonList = [
        [
          "undo",
          "redo",
          "font",
          "fontSize",
          "fontColor",
          "bold",
          "italic",
          "underline",
          "removeFormat",
        ],
      ];
      tag = "h1";
      defaultStyle =
        'font-family: "Roboto"; font-size: 2rem; color: var(--color0);';
    } else if (el.id.endsWith("_h2")) {
      buttonList = [
        [
          "undo",
          "redo",
          "font",
          "fontSize",
          "fontColor",
          "bold",
          "italic",
          "underline",
          "removeFormat",
        ],
      ];
      tag = "h2";
      defaultStyle = 'font-family: "Roboto"; font-size: 1.5rem;';
    } else if (el.id.endsWith("_p")) {
      buttonList = [
        [
          "undo",
          "redo",
          "font",
          "fontSize",
          "fontColor",
          "bold",
          "italic",
          "underline",
          "align",
          "removeFormat",
          "link",
        ],
      ];
      tag = "p";
      defaultStyle =
        'font-family: "Roboto";font-size: 1.2rem;text-align: justify';
    } else if (el.id.endsWith("_img")) {
      buttonList = [["undo", "redo", "image"]];
      tag = "div";
    } else if (el.id.endsWith("_pTxt")) {
      buttonList = [
        [
          "undo",
          "redo",
          "font",
          "fontSize",
          "fontColor",
          "bold",
          "italic",
          "underline",
          "align",
          "removeFormat",
        ],
      ];
      tag = "p";
      defaultStyle = 'font-family: "Roboto";font-size: 1.5rem;';
    }

    // Puis recréer avec le contenu actuel de l'élément
    const editor = SUNEDITOR.create(el, {
      lang: SUNEDITOR_LANG["fr"],
      height: "auto",
      font: ["Roboto"],
      defaultStyle: defaultStyle,
      formats: [{ tag: "span", style: "font-size" }],
      fontSize: fontSizes,
      fontSizeUnit: "rem",

      imageUploadHeader: {
        Accept: "application/json",
      },

      imageUploadUrl: "upload_image.php",
      imageUploadInputName: "file",
      imageUploadSizeLimit: 10485760, // 10 Mo max
      imageUploadFormat: ["webp", "jpg", "jpeg", "png"], // formats autorisés
      imageAccept: "image/webp,image/png,image/jpeg", // HTML accept attrib
      imageMultipleFile: false,

      buttonList: buttonList,
      // Important : empêche les balises de remplacement auto
      defaultTag: tag,
      addTagsWhitelist: "h1|h2|p|strong|em|a|img|ul|ol|li|br|span|div",
      pasteTagsWhitelist: "h1|h2|p|strong|em|a|img|ul|ol|li|br|span|div",
      pasteHTML: false,
      colorList: [
        "#f3f3f3",
        "#ffffff",
        "#0f4b73",
        "#0f4b73cc",
        "#083654",
        "#17a2b8",
        "#117a8b",
        "#28a745",
        "#1e7e34",
        "#ff0000",
        "#ff5e00",
        "#ffe400",
        "#abf200",
        "#00d8ff",
        "#0055ff",
        "#6600ff",
        "#ff00dd",
        "#000000",
      ],
    });

    window.editors[el.id] = editor;
  });
};

// Appel automatique si admin connecté
initSunEditors();

// Bouton sauvegarde globale
document.getElementById("saveBtn").addEventListener("click", function () {
  const content = { __page: currentPage };
  const section1 = { h1: false, img: false, p: false };

  document.querySelectorAll('[contenteditable="true"][id]').forEach((el) => {
    let rawHtml = "";

    if (window.editors && window.editors[el.id]) {
      rawHtml = window.editors[el.id].getContents().trim();
    } else {
      rawHtml = el.innerHTML.trim();
    }

    const isEmpty = (html) => {
      if (!html) return true;
      const clean = html.trim().replace(/\s|&nbsp;/g, "");
      return (
        clean === "" || /^<(p|div|h[1-6])>(<br>|&nbsp;)?<\/\1>$/.test(clean)
      );
    };

    if (!isEmpty(rawHtml)) {
      if (el.id.includes("h2") && rawHtml.startsWith("<p")) {
        rawHtml = rawHtml.replace(/^<p>(.*?)<\/p>$/i, "<h2>$1</h2>");
      } else if (el.id.includes("h1") && rawHtml.startsWith("<p")) {
        rawHtml = rawHtml.replace(/^<p>(.*?)<\/p>$/i, "<h1>$1</h1>");
      } else if (el.id.includes("p") && !rawHtml.startsWith("<p")) {
        rawHtml = `<p>${rawHtml}</p>`;
      } else if (el.id.includes("img") && !rawHtml.startsWith("<div")) {
        rawHtml = `<div>${rawHtml}</div>`;
      }

      // Nettoyage spécial des images de SunEditor
      if (el.id.includes("img")) {
        // Extraire la balise <img> uniquement
        const imgMatch = rawHtml.match(/<img [^>]*src=["'][^"']+["'][^>]*>/i);
        if (imgMatch) {
          rawHtml = imgMatch[0]
            .replace(
              /\s(style|data-[^=]+|origin-size|data-size|data-align|data-proportion|data-file-name|data-file-size)="[^"]*"/gi,
              ""
            ) // supprime tous les data-* et styles
            .replace(/\s{2,}/g, " ") // supprime les espaces doubles
            .replace(/\s*>/, ">"); // supprime l'espace final avant >
        }
      }

      content[el.id] = rawHtml;

      // Vérification pour la section1
      if (el.id.startsWith("accueil_section1")) {
        if (rawHtml.includes("<h1")) section1.h1 = true;
        if (rawHtml.includes("<img")) section1.img = true;
        if (rawHtml.includes("<p")) section1.p = true;
      }
    }
  });

  //champs spécifiques (téléphone et doctolib, googleMap)
  const telContent = document.getElementById("contactTel_input")?.value.trim();
  if (telContent) content["contactTel_link"] = telContent;

  const doctolibURL = document.getElementById("doctoLib_input")?.value.trim();
  if (doctolibURL) content["doctoLibLink_link"] = doctolibURL;

  const googleMapURL = document.getElementById("googleMap_input")?.value.trim();
  if (googleMapURL) content["googleMap_link"] = googleMapURL;

  // Contrôle si section1 est incomplète
  if (!section1.h1 || !section1.img || !section1.p) {
    alert(
      "La SECTION PRINCIPALE doit contenir ces 3 éléments :\n- un titre\n- une image\n- un paragraphe."
    );
    return;
  }

  if (Object.keys(content).length === 1) {
    alert("Aucune modification détectée !");
    return;
  }

  console.log("Contenu à enregistrer :", content);

  fetch("save.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(content),
  })
    .then((response) => {
      if (!response.ok) throw new Error("Erreur lors de la sauvegarde");
      return response.text();
    })
    .then((data) => {
      alert("Contenu enregistré avec succès.");
      location.reload();
    })
    .catch((err) => {
      alert(err.message);
    });
});

// Bouton déconnexion
document.getElementById("logoutBtn").addEventListener("click", function () {
  window.location.href = "logout.php";
});

// Bouton restaurer
document.getElementById("restoreBtn").addEventListener("click", function () {
  fetch("check_session.php") // Vérifie la session avant la restauration
    .then((response) => response.text())
    .then((data) => {
      if (data !== "OK") {
        alert("Session expirée ou non autorisée.");
        window.location.href = "login.php"; // Redirige vers la page de connexion si la session est invalide
      } else {
        if (
          confirm("Êtes-vous sûr de vouloir restaurer le contenu par défaut ?")
        ) {
          fetch("restaurer.php")
            .then((response) => {
              if (!response.ok)
                throw new Error("Erreur lors de la restauration.");
              return response.text();
            })
            .then((data) => {
              alert(data); // Affichage du message de succès
              location.reload(); // Rechargement de la page pour voir les changements
            })
            .catch((err) => {
              alert("Erreur lors de la restauration.");
            });
        }
      }
    });
});

// Boutons de suppression individuelle
document.querySelectorAll(".delete-content").forEach((btn) => {
  btn.addEventListener("click", function () {
    const id = this.dataset.id;
    const el = document.getElementById(id);

    if (!confirm("Êtes-vous sûr de vouloir supprimer ce contenu ?")) return;

    // Efface visuellement le champ
    if (window.editors && window.editors[id]) {
      window.editors[id].setContents("");
    } else {
      el.innerHTML = "";
    }

    // Envoie la suppression au serveur
    fetch("save.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ __page: currentPage, [id]: null }),
    })
      .then((res) => {
        if (!res.ok) throw new Error();
        return res.text();
      })
      .then(() => {
        alert("Contenu supprimé !");
      })
      .catch(() => alert("Erreur lors de la suppression."));
  });
});

// Montrer l'info
document.querySelectorAll(".toggle-info").forEach((button) => {
  button.addEventListener("click", () => {
    const targetId = button.getAttribute("data-target");
    const infoBox = document.getElementById(targetId);
    if (infoBox) {
      infoBox.style.display = "block";
      button.style.display = "none";
    }
  });
});

// Fermer l'info
document.querySelectorAll(".close-info").forEach((cross) => {
  cross.addEventListener("click", () => {
    const infoBox = cross.parentElement;
    infoBox.style.display = "none";

    // Rendre le bouton associé visible à nouveau
    const targetId = infoBox.id;
    const toggleBtn = document.querySelector(
      `.toggle-info[data-target="${targetId}"]`
    );
    if (toggleBtn) {
      toggleBtn.style.display = "inline-block";
    }
  });
});

// afficher la galerie d'images
document.addEventListener("DOMContentLoaded", () => {
  const btn = document.querySelector(".galeryBtn");
  const frame = document.querySelector(".galeryFrame");
  const label = document.querySelector(".open-close");

  btn.addEventListener("click", () => {
    const isVisible = frame.classList.toggle("visible");
    label.innerHTML = isVisible
      ? "❌<br>GALERIE<br>D'IMAGES"
      : "🖼️<br>GALERIE<br>D'IMAGES";
  });
});
