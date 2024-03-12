const datepicker = new Datepicker(document.querySelector('div#date'), {
    inline: true,
    language: 'fr',
    minDate: new Date(),
    maxDate: new Date('2024-04-28')
});

let hiddenInput = document.createElement('input');
hiddenInput.type = 'hidden';
hiddenInput.name = 'datePicker';
document.querySelector('form').appendChild(hiddenInput);

datepicker.element.addEventListener('changeDate', function () {
    hiddenInput.value = datepicker.getDate('yyyy-mm-dd');
});

document.querySelectorAll("div.heure label").forEach(label => {
    label.addEventListener('keydown', function (event) {
        if (event.key === 'Enter' || event.keyCode === 13) {
            let radioButton = document.querySelector('#' + this.getAttribute('for'));
            radioButton.checked = true;
        }
    });
});

document.querySelectorAll("button.confirmer").forEach(button => {
    button.addEventListener('click', function (event) {
        if (checkStep(event)) {
            goToStep(this.getAttribute('data-goto'), this.getAttribute('data-from'));
        }
    });
});

document.querySelector(".resumeButton").addEventListener('click', function (event) {
    updateResume();
});

document.querySelectorAll("button.retour, button.edit").forEach(button => {
    button.addEventListener('click', function () {
        goToStep(this.getAttribute('data-goto'), this.getAttribute('data-from'));
    });
});

const formules = document.querySelectorAll('#step2 input[type="number"]')
formules.forEach(input => {
    input.addEventListener('change', function () {
        let cumul = 0;
        formules.forEach(input => {
            cumul += parseInt(input.value);
        });
        if (cumul > 10) {
            input.value = input.value - (cumul - 10);
        }
    });
});

const checkStep = (event) => {
    let step = event.target.parentElement.parentElement.getAttribute('id');
    switch (step) {
        case "step1":
            if (hiddenInput.value === "") {
                alert("Veuillez choisir une date");
                return false;
            }
            if (document.querySelector('input[name="heure"]:checked') === null) {
                alert("Veuillez choisir une heure");
                return false;
            }
            return true;
        case "step2":
            let cumul = 0;
            formules.forEach(input => {
                cumul += parseInt(input.value);
            });
            if (cumul === 0) {
                alert("Veuillez choisir au moins une formule");
                return false;
            }
            return true;
        case "step3":
            if (document.querySelector('input[name="prenom"]').validity.valid == false) {
                alert("Veuillez renseigner votre prénom");
                return false;
            }
            if (document.querySelector('input[name="nom"]').validity.valid == false) {
                alert("Veuillez renseigner votre nom");
                return false;
            }
            if (document.querySelector('input[name="mail"]').validity.valid == false) {
                alert("Veuillez renseigner un mail valide");
                return false;
            }
            return true;
    }
};

const goToStep = (goto, from) => {
    document.querySelector('#step' + from).style.display = 'none';
    document.querySelector('#step' + goto).style.display = 'grid';
};

let date;
const mois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];


const updateResume = () => {
    date = new Date(hiddenInput.value);
    document.querySelector('.dateResume').innerHTML = date.getDate() + " " + mois[date.getMonth()] + " " + date.getFullYear();
    document.querySelector('.heureResume').innerHTML = document.querySelector('input[name="heure"]:checked').nextElementSibling.innerHTML;
    document.querySelector('.formuleResumeDynamique').innerHTML = "";

    document.querySelectorAll('#step2 input[type="number"]').forEach(input => {
        if (input.value > 0) {
            let formule = document.createElement('li');
            formule.innerHTML = document.querySelector('label[for="' + input.getAttribute('id') + '"]').innerHTML + " : " + input.value;
            document.querySelector('.formuleResumeDynamique').appendChild(formule);
        }
    });

    document.querySelector('.prenomResume').innerHTML = document.querySelector('input[name="prenom"]').value;
    document.querySelector('.nomResume').innerHTML = document.querySelector('input[name="nom"]').value;
    document.querySelector('.mailResume').innerHTML = document.querySelector('input[name="mail"]').value;
};