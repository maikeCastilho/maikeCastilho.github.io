var secoesAnimadas = document.querySelectorAll('.animation');
var alturaJanela = window.innerHeight;

function animarSecao() {
    secoesAnimadas.forEach(function(secao) {
        var posicao = secao.getBoundingClientRect().top;
        if (posicao - alturaJanela <= 0) {
          secao.classList.add('aparecer');
        }
      });
 
}

animarSecao();
window.addEventListener('scroll', animarSecao);