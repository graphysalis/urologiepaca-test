/*************carousel************/
buttons.forEach((button) => {
  button.addEventListener("click", (e) => {
    userInteracted = true;
    clearTimeout(timeoutId);
    autoSlideEnabled = true;

    const slideActif = document.querySelector(".actifSlide");
    let newIndex =
      [...slides].indexOf(slideActif) + (e.target.id === "next" ? 1 : -1);

    if (newIndex < 0) newIndex = slides.length - 1;
    if (newIndex >= slides.length) newIndex = 0;

    slideActif.classList.remove("actifSlide");
    slides[newIndex].classList.add("actifSlide");

    timeoutId = setTimeout(() => {
      userInteracted = false;
      showNextSlide();
    }, 5000);
  });
});

//Auto slide au chargement
timeoutId = setTimeout(showNextSlide, 4000);

observer.observe(document.querySelector(".carousel"));

/*** End carousel ***/
