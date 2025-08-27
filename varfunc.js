const root = document.documentElement;
const color0 = getComputedStyle(root).getPropertyValue("--color0").trim();
const color1 = getComputedStyle(root).getPropertyValue("--color1").trim();
const color2 = getComputedStyle(root).getPropertyValue("--color2").trim();
const color3 = getComputedStyle(root).getPropertyValue("--color3").trim();

const doctorName = "Dr Stefan Jeglinschi";
const drNameDiv = document.querySelector(".DrName");
const headerNavBg = document.querySelector(".headerNavBg");
const headerNav = document.querySelector(".headerNav");
const btnMenu = document.querySelector("#menu");
const navUl = document.querySelector(".navUl");
const menuLinks = document.querySelectorAll(".menu-link");
const it1 = document.querySelector(".it1");
const it2 = document.querySelector(".it2");
const it3 = document.querySelector(".it3");

const adminAccess = document.getElementById("adminAccess");

/** Titre dynamique**/
function createLetters() {
  for (let i = 0; i < doctorName.length; i++) {
    const letterSpan = document.createElement("span");
    letterSpan.textContent = doctorName[i];
    letterSpan.classList.add("letter");
    drNameDiv.appendChild(letterSpan);
  }
}

function revealLetters() {
  const letters = document.querySelectorAll(".letter");
  letters.forEach((letter, index) => {
    setTimeout(() => {
      letter.style.opacity = 1;
    }, index * 50);
  });
}
/** End Titre dynamique**/

function displayNav() {
  if (window.matchMedia("(max-width: 1500px)").matches) {
    navUl.classList.toggle("navUlDisplay");
    it1.classList.toggle("rotateRight");
    it2.classList.toggle("removeIt2");
    it3.classList.toggle("rotateLeft");
  } else {
    null;
  }
}

function displayNotNav() {
  if (window.matchMedia("(max-width: 1500px)").matches) {
    navUl.classList.remove("navUlDisplay");
    it1.classList.remove("rotateRight");
    it2.classList.remove("removeIt2");
    it3.classList.remove("rotateLeft");
  } else {
    null;
  }
}

function scrollChecker() {
  if (window.scrollY == 0) {
    headerNav.style.position = "absolute";
    headerNav.style.top = "80px";
    headerNavBg.style.display = "none";
  } else if (window.scrollY != 0) {
    headerNav.style.position = "fixed";
    headerNav.style.top = 0;
    headerNavBg.style.display = "flex";
  }
}

/* convertir tous les px en rem
const pxToRem = (px) => {
  const num = parseFloat(px);
  if (isNaN(num)) return px;
  return `${(num / 16).toFixed(3)}rem`;
};
const convertInlineFontSizeToRem = () => {
  const elements = document.querySelectorAll('[style*="font-size"]');

  elements.forEach((el) => {
    const fontSize = el.style.fontSize;

    if (fontSize && fontSize.endsWith("px")) {
      el.style.fontSize = pxToRem(fontSize);
    }
  });
}; à effacer si tout fonctionne*/
