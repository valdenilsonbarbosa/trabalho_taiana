const menuButton = document.querySelector('.menu-mobile-button');
const menu = document.querySelector('.menu-mobile');
const overlay = document.querySelector('.menu-overlay');

menuButton.addEventListener('click', () => {
  menu.classList.toggle('open');
  overlay.classList.toggle('active');
});

overlay.addEventListener('click', () => {
  menu.classList.remove('open');
  overlay.classList.remove('active');
});
