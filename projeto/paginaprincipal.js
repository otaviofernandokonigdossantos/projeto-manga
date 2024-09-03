const slides = document.querySelectorAll(".carousel__item");
const prevButton = document.querySelector("#carousel__button--prev");
const nextButton = document.querySelector("#carousel__button--next");

const totaSlides = slides.length;
let slidePosition = 0;

/* Aggiungo gli eventi */
prevButton.addEventListener("click", () => {
  moveToPrevSlide();
});

nextButton.addEventListener("click", () => {
  moveToNextSlide();
});

/* -----------------
FUNZIONI
----------------- */

function updateSlidePosition() {
  for (let slide of slides) {
    slide.classList.remove("carousel__item--visible");
    slide.classList.add("carousel__item--hidden");
  }
  slides[slidePosition].classList.add("carousel__item--visible");
}

// Funzione per passare alla slide precedente
function moveToPrevSlide() {
  // Se la slide mostrata attualmente è la prima è voglio passare alla precedente
  if (slidePosition === 0) {
    // Aggiorno il valore e torno all'ultima
    slidePosition = totaSlides - 1;
  } else {
    // altrimenti continuo con la precedente
    slidePosition--;
  }
  // Chiamo la funzione per eseguire i cambiamenti
  updateSlidePosition();
}

// Funzione per passare alla slide successiva
function moveToNextSlide() {
  // Se la slide mostrata attualmente è l'ultima e voglio passare alla successiva
  if (slidePosition === totaSlides - 1) {
    // Aggiorno il valore e torno alla prima slide
    slidePosition = 0;
  } else {
    // altrimenti continuo con la successiva
    slidePosition++;
  }
  // Chiamo la funzione per eseguire i cambiamenti
  updateSlidePosition();
}
