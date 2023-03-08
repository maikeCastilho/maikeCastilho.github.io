const cards = document.querySelectorAll('#curso-box');
const container = document.querySelector('#cursos');

// Define a função para animar cada card
function animateCard(card, delay) {
  setTimeout(() => {
    card.classList.add('animate');
    card.addEventListener('transitionend', () => {
      card.classList.remove('animate');
    }, { once: true });
  }, delay);
}

// Define o atraso entre cada card
const delay = 500;

// Inicia a animação de cada card com um atraso crescente
cards.forEach((card, index) => {
  animateCard(card, index * delay);
});