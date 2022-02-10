const button = document.querySelector('button');
const inputNumberOfOil = document.querySelector('.kind');
const inputAmountOil = document.querySelector('.amount');
let paragraph = document.createElement('p');

button.addEventListener('click', (e) => {
    paragraph.textContent = "";
    e.preventDefault();
    
    const number = inputNumberOfOil.value;
    const amountOil = inputAmountOil.value;

    inputNumberOfOil.value = "";
    inputAmountOil.value = "";

   function createParagraph(price) {
        paragraph = document.createElement('p');
        paragraph.textContent = `Koszt paliwa : ${amountOil * price} zł`; 
        document.querySelector('form').appendChild(paragraph);
    }
   
    switch(number){
        case '1':
            createParagraph(4);
        break;
        case '2':
            createParagraph(3.5);
        break;
        default:
           createParagraph(0);
        break;
    }
})