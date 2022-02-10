const button = document.querySelector('button');
const p = document.querySelector('.result');

button.addEventListener('click', () => {
    let finallyCost = 0;
    if (document.querySelector('#piling').checked) {
        finallyCost += 45;
    }
    if (document.querySelector('#maska').checked) {
        finallyCost += 30;
    }
    if (document.querySelector('#masaz').checked) {
        finallyCost += 20;
    }
    if (document.querySelector('#regulacja').checked) {
        finallyCost += 5;
    }
    p.innerHTML = "Cena za zabiegi : " + finallyCost + "zł";

})