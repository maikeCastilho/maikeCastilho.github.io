const toggleButton = document.getElementById('toggle-dark-mode');
const body = document.body;

toggleButton.addEventListener('click', () => {
        body.classList.toggle('dark-mode');
        
    });