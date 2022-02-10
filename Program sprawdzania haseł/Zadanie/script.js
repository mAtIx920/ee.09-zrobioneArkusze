document.querySelector('button').addEventListener('click', (event) => {
    event.preventDefault();
    const numbers = '0123456789';
    const inputValue = document.querySelector('p input').value;
    const paragraph = document.querySelector('.color');
    document.querySelector('p input').value = '';

    const compare = () => {
        for (let i = 0; i < inputValue.length; i++) {
            for (let j = 0; j < numbers.length; j++) {
                if (inputValue[i] === numbers[j]) {
                    const truth = true;
                    return truth;
                }
            }
        }
    }
  
    if (!(inputValue === '')) {

        if (inputValue.length >= 4 && inputValue.length <= 6) {
            const truth = compare();
            if (truth) {
                paragraph.textContent = 'HASŁO JEST ŚREDNIE';
                paragraph.style.color = 'blue';
            } else {
                paragraph.textContent = 'HASŁO JEST SŁABE';
                paragraph.style.color = 'yellow';
            }

        } else if (inputValue.length > 7) {
            const truth = compare();
            if (truth) {
                paragraph.textContent = 'HASŁO JEST DOBRE';
                paragraph.style.color = 'green';
            } else {
                paragraph.textContent = 'HASŁO JEST SŁABE';
                paragraph.style.color = 'yellow';
            }
        } else {
            paragraph.textContent = 'HASŁO JEST SŁABE';
            paragraph.style.color = 'yellow';
        }

    } else {
        paragraph.textContent = 'POLE JEST PUSTE';
        paragraph.style.color = 'red';
    }

   

})