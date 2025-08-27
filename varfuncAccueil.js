/*** carousel ****/

const carousel = document.querySelector(".carousel");
const buttons = document.querySelectorAll(".btn");
const slides = document.querySelectorAll(".slide");
let autoSlideInterval;
let pauseTimeout;
let autoSlideEnabled = true;
let timeoutId;
let userInteracted = false;

function showSlide(index) {
  const currentSlide = document.querySelector(".actifSlide");
  if (currentSlide) currentSlide.classList.remove("actifSlide");
  slides[index].classList.add("actifSlide");
}

function getCurrentIndex() {
  return [...slides].indexOf(document.querySelector(".actifSlide"));
}

function changeSlide(direction = 1) {
  const currentIndex = getCurrentIndex();
  let newIndex = currentIndex + direction;

  if (newIndex < 0) newIndex = slides.length - 1;
  if (newIndex >= slides.length) newIndex = 0;

  showSlide(newIndex);
}

function startAutoSlide() {
  autoSlideInterval = setInterval(() => {
    changeSlide(1);
  }, 4000);
}

function pauseAutoSlide() {
  clearInterval(autoSlideInterval);
  clearTimeout(pauseTimeout);
  pauseTimeout = setTimeout(() => {
    startAutoSlide();
  }, 5000);
}

function showNextSlide() {
  if (!autoSlideEnabled) return;

  const slideActif = document.querySelector(".actifSlide");
  let newIndex = [...slides].indexOf(slideActif) + 1;
  if (newIndex >= slides.length) newIndex = 0;

  slideActif.classList.remove("actifSlide");
  slides[newIndex].classList.add("actifSlide");

  timeoutId = setTimeout(showNextSlide, userInteracted ? 5000 : 4000);
}

//Observer la visibilité du slider
const observer = new IntersectionObserver(
  ([entry]) => {
    autoSlideEnabled = entry.isIntersecting;
    if (autoSlideEnabled && !userInteracted) {
      clearTimeout(timeoutId);
      timeoutId = setTimeout(showNextSlide, 4000);
    }
  },
  {
    threshold: 0.4, // active quand 40% du slider est visible
  }
);
