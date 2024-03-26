const sections = document.querySelectorAll('[data-scroll]');

window.addEventListener('scroll', function () {

    sections.forEach((section) => {

        if ((section.getBoundingClientRect().top <= window.innerHeight/2.5 && section.getBoundingClientRect().top >= 0) || (section.getBoundingClientRect().bottom <= window.innerHeight && section.getBoundingClientRect().bottom >= window.innerHeight)){

            document.querySelectorAll('header a').forEach((link) => link.classList.remove('active'));

            document.querySelector('#lien' + section.getAttribute('data-scroll')).classList.add('active');
        }

        if (section.getBoundingClientRect().top - section.getBoundingClientRect().height > window.innerHeight) {
            document.querySelector('#lien' + section.getAttribute('data-scroll')).classList.remove('active');
        }
    });
});