let flag = false;

const create = () => {
    const amountSurface = document.querySelector('input').value;
    const numberOfTin = Math.ceil(amountSurface / 4);
    const element = document.createElement('p');
    element.classList.add('text');
    element.textContent = `Liczba jednolitych puszek farby potrzebnych do pomalowania wynosi ${numberOfTin}`;
    document.querySelector('.right').appendChild(element);
}

document.querySelector('button').addEventListener('click', () => {

    if(!flag){
        create();
        flag = !flag;
    } else {
        document.querySelector('p.text').remove();
        create();
        console.log(flag);
    }
    
})