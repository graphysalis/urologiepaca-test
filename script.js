document.addEventListener("DOMContentLoaded", () => {
  createLetters();
  revealLetters();
  menuLinks.forEach((link) => {
    link.addEventListener("click", function () {
      menuLinks.forEach((link) => link.classList.remove("active"));
      this.classList.add("active");
    });
  });
  window.addEventListener("scroll", () => {
    scrollChecker();
    displayNotNav();
    const backToTop = document.querySelector(".back-to-top");
    if (window.scrollY > 100) {
      backToTop.style.display = "flex";
    } else {
      backToTop.style.display = "none";
    }
  });
  btnMenu.addEventListener("click", () => {
    displayNav();
  });
  /*conversion des "px" en "rem" pour font
  convertInlineFontSizeToRem();à effacer si tout fonctionne*/

  // Masquer le bouton admin sur appareil tactile sans souris
  if (
    navigator.maxTouchPoints > 0 &&
    !window.matchMedia("(pointer: fine)").matches
  ) {
    if (adminAccess) {
      adminAccess.style.display = "none";
    }
  }
});
