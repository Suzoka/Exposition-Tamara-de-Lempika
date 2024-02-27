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
    label.addEventListener('keydown', function(event) {
        if (event.key === 'Enter' || event.keyCode === 13) {
            let radioButton = document.querySelector('#' + this.getAttribute('for'));
            radioButton.checked = true;
        }
    });
});

document.querySelectorAll("button.confirmer").forEach(button => {
    button.addEventListener('click', function(event) {
        changeStep(1, event)
    });
});

document.querySelectorAll("button.retour").forEach(button => {
    button.addEventListener('click', function(event) {
        changeStep(-1, event)
    });
});


//sens =1 pour passer à la page suivante, =-1 pour la page précédente
function changeStep (sens, event) {
    document.querySelector('#' + event.target.parentElement.parentElement.getAttribute('id')).style.display = 'none';
    document.querySelector('#step' + (parseInt(event.target.parentElement.parentElement.getAttribute('id').replace("step",""))+sens)).style.display = 'block';
}

const formules = document.querySelectorAll('#step2 input[type="number"]')
formules.forEach(input => {
    input.addEventListener('change', function() {
        let cumul = 0;
        formules.forEach(input => {
            cumul += parseInt(input.value);
        });
        if (cumul>10) {
            input.value = input.value - (cumul-10);
        }
    });
});