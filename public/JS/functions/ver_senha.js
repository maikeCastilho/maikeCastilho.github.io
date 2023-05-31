const toggleSenha = document.querySelector('#toggle-senha');
const senha = document.querySelector('#senha');
const toggleConfirmaSenha = document.querySelector('#toggle-confirma-senha');
const confirmaSenha = document.querySelector('#confirma-senha');

toggleSenha.addEventListener('click', function (e) {
    const type = senha.getAttribute('type') === 'password' ? 'text' : 'password';
    senha.setAttribute('type', type);
    this.querySelector('i').classList.toggle('fa-eye');
    this.querySelector('i').classList.toggle('fa-eye-slash');
});

toggleConfirmaSenha.addEventListener('click', function (e) {
    const type = confirmaSenha.getAttribute('type') === 'password' ? 'text' : 'password';
    confirmaSenha.setAttribute('type', type);
    this.querySelector('i').classList.toggle('fa-eye');
    this.querySelector('i').classList.toggle('fa-eye-slash');
});