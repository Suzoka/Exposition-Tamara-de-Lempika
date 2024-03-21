function burger() {
    const burger = document.querySelector('.burger');
    const burgerOpen = document.querySelector('.burgerOpen');
    const burgerClose = document.querySelector('.burgerClose');
    const menu = document.querySelector('.menu');
    let etat = 0;

    burger.addEventListener('click', () => {
        if(etat == 0) {
            menu.style.display = "flex";

            burgerOpen.style.display = "none";
            burgerClose.style.display = "block";
            etat = 1;
        } else {
            menu.style.display = "none";
            
            burgerOpen.style.display = "block";
            burgerClose.style.display = "none";
            etat = 0;
        }   
    });
};

document.addEventListener('DOMContentLoaded', function () {
    burger();
});