const datepicker = new Datepicker(document.querySelector('div#date'), {
    inline: true,
    language: 'fr',
    minDate: new Date(),
    maxDate: new Date('2024-04-28')
});

let step = 1;

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
            goToStep(this.getAttribute('data-goto'));
        }
    });
});

document.querySelectorAll('.ariane button').forEach((element) =>
    element.addEventListener('click', function () {
        if (this.getAttribute('data-goto') < step) {
            goToStep(this.getAttribute('data-goto'));
        }
    }));

document.querySelector(".resumeButton").addEventListener('click', function (event) {
    updateResume();
});

document.querySelectorAll("button.retour, button.edit").forEach(button => {
    button.addEventListener('click', function () {
        goToStep(this.getAttribute('data-goto'));
    });
});

const formules = document.querySelectorAll('#step2 input[type="number"]')

const checkSum = (input) => {
    let cumul = 0;
    formules.forEach(input => {
        cumul += parseInt(input.value);
    });
    if (cumul > 10) {
        input.value = input.value - (cumul - 10);
        document.getElementById('errorFormuleMax').classList.remove('hidden');
    }
};

formules.forEach(input => {
    input.addEventListener('change', () => checkSum(input));
    input.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
        }
    });
});

const checkStep = (event) => {
    let step = event.target.parentElement.parentElement.getAttribute('id');
    let okay = true;
    switch (step) {
        case "step1":
            if (hiddenInput.value === "") {
                document.getElementById('errorDate').classList.remove('hidden');
                okay = false;
            }
            if (document.querySelector('input[name="heure"]:checked') === null) {
                document.getElementById('errorHeure').classList.remove('hidden');
                okay = false;
            }
            break;
        case "step2":
            let cumul = 0;
            formules.forEach(input => {
                cumul += parseInt(input.value);
            });
            if (cumul === 0) {
                document.getElementById('errorFormule').classList.remove('hidden');
                okay = false;
            }
            break;
        case "step3":
            if (document.querySelector('input[name="prenom"]').validity.valid == false) {
                document.getElementById('errorPrenom').classList.remove('hidden');
                okay = false;
            }
            if (document.querySelector('input[name="nom"]').validity.valid == false) {
                document.getElementById('errorNom').classList.remove('hidden');
                okay = false;
            }
            if (document.querySelector('input[name="mail"]').validity.valid == false) {
                document.getElementById('errorMail').classList.remove('hidden');
                okay = false;
            }
            break;
    }
    return okay;
};

const goToStep = (goto) => {
    const oldStep = document.querySelector('div.current')
    const newStep = document.querySelector('#step' + goto);
    oldStep.style.display = 'none';
    oldStep.classList.remove('current');
    newStep.style.display = 'grid';
    newStep.classList.add('current');
    step = goto;

    document.querySelectorAll('.error:not(.hidden)').forEach(error => error.classList.add('hidden'));

    updateAriane();
};

const updateAriane = () => {
    document.querySelector('.ariane .active').classList.remove('active');
    document.querySelector('.ariane .step' + step).classList.add('active');
    document.querySelectorAll('.ariane .etat').forEach((etat, i) => {
        etat.classList.remove('past');
        if (i < step - 1) {
            etat.classList.add('past');
        }
    });
}

let date;
let lang = document.documentElement.getAttribute('lang') == "fr" ? 'fr-FR' : 'en-US';

const updateResume = () => {

    date = new Date(hiddenInput.value);
    let options = { year: 'numeric', month: 'long', day: 'numeric' };
    document.querySelector('.dateResume').innerHTML = date.toLocaleDateString(lang, options);

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

document.querySelectorAll('.ticket .info button').forEach(element => {
    const input = document.querySelector('input#formule' + element.getAttribute('id').replace('minus', '').replace('plus', ''));
    element.addEventListener('click', function (button) {
        if (this.classList.contains('plus')) {
            input.value++;
        }
        else {
            if (input.value > 0) {
                input.value--;
            }
        }
        checkSum(input);
    })
});

document.querySelector('.closePopup').addEventListener('click', () => {
    document.querySelector('.popup.erreur').classList.add('hidden');
    document.querySelector('.serverError').classList.remove('serverError');
})