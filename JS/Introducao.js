function selectUserType(userType) {
    // Remove animações anteriores
    const buttons = document.querySelectorAll('.user-button');
    buttons.forEach(button => {
        button.classList.remove('selected');
    });
    
    // Adiciona animação de seleção ao botão clicado
    const clickedButton = event.currentTarget;
    clickedButton.classList.add('selected');
    
    // Adiciona efeito de vibração suave
    if (navigator.vibrate) {
        navigator.vibrate(50);
    }
    
    // Mostra o resultado da seleção
    const resultDiv = document.getElementById('selectionResult');
    const resultText = document.getElementById('resultText');
    
    // Define a mensagem baseada no tipo de usuário
    let message = '';
    if (userType === 'professor') {
        message = '🎓 Perfil de Professor selecionado com sucesso!';
    } else if (userType === 'aluno') {
        message = '📚 Perfil de Aluno selecionado com sucesso!';
    } else {
        message = '👋 Perfil de Visitante selecionado com sucesso!';
    }
    
    resultText.textContent = message;
    
    // Mostra o resultado com animação
    resultDiv.style.display = 'block';
    
    // Adiciona efeito de confetti virtual
    createConfetti();
    
    // Simula redirecionamento ou próxima ação após 3 segundos
    setTimeout(() => {
        console.log(`Usuário selecionou: ${userType}`);
        
        // Exemplo de ações baseadas no tipo de usuário:
        if (userType === 'professor') {
            console.log('Redirecionando para área do professor...');
            // window.location.href = '/professor-dashboard';
        } else if (userType === 'aluno') {
            console.log('Redirecionando para área do aluno...');
            // window.location.href = '/student-dashboard';
        } else {
            console.log('Redirecionando para área do visitante...');
            // window.location.href = '/visitor-tour';
        }
    }, 3000);
}

// Função para criar efeito de confetti
function createConfetti() {
    const colors = ['#667eea', '#764ba2', '#11998e', '#38ef7d', '#ff6b6b', '#ffa726'];
    const confettiCount = 50;
    
    for (let i = 0; i < confettiCount; i++) {
        createConfettiPiece(colors[Math.floor(Math.random() * colors.length)]);
    }
}

function createConfettiPiece(color) {
    const confetti = document.createElement('div');
    confetti.style.position = 'fixed';
    confetti.style.width = '10px';
    confetti.style.height = '10px';
    confetti.style.backgroundColor = color;
    confetti.style.left = Math.random() * 100 + 'vw';
    confetti.style.top = '-10px';
    confetti.style.borderRadius = '50%';
    confetti.style.pointerEvents = 'none';
    confetti.style.zIndex = '9999';
    confetti.style.animation = `confetti-fall ${Math.random() * 2 + 2}s linear forwards`;
    
    document.body.appendChild(confetti);
    
    setTimeout(() => {
        confetti.remove();
    }, 4000);
}

// Adiciona CSS para animação do confetti
const confettiStyle = document.createElement('style');
confettiStyle.textContent = `
    @keyframes confetti-fall {
        0% {
            transform: translateY(-100vh) rotate(0deg);
            opacity: 1;
        }
        100% {
            transform: translateY(100vh) rotate(720deg);
            opacity: 0;
        }
    }
`;
document.head.appendChild(confettiStyle);

// Adiciona efeitos de hover e focus para acessibilidade
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.user-button');
    
    buttons.forEach((button, index) => {
        // Adiciona suporte para navegação por teclado
        button.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                button.click();
            }
            
            // Navegação com setas
            if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
                e.preventDefault();
                const nextButton = buttons[(index + 1) % buttons.length];
                nextButton.focus();
            }
            
            if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
                e.preventDefault();
                const prevButton = buttons[(index - 1 + buttons.length) % buttons.length];
                prevButton.focus();
            }
        });
        
        // Adiciona atributos de acessibilidade
        button.setAttribute('tabindex', '0');
        button.setAttribute('role', 'button');
        
        // Efeito de ripple ao clicar
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = button.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');
            
            button.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
        
        // Efeito de hover com som (se disponível)
        button.addEventListener('mouseenter', function() {
            // Adiciona uma pequena animação de escala
            button.style.transform = 'translateY(-6px) scale(1.02)';
        });
        
        button.addEventListener('mouseleave', function() {
            if (!button.classList.contains('selected')) {
                button.style.transform = '';
            }
        });
    });
    
    // Adiciona animação de entrada para os botões
    buttons.forEach((button, index) => {
        button.style.opacity = '0';
        button.style.transform = 'translateY(30px)';
        
        setTimeout(() => {
            button.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
            button.style.opacity = '1';
            button.style.transform = 'translateY(0)';
        }, index * 150);
    });
    
    // Adiciona efeito de parallax suave ao mover o mouse
    document.addEventListener('mousemove', function(e) {
        const card = document.querySelector('.card');
        const rect = card.getBoundingClientRect();
        const centerX = rect.left + rect.width / 2;
        const centerY = rect.top + rect.height / 2;
        
        const deltaX = (e.clientX - centerX) / rect.width;
        const deltaY = (e.clientY - centerY) / rect.height;
        
        card.style.transform = `
            perspective(1000px) 
            rotateY(${deltaX * 5}deg) 
            rotateX(${-deltaY * 5}deg)
            translateY(-8px)
        `;
    });
    
    // Reset da transformação quando o mouse sai da área
    document.addEventListener('mouseleave', function() {
        const card = document.querySelector('.card');
        card.style.transform = '';
    });
});

