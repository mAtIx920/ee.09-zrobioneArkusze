let flag = true;
document.querySelector('button').addEventListener('click', () => {
    const typeOfCofee = Number(document.querySelector('input:nth-of-type(1)').value);
    const amount = Number(document.querySelector('input:nth-of-type(2)').value);
    document.querySelector('input:nth-of-type(1)').value = '';
    document.querySelector('input:nth-of-type(2)').value = '';
    let result = 0;

    const createElement = () => {
        const element = document.createElement('p');
        element.classList.add('text');
        element.textContent = `Koszt zamówienia wynosi ${result}zł`;
        document.querySelector('.right').appendChild(element);
    }
    
    switch(typeOfCofee){
        case 1:
            result = 5 * amount;
        break;
        case 2:
            result = 7 * amount;
        break;
        case 3:
            result = 6 * amount;
        break;
        default:
            result = 0;
    }

    if(flag){
        createElement()
        flag = !flag;
    } else {
        document.querySelector('.text').remove();
        createElement();
    }
})