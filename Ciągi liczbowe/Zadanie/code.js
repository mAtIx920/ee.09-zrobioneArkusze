let flag = false;

document.querySelector('button').addEventListener('click', () => {

    let text = 'Ciąg arytmetyczny zawiera wyrazy: ';
    

    for(let i = 1; i <= Number(document.querySelector('.numbersOfString').value);i++){

        const resultCalculate = Number(document.querySelector('.first_number').value) + ((i - 1) * Number(document.querySelector('.difference').value));

        if(i === Number(document.querySelector('.numbersOfString').value)){
            text = text.concat(`${resultCalculate}`);
        }  else {     
            text = text.concat(`${resultCalculate}, `);
        } 
    }

    const create = () => {
        const element = document.createElement('p');
        element.classList.add('text');
        element.textContent = text;
        document.querySelector('section.right').appendChild(element);
    }

    if(!flag){
        create();
        flag = !flag;
    } else {
        document.querySelector('p.text').remove();
        create();
    }  
})