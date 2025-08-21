const menuButton = document.querySelector('.menu-mobile-button');
const menu = document.querySelector('.menu-mobile');
const overlay = document.querySelector('.menu-overlay');

// Função para abrir/fechar menu
function toggleMenu() {
  menu.classList.toggle('open');
  overlay.classList.toggle('active');
  menuButton.classList.toggle('active');
  
  // Previne scroll do body quando menu está aberto
  if (menu.classList.contains('open')) {
    document.body.style.overflow = 'hidden';
  } else {
    document.body.style.overflow = '';
  }
}

// Função para fechar menu
function closeMenu() {
  menu.classList.remove('open');
  overlay.classList.remove('active');
  menuButton.classList.remove('active');
  document.body.style.overflow = '';
}

// Event listeners
menuButton.addEventListener('click', toggleMenu);
overlay.addEventListener('click', closeMenu);

// Fechar menu ao clicar em um link
const menuLinks = document.querySelectorAll('.menu-mobile a');
menuLinks.forEach(link => {
  link.addEventListener('click', closeMenu);
});

// Fechar menu com tecla ESC
document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape' && menu.classList.contains('open')) {
    closeMenu();
  }
});

// Fechar menu ao redimensionar para desktop
window.addEventListener('resize', () => {
  if (window.innerWidth > 768 && menu.classList.contains('open')) {
    closeMenu();
  }
});
