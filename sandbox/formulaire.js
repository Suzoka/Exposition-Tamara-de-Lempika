const datepicker = new Datepicker(document.querySelector('div#date'), {
    inline: true,
    language: 'fr',
    minDate: new Date()
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
        changeStep(1, event)
    });
});

document.querySelector(".resumeButton").addEventListener('click', function (event) {
    updateResume();
});

document.querySelectorAll("button.retour").forEach(button => {
    button.addEventListener('click', function (event) {
        changeStep(-1, event)
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

//sens =1 pour passer à la page suivante, =-1 pour la page précédente
const changeStep = (sens, event) => {
    document.querySelector('#' + event.target.parentElement.parentElement.getAttribute('id')).style.display = 'none';
    document.querySelector('#step' + (parseInt(event.target.parentElement.parentElement.getAttribute('id').replace("step", "")) + sens)).style.display = 'block';
}

const goToStep = (step, event) => {
};

const updateResume = () => {
    document.querySelector('.dateResume').innerHTML = hiddenInput.value;
    document.querySelector('.heureResume').innerHTML = document.querySelector('input[name="heure"]:checked').nextElementSibling.innerHTML;
    document.querySelector('.formuleResumeDynamique').innerHTML = "";

    document.querySelectorAll('#step2 input[type="number"]').forEach(input => {
        if (input.value > 0) {
            let formule = document.createElement('li');
            formule.innerHTML = document.querySelector('label[for="'+input.getAttribute('id')+'"]').innerHTML + " : " + input.value;
            document.querySelector('.formuleResumeDynamique').appendChild(formule);
        }
    });

    document.querySelector('.prenomResume').innerHTML = document.querySelector('input[name="prenom"]').value;
    document.querySelector('.nomResume').innerHTML = document.querySelector('input[name="nom"]').value;
    document.querySelector('.mailResume').innerHTML = document.querySelector('input[name="mail"]').value;
};